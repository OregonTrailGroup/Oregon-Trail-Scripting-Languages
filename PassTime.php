<?php

include "classes.php";

include "commonUI.php";


$time = $_GET["restDays"];

for ($i=0; $i < $time; $i++) { 

    $_SESSION["playerJourney"]->incrementDay();

}

$dateString = $_SESSION["playerJourney"]->_month . " " . $_SESSION["playerJourney"]->_date;
$associative_array = array('date' => $dateString);

echo json_encode($associative_array);
?>