<?php

require("models/models.php");

$model = new Models();

$models = $model->getAll();

print_r($models);

require("views/home.php");
