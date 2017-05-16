<?php
include "classes.php";
session_start();
include "commonUI.php";
#food 0 
#money is 1 but here results in no trade
#bait 2
#clothes 3
#wagonWheels 4
#wagonAxle 5
#wagonTongue 6
#oxen 7
startHTML("Trade");
?>

<p>

<?php
$itemClaim = array('0' => 'food', '2' => 'Bait','3' => 'Clothes', '4' => ' Wagon Wheel', 
	'5' => 'Wagon Axle', '6' => 'Wagon Tongue', '7' => 'Oxen');
$ranges = [[30,100],[0,0],[30,100],[1,5],[1,3],[1,3],[1,3],[1,5]];
$item = rand(0, 7);
$itemAmount = rand($ranges[$item][0],$ranges[$item][1]);

$reward = rand(0, 7);
$rewardAmount = rand($ranges[$reward][0],$ranges[$reward][1]);


if(($item == 1)||($reward == 1))
{

		echo "No one wants to trade today.";
		?>
		<a href="<?php echo $_GET["sourcePage"]; ?>"><button>Go back</button></a>
		<?php

}
else
{
	echo "A traveler wants to trade " . $itemAmount . " " . $itemClaim[$item] . 
	"(s) for " . $rewardAmount . " " . $itemClaim[$reward] . "(s).";
?>


	<form action="Trade2.php">
		Will you accept the trade?
		<input type = "hidden" name="itemID" value="<?php echo $item; ?>" >
		<input type = "hidden" name="rewardID" value="<?php echo $reward; ?>">
		<input type = "hidden" name="itemQunt" value="<?php echo $itemAmount; ?>" >
		<input type = "hidden" name="rewardQunt" value="<?php echo $rewardAmount; ?>">
		<input type = "hidden" name="source2" value="<?php echo $_GET["sourcePage"]; ?>">
        <input type = "submit" value="Yes">  
	</form>

	   <a href = "<?php echo $_GET["sourcePage"]?>"> <button>No</button></a>


</p>

<?php
}
endHTML();
?>