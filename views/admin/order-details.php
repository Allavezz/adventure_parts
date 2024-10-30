<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="order-details sc-padding-b admin-layout">

        <h2 class="order-details__title title">Order Details</h2>

        <div class="order-details__container sc-padding-b">
            <div>

                <h3>Order Details</h3>

                <dl>
                    <dt>Order ID:</dt>
                    <dd><?= $orderDetails[0]["order_id"] ?></dd>
                    <dt>Order Date:</dt>
                    <dd><?= $orderDetails[0]["order_date"] ?></dd>
                    <dt>Payment Date:</dt>
                    <?php
                    if (isset($orderDetails[0]["payment_date"])) {
                        echo '
                            <dd>' . $orderDetails[0]["payment_date"] . '</dd>
                    ';
                    } else {
                        echo '
                            <dd>Pending</dd>
                        ';
                    }
                    ?>
                    <dt>Shipping Date:</dt>
                    <?php
                    if (isset($orderDetails[0]["shipping_date"])) {
                        echo '
                            <dd>' . $orderDetails[0]["shipping_date"] . '</dd>
                        ';
                    } else {
                        echo '
                            <dd>Pending</dd>
                        ';
                    }
                    ?>
                    <dt>Delivered Date:</dt>
                    <?php
                    if (isset($orderDetails[0]["delivered_date"])) {
                        echo '
                            <dd>' . $orderDetails[0]["delivered_date"] . '</dd>
                        ';
                    } else {
                        echo '
                            <dd>Pending</dd>
                        ';
                    }
                    ?>
                    <dt>Payment Reference:</dt>
                    <dd><?= $orderDetails[0]["payment_reference"] ?></dd>
                </dl>
            </div>
            <div>

                <h3>Costumer Details</h3>

                <dl>
                    <dt>User ID:</dt>
                    <dd><?= $orderDetails[0]["user_id"] ?></dd>
                    <dt>User Name:</dt>
                    <dd><?= $orderDetails[0]["name"] ?></dd>
                    <dt>Email:</dt>
                    <dd><?= $orderDetails[0]["name"] ?></dd>
                    <dt>Street Address:</dt>
                    <dd><?= $orderDetails[0]["street_address"] ?></dd>
                    <dt>City:</dt>
                    <dd><?= $orderDetails[0]["city"] ?></dd>
                    <dt>Postal Code:</dt>
                    <dd><?= $orderDetails[0]["postal_code"] ?></dd>
                    <dt>Country:</dt>
                    <dd><?= $orderDetails[0]["country"] ?></dd>
                    <dt>Phone Number:</dt>
                    <dd><?= $orderDetails[0]["phone"] ?></dd>
                </dl>
            </div>
            <div>

                <h3>Products Details</h3>

                <table>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price Each</th>
                            <th>Line Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($orderDetails as $detail) {
                            echo '
                                <tr>
                                    <td>' . $detail["product_name"] . '</td>
                                    <td>' . $detail["quantity"] . '</td>
                                    <td>€ ' . $detail["price_each"] . '</td>
                                    <td>€ ' . $detail["line_total"] . '</td>
                                </tr>
                            ';
                        }
                        ?>
                    </tbody>
                </table>

                <p>Total Price: € <?= number_format($totalOrderPrice, 2) ?></p>

            </div>
    </main>

</body>

</html>