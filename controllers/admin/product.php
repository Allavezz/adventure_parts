<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login");
    exit();
}

if (empty($id) || !preg_match('/^[a-z0-9-]+$/', $id)) {
    http_response_code(400);
    include("controllers/error.php");
    exit();
}

require("models/products.php");
$modelProduct = new Products();
$product = $modelProduct->get($id);

if (empty($product)) {
    http_response_code(404);
    include("controllers/error.php");
    exit();
}

require("models/products-hero.php");
$modelProductHero = new ProductsHero();
$productHero = $modelProductHero->get($id);

if (isset($_POST["add-hero"]) && isset($_FILES["new_image"])) {
    $image = $_FILES["new_image"];

    if ($image["error"] !== UPLOAD_ERR_OK) {

        $error = "An error ocurred during the file upload.";
    } elseif (!in_array(mime_content_type($image["tmp_name"]), ["image/jpeg", "image/jpg"])) {

        $error = "Invalid file type. Only JPEG images are allowed.";
    } elseif ($image["size"] > 2 * 1024 * 1024) {

        $error = "File is too large. Maximum size allowed is 2MB.";
    } else {

        $imageName = basename($image["name"]);

        $uploadImage = $modelProductHero->uploadImage($image);
        $createProductHero = $modelProductHero->create($id, $imageName);

        if ($uploadImage) {

            header("Location: " . ROOT . "/admin/products");
            exit();
        } else {

            $error = "Failed to upload the image";
        }
    }
}

if (isset($_POST["update-hero"]) && isset($_FILES["new_image"])) {

    $image = $_FILES["new_image"];

    if ($image["error"] !== UPLOAD_ERR_OK) {

        $error = "An error ocurred during the file upload.";
    } elseif (!in_array(mime_content_type($image["tmp_name"]), ["image/jpeg", "image/jpg"])) {

        $error = "Invalid file type. Only JPEG images are allowed.";
    } elseif ($image["size"] > 2 * 1024 * 1024) {

        $error = "File is too large. Maximum size allowed is 2MB.";
    } else {

        $imageName = basename($image["name"]);
        $currentImage = $_POST["current_image"];

        $uploadImage = $modelProductHero->uploadImage($image);
        $deleteImage = $modelProductHero->deleteImage($currentImage);
        $createProductHero = $modelProductHero->update($id, $imageName);

        if ($uploadImage) {

            header("Location: " . ROOT . "/admin/products");
            exit();
        } else {

            $error = "Failed to upload the image";
        }
    }
}

require("views/admin/product.php");
