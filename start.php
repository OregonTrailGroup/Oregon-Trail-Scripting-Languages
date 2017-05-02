<?php
include 'commonUI.php';
startHTML("Starting Up...")
?>
	<br><img src="assets/separator.png"><br><br>
	<div id="div_options">
		Many kinds of people made the trip to Oregon.<br>
		You may:<br><br>
		<ul id="ul_options">
			<a href="shop.php"><button class="btngrp_main" id="btn_main1">1.</button></a> Be a banker from Boston<br>
			<a href="info.php"><button class="btngrp_main" id="btn_main2">2.</button></a> Be a carpenter from Ohio<br>
			<a href="hiscores.php"><button class="btngrp_main" id="btn_main3">3.</button></a> Be a farmer from Illinois <br>
			<button class="btngrp_main" id="btn_main4" onclick="toggleDivs('div_hidden', 'div_options')">4.</button></a> Find out the differences between these choices<br><br>
		</ul>
		What is your choice?
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
?>