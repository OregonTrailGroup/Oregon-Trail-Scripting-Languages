<?php

include "classes.php";
session_start();

$_SESSION["playParty"] = new Party(array("Bill", "Bob", "Jimmy Joe", "Petunia", "Jamaymay"), 1);

$_SESSION["playParty"]->_supplies->_food = 10000;
$_SESSION["playParty"]->_supplies->_yoke = 5;
$_SESSION["playParty"]->_supplies->_wagonWheels = 5;
$_SESSION["playParty"]->_supplies->_wagonAxle = 5;
$_SESSION["playParty"]->_supplies->_wagonTongue = 5;
$_SESSION["playParty"]->_supplies->_clothes = 10;

$_SESSION["playerJourney"] = new Journey(1, 3);
?>

<p>Redirecting in 2s...</p>
<meta http-equiv="refresh" content="2; url=travel.php" />