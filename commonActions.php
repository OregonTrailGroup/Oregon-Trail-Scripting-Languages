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
	<button class="button_hide" id="button_supplies">check supplies</button><br>
	<a href="Map.php"><button class="button_hide" id="button_map">look at map</button></a><br>
	<button class="button_hide" id="button_rest">stop to rest</button><br>
	<a href="Trade.php"><button class="button_hide" id="button_trade">attempt to trade</button></a><br>
	<a href="Fish.php"><button class="button_hide" id="button_fish">fish for food</button></a><br>
	<a href="Shop.php"><button class="button_hide_shop" id="button_shop" >buy supplies</button></a><br>
	<br>
</div>

<div id="supply_div" style="display:none;">
	<!-- check session vars to display supplies -->
	<h3>Your Supplies:</h3>
	oxen&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<?php echo $_SESSION["playParty"]->_supplies->_oxen ?><br>
	sets of clothing&emsp;<?php echo $_SESSION["playParty"]->_supplies->_clothes ?><br>
	bait&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION["playParty"]->_supplies->_bait ?><br>
	wagon wheels&emsp;&nbsp;&nbsp;<?php echo $_SESSION["playParty"]->_supplies->_wagonWheels ?><br>
	wagon axles&emsp;&nbsp;&emsp;<?php echo $_SESSION["playParty"]->_supplies->_wagonAxle ?><br>
	wagon tongues&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION["playParty"]->_supplies->_wagonTongue ?><br>
	pounds of food&emsp;<?php echo $_SESSION["playParty"]->_supplies->_food ?><br>
	money left&emsp;&nbsp;&nbsp;&nbsp;&emsp;<?php echo $_SESSION["playParty"]->_supplies->_money ?><br>

	<button id="return_button">Return to menu</button>
	
</div>
<?php
	}
?>
<?php
	function showRiverActions(){
?>
<div id="river_div">
<!-- river options, depth does not affect the options given to player -->
<button id="button_ford">attempt to ford The river</button><br>
<button id="button_caulk">caulk the wagon and float it across</button><br>
<button id="button_ferry">take a ferry across</button><br>
<button id="button_wait">wait and see if conditions improve</button><br>
<button id="button_info">get more information</button><br>
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
		$("button#button_supplies").click(function(){
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