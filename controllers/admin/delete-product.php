<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login/");
    exit();
}

if (empty($id) || !preg_match('/^[a-z0-9-]+$/', $id)) {
    http_response_code(400);
    include("controllers/error.php");
    exit();
}

require("models/products.php");

$model = new Products();
$product = $model->get($id);

if (empty($product)) {
    http_response_code(404);
    include("controllers/error.php");
    exit();
}

$dependentImages = $model->getDependentImages($id);

require("models/products-hero.php");
require("models/products-descriptions.php");
$modelProductHero = new ProductsHero();
$modelProductDescriptions = new ProductDescriptions();

foreach ($dependentImages as $item) {
    $image = $item["image"];
    $type = $item["type"];

    if ($type === 'hero') {
        $modelProductHero->deleteImage($image);
    } elseif ($type === 'description') {
        $modelProductDescriptions->deleteImage($image);
    }
}

$deleteProduct = $model->delete($id);

if ($deleteProduct) {

    header("Location: " . ROOT . "/admin/products/");
} else {

    $error = "There was an error deleting the product. Please try again";
}
