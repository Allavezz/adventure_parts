<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="update-user admin-layout sc-padding-b">

        <h2 class="title">Update User</h2>

        <div class="update-user__form-container sc-padding-b">
            <?php
            if (isset($message)) {
                echo '<p role="alert">' . $message . '</p>';
            }
            ?>
            <form method="POST" action="<?= ROOT ?>/admin/update-user/<?= $user["user_id"] ?>">
                <div class="register__field">
                    <label for="name ">Name</label>
                    <input type="text" name="name" minlength="3" maxlength="60" required placeholder="<?= $user["name"] ?>">
                </div>
                <div class="register__field">
                    <label for="email">Email</label>
                    <input type="email" name="email" required placeholder="<?= $user["email"] ?>">
                </div>
                <div class="register__field">
                    <label for="password">Password</label>
                    <input type="password" name="password" minlength="8" maxlength="1000" placeholder="********">
                </div>
                <div class="register__field">
                    <label for="password_confirm">Password Confirm</label>
                    <input type="password" name="password_confirm" minlength="8" maxlength="1000" required placeholder="*********">
                </div>
                <div class="register__field">
                    <label for="street_address"> Street Address</label>
                    <input type="text" name="street_address" minlength="8" maxlength="120" placeholder="<?= $user["street_address"] ?>">
                </div>
                <div class="register__field">
                    <label for="city">City</label>
                    <input type="text" name="city" minlength="3" maxlength="50" placeholder="<?= $user["city"] ?>">
                </div>
                <div class="register__field">
                    <label for="postal_code">Postal Code</label>
                    <input type="text" name="postal_code" placeholder="<?= $user["postal_code"] ?>" minlength="4" maxlength="20">
                </div>
                <div class="register__field">
                    <label for="country">Country</label>
                    <select name="country">
                        <?php
                        foreach ($countries as $country) {
                            $selected = $user["country"] === $country["code"] ? "selected" : "";
                            echo '
                                        <option value="' . $country["code"] . '" ' . $selected . '>' . $country["name"] . '</option>
                                    ';
                        }
                        ?>
                    </select>
                </div>
                <div class="register__field">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" minlength="9" maxlength="30" placeholder="<?= $user["phone"] ?>">
                </div>
                <div class="register__submit">
                    <button class="btn btn-blue" type="submit" name="update">Update</button>
                </div>
            </form>
        </div>
    </main>

</body>

</html>