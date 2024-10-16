<?php

if (isset($_POST["create"])) {

    if (
        !empty($_POST["name"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
        $_POST["password"] === $_POST["password_confirm"] &&
        mb_strlen($_POST["name"]) >= 3 &&
        mb_strlen($_POST["name"]) <= 60 &&
        mb_strlen($_POST["password"]) >= 8 &&
        mb_strlen($_POST["password"]) <= 1000
    ) {
        require("models/admins.php");
        $model = new Admins();
        $admin = $model->getByEmail($_POST["email"]);

        if (empty($admin)) {
            $createAdmin = $model->create($_POST);

            $_SESSION["admin_id"] = $createAdmin["admin_id"];
            header("Location: " . ROOT . "/admin/admins");
            exit();
        } else {
            $message = "This email is already in use";
        }
    } else {
        $message = "Fill all the fields correctly";
    }
}

require("views/admin/create-admin.php");
