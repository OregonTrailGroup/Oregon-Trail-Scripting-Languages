<?php
include "classes.php";
session_start();

include "commonActions.php";

$i =  $_GET["index"];
$local = $_SESSION["playerJourney"]->_locations[$i];

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
}

else{
	showActions($hasShop, false);
}?>
<p></p>

<?php

endHTML();
?>