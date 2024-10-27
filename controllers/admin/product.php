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

        if ($uploadImage && $deleteImage && $createProductHero) {

            header("Location: " . ROOT . "/admin/product/" . $id);
            exit();
        } else {

            $error = "Failed to upload the Hero section";
        }
    }
}

require("models/products-descriptions.php");
$modelProductDescriptions = new ProductDescriptions;
$productDescriptions = $modelProductDescriptions->getByProductId($id);


require("models/descriptions-content.php");
$modelDescriptionContent = new DescriptionsContent;
$contents = [];
foreach ($productDescriptions as $description) {

    $descriptionId = $description["product_descriptions_id"];

    $contents[$descriptionId] = $modelDescriptionContent->get($descriptionId);
}



if (isset($_POST["create_description"])) {
    // Falta criar validação dos campos, criar if() para cada passo e respectivos elses com os errors. Fica para o final se tiver tempo

    $image = $_FILES["new_image"];
    $imageName = basename($image["name"]);


    $uploadImage = $modelProductDescriptions->uploadImage($image);

    $createDescription = $modelProductDescriptions->create($_POST, $imageName, $id);

    if ($createDescription) {
        $descriptionId = $createDescription["product_descriptions_id"];

        $contentTypes = [];
        $contents = [];
        $sortOrders = [];

        // Collect content data into arrays
        foreach ($_POST["new_content_type"] as $index => $contentType) {
            $contentTypes[] = $contentType;
            $contents[] = $_POST["new_content"][$index];
            $sortOrders[] = $_POST["new_content_sort"][$index];
        }

        // Prepare and insert content items
        foreach ($contentTypes as $index => $type) {
            $data = [
                "product_descriptions_id" => $descriptionId,
                "content_type" => $type,
                "content" => $contents[$index],
                "sort_order" => $sortOrders[$index]
            ];

            $createDescriptionContent =
                $modelDescriptionContent->create($data);
        }

        if ($createDescriptionContent) {

            header("Location: " . ROOT . "/admin/product/" . $id);
            exit();
        }
    }
}


require("views/admin/product.php");