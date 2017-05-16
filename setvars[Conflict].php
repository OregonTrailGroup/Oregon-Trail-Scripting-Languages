<?php

if (isset($_POST['party_mem_1'])===true and isset($_POST['party_mem_2'])===true and isset($_POST['party_mem_3'])===true and 
    isset($_POST['party_mem_4'])===true and isset($_POST['party_mem_5'])===true and isset($_POST['job'])===true) {
    $names = array();
    array_push($names, $_POST['party_mem_1']);
    array_push($names, $_POST['party_mem_2']); 
    array_push($names, $_POST['party_mem_3']);
    array_push($names, $_POST['party_mem_4']);
    array_push($names, $_POST['party_mem_5']);
    $_SESSION['playParty'] = new Party($names, $_POST['job']);
    
    #echo json_encode($_SESSION['playParty']);
} else {
    #no op
}

if (isset($_POST['month'])===true) {
    if (isset($_SESSION['playerJourney'])===true) {
        # no op
    } else {
        # default to first day of the month selected
        $_SESSION['playerJourney'] = new Journey(1, $_POST['month']);

        #echo json_encode($_SESSION['playParty']);
    }
}

