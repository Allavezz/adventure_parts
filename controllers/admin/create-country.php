<?php

if (!isset($_SESSION["admin_id"])) {

    header("Location: " . ROOT . "/admin/login");
    exit();
}

if (isset($_POST["create"])) {

    if (
        !empty($_POST["code"]) &&
        !empty($_POST["name"]) &&
        ctype_upper($_POST["code"]) &&
        mb_strlen($_POST["code"]) == 2 &&
        mb_strlen($_POST["name"]) >= 4 &&
        mb_strlen($_POST["name"]) <= 56
    ) {
        require("models/countries.php");
        $model = new Countries();
        $country = $model->get($_POST["code"]);

        if (empty($country)) {
            $createCountry = $model->create($_POST);

            if ($createCountry) {

                $_SESSION["success_message"] = "Country created successfully";
                header("Location: " . ROOT . "/admin/countries");
                exit();
            } else {

                $message = "There was an error creating the country. Please try again.";
            }
        } else {

            $message = "This country already exists";
        }
    } else {

        $message = "Fill all the fields correctly";
    }
}


require("views/admin/create-country.php");
