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

    <main class="admin-layout sc-padding-b">
        <h2 class="title">Add a new admin</h2>
        <form method="POST" action="<?= ROOT ?>/admin/create-admin">
            <div class="register__field">
                <label for="name ">Name</label>
                <input type="text" name="name" minlength="3" maxlength="60" required>
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
                <button class="btn" type="submit" name="create">Create</button>
            </div>
        </form>

        <?php
        if (isset($message)) {
            echo '<p role="alert">' . $message . '</p>';
        }
        ?>
    </main>

</body>

</html>