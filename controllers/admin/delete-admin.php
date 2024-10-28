<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login");
    exit();
}

if (empty($id) || !is_numeric($id)) {
    http_response_code(400);
    include("controllers/error.php");
    exit();
}

require("models/admins.php");

$model = new Admins();
$admin = $model->get($id);

if (empty($admin)) {
    http_response_code(404);
    include("controllers/error.php");
    exit();
}

$deleteAdmin = $model->delete($id);

if ($deleteAdmin) {
    if ($id == $_SESSION["admin_id"]) {
        $message = urlencode("The account deleted was your own. You have been logged out.");

        session_unset();
        session_destroy();

        header("Location: " . ROOT . "/admin/login/?message=" . $message);
        exit();
    } else {
        $_SESSION["success_message"] = "Admin deleted successfully";
        header("Location: " . ROOT . "/admin/admins/");
        exit();
    }
} else {
    $_SESSION["error_message"] = "There was an error deleting the admin. Please try again.";
}
