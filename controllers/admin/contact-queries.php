<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login");
    exit();
}

require("models/contacts.php");

$model = new Contacts();

$contactQueries = $model->getAll();

require("views/admin/contact-queries.php");
