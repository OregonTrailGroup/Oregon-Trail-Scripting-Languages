<?php
include 'commonUI.php';
startHTML("The Oregon Trail Game")
?>
	<p>
		You may:
		<div id="div_options">
			1. Travel the trail<br>
			2. Learn about the trail<br>
			3. See the Oregon Top Ten<br>
			4. Turn sound off<br>
			5. Choose Management Options<br>
			6. End<br>
		</div>
		<form action="">
			What is your choice? <input type="number" min="1" max="6" name="input_option" onkeypress="isEnter(event)"><br>
				<input type="submit" value="" id="submit_main_menu">
		</form>
	</p>

<?php
endHTML();
?>
			