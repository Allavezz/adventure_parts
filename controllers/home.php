<?php

require("models/categories.php");
require("models/about.php");
require("models/products.php");

$modelCategories = new Categories();
$modelAbout = new About();
$modelProducts = new Products();

$categories = $modelCategories->getAll();
$about = $modelAbout->get();
$products = $modelProducts->getFeaturedProducts();

usort($categories, function ($a, $b) {
    return strcmp($a["category_name"], $b["category_name"]);
});

require("views/home.php");
