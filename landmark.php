<?php
include "classes.php";
session_start();

include "commonUI.php";
startHTML("landmark");

$i =  $_GET["index"];
$local = $_SESSION["playerJourney"]->getLandmark($_SESSION["playerJourney"]->_distance)[1];
$image = $local->_image;
$name =  $local->_name;



if(strcmp($name, "The Dalles")==0)
{
	$destination = "lastriver.php";
}
else
{
	$destination = "landmark2.php";
}

?>
<p>

<form action="<?php echo $destination;?>">
	<input type = "hidden" name="source" value="landmark.php">
    <input type = "submit" value="Continue">  
</form>

<img src="<?php echo $image;?>" alt="Loction"/>

</p>
<?php
endHTML();
?>