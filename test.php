<?php
include "classes.php";
session_start();

include "commonUI.php";

startHTML("test");

$testNames = array("a","b","c","d","e");
$_SESSION["playParty"] = new Party($testNames, 1);
$_SESSION["playParty"]->_members[0]->_health = 0;
$_SESSION["playParty"]->killCheck();
$_SESSION["playerJourney"] = new Journey(1, "June");
$_SESSION["playerJourney"]->_distance=304;

?>
<p>
	<form action="landmark.php" method="get">
		<input type = "hidden" name="sourcePage" value="test.php" >
		<input type = "submit" value="Go">  
	</form>
	</p>

<?php

endHTML();
?>