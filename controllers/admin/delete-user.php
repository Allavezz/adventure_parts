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

require("models/users.php");

$model = new Users();
$user = $model->get($id);

if (empty($user)) {
    http_response_code(404);
    include("controllers/error.php");
    exit();
}

$deleteUser = $model->delete($id);

if ($deleUser) {

    $_SESSION["success_message"] = "User deleted successfully";
    header("Location: " . ROOT . "/admin/users/");
    exit();
} else {

    $_SESSION["error_message"] = "There was an error deleting the user. Please try again.";
    header("Location: " . ROOT . "/admin/users/");
}
