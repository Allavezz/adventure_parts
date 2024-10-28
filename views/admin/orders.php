<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="sc-padding-b admin-layout">

        <section class="orders">

            <h2 class="orders__title title">Recent Orders</h2>

            <div class="orders__container sc-padding-b">

                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User ID</th>
                            <th>User Email</th>
                            <th>Order Date</th>
                            <th>Total Price</th>
                            <th>Payment Reference</th>
                            <th>Payment</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($recentOrders as $order) {
                            echo '
                                <tr>
                                    <td>' . $order["order_id"] . '</td>
                                    <td>' . $order["user_id"] . '</td>
                                    <td>' . $order["email"] . '</td>
                                    <td>' . $order["order_date"] . '</td>
                                    <td>' . number_format($order["total_price"], 2) . '</td>
                                    <td>' . $order["payment_reference"] . '</td>
                                    <td>Pending</td>
                                    <td>
                                        <a class="btn btn-blue btn--small" href="' . ROOT . '/admin/update-payment/' . $order["order_id"] . '">Update Payment</a>
                                        <a class="btn btn--small" href="' . ROOT . '/admin/delete-unpaid-order/' . $order["order_id"] . '">Delete Order</a>
                                    </td>
                                </tr>
                            ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <?php
            if (isset($error)) {
                echo '<p role="alert">' . $error . '</p>';
            }
            ?>

        </section>

        <section class="paid_orders">

        </section>

    </main>

</body>

</html>