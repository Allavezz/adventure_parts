<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login");
    exit();
}

require("models/categories.php");

$model = new Categories();

$categories = $model->getAll();
$existingImages = $model->getImages();

if (isset($_POST["delete"]) && isset($_POST["image"])) {

    $deleteImage = $model->deleteImage($_POST["image"]);

    if ($deleteImage) {

        header("Location: " . ROOT . "/admin/categories/");
        exit();
    }
}

if (isset($_POST["add"]) && isset($_FILES["new_image"])) {

    $image = $_FILES["new_image"];

    if ($image["error"] !== UPLOAD_ERR_OK) {

        $error = "An error ocurred during the file upload.";
    } elseif (!in_array(mime_content_type($image["tmp_name"]), ["image/jpeg", "image/jpg"])) {

        $error = "Invalid file type. Only JPEG images are allowed.";
    } elseif ($image["size"] > 2 * 1024 * 1024) {

        $error = "File is too large. Maximum size allowed is 2MB.";
    } else {

        $uploadImage = $model->uploadImage($image);

        if ($uploadImage) {

            header("Location: " . ROOT . "/admin/categories/");
            exit();
        } else {

            $error = "Failed to upload the image";
        }
    }
}

if (isset($_POST["create"])) {

    if (
        !empty($_POST["category_name"]) &&
        !empty($_POST["category_slug"]) &&
        !empty($_POST["category_image"]) &&
        mb_strlen($_POST["category_name"]) >= 3 &&
        mb_strlen($_POST["category_name"]) <= 255 &&
        mb_strlen($_POST["category_slug"]) >= 3 &&
        mb_strlen($_POST["category_slug"]) <= 20
    ) {
        $category = $model->get($_POST["category_slug"]);

        if (empty($category)) {
            $createCategory = $model->create($_POST);

            if ($createCategory) {
                $_SESSION["success_message"] = "Category created successfully";
                header("Location: " . ROOT . "/admin/categories/");
                exit();
            } else {
                $_SESSION["error_message"] = "There as an error creating the category. Please try again.";
            }
        } else {
            $_SESSION["error_message"] = "This category slug is already in use";
        }
    } else {
        $_SESSION["error_message"] = "Fill all the fields correctly";
    }
}

require("views/admin/categories.php");
