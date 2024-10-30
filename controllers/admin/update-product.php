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

require("models/products.php");

$model = new Products();
$product = $model->get($id);

if (empty($product)) {
    http_response_code(404);
    include("controllers/error.php");
    exit();
}

$existingImages = $model->getImages();

if (isset($_POST["update"])) {

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

        $updateProduct = $model->update($_POST, $id);

        if ($updateProduct) {

            $_SESSION["success_message"] = "Product updated successfully";
            header("Location: " . ROOT . "/admin/products/");
            exit();
        } else {

            $message = "There was an error updating the product. Please try again";
        }
    } else {

        $message = "Fill all the fields correctly";
    }
}

require("views/admin/update-product.php");
