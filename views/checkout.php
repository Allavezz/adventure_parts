<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/header.php"); ?>

    <main class="checkout sc-padding-b">
        <h1 class="title">Order placed successfully</h1>
        <p>Please dont leave this page without saving your Order Details!</p>
        <p>Unpaid Orders will be deleted after 24 hours!</p>

        <h2>Order Details</h2>
        <dl>
            <dt>Order Number</dt>
            <dd><?= $order_id ?></dd>
            <dt>Payment Reference</dt>
            <dd><?= $payment_reference ?></dd>
            <dt>Total</dt>
            <dd><?= $total ?>€</dd>
        </dl>
    </main>

    <?php require("templates/footer.php"); ?>
</body>

</html>