<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login/");
    exit();
}

if (empty($id) || !is_numeric($id)) {
    http_response_code(400);
    include("controllers/error.php");
    exit();
}

require("models/orders.php");

$modelOrders = new Orders();
$order = $modelOrders->get($id);

if (empty($order)) {
    http_response_code(404);
    include("controllers/error.php");
    exit();
}

$deleteOrder = $modelOrders->deleteOrder($id);

if ($deleteOrder) {

    $_SESSION["success_message"] = "Order closed successfully";
    header("Location: " . ROOT . "/admin/orders");
    exit();
} else {

    $_SESSION["close_message"] = "There was an error closing the order. Please try again";
}
