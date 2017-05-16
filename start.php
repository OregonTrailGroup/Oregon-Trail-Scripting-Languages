<?php
include 'classes.php';
session_start();
include 'commonUI.php';
startHTML("Select Job");
?>
	<br><img src="assets/separator.png"><br><br>
	<div id="div_options">
		Many kinds of people made the trip to Oregon.<br>
		You may:<br><br>
		<form action="month.php" method="post">
			<ul id="ul_options">
				<input type="button" class="btngrp_main" id="btn_main4" onclick="toggleDivs('div_hidden', 'div_options')" value="->"> Find out the differences between these choices<br><br>
				<input type="radio" value="1" name="job" class="radio_start" id="radio1"> Be a Banker from Boston (Start with $1600, score x1)<br>
				<input type="radio" value="2" name="job" class="radio_start" id="radio2"> Be a Carpenter from Ohio (Start with $800, score x2)<br>
				<input type="radio" value="3" name="job" class="radio_start" id="radio3"> Be a Farmer from Illinois (Start with $400, score x3)<br><br>

				<input type="text" name="party_mem_1" id="txtbox_1" class="txtbox" placeholder="Joe"><br>
				<input type="text" name="party_mem_2" id="txtbox_2" class="txtbox" placeholder="Jill"><br>
				<input type="text" name="party_mem_3" id="txtbox_3" class="txtbox" placeholder="John"><br>
				<input type="text" name="party_mem_4" id="txtbox_4" class="txtbox" placeholder="Jackee"><br>
				<input type="text" name="party_mem_5" id="txtbox_5" class="txtbox" placeholder="Jerry"><br><br>
			</ul>
			<input type="submit" class="btngrp_main" id="btn_start" value="CLICK to continue">
		</form>
	</div>
	<div id="div_hidden">
		<p>
			Traveling to Oregon isn't easy! But if you're a banker, you'll have more money for supplies and services than a carpenter or a farmer.<br>
			<br>
			However, the harder you have to try, the more points you deserve! Therefore, the farmer earns the greatest number of points and the banker earns the least.<br>
			<br>
		</p>
		<button class="btngrp_main" id="btn_return">CLICK to continue</button>
	</div>
	<br><img src="assets/separator.png"><br>

<?php
endHTML();

$names = array(
	"Bo",
	"Jangles",
	"Ate",
	"A",
	"Sandwich"
);

#$_SESSION["playerJourney"] = new Journey(1, 4);
#$_SESSION["playerJourney"]->_distance = 500;
#$_SESSION["playParty"] = new Party($names, 1);