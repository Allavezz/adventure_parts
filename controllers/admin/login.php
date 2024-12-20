<?php

if (isset($_POST["send"])) {

    $csrf_token = $_POST['csrf_token'] ?? '';
    if (!validate_csrf_token($csrf_token)) {
        die("CSRF validation failed");
    }


    foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars(strip_tags(trim($value)));
    }

    if (
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
        mb_strlen($_POST["password"]) >= 8 &&
        mb_strlen($_POST["password"]) <= 1000
    ) {

        require("models/admins.php");
        $model = new Admins();
        $admin = $model->getByEmail($_POST["email"]);

        if (
            !empty($admin) &&
            password_verify($_POST["password"], $admin["password"])
        ) {
            $_SESSION["admin_id"] = $admin["admin_id"];
            $_SESSION["name"] = $admin["name"];
            $_SESSION["employee_number"] = $admin["employee_number"];
            $_SESSION["email"] = $admin["email"];

            header("Location: " . ROOT . "/admin/");
            exit();
        } else {
            $message = "Incorrect Email or Password";
        }
    } else {
        $message = "Fill all the fields correctly";
    }
}

require("views/admin/login.php");
