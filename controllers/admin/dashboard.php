<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login");
    exit();
}

require("models/categories.php");
require("models/users.php");
require("models/products.php");
require("models/orders.php");
require("models/countries.php");
require("models/admins.php");

$modelCategories = new Categories();
$modelUsers = new Users();
$modelProducts = new Products();
$modelOrders = new Orders();
$modelCountries = new Countries();
$modelAdmins = new Admins();

$usersCount = $modelUsers->getCount();
$categoriesCount = $modelCategories->getCount();
$productsCount = $modelProducts->getCount();
$ordersCount = $modelOrders->getCount();
$countriesCount = $modelCountries->getCount();
$adminsCount = $modelAdmins->getCount();

require("views/admin/dashboard.php");
