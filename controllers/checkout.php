<?php

if (!isset($_SESSION["user_id"])) {

    header("Location: " . ROOT . "/login/");
    exit;
}

if (empty($_SESSION["cart"])) {
    header("Location: " . ROOT . "/");
    exit;
}

require("models/orders.php");
require("models/products.php");

$modelOrders = new Orders();
$modelProducts = new Products();

$payment_reference = $modelOrders->getPaymentRef();
$order_id = $modelOrders->createHeader($_SESSION["user_id"], $payment_reference);

$total = 0;
foreach ($_SESSION["cart"] as $item) {

    $modelOrders->createDetail($order_id, $item);
    $modelProducts->subtractStock($item);

    $total += $item["quantity"] * $item["price"];
}

unset($_SESSION["cart"]);

require("views/checkout.php");
