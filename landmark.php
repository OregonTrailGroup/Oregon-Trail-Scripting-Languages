<?php
include "classes.php";
session_start();

include "commonUI.php";
startHTML("landmark");

$local = $_SESSION["playerJourney"]->getLandmark($_SESSION["playerJourney"]->_distance);
$image = $local->_image;
$name =  $local->_name;
echo $name;
if(strcmp($name, "The Dalles")==0)
{
	$destination = "LastRiver.php";
}
else
{
	$destination = "landmark2.php";
}

?>
<p>

<form action="<?php echo $destination;?>">
	<input type = "hidden" name="source" value="landmark.php">
	<input type = "hidden" name="index" value="<?php echo $i;?>">
	<input type = "hidden" name="name" value="<?php echo $name;?>">
    <input type = "submit" value="Continue">  
</form>

<img src="<?php echo $image;?>" alt="Location"/>

</p>
<?php
endHTML();
?>