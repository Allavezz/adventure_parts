<?php

if (empty($id) || !preg_match('/^[a-z0-9-]+$/', $id)) {
    http_response_code(400);
    include("controllers/error.php");
    exit();
}

require("models/products.php");

$modelProducts = new Products();

$product = $modelProducts->get($id);

if (empty($product)) {
    http_response_code(404);
    include("controllers/error.php");
    exit();
}

$productHero = $modelProducts->getProductHero($id);
$productDescriptions = $modelProducts->getProductDescriptions($id);

$contents = [];
foreach ($productDescriptions as $description) {
    $descriptionId = $description["product_descriptions_id"];
    $contents[$descriptionId] = $modelProducts->getContentByDescriptionId($descriptionId);
}

require("views/products.php");
