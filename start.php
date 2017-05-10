<?php
include 'commonUI.php';
include 'classes.php';
startHTML("Select Difficulty");
?>
	<br><img src="assets/separator.png"><br><br>
	<div id="div_options">
		Many kinds of people made the trip to Oregon.<br>
		You may:<br><br>
		<form action="party.php" method="post">
			<ul id="ul_options">
				<input type="button" class="btngrp_main" id="btn_main4" onclick="toggleDivs('div_hidden', 'div_options')" value="->"> Find out the differences between these choices<br><br>
				<input type="radio" value="1." name="difficulty" class="btngrp_main" id="btn_main1"> Be a banker from Boston (Start with $1600, score x1)<br>
				<input type="radio" value="2." name="difficulty" class="btngrp_main" id="btn_main2"> Be a carpenter from Ohio (Start with $800, score x2)<br>
				<input type="radio" value="3." name="difficulty" class="btngrp_main" id="btn_main3"> Be a farmer from Illinois (Start with $400, score x3)<br>
			</ul>
			<input type="submit" value="Continue" class="btngrp_main" id="btn_submit">
		</form>
	</div>
	<div id="div_hidden">
		<p>
			Traveling to Oregon isn't easy! But if you're a banker, you'll have more money for supplies and services than a carpenter or a farmer.<br>
			<br>
			However, the harder you have to try, the more points you deserve! Therefore, the farmer earns the greatest number of points and the banker earns the least.<br>
			<br>
		</p>
		<a href="start.php"><button class="btngrp_main" id="btn_return">CLICK to continue</button></a>
	</div>
	<br><img src="assets/separator.png"><br>

<?php
endHTML();