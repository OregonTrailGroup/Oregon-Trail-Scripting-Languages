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
	<script>
	$(document).on("click", function(supplyShow){
    if($(supplyShow.target).is("#button_supplies")){
      $("#supply_div").show();
    }else{
        $("#supply_div").hide();
    }
	});
	</script>
	<!-- regular options as specified in the issue -->
	<button class="button_hide" id="button_supplies">check supplies</button><br>
	<a href="Map.php"><button class="button_hide" id="button_map">look at map</button></a><br>
	<button class="button_hide" id="button_rest">stop to rest</button><br>
	<a href="Trade.php"><button class="button_hide" id="button_trade">attempt to rest</button></a><br>
	<a href="Fish.php"><button class="button_hide" id="button_fish">fish for food</button></a><br>
	<a href="Shop.php"><button class="button_hide_shop" id="button_shop" >buy supplies</button></a><br>
<br>

<div id="supply_div" style="display:none;">
	<!-- check session vars to display supplies -->
	Test text.


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

<!-- river options, depth does not affect the options given to player -->
<button id="button_ford">attempt to ford The river</button><br>
<button id="button_caulk">caulk the wagon and float it across</button><br>
<button class="button_hide_ferry" id="button_ferry">take a ferry across</button><br>
<button id="button_wait">wait and see if conditions improve</button><br>
<button id="button_info">get more information</button><br>
<?php
	}
?>
