<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login");
    exit();
}

if (empty($id) || !preg_match('/^[A-Z]{2}$/', $id)) {
    http_response_code(400);
    die("Invalid request");
}

require("models/countries.php");

$model = new Countries();
$country = $model->get($id);

if (empty($country)) {
    http_response_code(404);
    die("Not Found");
}

if (isset($_POST["update"])) {

    if (
        !empty($_POST["code"]) &&
        !empty($_POST["name"]) &&
        ctype_upper($_POST["code"]) &&
        mb_strlen($_POST["code"]) == 2 &&
        mb_strlen($_POST["name"]) >= 4 &&
        mb_strlen($_POST["name"]) <= 56
    ) {
        $updateCountry  = $model->update($_POST, $id);

        if ($updateCountry) {

            $_SESSION["success_message"] = "Country updated successfully";
            header("Location: " . ROOT . "/admin/countries/");
            exit();
        } else {
            $_SESSION["error_message"] = "There was an error updating the country. Please try again";
        }
    } else {
        $_SESSION["error_message"] = "Fill all the fields correctly";
    }
}

require("views/admin/update-country.php");
