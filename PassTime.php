<?php
import "header.php";
import "classes.php";
import "commonUI.php";


$time = $_GET["$restDays"];

for ($i=0; $i < $time; $i++) { 
    $_SESSION["journey"]->incrementDay();
}

$dateString = $_SESSION["journey"]->$_month . " " . $_SESSION["journey"]->$_date;
$associative_array = array('date' => $dateString);

return json_encode($associative_array);

endHTML();
?>