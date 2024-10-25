<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login/");
    exit();
}

if (empty($id) || !preg_match('/^[a-z0-9-]+$/', $id)) {
    http_response_code(400);
    include("controllers/error.php");
    exit();
}

require("models/categories.php");

$model = new Categories();
$category = $model->get($id);

if (empty($category)) {
    http_response_code(404);
    include("controllers/error.php");
    exit();
}

$deleteCategory = $model->delete($id);

if ($deleteCategory) {

    $_SESSION["success_message"] = "Category deleted successfully";
    header("Location: " . ROOT . "/admin/categories/");
} else {

    $_SESSION["error_message"] = "There was an error deleting the category. Please try again.";
}
