<?php
include "classes.php";
session_start();

include "commonUI.php";

startHTML("test");
$testNames = array( "test","test","test","test","test");
$_SESSION["playerJourney"] = new Journey(10, "May", NULL);
$intoDays = 3;

?>

	<form action="PassTime.php">
		Trade
		<input type = "hidden" name="sourcePage" value="test.php">
		<input type="hidden" name="restDays" value = "<?php echo $intoDays ?>">
		<input type = "submit" value="Go">  
	</form>
<?php

endHTML();
?>