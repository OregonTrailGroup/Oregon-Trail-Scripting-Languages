<?php
	
?>
<html>
<head>
<script src="./jquery.min.js"></script>
</head>
<body>
<?php
	function showActions($hasShop, $initiallyHidden){
		//$hasShop = true;
		if(!$hasShop || $initiallyHidden){
			?>
			<style>
			.button_hide_shop {
				display: none;
			}
			</style>
			<?php
		}
		if($initiallyHidden){
			?>
			<style>
			.button_hide {
				display: none;
			}
			</style>
			<?php
		}
?>

<div id="common_Buttons">
	<!-- regular options as specified in the issue -->
	<button class="button_hide" id="button_supplies">2. check supplies</button><br>
	<a href="Map.php?sourcePage=".__FILE__><button class="button_hide" id="button_map">3. look at map</button></a><br>
	<button class="button_hide" id="button_rest">4. stop to rest</button><br>
	<a href="Trade.php?sourcePage=".__FILE__><button class="button_hide" id="button_trade">5. attempt to trade</button></a><br>
	<a href="Fish.php?sourcePage=".__FILE__><button class="button_hide" id="button_fish">6. fish for food</button></a><br>
	<a href="Shop.php?sourcePage=".__FILE__><button class="button_hide_shop" id="button_shop" >7. buy supplies</button></a><br>
	<br>
</div>

<div id="rest_div" style="display:none;">
	<form action="" method="get">
	"How many days of rest?"
	<input type="number" min="0" max="9" id="restDays" onkeyPress="isEnter(event)">
	<br>
	<input type="submit" value="Rest" id="userDays">
	</form>
</div>


<div id="supply_div" style="display:none;">
	<!-- check session vars to display supplies -->
	<h3>Your Supplies:</h3>
	
	<p style="display:inline-block">
	oxen<br>
	sets of clothing<br>
	bait<br>
	wagon wheels<br>
	wagon axles<br>
	wagon tongues<br>
	pounds of food<br>
	money left<br>
	</p>
	<p style="display:inline-block">
	<?php echo $_SESSION["playParty"]->_supplies->_oxen ?><br>
	<?php echo $_SESSION["playParty"]->_supplies->_clothes ?><br>
	<?php echo $_SESSION["playParty"]->_supplies->_bait ?><br>
	<?php echo $_SESSION["playParty"]->_supplies->_wagonWheels ?><br>
	<?php echo $_SESSION["playParty"]->_supplies->_wagonAxle ?><br>
	<?php echo $_SESSION["playParty"]->_supplies->_wagonTongue ?><br>
	<?php echo $_SESSION["playParty"]->_supplies->_food ?><br>
	<?php echo $_SESSION["playParty"]->_supplies->_money ?><br>
	</p>
	<br><button id="return_button">Return to menu</button>
	
</div>
<?php
	}
?>
<?php
	function showRiverActions($hasFerry){
		//$hasShop = true;
 		if(!$hasFerry){
 			?>
 			<style>
 			.button_hide_ferry {
 				display: none;
 			}
 			</style>
 			<?php
 		}
?>
<div id="river_div">
<!-- river options, depth does not affect the options given to player -->
<button id="button_ford">attempt to ford The river</button><br>
<button id="button_caulk">caulk the wagon and float it across</button><br>
<button id="button_info">get more information</button><br>
<button class="button_hide_ferry" id="button_ferry">take a ferry across</button><br>
</div>

<div id="river_info" style="display:none;">
To ford a river means to pull your wagon across a shallow part of the river, with the oxen still attached.<br>
To caulk the wagon means to seal it so that no water can get in. The wagon can then be floated across like a boat.<br>
To use a ferry means to put your wagon on top of a flat boat that belongs to someone else. The owner of the ferry will take your wagon across the river.<br>
<button id="continue_button">Click to continue</button>
<div/>

<?php 
	}
?>
<script>
	$(document).ready(function(){
		
		$("input#userDays").click(function(){
			var num = $("#restDays").val();
			//alert(num);
			$.get('PassTime.php', {restDays: num}, function(data){
				//alert(data);
			});
		});
		
		$("button#button_rest").click(function(){
			$("#rest_div").toggle();
		});
		$("#button_supplies").click(function(){
			$("#supply_div").toggle();
			$("#common_Buttons").toggle();
		});
		$("button#return_button").click(function(){
			$("#supply_div").toggle();
			$("#common_Buttons").toggle();
		});
		$("button#button_info").click(function(){
			$("#river_info").toggle();
			$("#river_div").toggle();
		});
		$("button#continue_button").click(function(){
			$("#river_info").toggle();
			$("#river_div").toggle();
		});
	});
</script>
</body></html>
<?php
	
?>