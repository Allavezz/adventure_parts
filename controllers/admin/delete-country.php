<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login");
    exit();
}

if (empty($id) || !preg_match('/^[A-Z]{2}$/', $id)) {
    http_response_code(400);
    include("controllers/error.php");
    exit();
}

require("models/countries.php");

$model = new Countries();
$country = $model->get($id);

if (empty($country)) {
    http_response_code(404);
    include("controllers/error.php");
    exit();
}

$deleteCountry = $model->delete($id);

if ($deleteCountry) {

    $_SESSION["success_message"] = "Country deleted successfully";
    header("Location: " . ROOT . "/admin/countries/");
    exit();
} else {

    $_SESSION["error_message"] = "There was an error deleting the country. Please try again.";
    header("Location: " . ROOT . "/admin/countries/");
}
