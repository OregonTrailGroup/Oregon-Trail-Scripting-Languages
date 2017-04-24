<?php
include 'commonUI.php';
startHTML("Management Options")
?>
	<p>
		You may:
		<div id="div_options">
			<a href="hiscores.php"><button class="btngrp_options" id="btn_options1">1.</button></a> See the current Top Ten list<br>
			<a href="hiscores.php"><button class="btngrp_options" id="btn_options2">2.</button></a> See the original Top Ten list<br>
			<a href="index.php"><button class="btngrp_options" id="btn_options3">3.</button></a> Return to the main menu<br>
		</div>
		What is your choice?
	</p>

<?php
endHTML();
?>
			