<?php

require("models/countries.php");
require("models/categories.php");

$modelCountries = new Countries();
$modelCategories = new Categories();

$countries = $modelCountries->getAll();
$categories = $modelCategories->getAll();

$validCountries = array_column($countries, "name");
$validCategories = array_column($categories, "category_name");

$validTopics = [
    "shipping",
    "pre-sale_query",
    "missing",
    "mounting",
    "compatibility",
    "product_availability",
    "product_defect",
    "payment_issues",
    "dealers",
    "spare_parts",
    "claim",
    "refund",
    "other"
];

if (isset($_POST["send"])) {

    foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars(strip_tags(trim($value)));
    }

    if (
        !empty($_POST["topic"]) &&
        in_array($_POST["topic"], $validTopics) &&
        !empty($_POST["description"]) &&
        mb_strlen($_POST["description"]) >= 10 &&
        mb_strlen($_POST["description"]) <= 65535 &&
        (empty($_POST["category"]) || in_array($_POST["category"], $validCategories)) &&
        (empty($_POST["year"]) || (is_numeric($_POST["year"]) && mb_strlen($_POST["year"]) == 4)) &&
        (empty($_POST["order"]) || (is_numeric($_POST["order"]) && mb_strlen($_POST["order"]) >= 1 && mb_strlen($_POST["order"]) <= 20)) &&
        !empty($_POST["email"]) &&
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
        (empty($_POST["country"]) || (in_array($_POST["country"], $validCountries)))
    ) {

        require("models/contacts.php");
        $modelContacts = new Contacts();

        if (empty($_POST['category'])) $_POST['category'] = null;
        if (empty($_POST['year'])) $_POST['year'] = null;
        if (empty($_POST['order'])) $_POST['order'] = null;
        if (empty($_POST['country'])) $_POST['country'] = null;

        $createContact = $modelContacts->create($_POST);

        if ($createContact) {

            $_SESSION["success_message"] = "Form submitted successfully";
            header("Location: " . ROOT . "/");
            exit();
        } else {

            $message = "There was an error submitting the form. Please try again later";
        }
    } else {

        $message = "Fill all the fields correctly";
    }
}

require("views/contact.php");
