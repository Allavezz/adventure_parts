<?php

if (empty($slug) || !preg_match('/^[a-z0-9-]+$/', $slug)) {
    http_response_code(400);
    die("invalid REquest");
}

require("models/products.php");

$modelProducts = new Products();

$product = $modelProducts->getBySlug($slug);

if (empty($product)) {
    http_response_code(404);
    die("Not Found");
}

$productHero = $modelProducts->getProductHero($slug);
$productDescriptions = $modelProducts->getProductDescriptions($slug);

$contents = [];
foreach ($productDescriptions as $description) {
    $descriptionId = $description["product_descriptions_id"];
    $contents[$descriptionId] = $modelProducts->getContentByDescriptionId($descriptionId);
}

require("views/products.php");
