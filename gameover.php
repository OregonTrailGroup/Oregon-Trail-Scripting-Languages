<?php
include "classes.php";
session_start();

include "commonUI.php";
startHTML("Game Over");

$location = $_SESSION["playerJourney"]->_distance;
$leader = $_SESSION["playParty"]->_leader;
?>
<p>
Here Lies <?php echo $leader; ?><br>
You died <?php echo $location; ?> miles along the path.<br>
You were <?php echo 2000 - $location; ?> miles from your goal<br>

What would you like on your tombstone?
<form action="gameover2.php">
	<input type = "text" name="message">
    <input type = "submit" value="Enter">  
</form>

</p>



<?php
endHTML();
?>