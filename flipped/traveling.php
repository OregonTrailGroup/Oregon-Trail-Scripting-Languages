<?php
require 'CommonMethods.php';
$com = new Common(false);
$com->connect('eritte2');
session_start();
if(!isset($_SESSION["milesLeft"])){
    $_SESSION["milesLeft"] = 10;
}
$milesLeft = $_SESSION["milesLeft"];
$milesDone = 10 - $_SESSION["milesLeft"];
?>
<!DOCTYPE html>
<html>
<body>
<h2>Oregon Trail
<br><?php echo $milesLeft; ?> miles to go
<br><?php echo $milesDone; ?> miles traveled</h2>
<a href="traveling.php"> <button type="button">continue</button></a>
<br>
<?php 
    $sql_results = $com->executeQuery("SELECT * FROM  `Tombstones` WHERE mile=" . $milesDone); 
    while ($row = mysql_fetch_assoc($sql_results)) {
        echo $row['name'] . " died here on " . $row['DOD'] ."<br>" . $row['message'] . "<br><br>";
    }
?>
</body>
</html>
<?php
$_SESSION["milesLeft"] -= 1;
if($_SESSION["milesLeft"] < 0){
    $_SESSION["milesLeft"] = 10;
}
?>