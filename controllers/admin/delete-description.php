<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login");
    exit();
}

if (empty($id) || !is_numeric($id)) {
    http_response_code(400);
    include("controllers/error.php");
    exit();
}

require("models/products-descriptions.php");

$model = new ProductDescriptions();
$productDescription = $model->get($id);

if (empty($productDescription)) {
    http_response_code(404);
    include("controllers/error.php");
    exit();
}

$productId = $productDescription["product_slug"];
$image = $productDescription["image_url"];

$deleteImage = $model->deleteImage($image);
$deleteProductDescription = $model->delete($id);

if ($deleteProductDescription) {

    $_SESSION["success_message"] = "Description deleted successfully";
    header("Location: " . ROOT . "/admin/product/" . $productId);
} else {

    $_SESSION["delete_description_message"] = "There was an error deleting the description. Please try again later";
}
