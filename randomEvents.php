<?php
/*
 * randomEvents.php
 *
 * Generates random events during travel.
 *
 * Inputs:
 *  - Query Param - startLocation - The number of miles before traveling today
 *  - Query Param - endLocation - The number of miles after traveling today
 */
include "classes.php";
session_start();
include "scoresAndDeaths.php";

$maxEvents = 3;  # For fairness, make sure no more than 3 events happen at the same time
$events = array();
$start = intval($_GET["startLocation"]);
$end = intval($_GET["endLocation"]);

# Weather changes

$month = $_SESSION["playerJourney"]->_month;

# It's more likely to rain in spring & fall
if (( $month >= 2 && $month < 5 ) || ( $month >= 8 && $month < 11)) 
{
    $rainMultiplier = 1.5;
}
else
{
    $rainMultiplier = 1;
}

# The closer it is to summer, the more likely it'll be that it's hot
$summerDistance = abs( 5 - $month );

$rainProbability = rand(1, 100) * $rainMultiplier;
$hotProbability = rand(1, 100) * (5 - $summerDistance) / 2.5;
$coldProbability = rand(1, 100) * $summerDistance / 2.5;
$sunnyProbability = rand(1,100);

$newWeather = "";
$highestProb = -1;
$weatherProbabilities = array("rainy" => $rainProbability, "hot" => $hotProbability,
    "cold" => $coldProbability, "sunny" => $sunnyProbability);

foreach ($weatherProbabilities as $weatherKey => $weatherValue)
{
    if ($weatherValue > $highestProb)
    {
        $newWeather = $weatherKey;
        $highestProb = $weatherValue;
    }
}

switch($newWeather)
{
    case "rainy":
        $slowFactor = 1.25;
        break;

    case "cold":
        $slowFactor = 2.0;
        break;

    default:
        $slowFactor = 1.0;
        break;
}

if ($newWeather != $_SESSION["playerJourney"]->_weather)
{
    $_SESSION["playerJourney"]->_weather = $newWeather;
    $maxEvents--;
    $events["weather_change"] = 
        array("weather" => $newWeather, "slow_factor" => $slowFactor);
}

# Thieves stealing

if ($maxEvents > 0)
{
    $thiefSteal = rand(1, 50);

    if ($thiefSteal == 50)
    {
        $maxEvents--;
        $itemStolen = rand(0, 7);
        $maxStolen = array(50, 100, 30, 4, 1, 1, 1, 3);
        $amountStolen = rand(1, $maxStolen[$itemStolen]);
        $amountStolen = -$_SESSION["playParty"]->_supplies->setItem($itemStolen, -$amountStolen);
        $events["thief_steal"] = array("id" => $itemStolen, "qty" => $amountStolen);
    }
}

# Wagon parts breaking

if ($maxEvents > 0)
{
    $partBreaks = rand(1, 300);

    if ($partBreaks == 300)
    {
        $maxEvents--;
        $brokenPart = rand(0,2);
        $_SESSION["playParty"]->_supplies->setItem(4 + $brokenPart, -1);
        $events["wagon_broke"] = array("wagon_part", $brokenPart);
    }
}

# Finding a wagon

if ($maxEvents > 0)
{
    $findWagon = rand(1, 50);

    if ($findWagon == 50)
    {
        $maxEvents--;
        $foundItem = rand(0, 7);
        $maxFound = array(50, 50, 30, 4, 1, 1, 1, 1);
        $amountFound = rand(1, $maxFound[$foundItem]);
        $_SESSION["playParty"]->_supplies->setItem($foundItem, $amountFound);
        $events["find_wagon"] = array("id" => $foundItem, "qty" => $amountFound);
    }
}

# Grave marker

$db = new OregonTrailDatabase("eritte2", "eritte2");

if ($db->connect())
{
    $graveStone = $db->getDeath($start, $end);

    if ($graveStone)
    {
        $events["grave_marker"] = $graveStone;
    }
}

# Getting sick
if ($maxEvents > 0)
{
    # Higher paces are detrimental to your health
    $paceMultiplier = ($_SESSION["playerJourney"]->_speed - 10) / 10;
    # Bad weather + poor clothes choices = worse health
    $weatherMultiplier = $_SESSION["playerJourney"]->_weather == "sunny"? 1 : 1.5 + 
        ($_SESSION["playParty"]->_livingMembers * 2 - $_SESSION["playParty"]->_supplies->_clothes);
    
    $sick_chance = rand(1,50) * ($paceMultiplier + $weatherMultiplier);

    # You get sick if your sick chance is greater than 199
    if ($sick_chance > 199)
    {
        $lowestHealth = 150;
        $personIndex = -1;

        # Person with the lowest health gets sick
        foreach ($_SESSION["playParty"]->_members as $index => $member)
        {
            if ($member->_alive && $member->_health < $lowestHealth)
            {
                $personIndex = $index;
                $lowestHealth = $member->_health;
            }
        }

        $sickNames = array("cholera", "dysentery", "common cold", "influenza", "diptheria", "measles", "typhoid fever", "cancer");
        $sickName = rand(0, count($sickNames) - 1);
        $sickDamage = $paceMultiplier * $weatherMultiplier * 2;

        $_SESSION["playParty"]->_members[$personIndex]->catchCold($sickNames[$sickName], $sickDamage);
        $events["got_sick"] = array("party_member" => $_SESSION["playParty"]->_members[$personIndex]->_name, 
            "sick_name" => $sickNames[$sickName]);
    }
}

echo json_encode($events);