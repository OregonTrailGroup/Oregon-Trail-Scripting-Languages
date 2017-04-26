<?php
include 'commonUI.php';
startHTML("The Oregon Trail Game")
?>
	<br><img src="assets/title.png"><br>
	<br><img src="assets/separator.png"><br><br>
	<div id="div_options">
		You may:<br><br>
		<ul id="ul_options">
			<a href="start.php"><button class="btngrp_main" id="btn_main1">1.</button></a> Travel the trail<br>
			<a href="info.php"><button class="btngrp_main" id="btn_main2">2.</button></a> Learn about the trail<br>
			<a href="hiscores.php"><button class="btngrp_main" id="btn_main3">3.</button></a> See the Oregon Top Ten<br>
			<a href="options.php"><button class="btngrp_main" id="btn_main4">4.</button></a> Choose Management Options<br><br>
		</ul>
		What is your choice?
	</div>
	<br><img src="assets/separator.png"><br>

<?php
endHTML();
?>