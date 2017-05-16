<?php
include "classes.php";
session_start();
# default to first day of the month selected
$_SESSION['playerJourney'] = new Journey(1, $_POST['month']);
?>

<meta http-equiv="refresh" content="1; url=shop.php?sourcePage=travel.php" />
<p>Going to the trail in 1 second...</p>