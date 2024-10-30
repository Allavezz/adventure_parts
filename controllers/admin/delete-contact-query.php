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

require("models/contacts.php");

$model = new Contacts();
$contactQuery = $model->get($id);

if (empty($contactQuery)) {
    http_response_code(404);
    include("controllers/error.php");
    exit();
}

$deleteQuery = $model->delete($id);

if ($deleteQuery) {
    $_SESSION["success_message"] = "Query deleted successfully";
    header("Location: " . ROOT . "/admin/contact-queries");
    exit();
} else {
    $_SESSION["error_message"] = "There was an error deleting the query. Please try again later";
}
