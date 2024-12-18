<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/header.php"); ?>

    <section class="login  sc-padding-b">
        <?php
        if (isset($message)) {
            echo '<p role="alert">' . $message . '</p>';
        }
        ?>
        <div class="login__container">

            <h1 class="title">Login</h1>

            <div class="login__form">
                <form method="POST" action="<?= ROOT ?>/login/">
                    <?php echo csrf_token_field(); ?>
                    <div class="login__field">
                        <label for="email">Email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="login__field">
                        <label for="password">Password</label>
                        <input type="password" name="password" minlength="8" maxlength="1000" required>
                    </div>
                    <div class="login__submit">
                        <button class="btn" type="submit" name="send">Login</button>
                    </div>
                </form>
                <div class="login__signup">
                    <span>Don't have account?</span>
                    <a href="<?= ROOT ?>/register/">Sign Up</a>
                </div>
            </div>
        </div>
    </section>

    <?php require("templates/footer.php"); ?>
</body>

</html>