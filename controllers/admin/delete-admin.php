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
    die("Not Found");
}

$deleteAdmin = $model->delete($id);

if ($deleteAdmin) {
    if ($id == $_SESSION["admin_id"]) {

        session_unset();
        session_destroy();

        header("Location: " . ROOT . "/admin/login/");
        exit();
    } else {
        $_SESSION["success_message"] = "Admin deleted successfully";
        header("Location: " . ROOT . "/admin/admins/");
        exit();
    }
} else {
    $_SESSION["error_message"] = "There was an error deleting the admin. Please try again.";
    header("Location: " . ROOT . "/admin/admins/");
}
