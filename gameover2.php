<?php
include "classes.php";
session_start();
include "scoresAndDeaths.php";
include "commonUI.php";
startHTML("inbetween");
?>

<meta http-equiv="refresh" content="0; url= index.php" />

<?php

$leader = $_SESSION["playParty"]->_leader;
$location = $_SESSION["playerJourney"]->_distance;
$message = $_GET["message"];
$month = array_search($_SESSION["playerJourney"]->_month, $_SESSION["playerJourney"]->_months) + 1;
$day = $_SESSION["playerJourney"]->_date;



$otd = new OregonTrailDatabase("eritte2","eritte2");
$conn = $otd->connect();
if ($conn)
{
	$otd->addDeath($leader, $location, $message, $month, $day);
}
erase_session();
endHTML();
?>