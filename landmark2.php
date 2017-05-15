<?php
include "classes.php";
session_start();

include "commonActions.php";

$local = $_SESSION["playerJourney"]->getLandmark($_SESSION["playerJourney"]->_distance)[1];
$name =  $_GET["$name"];
$isRiver =  $_GET["$isRiver"];
$hasShop = $_GET["$hasShop"];

if(strcmp(get_class($local), "River")==0)
{
	$isRiver = true;
}
else{	$isRiver = false;}

$hasShop = $local->_hasShop;


if($isRiver)
{
	showRiverActions($local[$i]->_hasFerry);
	if(isset($_GET["fording"]))
	{
		$chance = $local->ford();
		if($chance<0)
		{
        	$lostItem = rand(0, 7);
        	$maxLost = array(50, 50, 30, 4, 1, 1, 1, 1);
        	$amountLost = rand(1, $amountLost[$lostItem]);
        	$_SESSION["playParty"]->_supplies->setItem($lostItem, -$amountLost);
        	$str =  "Lost " . $amountLost . " " . $lostItem;
        	?>
        	<?php echo $str;?>
			<a href="travel.php"><button>Back To Travel</button></a>
			<?php

		}
	}
	elseif (isset($_GET["ferrying"]))
	{
		$_SESSION["playParty"]->_supplies->_money -= 5;
	?>
	<p>Took the ferry</p>
	<a href="travel.php"><button>Back To Travel</button></a>
	<?php
	}
}

else{
	showActions($hasShop, false);
	?><a href="travel.php"><button>Back To Travel</button></a>
	<?php

}?>
<p></p>

<?php

endHTML();
?>