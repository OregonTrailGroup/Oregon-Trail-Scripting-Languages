<?php
include 'classes.php';
session_start();

if (isset($_POST['name1'])===true and isset($_POST['name2'])===true and isset($_POST['name3'])===true and isset($_POST['name4'])===true and isset($_POST['name5'])===true and isset($_POST['job'])===true) {
    $names = array();
    array_push($names, $_POST['name1']);
    array_push($names, $_POST['name2']); 
    array_push($names, $_POST['name3']);
    array_push($names, $_POST['name4']);
    array_push($names, $_POST['name5']);
    $_SESSION['playParty'] = new Party($names, $_POST['job']);
    
    echo json_encode($_SESSION['playParty']);
} else {
    echo "fail";
}

if (isset($_POST['month'])===true) {
    if (isset($_SESSION['playerJourney'])===true) {
        # no op
    } else {
        # default to first day of the month selected
        $_SESSION['playerJourney'] = new Journey(1, $_POST['month']);
    }
}

