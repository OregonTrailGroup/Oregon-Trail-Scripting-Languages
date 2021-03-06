<?php
	function showActions($hasShop, $initiallyHidden, $sourcePage){
		//function called by utside files for showing the main, in-game menu
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
			#common_Buttons
			{
				display: inherit;
			}
			
			.button_hide {
				display: none;
			}
			</style>
			<?php
		}
?>

<div id="common_Buttons">
	<!-- regular options as shown in the game -->
	<button class="button_hide" id="button_supplies">check supplies</button><br>
	<a href="Map.php?sourcePage=<?php echo $sourcePage; ?>"><button class="button_hide" id="button_map">look at map</button></a><br>
	<button class="button_hide" id="button_rest">stop to rest</button><br>
	<a href="Trade.php?sourcePage=<?php echo $sourcePage; ?>"><button class="button_hide" id="button_trade">attempt to trade</button></a><br>
	<a href="fish.php?sourcePage=<?php echo $sourcePage; ?>"><button class="button_hide" id="button_fish">fish for food</button></a><br>
	<a href="shop.php?sourcePage=<?php echo $sourcePage; ?>"><button class="button_hide_shop" id="button_shop" >buy supplies</button></a><br>
	<br>
</div>

<div id="rest_div" style="display:none;">
	<!-- div shown when user wants to rest -->
	"How many days of rest?"
	<input type="number" min="0" max="9" id="restDays" onkeyPress="isEnter(event)">
	<br>
	<button id="userDays">Rest</Button>
</div>

<div id="supply_div" style="display:none;">
	<!-- check session vars to display supplies -->
	<h3>Your Supplies:</h3>
	<!-- text, so that the number have meaning -->
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
	<!-- spans for direct modification outside this file -->
	<!-- accesses the session variables to show the user their supplies -->
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
		//functions called by buttons in the main menu options
		
		//hides the rest days div and sends the days to PassTime.php to 
		//update the time session variable/s
		$("button#userDays").click(function(){
			var num = $("#restDays").val();

			//ajax for sending the chosen days of rest to PassTime.php

			$.get('PassTime.php', {restDays: num}, function(data){
				if(typeof timePassed !== "undefined"){
					timePassed(data);
				}

				$("#rest_div").toggle();
			}, "json");
			$("#rest_div").toggle();
		});
		//shows the rest days div
		$("button#button_rest").click(function(){
			$("#rest_div").toggle();
		});
		
		//shows and hides the players supplies
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
		//function called from outside files that shows 
		//the options the player has when they reach a river landmark
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
<button id="button_info">get more information</button><br>
<a href="landmark2.php?ferrying&sourcePage=<?php echo $sourcePage; ?>"><button class="button_hide_ferry" id="button_ferry">take a ferry across</button></a><br>
</div>

<!-- hidden div for the river information -->
<div id="river_info" style="display:none;">
<p style="display:inline-block">
<ul><li>To ford a river means to pull your wagon across a shallow part of the river, with the oxen still attached.</li>
<li>To caulk the wagon means to seal it so that no water can get in. The wagon can then be floated across like a boat.</li>
<li>To use a ferry means to put your wagon on top of a flat boat that belongs to someone else. The owner of the ferry will take your wagon across the river.</li>
</p>
<button id="continue_button">Click to continue</button>
</div>

<script>
	$(document).ready(function(){
		
		//toggling functions for showing and hiding the river info
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
