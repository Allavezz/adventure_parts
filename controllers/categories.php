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

require("views/categories.php");
