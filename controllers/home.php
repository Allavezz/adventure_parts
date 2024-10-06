<?php

require("models/models.php");
require("models/about.php");

$modelModels = new Models();
$modelAbout = new About();


$models = $modelModels->getAll();
$about = $modelAbout->get();


require("views/home.php");
