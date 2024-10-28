<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login/");
    exit();
}

require("models/orders.php");

$modelOrders = new Orders();

$recentOrders = $modelOrders->getUnpaidAll();

$paidOrders = $modelOrders->getPaidAll();

$shippedOrders = $modelOrders->getShippedAll();

require("views/admin/orders.php");
