<?php
	
include "classes.php";
session_start();
include "commonUI.php";
$lastLand = $_SESSION["playerJourney"]->nextLandmark();
echo $lastLand;
//$distanceTrav -= 1;
?>
	<div id="div_map" >
	<a href="<?php echo $_GET["sourcePage"];   ?>">
	<img src="assets/map<?php echo $lastLand ?>.jpg">
	</a>
</div>
<?php
?>