<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login/");
    exit();
}

require("models/products.php");

$model = new Products();

$products = $model->getAll();
$existingImages = $model->getImages();

if (isset($_POST["delete"]) && isset($_POST["image"])) {

    $deleteImage = $model->deleteImage($_POST["image"]);

    if ($deleteImage) {

        header("Location: " . ROOT . "/admin/products/");
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

            header("Location: " . ROOT . "/admin/products");
            exit();
        } else {

            $error = "Failed to upload the image";
        }
    }
}

if (isset($_POST["create"])) {

    if (
        !empty($_POST["product_name"]) &&
        !empty($_POST["product_slug"]) &&
        !empty($_POST["product_image"]) &&
        !empty($_POST["price"]) &&
        !empty($_POST["stock"]) &&
        mb_strlen($_POST["product_name"]) >= 3 &&
        mb_strlen($_POST["product_name"]) <= 255 &&
        mb_strlen($_POST["product_slug"]) >= 3 &&
        mb_strlen($_POST["product_slug"]) <= 50 &&
        is_numeric($_POST["price"]) &&
        $_POST["price"] > 0 &&
        $_POST["price"] < 9999 &&
        preg_match('/^\d+(\.\d{1,2})?$/', $_POST["price"]) &&
        is_numeric($_POST["stock"]) &&
        filter_var($_POST["stock"], FILTER_VALIDATE_INT) &&
        $_POST["stock"] > 0 &&
        $_POST["stock"] < 9999
    ) {
        str_replace(",", ".", $_POST["price"]);

        $product = $model->get($_POST["product_slug"]);

        if (empty($product)) {

            $createProduct = $model->create($_POST);

            if ($createProduct) {

                header("Location: " . ROOT . "/admin/products/");
                exit();
            } else {

                $error = "There was an error creating the product. Please try again";
            }
        } else {

            $error = "This product slug is already in use";
        }
    } else {

        $error = "Fill all the fields correctly";
    }
}

require("views/admin/products.php");
