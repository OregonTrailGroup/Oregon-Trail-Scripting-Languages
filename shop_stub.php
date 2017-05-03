<?php
include "classes.php";

session_start();

$locations = array(
    new Landmark(FALSE, "Landmark 1", 100),
    new Landmark(TRUE, "Town 1", 200),
    new Landmark(FALSE, "Landmark 2", 300),
    new Landmark(FALSE, "Landmark 3", 400),
    new Landmark(TRUE, "Town 2", 500),
    new Landmark(FALSE, "Landmark 4", 600)
);

$_SESSION["playerJourney"] = new Journey(1, 4, $locations);
$_SESSION["playerJourney"]->_distance = 500;

?>

<meta http-equiv="refresh" content="2; url=shop.php" />

<p>Redirecting you to the shop in 2 seconds...</p>