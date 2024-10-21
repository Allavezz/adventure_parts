<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="create-admin admin-layout sc-padding-b">
        <h2 class="title">Add a new admin</h2>

        <?php
        if (isset($_SESSION["error_message"])) {
            echo '
                    <div>
                        <span>' . $_SESSION["error_message"] . '</span>
                    </div>      
                ';
            unset($_SESSION["error_message"]);
        }
        ?>

        <div class="create-admin__form-container sc-padding-b">
            <form method="POST" action="<?= ROOT ?>/admin/create-admin">
                <div class="register__field">
                    <label for="name ">Name</label>
                    <input type="text" name="name" minlength="3" maxlength="60" required>
                </div>
                <div class="register__field">
                    <label for="employee_number ">Employee Number</label>
                    <input type="text" name="employee_number" minlength="9" maxlength="9" required>
                </div>
                <div class="register__field">
                    <label for="email">Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="register__field">
                    <label for="password">Password</label>
                    <input type="password" name="password" minlength="8" maxlength="1000">
                </div>
                <div class="register__field">
                    <label for="password_confirm">Confirm Password</label>
                    <input type="password" name="password_confirm" minlength="8" maxlength="1000" required>
                </div>
                <div class="register__submit">
                    <button class="btn btn-blue btn--small" type="submit" name="create">Create</button>
                </div>
            </form>

        </div>

    </main>

</body>

</html>