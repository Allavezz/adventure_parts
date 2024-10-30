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

$orderDetails = $modelOrders->getOrderDetails($id);

foreach ($orderDetails as $detail) {

    require("models/products.php");
    $modelProducts = new Products();
    $modelProducts->sumStock($detail["product_id"], $detail["quantity"]);
}

$deleteOrder = $modelOrders->deleteOrder($id);

if ($deleteOrder) {

    $_SESSION["success_message"] = "Order deleted successfully";
    header("Location: " . ROOT . "/admin/orders");
    exit();
} else {
    $deleteMessage = "There was an error deleting the order. Please try again";
}
