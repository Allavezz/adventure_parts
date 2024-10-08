<?php

if (empty($slug) || !preg_match('/^[a-z0-9-]+$/', $slug)) {
    http_response_code(400);
    die("invalid REquest");
}

require("models/products.php");

$modelProducts = new Products();

$product = $modelProducts->getBySlug($slug);
$productHero = $modelProducts->getProductHero($slug);
$productDescriptions = $modelProducts->getDescriptionsWithContent($slug);

if (empty($product)) {
    http_response_code(404);
    die("Not Found");
}

require("views/products.php");
