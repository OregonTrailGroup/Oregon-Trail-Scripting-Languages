<?php
/*
 * buy.php
 *
 * Called via AJAX from shop.php to update session data when a purchase is made.
 *
 * INPUTS:
 *  - Query param - itemID - The item ID to purchase
 *  - Query param - itemQty - The number of items added
 *  - Query param - itemPrice - The amount deducted from money, ignores quantity.
 */
include "classes.php";

try
{
    session_start();

    $id = intval($_GET["itemID"]);
    $qty = intval($_GET["itemQty"]);
    $price = floatval($_GET["itemPrice"]);

    $_SESSION["playParty"]->_supplies->setItem($id, $qty);
    $_SESSION["playParty"]->_supplies->_money -= $price;

    echo json_encode(array("success" => TRUE));
}
catch (Exception $e)
{
    echo json_encode(array("success" => FALSE, "err" => $e));
}