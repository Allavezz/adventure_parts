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

        $_SESSION["success_message"] = "Image deleted successfully";
        header("Location: " . ROOT . "/admin/categories/");
        exit();
    } else {
        $deletemessage = "There was an error deleting the image";
    }
}

if (isset($_POST["add"]) && isset($_FILES["new_image"])) {

    $image = $_FILES["new_image"];

    if ($image["error"] !== UPLOAD_ERR_OK) {

        $newImageMessage = "An error ocurred during the file upload.";
    } elseif (!in_array(mime_content_type($image["tmp_name"]), ["image/jpeg", "image/jpg"])) {

        $newImageMessage = "Invalid file type. Only JPEG images are allowed.";
    } elseif ($image["size"] > 2 * 1024 * 1024) {

        $newImageMessage = "File is too large. Maximum size allowed is 2MB.";
    } else {

        list($width, $height) = getimagesize($image["tmp_name"]);

        if ($width !== 600 || $height !== 440) {

            $newImageMessage = "Invalid image dimensions. Image must be exactly 600x440 pixels.";
        } else {

            $uploadImage = $model->uploadImage($image);

            if ($uploadImage) {

                $_SESSION["success_message"] = "Image added successfully";
                header("Location: " . ROOT . "/admin/categories/");
                exit();
            } else {

                $newImageMessage = "Failed to upload the image";
            }
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
                $newCategoryMessage = "There was an error creating the category. Please try again.";
            }
        } else {
            $newCategoryMessage = "This category slug is already in use";
        }
    } else {
        $newCategoryMessage = "Fill all the fields correctly";
    }
}

require("views/admin/categories.php");
