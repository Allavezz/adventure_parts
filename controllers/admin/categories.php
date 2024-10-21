<?php

require("models/categories.php");

$modelCategories = new Categories();

$categories = $modelCategories->getAll();

require("views/admin/categories.php");
