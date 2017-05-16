<?php
/*
 * travel-sync.php
 * 
 * Synchronizes state between travel and session values
 *
 * Inputs:
 * - ?eat -> make the party eat for a day. Returns the amount of food remaining.
 * - ?getHealth -> does a kill check then averages health and returns it
 * - ?progress -> progresses distance, stopping at the next landmark if need be. Set to movement rate.
 * - ?nextDay -> advances to the next day, returns the date
 */
include "classes.php";
session_start();

$jsonResponse = array();

# Make party eat, adds remainingFood

if (isset($_GET["eat"]))
{
    $_SESSION["playParty"]->eat();
    $jsonResponse["remainingFood"] = $_SESSION["playParty"]->_supplies->_food;
}

# Health check/update, adds overallHealth, nowDead, livingMembers

if (isset($_GET["getHealth"]))
{
    # Apply damage from diseases
    $_SESSION["playParty"]->applyDamage();
    
    # Get the list of the people who died
    $peopleDied = $_SESSION["playParty"]->killCheck();
    $_SESSION["playParty"]->health();

    $jsonResponse["overallHealth"] = $_SESSION["playParty"]->_health;
    $jsonResponse["nowDead"] = $peopleDied;
    $jsonResponse["livingMembers"] = $_SESSION["playParty"]->_livingMembers;
}

# Make progress, adds newDistance

if (isset($_GET["progress"]))
{
    $slowRate = floatval($_GET["progress"]);
    $distance = $_SESSION["playerJourney"]->progress($slowRate);

    $jsonResponse["newDistance"] = $distance;
}

# Advance day, adds newDay

if (isset($_GET["nextDay"]))
{
    $_SESSION["playerJourney"]->incrementDay();
    $jsonResponse["newDay"] = "".$_SESSION["playerJourney"]->_month." ".$_SESSION["playerJourney"]->_date.", 1848";
}

echo json_encode($jsonResponse);