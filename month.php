<?php
include 'classes.php';
session_start();
include 'commonUI.php';
startHTML("Select Month");

$names = array();
array_push($names, $_POST['party_mem_1']);
array_push($names, $_POST['party_mem_2']); 
array_push($names, $_POST['party_mem_3']);
array_push($names, $_POST['party_mem_4']);
array_push($names, $_POST['party_mem_5']);
$_SESSION['playParty'] = new Party($names, $_POST['job']);
?>
	<br><img src="assets/Separator.png"><br><br>
	<div id="div_options">
		It is 1848. Your jumping off place for Oregon is Independence, Missouri. You must decide which month to leave Independence.<br><br>
		<form action="setvars.php" method="post">
			<input type="radio" value="3" name="month" class="btngrp_main" id="btn_main1" checked> March<br>
			<input type="radio" value="4" name="month" class="btngrp_main" id="btn_main2"> April<br>
			<input type="radio" value="5" name="month" class="btngrp_main" id="btn_main3"> May<br>
			<input type="radio" value="6" name="month" class="btngrp_main" id="btn_main4"> June<br>
			<input type="radio" value="7" name="month" class="btngrp_main" id="btn_main5"> July<br>
			<input type="button" value="?" class="btngrp_main" class="btngrp_main" id="btn_main6" onclick="toggleDivs('div_hidden', 'div_options')"> Ask for advice<br><br>
            
            <input type="submit" class="btngrp_main" id="btn_start" value="CLICK to continue">
		</form>
	</div>

	<div id="div_hidden">
		<p>
			You attend a public meeting held for "folks with the California - Oregon fever." You're told:<br>
			<br>
			If you leave too early, there won't be any grass for your oxen to eat. If you leave too late, you may not get to Oregon before winter comes. If you leave at just the right time, there will be green grass and the weather will still be cool. 
		</p>
		<button class="btngrp_main" id="btn_return" onclick="toggleDivs('div_options', 'div_hidden')">CLICK to continue</button>
	</div>
	<br><img src="assets/Separator.png"><br>

<?php
endHTML();
?>