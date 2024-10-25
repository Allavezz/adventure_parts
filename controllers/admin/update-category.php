<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login/");
    exit();
}

if (empty($id) || !preg_match('/^[a-z0-9-]+$/', $id)) {
    http_response_code(400);
    die("Invalid Request");
}

require("models/categories.php");

$model = new Categories();
$category = $model->get($id);


if (empty($category)) {
    http_response_code(404);
    die("Not Found");
}

$existingImages = $model->getImages();

if (isset($_POST["update"])) {

    if (
        !empty($_POST["category_name"]) &&
        !empty($_POST["category_slug"]) &&
        !empty($_POST["category_image"]) &&
        mb_strlen($_POST["category_name"]) >= 3 &&
        mb_strlen($_POST["category_name"]) <= 255 &&
        mb_strlen($_POST["category_slug"]) >= 3 &&
        mb_strlen($_POST["category_slug"]) <= 20
    ) {
        $updateCategory = $model->update($_POST, $id);

        if ($updateCategory) {

            $_SESSION["success_message"] = "Category updated successfully";
            header("Location: " . ROOT . "/admin/categories/");
            exit();
        } else {

            $_SESSION["error_message"] = "There was an error updating the category. Please try again";
        }
    } else {

        $_SESSION["error_message"] = "Fill all the fields correctly";
    }
}



require("views/admin/update-category.php");
