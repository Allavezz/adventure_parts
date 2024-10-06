<?php

require("models/categories.php");
require("models/about.php");

$modelCategories = new Categories();
$modelAbout = new About();


$categories = $modelCategories->getAll();
$about = $modelAbout->get();


require("views/home.php");
