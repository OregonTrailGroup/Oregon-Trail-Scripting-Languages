<?php
include 'commonUI.php';
startHTML("Select Difficulty");
?>
	<br><img src="assets/separator.png"><br><br>
	<div id="div_options">
		What are the names of the people in your party?<br><br>
		<form action="month.php" method="post">
			<?php if (isset($_POST['difficulty'])) { ?>
			<input type="hidden" name="difficulty" value="<?php echo $_POST['difficulty']; ?>" >
			<?php } ?>
			<input type="text" name="party_mem_1" placeholder="Joe"><br>
			<input type="text" name="party_mem_2" placeholder="Jill"><br>
			<input type="text" name="party_mem_3" placeholder="John"><br>
			<input type="text" name="party_mem_4" placeholder="Jackee"><br>
			<input type="text" name="party_mem_5" placeholder="Jerry"><br><br>

			<input type="radio" value="march" name="month" class="btngrp_main" id="btn_main1"> March<br>
			<input type="radio" value="april" name="month" class="btngrp_main" id="btn_main2"> April<br>
			<input type="radio" value="may" name="month" class="btngrp_main" id="btn_main3"> May<br>
			<input type="radio" value="june" name="month" class="btngrp_main" id="btn_main4"> June<br>
			<input type="radio" value="july" name="month" class="btngrp_main" id="btn_main5"> July<br><br>
			
			<input type="submit" value="CLICK to continue">
		</form>
		<?php 
			if (isset($_POST['leader_name'])) {
				echo $_POST['leader_name']; 
			}

			if (isset($_POST['difficulty'])) {
				switch ($_POST['difficulty']) {
					case "1.":
						echo "Banker";
						break;
					case "2.":
						echo "Carpenter";
						break;
					case "3.":
						echo "Farmer";
						break;
					default:
						break;
				}
			}
		?>
	</div>
	<br><img src="assets/separator.png"><br>

<?php
endHTML();
?>