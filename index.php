<?php
include 'commonUI.php';
startHTML("The Oregon Trail Game")
?>
	<p>
		You may:
		<div id="div_options">
			<a href="start.php"><button class="btngrp_main" id="btn_main1">1.</button></a> Travel the trail<br>
			<a href="info.php"><button class="btngrp_main" id="btn_main2">2.</button></a> Learn about the trail<br>
			<a href="hiscores.php"><button class="btngrp_main" id="btn_main3">3.</button></a> See the Oregon Top Ten<br>
			<a href="options.php"><button class="btngrp_main" id="btn_main4">4.</button></a> Choose Management Options<br>
		</div>
		What is your choice?
	</p>

<?php
endHTML();
?>