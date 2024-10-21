<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login");
    exit();
}

require("models/users.php");

$model = new Users();

$users = $model->getAll();

require("views/admin/users.php");
