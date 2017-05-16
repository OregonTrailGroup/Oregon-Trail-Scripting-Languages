<?php
	function showActions($hasShop, $initiallyHidden, $sourcePage){
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
	<a href="Map.php?sourcePage=<?php echo $sourcePage; ?>"><button class="button_hide" id="button_map">look at map</button></a><br>
	<button class="button_hide" id="button_rest">stop to rest</button><br>
	<a href="Trade.php?sourcePage=<?php echo $sourcePage; ?>"><button class="button_hide" id="button_trade">attempt to trade</button></a><br>
	<a href="fish.php?sourcePage=<?php echo $sourcePage; ?>"><button class="button_hide" id="button_fish">fish for food</button></a><br>
	<a href="Shop.php?sourcePage=<?php echo $sourcePage; ?>"><button class="button_hide_shop" id="button_shop" >buy supplies</button></a><br>
	<br>
</div>

<div id="rest_div" style="display:none;">
	"How many days of rest?"
	<input type="number" min="0" max="9" id="restDays" onkeyPress="isEnter(event)">
	<br>
	<button id="userDays">Rest</Button>
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
	<span id="oxenSpan"><?php echo $_SESSION["playParty"]->_supplies->_oxen ?></span><br>
	<span id="clotSpan"><?php echo $_SESSION["playParty"]->_supplies->_clothes ?></span><br>
	<span id="baitSpan"><?php echo $_SESSION["playParty"]->_supplies->_bait ?></span><br>
	<span id="wheeSpan"><?php echo $_SESSION["playParty"]->_supplies->_wagonWheels ?></span><br>
	<span id="axleSpan"><?php echo $_SESSION["playParty"]->_supplies->_wagonAxle ?></span><br>
	<span id="tongSpan"><?php echo $_SESSION["playParty"]->_supplies->_wagonTongue ?></span><br>
	<span id="foodSpan"><?php echo $_SESSION["playParty"]->_supplies->_food ?></span><br>
	<span id="moneSpan"><?php echo $_SESSION["playParty"]->_supplies->_money ?></span><br>
	</p>
	<br><button id="return_button">Return to menu</button>
	
</div>

<script>
	$(document).ready(function(){
		
		$("button#userDays").click(function(){
			var num = $("#restDays").val();
			//alert(num);
			$.get('PassTime.php', {restDays: num}, function(data){
				if(timePassed){
					timePassed(data);
				}
				//alert(data);
			}, "json");
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
	});
</script>

<?php
	}
?>
<?php
	function showRiverActions($hasFerry, $sourcePage){
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
<a href="landmark2.php?fording&sourcePage=<?php echo $sourcePage; ?>"><button id="button_ford">attempt to ford The river</button></a><br>
<a href="landmark2.php?caulking&sourcePage=<?php echo $sourcePage; ?>"><button id="button_caulk">caulk the wagon and float it across</button></a><br>
<a href="landmark2.php?sourcePage=<?php echo $sourcePage; ?>"><button id="button_info">get more information</button></a><br>
<a href="landmark2.php?ferrying&sourcePage=<?php echo $sourcePage; ?>"><button class="button_hide_ferry" id="button_ferry">take a ferry across</button></a><br>
</div>

<div id="river_info" style="display:none;">
To ford a river means to pull your wagon across a shallow part of the river, with the oxen still attached.<br>
To caulk the wagon means to seal it so that no water can get in. The wagon can then be floated across like a boat.<br>
To use a ferry means to put your wagon on top of a flat boat that belongs to someone else. The owner of the ferry will take your wagon across the river.<br>
<button id="continue_button">Click to continue</button>
<div/>

<script>
	$(document).ready(function(){

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

<?php 
	}
?>
