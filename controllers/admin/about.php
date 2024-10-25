<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login");
    exit();
}

require("models/about.php");

$model = new About();

$about = $model->get();
$existingImages = $model->getImages();

if (isset($_POST["delete"]) && isset($_POST["image"])) {

    $deleteImage = $model->deleteImage($_POST["image"]);

    if ($deleteImage) {

        header("Location: " . ROOT . "/admin/about/");
        exit();
    }
}

if (isset($_POST["add"]) && isset($_FILES["new_image"])) {

    $image = $_FILES["new_image"];

    if ($image["error"] !== UPLOAD_ERR_OK) {

        $error = "An error occurred during the file upload.";
    } elseif (!in_array(mime_content_type($image["tmp_name"]), ["image/jpeg", "image/jpg"])) {

        $error = "Invalid file type. Only JPEG images are allowed.";
    } elseif ($image["size"] > 2 * 1024 * 1024) {

        $error = "File is too large. Maximum size allowed is 2MB.";
    } else {

        $uploadImage = $model->uploadImage($image);

        if ($uploadImage) {

            header("Location: " . ROOT . "/admin/about/");
            exit();
        } else {
            $error = "Failed to upload the image";
        }
    }
}

if (isset($_POST["update"])) {

    if (
        !empty($_POST["about_image"]) &&
        !empty($_POST["image_alt"]) &&
        !empty($_POST["about_title"]) &&
        !empty($_POST["about_text"]) &&
        mb_strlen($_POST["image_alt"]) >= 3 &&
        mb_strlen($_POST["image_alt"]) <= 255 &&
        mb_strlen($_POST["about_title"]) >= 3 &&
        mb_strlen($_POST["about_title"]) <= 255 &&
        mb_strlen($_POST["about_text"]) <= 65535
    ) {
        $updateAbout = $model->update($_POST);

        if ($updateAbout) {
            $_SESSION["success_message"] = "About section updated successfully";
            header("Location: " . ROOT . "/admin/about");
            exit();
        } else {
            $_SESSION["error_message"] = "There was an error updating the section. Please try again";
        }
    } else {
        $_SESSION["error_message"] = "Fill all the fields correctly";
    }
}

require("views/admin/about.php");
