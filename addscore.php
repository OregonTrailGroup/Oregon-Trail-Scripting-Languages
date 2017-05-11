<?php
include "classes.php";
session_start();

include "commonUI.php";
$scores = array();
startHTML("scores");


$health = $_SESSION["playParty"]->_health;
$members = $_SESSION["playParty"]->_livingMembers;

if(strcmp($health, "Good") == 0){$scores[0] = 500 * $members;}
else if(strcmp($health, "Fair") == 0){$scores[0] = 400 * $members;}
else if(strcmp($health, "Poor") == 0){$scores[0] = 300 * $members;}
else if(strcmp($health, "Bad") == 0){$scores[0] = 200 * $members;}

$scores[1] =  50;
$scores[2] = $_SESSION["playParty"]->_supplies->_oxen * 4;
$scores[3] = ($_SESSION["playParty"]->_supplies->_wagonWheels +
	$_SESSION["playParty"]->_supplies->_wagonAxle +
	$_SESSION["playParty"]->_supplies->_wagonTongue) * 2;
$scores[4] = $_SESSION["playParty"]->_supplies->_clothes * 2;
$scores[5] = round($_SESSION["playParty"]->_supplies->_bait / 50);
$scores[6] = round($_SESSION["playParty"]->_supplies->_food / 25);
$scores[7] = round($_SESSION["playParty"]->_supplies->_money / 5);

?>
<p>
Points for Survinving Members <?php echo $scores[0] ?><br>
50 Points for the Wagon <?php echo $scores[1] ?><br>
4 Points for each Oxen <?php echo $scores[2] ?><br>
2 Points for each Spare Wagon Part <?php echo $scores[3] ?><br>
2 Points for each Pair of Clothes <?php echo $scores[4] ?><br>
1 Point for every 50 bullets <?php echo $scores[5] ?><br>
1 Point for every 25 lbs of food <?php echo $scores[6] ?><br>
1 Point for every 5$  <?php echo $scores[7] ?><br><br><br>

<?php
$scoreSum = 0;
	foreach ($scores as $val) 
	{
		$scoreSum+= $val;
	}
$finalscore = $scoreSum + ($scoreSum * $_SESSION["playParty"]->_job);
?>

Score : <?php echo $scoreSum?><br><br>
Because you played as a <?php echo  $_SESSION["playParty"]->_jobVal[$_SESSION["playParty"]->_job][0]?> 
you have<br> earned <?php echo $_SESSION["playParty"]->_job+1 ?> times your score.<br><br>

Final Score : <?php echo $finalscore?>
<br>
<br>

<form action="addscore2.php">
Input a Name:		
		<input type = "hidden" name="source2" value="<?php echo $_GET["sourcePage"] ?>">
		<input type = "hidden" name="sourcePage" value="addscore.php">
		<input type = "hidden" name="score" value="<?php echo $finalscore?>">
		<input type = "text" name="name" value="<?php echo $_SESSION["playParty"]->_members[0]->_name ?>">
		<input type = "submit" value="Go">  
	</form>
</p>


<?php
endHTML();
?>