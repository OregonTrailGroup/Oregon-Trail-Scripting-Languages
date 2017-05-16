<?php

include "classes.php";
session_start();

include "commonUI.php";


$timeG = $_GET["restDays"];
$time = intval($timeG);

for ($i=0; $i < $time; $i++) { 

    $_SESSION["playerJourney"]->incrementDay();
    $_SESSION["playParty"]->eat();
    $_SESSION["playParty"]->applyDamage();
    $_SESSION["playParty"]->killCheck();
    $_SESSION["playParty"]->rest(10);
}

$_SESSION["playParty"]->health();

$dateString = "".$_SESSION["playerJourney"]->_month . " " . $_SESSION["playerJourney"]->_date . ", 1848";
$associative_array = array('date' => $dateString, 'partyHealth' => $_SESSION["playParty"]->_health, 'livingMembers' => $_SESSION["playParty"]->_livingMembers);

echo json_encode($associative_array);
?>