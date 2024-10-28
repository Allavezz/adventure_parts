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
                                    <td>€ ' . number_format($order["total_price"], 2) . '</td>
                                    <td>' . $order["payment_reference"] . '</td>
                                    <td>Pending</td>
                                    <td>
                                        <a class="btn btn-blue btn--small" href="' . ROOT . '/admin/order-details/' . $order["order_id"] . '">See Details</a>
                                        <a class="btn btn-blue btn--small" href="' . ROOT . '/admin/update-payment/' . $order["order_id"] . '">Update Payment</a>
                                        <a class="btn btn--small" href="' . ROOT . '/admin/delete-order/' . $order["order_id"] . '">Delete Order</a>
                                    </td>
                                </tr>
                            ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </section>

        <section class="paid-orders">

            <h2 class="paid-orders__title title">Paid Orders</h2>

            <div class="paid-orders__container sc-padding-b">

                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User ID</th>
                            <th>User Email</th>
                            <th>Order Date</th>
                            <th>Payment Date</th>
                            <th>Shipping</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($paidOrders as $order) {
                            echo '
                                <tr>
                                    <td>' . $order["order_id"] . '</td>
                                    <td>' . $order["user_id"] . '</td>
                                    <td>' . $order["email"] . '</td>
                                    <td>' . $order["order_date"] . '</td>
                                    <td>' . $order["payment_date"] . '</td>
                                    <td>Pending</td>
                                    <td>
                                        <a class="btn btn-blue btn--small" href="' . ROOT . '/admin/order-details/' . $order["order_id"] . '">See Details</a>
                                        <a class="btn btn-blue btn--small" href="' . ROOT . '/admin/update-shipping/' . $order["order_id"] . '">Update Shipping</a>
                                        <a class="btn btn--small" href="' . ROOT . '/admin/delete-order/' . $order["order_id"] . '">Delete Order</a>
                                    </td>
                                </tr>
                            ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="shipped-orders">

            <h2 class="shipped-orders__title title">Shipped Orders</h2>

            <div class="shipped-orders__container sc-padding-b">

                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User ID</th>
                            <th>User Email</th>
                            <th>Order Date</th>
                            <th>Payment Date</th>
                            <th>Shipping Date</th>
                            <th>Delivered Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($shippedOrders as $order) {
                            echo '
                                <tr>
                                    <td>' . $order["order_id"] . '</td>
                                    <td>' . $order["user_id"] . '</td>
                                    <td>' . $order["email"] . '</td>
                                    <td>' . $order["order_date"] . '</td>
                                    <td>' . $order["payment_date"] . '</td>
                                    <td>' . $order["shipping_date"] . '</td>
                                ';

                            if ($order["delivered_date"] !== NULL) {
                                echo '
                                    <td>' . $order["delivered_date"] . '</td>
                                ';
                            } else {
                                echo '
                                    <td>Pending</td>
                                ';
                            }

                            echo '
                                    <td>
                                        <a class="btn btn-blue btn--small" href="' . ROOT . '/admin/order-details/' . $order["order_id"] . '">See Details</a>
                                ';

                            if ($order["delivered_date"] !== NULL) {
                                echo '
                                    <a class="btn btn--small" href="' . ROOT . '/admin/delete-order/' . $order["order_id"] . '">Close Order</a>
                                ';
                            } else {
                                echo '
                                    <a class="btn btn-blue btn--small" href="' . ROOT . '/admin/update-delivering/' . $order["order_id"] . '">Update Delivering</a>
                                    <a class="btn btn--small" href="' . ROOT . '/admin/close-order/' . $order["order_id"] . '">Delete Order</a>
                                ';
                            }

                            echo '
                                        
                                    </td>
                                </tr>
                            ';
                        }
                        ?>
                    </tbody>

        </section>

    </main>

</body>

</html>