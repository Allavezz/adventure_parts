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

require("models/products-hero.php");
$modelProductHero = new ProductsHero();
$productHero = $modelProductHero->get($id);

require("models/products-descriptions.php");
$modelProductDescriptions = new ProductDescriptions;
$productDescriptions = $modelProductDescriptions->get($id);


require("models/descriptions-content.php");
$modelDescriptionContent = new DescriptionsContent;
$contents = [];
foreach ($productDescriptions as $description) {

    $descriptionId = $description["product_descriptions_id"];

    $contents[$descriptionId] = $modelDescriptionContent->get($descriptionId);
}

require("views/products.php");
