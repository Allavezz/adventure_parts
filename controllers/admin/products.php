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

        $_SESSION["success_message"] = "Image Deleted Successfully";
        header("Location: " . ROOT . "/admin/products/");
        exit();
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

                $_SESSION["success_message"] = "Image updated successfully";
                header("Location: " . ROOT . "/admin/products/");
                exit();
            } else {

                $newImageMessage = "Failed to upload the image";
            }
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

                $_SESSION["success_message"] = "Product added successfully";
                header("Location: " . ROOT . "/admin/products/");
                exit();
            } else {

                $addProductMessage = "There was an error creating the product. Please try again";
            }
        } else {

            $addProductMessage = "This product slug is already in use";
        }
    } else {

        $addProductMessage = "Fill all the fields correctly";
    }
}

require("models/categories.php");

$modelCategories = new Categories();
$categories = $modelCategories->getAll();


require("models/product-categories.php");
$modelProductCategories = new ProductsCategories();
$productCategories = [];

foreach ($products as $product) {

    $categoryId = $modelProductCategories->getProductCategories($product["product_id"]);
    $productCategories[$product["product_id"]] = $categoryId;
}

if (isset($_POST["update_categories"])) {

    foreach ($products as $product) {

        $productId = $product['product_id'];
        $existingCategories = $modelProductCategories->getProductCategories($productId);

        foreach ($categories as $category) {
            $categoryId = $category['category_id'];
            $isChecked = isset($_POST['categories'][$productId][$categoryId]);

            if ($isChecked) {

                if (!in_array($categoryId, $existingCategories)) {
                    $modelProductCategories->addProductToCategory($productId, $categoryId);
                }
            } else {

                if (in_array($categoryId, $existingCategories)) {
                    $modelProductCategories->removeProductFromCategory($productId, $categoryId);
                }
            }
        }
    }

    $_SESSION["success_message"] = "Products Categories updated successfully";
    header("Location: " . ROOT . "/admin/products/");
    exit();
}

require("views/admin/products.php");
