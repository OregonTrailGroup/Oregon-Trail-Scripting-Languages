<?php
include "classes.php";
include "scoresAndDeaths.php";

include "commonUI.php";
startHTML();


?>

<meta http-equiv="refresh" content="0; url= <?php echo $_GET["source2"] ?>" />
<?php

$name = $_GET["$name"];
$score = intval($_GET["$score"]);

$otd = new OregonTrailDatabase("user","pass");
$conn = $otd->connect();
if ($conn)
{
	$otd->addScore($name, $score);
}

endHTML();

?>