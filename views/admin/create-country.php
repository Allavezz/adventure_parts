<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Country - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php"); ?>

    <main class="create-country sc-padding-b admin-layout">

        <h2 class="title">Add a new country</h2>

        <?php
        if (isset($message)) {
            echo '<p role="alert">' . $message . '</p>';
        }
        ?>
        <div class="create-country__form-container sc-padding-b">
            <form method="POST" action="<?= ROOT ?>/admin/create-country">
                <div class="register__field">
                    <label for="create_code">Country Code</label>
                    <span>Two letters code. Uppercase only</span>
                    <input type="text" name="code" id="create_code" minlength="2" maxlength="2" required>
                </div>
                <div class="register__field">
                    <label for="create_name">Country Name</label>
                    <input type="text" id="create_name" name="name" minlength="4" maxlength="56">
                </div>
                <div class="register__submit">
                    <button class="btn btn-blue btn--small" type="submit" name="create">Create</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>