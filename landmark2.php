<?php
include "classes.php";
session_start();
include "commonUI.php";
include "commonActions.php";
startHTML("landmark");


$local = $_SESSION["playerJourney"]->getLandmark($_SESSION["playerJourney"]->_distance)[1];

$name =  $local->_name;

if(strcmp(get_class($local), "River")==0)
{
	$isRiver = true;
}
else{$isRiver = false;}

$hasShop = $local->_hasShop;


if($isRiver)
{
	showRiverActions($local->_hasFerry);
	if(isset($_GET["fording"]))
	{
		$out=$local.ford();
		if($out==1)
		{

		}
		elseif ($out==1) {
		}
	}
}

else{
	showActions($hasShop, false);
}


?>
<p></p>

<?php

endHTML();
?>