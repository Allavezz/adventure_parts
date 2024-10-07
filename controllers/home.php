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

require("views/home.php");
