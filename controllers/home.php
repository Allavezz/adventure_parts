<?php

require("models/models.php");

$model = new Models();

$models = $model->getAll();


require("views/home.php");
