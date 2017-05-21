<?php
include "classes.php";
session_start();

include "commonActions.php";
include "commonUI.php";
startHTML("landmark");

$local = $_SESSION["playerJourney"]->getLandmark($_SESSION["playerJourney"]->_distance)[1];
$name =  $local->_name;

$hasShop = $local->_hasShop;

if(strcmp(get_class($local), "River")==0)
{
	$isRiver = true;
}
else{	$isRiver = false;}

$hasShop = $local->_hasShop;


if($isRiver)
{
	?>
	<h4>The river is <?php echo $local->_depth; ?> feet deep.</h4>
	<?php
	if(isset($_GET["fording"]) || isset($_GET["caulking"]))
	{
		if (isset($_GET["fording"]))
		{
			$chance = $local->ford();
		}
		if (isset($_GET["caulking"]))
		{
			$chance = rand(0,1) - 1;
		}

		if($chance<0)
		{
        	$lostItem = rand(0, 7);
			$itemNames = array("pounds of food", "dollars", "tubs of bait", "pairs of clothes",
				"wagon wheels", "wagon axles", "wagon tongues", "yoke of oxen");
        	$maxLost = array(50, 50, 30, 4, 1, 1, 1, 1);
        	$amountLost = rand(1, $maxLost[$lostItem]);
        	$_SESSION["playParty"]->_supplies->setItem($lostItem, -$amountLost);
        	$str =  "Lost " . $amountLost . " " . $itemNames[$lostItem];
        	
		}
		else{
			$str = "Forded Safely";
		}
		?>	
		<br><br><?php echo $str;?><br><br>
			<a href="travel.php"><button>Back To Travel</button></a>
			<?php

	}
	elseif (isset($_GET["ferrying"]))
	{
		$_SESSION["playParty"]->_supplies->_money -= 5;
	?>
	<p>Took the ferry</p>
	<a href="travel.php"><button>Back To Travel</button></a>
	<?php
	}
	else
	{
		showRiverActions($local->_hasFerry, basename(__FILE__));
	}
}

else{
	showActions($hasShop, false, basename(__FILE__));
	?><a href="travel.php"><button>Back To Travel</button></a>
	<?php

}?>
<p></p>

<?php

endHTML();
?>