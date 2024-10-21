<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login");
    exit();
}

if (empty($id) || !is_numeric($id)) {
    http_response_code(400);
    die("Invalid Request");
}

require("models/admins.php");

$model = new Admins();
$admin = $model->get($id);

if (empty($admin)) {
    http_response_code(404);
    die("Not found");
}

if (isset($_POST["update"])) {

    if (
        !empty($_POST["name"]) &&
        !empty($_POST["employee_number"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
        $_POST["password"] === $_POST["password_confirm"] &&
        mb_strlen($_POST["name"]) >= 3 &&
        mb_strlen($_POST["employee_number"]) == 9 &&
        is_numeric($_POST["employee_number"]) &&
        mb_strlen($_POST["name"]) <= 60 &&
        mb_strlen($_POST["password"]) >= 8 &&
        mb_strlen($_POST["password"]) <= 1000
    ) {
        $updateAdmin = $model->update($_POST, $id);

        if ($updateAdmin) {

            $_SESSION["success_message"] = "Admin updated successfully";
            header("Location: " . ROOT . "/admin/admins/");
            exit();
        } else {
            $_SESSION["error_message"] = "There was an error updating the admin. Please try again";
        }
    } else {
        $_SESSION["error_message"] = "Fill all the fields correctly";
    }
}


require("views/admin/update-admin.php");
