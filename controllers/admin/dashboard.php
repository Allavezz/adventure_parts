<?php

require("models/categories.php");
require("models/users.php");
require("models/products.php");
require("models/orders.php");
require("models/countries.php");

$modelCategories = new Categories();
$modelUsers = new Users();
$modelProducts = new Products();
$modelOrders = new Orders();
$modelCountries = new Countries();

$usersCount = $modelUsers->getCount();
$categoriesCount = $modelCategories->getCount();
$productsCount = $modelProducts->getCount();
$ordersCount = $modelOrders->getCount();
$countriesCount = $modelCountries->getCount();

require("views/admin/dashboard.php");
