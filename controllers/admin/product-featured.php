<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login");
    exit();
}

$id = explode("?", $id)[0];

if (empty($id) || !preg_match('/^[a-z0-9-]+$/', $id)) {
    http_response_code(400);
    die("Invalid Request: Invalid Slug");
}

if (!isset($_GET["current"]) || ($_GET["current"] !== "0" && $_GET["current"] !== "1")) {
    http_response_code(400);
    die("Invalid Request: Invalid Current Value");
}

require("models/products.php");

$model = new Products();
$product = $model->get($id);

if (empty($product)) {
    http_response_code(404);
    die("Not Found");
}

$newFeaturedStatus = ($_GET["current"] == "1") ? 0 : 1;

$featuredProduct = $model->updateFeatured($id, $newFeaturedStatus);

if ($featuredProduct) {

    header("Location: " . ROOT . "/admin/products");
} else {

    $error = "There was an error updating the featured status";
}
