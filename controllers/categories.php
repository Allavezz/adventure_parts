<?php

if (empty($id) || !preg_match('/^[a-z0-9-]+$/', $id)) {
    http_response_code(400);
    include("controllers/error.php");
    exit();
}

require("models/categories.php");
$modelCategories = new Categories();
$category = $modelCategories->get($id);

if (empty($category)) {
    http_response_code(404);
    include("controllers/error.php");
    exit();
}

$categories = $modelCategories->getAll();

require("models/product-categories.php");
$modelProductsCategory = new ProductsCategories();
$categoryProducts = $modelProductsCategory->getProductsByCategory($id);

// Sort categories alphabetically by category_name
usort($categories, function ($a, $b) {
    return strcmp($a["category_name"], $b["category_name"]);
});

require("views/categories.php");
