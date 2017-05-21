<?php
include "classes.php";
session_start();

include "commonUI.php";
startHTML();
#food 0 
#money is 1 but here results in no trade
#bait 2
#clothes 3
#wagonWheels 4
#wagonAxle 5
#wagonTongue 6
#oxen 7

?>
<meta http-equiv="refresh" content="0; url= <?php echo $_GET["source2"] ?>" />

<?php

$_SESSION["playParty"]->_supplies->setItem($_GET["itemID"], -intval($_GET["itemQunt"]));
$_SESSION["playParty"]->_supplies->setItem(intval($_GET["rewardID"]), intval($_GET["rewardQunt"]));
	

endHTML();

?>
