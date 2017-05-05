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
            <td>2 Oxen - <button>$<?php echo money_format($moneyFormat, $shop->_yoke); ?></button></td>
            <td>1 Pound Food - <button>$<?php echo money_format($moneyFormat, $shop->_food); ?></button></td>
        </tr>
        <tr>
            <td>1 Set Clothes - <button>$<?php echo money_format($moneyFormat, $shop->_clothes); ?></button></td>
            <td>1 Tub Bait - <button>$<?php echo money_format($moneyFormat, $shop->_bait); ?></button></td>
        </tr>
        <tr>
            <td>1 Wagon Tongue - <button>$<?php echo money_format($moneyFormat, $shop->_parts); ?></button></td>
            <td>1 Wagon Axle - <button>$<?php echo money_format($moneyFormat, $shop->_parts); ?></button></td>
        </tr>
        <tr>
            <td colspan="2">1 Wagon Wheel - <button>$<?php echo money_format($moneyFormat, $shop->_parts); ?></button></td>
        </tr>
    </table>
</div>

<p>You have $<span id="money"><?php echo money_format($moneyFormat, $_SESSION["playerParty"]->_supplies->_money); ?></span> to spend.</p>

<script type="text/javascript">
var money = <?php echo $_SESSION["playerParty"]->_supplies->_money; ?>;
</script>
<script type="text/javascript" src="shop.js"></script>