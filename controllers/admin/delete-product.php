<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login/");
    exit();
}

if (empty($id) || !preg_match('/^[a-z0-9-]+$/', $id)) {
    http_response_code(400);
    die("Invalid Request");
}

require("models/products.php");

$model = new Products();
$product = $model->get($id);

if (empty($product)) {
    http_response_code(404);
    die("Not Found");
}

$deleteProduct = $model->delete($id);

if ($deleteProduct) {

    header("Location: " . ROOT . "/admin/products/");
} else {

    $error = "There was an error deleting the product. Please try again";
}
