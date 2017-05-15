<?php
include "classes.php";
session_start();

include "commonUI.php";
startHTML("end");
$getToll = $_GET["toll"];
if($getToll == 1){
	$_SESSION["playParty"]->_supplies->_money -= 500;

}
?>
<p>

Congratulations, you made it to Oregon.<br>

<form action="addscore.php">
	<input type = "hidden" name="source" value="end.php">
    <input type = "submit" value="Continue">  
</form>

<img src="assets/land11.jpg" alt="Willamete Valley"/>

</p>
<?php
endHTML();
?>