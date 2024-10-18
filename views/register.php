<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/header.php"); ?>

    <section class="register sc-padding-b">
        <?php
        if (isset($message)) {
            echo '<p role="alert">' . $message . '</p>';
        }
        ?>

        <div class="register__container">
            <h1 class="title">Register</h1>
            <div class="register__form">

                <form method="POST" action="<?= ROOT ?>/register/">
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
                        <label for="password_confirm">Password Confirm</label>
                        <input type="password" name="password_confirm" minlength="8" maxlength="1000" required>
                    </div>
                    <div class="register__field">
                        <label for="street_address"> Street Address</label>
                        <input type="text" name="street_address" minlength="8" maxlength="120">
                    </div>
                    <div class="register__field">
                        <label for="city">City</label>
                        <input type="text" name="city" minlength="3" maxlength="50">
                    </div>
                    <div class="register__field">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" name="postal_code">
                    </div>
                    <div class="register__field">
                        <label for="country">Country</label>
                        <select name="country">
                            <?php
                            foreach ($countries as $country) {
                                $selected = $country["code"] === "PT" ? "selected" : "";
                                echo '
                                        <option value="' . $country["code"] . '" ' . $selected . '>' . $country["name"] . '</option>
                                    ';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="register__field">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" minlength="9" maxlength="30">
                    </div>
                    <div class="register__submit">
                        <button class="btn" type="submit" name="send">Register</button>
                    </div>
                </form>

            </div>
        </div>
    </section>

    <?php require("templates/footer.php"); ?>

</body>

</html>