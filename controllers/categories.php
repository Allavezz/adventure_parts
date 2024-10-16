<?php

if (empty($id) || !preg_match('/^[a-z0-9-]+$/', $id)) {
    http_response_code(400);
    die("Invalid Request");
}

require("models/categories.php");
require("models/products.php");

$modelCategories = new Categories();

$category = $modelCategories->get($id);

if (empty($category)) {
    http_response_code(404);
    die("Not Found");
}

$categories = $modelCategories->getAll();

$modelProducts = new Products();
$products = $modelProducts->getProductsByCategorySlug($id);

// Sort categories alphabetically by category_name
usort($categories, function ($a, $b) {
    return strcmp($a["category_name"], $b["category_name"]);
});

require("views/categories.php");
