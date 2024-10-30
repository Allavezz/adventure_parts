<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login/");
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

require("views/admin/contact-query-details.php");
