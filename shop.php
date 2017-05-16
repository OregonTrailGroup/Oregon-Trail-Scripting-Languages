<?php
/*
 * Shop.php
 * 
 * Enterable from a town, allows the user to buy items.
 * 
 * INPUTS:
 *  - Query param - sourcePage - The page to return to after completing purchases
 */
include "classes.php";
session_start();
include "commonUI.php";

$journey = $_SESSION["playerJourney"];
$location = $journey->getLandmark($journey->_distance);
$shop = new Shop($location[1]->_shopIndex);
$shopTitle = $location[1]->_name." - Shop";
$moneyFormat = "%!n";
startHTML($shopTitle);
?>

<h1><?php echo $shopTitle; ?></h1>
<img src="assets/Separator.png"/>

<div class="horizontal-layout">
    <img src="assets/StoreManagerSprite.png" />

    <table>
        <tr>
            <th colspan="2">Items for Purchase</th>
        </tr>
        <tr>
            <td>2 Oxen - <button id="ox">$<?php echo money_format($moneyFormat, $shop->_yoke); ?></button></td>
            <td>10 Pounds Food - <button id="food">$<?php echo money_format($moneyFormat, $shop->_food * 10); ?></button></td>
        </tr>
        <tr>
            <td>1 Set Clothes - <button id="clothes">$<?php echo money_format($moneyFormat, $shop->_clothes); ?></button></td>
            <td>1 Tub Bait - <button id="bait">$<?php echo money_format($moneyFormat, $shop->_bait); ?></button></td>
        </tr>
        <tr>
            <td>1 Wagon Tongue - <button id="tongue">$<?php echo money_format($moneyFormat, $shop->_parts); ?></button></td>
            <td>1 Wagon Axle - <button id="axle">$<?php echo money_format($moneyFormat, $shop->_parts); ?></button></td>
        </tr>
        <tr>
            <td colspan="2">1 Wagon Wheel - <button id="wheel">$<?php echo money_format($moneyFormat, $shop->_parts); ?></button></td>
        </tr>
    </table>
</div>

<p>You have $<span id="money"><?php echo money_format($moneyFormat, $_SESSION["playerParty"]->_supplies->_money); ?></span> to spend.</p>
<hr>
<table>
    <tr>
        <th colspan="3">Your Inventory</th>
    </tr>
    <tr>
        <td><span id="oxenCount"><?php echo $_SESSION["playerParty"]->_supplies->_oxen; ?></span> oxen</td>
        <td><span id="foodCount"><?php echo $_SESSION["playerParty"]->_supplies->_food; ?></span> pounds food</td>
        <td><span id="clothesCount"><?php echo $_SESSION["playerParty"]->_supplies->_clothes; ?></span> sets clothes</td>
    </tr>
    <tr>
        <td><span id="wheelsCount"><?php echo $_SESSION["playerParty"]->_supplies->_wagonWheels; ?></span> wagon wheels</td>
        <td><span id="axlesCount"><?php echo $_SESSION["playerParty"]->_supplies->_wagonAxle; ?></span> wagon axles</td>
        <td><span id="tonguesCount"><?php echo $_SESSION["playerParty"]->_supplies->_wagonTongue; ?></span> wagon tongues</td>
    </tr>
    <tr>
        <td colspan="3"><span id="baitCount"><?php echo $_SESSION["playerParty"]->_supplies->_bait; ?></span> tubs of bait</td>
</table>
<hr>
<a href="<?php echo $_GET['sourcePage']; ?>"><button>Go Back</button></a>

<script type="text/javascript">
// These are stored as [quantity, price] pairs
var money = <?php echo $_SESSION["playerParty"]->_supplies->_money; ?>;
var food = [<?php echo $_SESSION["playerParty"]->_supplies->_food; ?>, <?php echo $shop->_food; ?>];
var oxen = [<?php echo $_SESSION["playerParty"]->_supplies->_oxen; ?>, <?php echo $shop->_yoke; ?>];
var clothes = [<?php echo $_SESSION["playerParty"]->_supplies->_clothes; ?>, <?php echo $shop->_clothes; ?>];
var bait = [<?php echo $_SESSION["playerParty"]->_supplies->_bait; ?>, <?php echo $shop->_bait; ?>];
var wheels = [<?php echo $_SESSION["playerParty"]->_supplies->_wagonWheels; ?>, <?php echo $shop->_parts; ?>];
var axles = [<?php echo $_SESSION["playerParty"]->_supplies->_wagonAxle; ?>, <?php echo $shop->_parts; ?>];
var tongues = [<?php echo $_SESSION["playerParty"]->_supplies->_wagonTongue; ?>, <?php echo $shop->_parts; ?>];
</script>
<script type="text/javascript" src="shop.js"></script>