<html>
<head>

<?php
	//not entirely sure which files I need to include.
?>

</head>
<body>
<?php
	function showActions($hasShop, $initiallyHidden){
		$initiallyHidden = false;
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

<!-- regular options as specified in the issue -->
<div class="button_hide"><button id="button_supplies">check supplies</button><br></div>
<div class="button_hide"><button id="button_map">look at map</button><br></div>
<div class="button_hide"><button id="button_rest">stop to rest</button><br></div>
<div class="button_hide"><button id="button_trade">attempt to rest</button><br></div>
<div class="button_hide"><button id="button_hunt">hunt for food</button><br></div>
<div class="button_hide"><button id="button_shop" >buy supplies</button><br></div>
<br>
<?php
	}
?>


<!-- river options, depth does not affect the options given to player -->
<button id="button_ford">attempt to ford The river</button><br>
<button id="button_caulk">caulk the wagon and float it across</button><br>
<button id="button_ferry">take a ferry across</button><br>
<button id="button_wait">wait and see if conditions improve</button><br>
<button id="button_info">get more information</button><br>

<?php
	}
?>

</body>
</html>