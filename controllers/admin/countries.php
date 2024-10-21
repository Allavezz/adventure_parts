<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login");
    exit();
}

require("models/countries.php");

$model = new Countries();

$countries = $model->getAll();

require("views/admin/countries.php");
