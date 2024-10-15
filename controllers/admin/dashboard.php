<?php

require("models/categories.php");

$modelCategories = new Categories();

$categoryCount = $modelCategories->getCount();

require("views/admin/dashboard.php");
