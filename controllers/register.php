<?php

require("models/countries.php");

$modelCountries = new Countries();
$countries = $modelCountries->getAll();

$country_codes = [];
foreach ($countries as $country) {
    $country_codes[] = $country["code"];
}

// Register Form Validation
if (isset($_POST["send"])) {

    // Sanitization for all the fields
    foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars(strip_tags(trim($value)));
    }

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

        require("models/users.php");
        $model = new Users();
        $user = $model->getByEmail($_POST["email"]);

        if (empty($user)) {
            $createUser = $model->create($_POST);

            $_SESSION["user_id"] = $createUser["user_id"];
            header("Location: " . ROOT . "/cart/");
            exit();
        } else {
            $message = "This email is already in use";
        }
    } else {
        $message = "Fill all the fields correctly";
    }
}

require("views/register.php");
