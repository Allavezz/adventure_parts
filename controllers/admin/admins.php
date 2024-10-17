<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login");
    exit();
}

require("models/admins.php");

$model = new Admins();

$admins = $model->getAll();

require("views/admin/admins.php");
