<?php

if (empty($id) || !preg_match('/^[a-z0-9-]+$/', $id)) {
    http_response_code(400);
    die("Invalid Request");
}

require("models/categories.php");

$modelCategories = new Categories();
$categories = $modelCategories->getAll();
$category = $modelCategories->getBySlug($id);

// Sort categories alphabetically by category_name
usort($categories, function ($a, $b) {
    return strcmp($a["category_name"], $b["category_name"]);
});

if (empty($category)) {
    http_response_code(404);
    die("Not Found");
}

require("views/categories.php");
