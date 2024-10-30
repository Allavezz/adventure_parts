<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Country - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="update-country admin-layout sc-padding-b">
        <h2 class="title">Update Country</h2>

        <?php
        if (isset($message)) {
            echo '<p role="alert">' . $message . '</p>';
        }
        ?>

        <div class="update-country__form-container sc-padding-b">

            <form method="POST" action="<?= ROOT ?>/admin/update-country/<?= $country["code"] ?>">
                <div class="register__field">
                    <label for="update_code">Code</label>
                    <span>Two letters code. Uppercase only</span>
                    <input type="text" name="code" id="update_code" minlength="2" maxlength="2" required placeholder="<?= $country["code"] ?>">
                </div>
                <div class="register__field">
                    <label for="update_name">Code</label>
                    <input type="text" name="name" id="update_name" minlength="4" maxlength="56" required placeholder="<?= $country["name"] ?>">
                </div>
                <div class="register__submit">
                    <button class="btn btn-blue" type="submit" name="update">Update</button>
                </div>
            </form>

        </div>

    </main>

</body>

</html>