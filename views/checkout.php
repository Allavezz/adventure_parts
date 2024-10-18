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

    <main>
        <h1>Compra Efetuada com Sucesso</h1>
        <dl>
            <dt>Número Encomenda</dt>
            <dd><?= $order_id ?></dd>
            <dt>Referencia pagamento</dt>
            <dd><?= $payment_reference ?></dd>
            <dt>Total a pagar</dt>
            <dd><?= $total ?>€</dd>
        </dl>

    </main>

    <?php require("templates/footer.php"); ?>
</body>

</html>