<?php
import "header.php";
import "classes.php";
import "commonUI.php";
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

<script>
<?php
$ranges = [[30,100],[0,0],[30,100],[1,5],[1,3],[1,3],[1,3],[1,5]];
$item = rand(0, 7);
$itemAmount = rand($ranges[$item][0],$ranges[$item][1]);

$reward = rand(0, 7);
$rewardAmount = rand($ranges[$reward][0],$ranges[$reward][1]);

function display()
{
	if(($item == 1)||($reward = 1))
	{
		return "No one wants to trade today."
	}
	else
	{
		return "A travaler wants to trade" . $itemAmount . " " . $item . 
		"(s) for" . $rewardAmount . " " . $reward . "(s).";
	}
}

function makeTrade()
{
	$Session["party"]->getItem($item, -$itemAmount);
	getItem($reward, $rewardAmount);
}
	
?>
</script>


<?php
endHTML();
?>