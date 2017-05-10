<?php
include 'commonUI.php';
startHTML("test");
?>
	<br><img src="assets/separator.png"><br><br>
	<div id="div_options">
		<div id="div_shown">
			<?php 
				if (isset($_POST['leader_name'])) {
					echo $_POST['leader_name'] + "<br>";
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
	</div>
	<br><img src="assets/separator.png"><br>

<?php
endHTML();
?>