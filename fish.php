<?php
include "classes.php";
session_start();
include "commonUI.php";
startHTML("fish");

$bait = $_SESSION["playParty"]->_supplies->_bait;
$back = $_GET["sourcePage"];
if($bait <= 0)
{
	?>
		<p>You don't have any Bait<br>
		<a href = "<?php echo $back;?>"><button>OK</button></a>
		</p>
	<?php
}
else
{
	?>
		<p>Set the amount of Bait to Fish for Food.<br>
		More Bait will yeild more lbs of food<br>
		<?php echo $bait;?>
	
		</p>
	<form action="fish2.php" method="get">
		<input type = "hidden" name="sourcePage" value="fish2.php">
		<input type = "hidden" name="sourcePage2" value="<?php echo $back;?>" >
		<input type="number" max="<?php echo $bait;?>" min="0" name="baitNum">
		<input type = "submit" value="Fish">  
	</form>
		</form>
	<?php
}


endHTML();
?>