<?php
/*
 * Shop.php
 * 
 * Enterable from a town, allows the user to buy items.
 * 
 * INPUTS:
 *  - Query param - sourcePage - The page to return to after completing purchases
 */
include "commonUI.php";
include "classes.php";

session_start();

$journey = $_SESSION["playerJourney"];
$location = $journey->getLandmark($journey->_distance);
$shop = new Shop($location[1]->_shopIndex);
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
            <td>2 Oxen - $<?php echo $shop->_yoke; ?></td>
            <td>1 Pound Food - $<?php echo $shop->_food; ?></td>
        </tr>
        <tr>
            <td>1 Set Clothes - $<?php echo $shop->_clothes; ?></td>
            <td>1 Tub Bait - $<?php echo $shop->_bait; ?></td>
        </tr>
        <tr>
            <td>1 Wagon Tongue - $<?php echo $shop->_parts; ?></td>
            <td>1 Wagon Axle - $<?php echo $shop->_parts; ?></td>
        </tr>
        <tr>
            <td colspan="2">1 Wagon Wheel - $<?php echo $shop->_parts; ?></td>
        </tr>
    </table>
</div>