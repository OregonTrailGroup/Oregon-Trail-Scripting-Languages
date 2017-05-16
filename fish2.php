<?php
include "classes.php";
session_start();
include "commonUI.php";
startHTML("fish");
$back = $_GET["sourcePage2"];
$bait = $_GET["baitNum"];

if($bait >= $_SESSION["playParty"]->_supplies->_bait)
{
	$bait = $_SESSION["playParty"]->_supplies->_bait;
}

$foodGet = 0;
if(($bait >= 1)&&($bait < 25))
{
	$foodGet = 15;
} 
elseif(($bait >= 25)&&($bait < 50))
{
	$foodGet = 42;
} 
elseif(($bait >= 50)&&($bait < 75))
{
	$foodGet = 77;
} 
elseif($bait >= 75)
{
	$foodGet = 100;
}
else{
	$foodGet = 0;
}

$_SESSION["playParty"]->_supplies->_bait -= $bait;
$_SESSION["playParty"]->_supplies->_food += $foodGet;

$str = "Got " . $foodGet . " lb of food";
?>
<p>
	<?php echo $str;?>
	<a href="<?php echo $back;?>"><button>OK</button></a>
</p>
<?php
echo $_SESSION["playParty"]->_supplies->_food;




endHTML();
?>