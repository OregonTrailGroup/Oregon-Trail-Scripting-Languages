<?php

include "classes.php";
session_start();

include "commonUI.php";


$timeG = $_GET["restDays"];
$time = intval($timeG);

for ($i=0; $i < $time; $i++) { 

    $_SESSION["playerJourney"]->incrementDay();

}

$dateString = "1848-".$_SESSION["playerJourney"]->_month . "-" . $_SESSION["playerJourney"]->_date;
$associative_array = array('date' => $dateString);

echo json_encode($associative_array);
?>