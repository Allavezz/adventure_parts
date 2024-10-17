<?php

if (empty($id) || !preg_match('/^[a-z0-9-]+$/', $id)) {
    http_response_code(400);
    die("invalid Request");
}

require("models/products.php");

$modelProducts = new Products();

$product = $modelProducts->getBySlug($sid);

if (empty($product)) {
    http_response_code(404);
    die("Not Found");
}

$productHero = $modelProducts->getProductHero($id);
$productDescriptions = $modelProducts->getProductDescriptions($id);

$contents = [];
foreach ($productDescriptions as $description) {
    $descriptionId = $description["product_descriptions_id"];
    $contents[$descriptionId] = $modelProducts->getContentByDescriptionId($descriptionId);
}

require("views/products.php");
