<?php

if (empty($id) || !preg_match('/^[a-z0-9-]+$/', $id)) {
    http_response_code(400);
    die("Invalid Request");
}

require("models/models.php");

$modelModels = new Models();

$model = $modelModels->getBySlug($id);

if (empty($model)) {
    http_response_code(404);
    die("Not Found");
}

require("views/models.php");
