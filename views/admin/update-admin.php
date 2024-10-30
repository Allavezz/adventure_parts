<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="update-admin admin-layout sc-padding-b">
        <h2 class="title">Update Admin</h2>

        <div class="update-admin__form-container sc-padding-b">

            <?php
            if (isset($message)) {
                echo '<p role="alert">' . $message . '</p>';
            }
            ?>

            <form method="POST" action="<?= ROOT ?>/admin/update-admin/<?= $admin['admin_id'] ?>">
                <div class="register__field">
                    <label for="name ">Name</label>
                    <input type="text" name="name" minlength="3" maxlength="60" required placeholder="<?= $admin["name"] ?>">
                </div>
                <div class="register__field">
                    <label for="employee_number ">Employee Number</label>
                    <input type="text" name="employee_number" minlength="9" maxlength="9" required placeholder="<?= $admin["employee_number"] ?>">
                </div>
                <div class="register__field">
                    <label for="email">Email</label>
                    <input type="email" name="email" required placeholder="<?= $admin["email"] ?>">
                </div>
                <div class="register__field">
                    <label for="password">Password</label>
                    <input type="password" name="password" minlength="8" maxlength="1000" placeholder="********">
                </div>
                <div class="register__field">
                    <label for="password_confirm">Confirm Password</label>
                    <input type="password" name="password_confirm" minlength="8" maxlength="1000" required placeholder="********">
                </div>
                <div class="register__submit">
                    <button class="btn btn-blue" type="submit" name="update">Update</button>
                </div>
            </form>
        </div>

    </main>

</body>

</html>