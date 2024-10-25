<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login/");
    exit();
}

if (empty($id) || !is_numeric($id)) {
    http_response_code(400);
    include("controllers/error.php");
    exit();
}

require("models/users.php");
require("models/countries.php");

$modelCountries = new Countries();
$countries = $modelCountries->getAll();
foreach ($countries as $country) {
    $country_codes[] = $country["code"];
}

$modelUsers = new Users();
$user = $modelUsers->get($id);

if (empty($user)) {
    http_response_code(404);
    include("controllers/error.php");
    exit();
}

if (isset($_POST["update"])) {

    if (
        !empty($_POST["name"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["street_address"]) &&
        !empty($_POST["city"]) &&
        !empty($_POST["postal_code"]) &&
        !empty($_POST["country"]) &&
        !empty($_POST["phone"]) &&
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
        $_POST["password"] === $_POST["password_confirm"] &&
        mb_strlen($_POST["name"]) >= 3 &&
        mb_strlen($_POST["name"]) <= 60 &&
        mb_strlen($_POST["password"]) >= 8 &&
        mb_strlen($_POST["password"]) <= 1000 &&
        mb_strlen($_POST["street_address"]) >= 8 &&
        mb_strlen($_POST["street_address"]) <= 120 &&
        mb_strlen($_POST["postal_code"]) >= 4 &&
        mb_strlen($_POST["postal_code"]) <= 20 &&
        mb_strlen($_POST["city"]) >= 3 &&
        mb_strlen($_POST["city"]) <= 50 &&
        mb_strlen($_POST["phone"]) >= 9 &&
        mb_strlen($_POST["phone"]) <= 30 &&
        in_array($_POST["country"], $country_codes)
    ) {
        $updateUser = $modelUsers->update($_POST, $id);

        if ($updateUser) {

            $_SESSION["success_message"] = "User updated successfully";
            header("Location: " . ROOT . "/admin/users/");
            exit();
        } else {

            $_SESSION["error_message"] = "There was an error updating the user. Please try again";
        }
    } else {

        $_SESSION["error_message"] = "Fill all the fields correctly";
    }
}


require("views/admin/update-user.php");
