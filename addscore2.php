<?php
include "classes.php";
include "scoresAndDeaths.php";

include "commonUI.php";
startHTML();


?>

<meta http-equiv="refresh" content="0; url= hiscores.php" />
<?php

$name = $_GET["name"];
$score = intval($_GET["score"]);

$otd = new OregonTrailDatabase("eritte2","eritte2");
$conn = $otd->connect();
if ($conn)
{
	$otd->addScore($name, $score);
}

endHTML();

?>