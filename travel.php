<?php
/*
 * travel.php
 * 
 * The party travels the road here.
 */

 include "classes.php";
 session_start();
 include "commonUI.php";

 startHTML("Traveling the Trail");
 $nextStop = $_SESSION["playerJourney"]->nextLandmark();
 $nextStop = $_SESSION["playerJourney"]->_locations[$nextStop];
 $day = $_SESSION["playerJourney"]->_date;
 $month = $_SESSION["playerJourney"]->_month;
 $weather = $_SESSION["playerJourney"]->_weather;
 $distance = $_SESSION["playerJourney"]->_distance;

 $_SESSION["playParty"]->killCheck();
 $_SESSION["playParty"]->health();
 $health = $_SESSION["playParty"]->_health;
 $livingPeople = $_SESSION["playParty"]->_livingMembers;
 ?>

<h3>Traveling. Next stop <?php echo $nextStop->_name; ?>.</h3>
<img src="assets/Separator.png" />
<br>
<img src="assets/Treeline.png" />
<img id="wagon" src="assets/SideWagon.png" class="animatedWagon" />
<div class="greenbox"></div>

<!-- Quick HUD -->
<p>Date: <span id="date"><?php echo "".$month." ".$day.", 1848"; ?></span></p>
<p>Weather: <span id="weather"><?php echo $weather; ?></span></p>
<p>Health: <span id="partyHealth"><?php echo $health; ?></span>, Living Family: <span id="livingMembers"><?php echo $livingPeople; ?></span></p>
<p>Next landmark: mile marker <?php echo $nextStop->_distance; ?></p>
<p>Miles traveled: <span id="totalDistance"><?php echo $distance; ?></span></p>

<!-- Button for opening CommonActions and the message area -->
<button id="showActions">Examine Your Surroundings</button>
<p id="messageArea"></p>

<!-- Overlay div for displaying found graves -->
<div class="overlay vertical-layout" style="display:none; top: 0; left: 0;">
    <h3>You find a gravestone.</h3>

    <p>"Here lies <span id="graveName"></span>."</p>
    <p id="graveMessage"></p>
    <p>Died <span id="graveDate"></span></p>
    <button id="dismissGrave">Dismiss</button>
</div>
<!-- Call commonActions here -->

<!-- Revealed div for when your party gets wiped or you're stranded with a broken wagon -->
<div id="partyDied" style="display: none;">
    <p>Your party has died or your wagon broke with no way to repair it.</p>
    <a href="gameover.php"><button>Game Over</button></a>
</div>

<!-- Allows user to advance to next landmark -->
<div id="nextLandmark" style="display: none;">
    <p>You reached the next landmark.</p>
    <a href="Landmark.php"><button>Go to Landmark</button></a>
</div>

<script>
var oldDistance = <?php echo $_SESSION["playerJourney"]->_distance; ?>;
var nextLandmark = <?php echo $nextStop->_distance; ?>;
var itemQuantities = [
    [<?php echo $_SESSION["playParty"]->_supplies->_food; ?>, "foodSpan"],
    [<?php echo $_SESSION["playParty"]->_supplies->_money; ?>, "moneSpan"],
    [<?php echo $_SESSION["playParty"]->_supplies->_bait; ?>, "baitSpan"],
    [<?php echo $_SESSION["playParty"]->_supplies->_clothes; ?>, "clotSpan"],
    [<?php echo $_SESSION["playParty"]->_supplies->_wagonWheels; ?>, "wheeSpan"],
    [<?php echo $_SESSION["playParty"]->_supplies->_wagonAxle; ?>, "axleSpan"],
    [<?php echo $_SESSION["playParty"]->_supplies->_wagonTongue; ?>, "tongSpan"],
    [<?php echo $_SESSION["playParty"]->_supplies->_oxen; ?>, "oxenSpan"]
];
</script>
<script type="text/javascript" src="travel.js"></script>

 <?php
 endHTML();
 ?>
