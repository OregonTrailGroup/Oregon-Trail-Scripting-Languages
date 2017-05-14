<?php
include "classes.php";
session_start();

include "commonUI.php";
startHTML("end");

?>
<p>

Congratulations, you made it to Oregon.

<form action="landmark2.php">
	<input type = "hidden" name="source" value="end.php">
    <input type = "submit" value="Continue">  
</form>

<img src="assets/land11.jpg" alt="Willamete Valley"/>

</p>
<?php
endHTML();
?>