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

$paidOrder = $modelOrders->updatePayment($id);

if ($paidOrder) {

    $_SESSION["success_message"] = "Order setted as paid successfully";
    header("Location: " . ROOT . "/admin/orders");
    exit();
} else {
    $_SESSION["paid_error_message"] = "There was an error updating the payment status. Please try again";
}
