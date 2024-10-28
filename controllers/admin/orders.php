<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login/");
    exit();
}

require("models/orders.php");

$modelOrders = new Orders();

$recentOrders = $modelOrders->getAll();

require("views/admin/orders.php");
