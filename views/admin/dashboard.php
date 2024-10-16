<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="dashboard sc-padding-b admin-layout">
        <h1>Dashboard</h1>
        <div class="dashboard__stats">
            <div class="dashboard__item-wrapper">
                <div class="dashboard__count">
                    <span><?= $usersCount ?></span>
                </div>
                <div class="dashboard__item-name">
                    <span>Users</span>
                </div>
            </div>
            <div class="dashboard__item-wrapper">
                <div class="dashboard__count">
                    <span><?= $countriesCount ?></span>
                </div>
                <div class="dashboard__item-name">
                    <span>Countries</span>
                </div>
            </div>
            <div class="dashboard__item-wrapper">
                <div class="dashboard__count">
                    <span><?= $categoriesCount ?></span>
                </div>
                <div class="dashboard__item-name">
                    <span>Categories</span>
                </div>
            </div>
            <div class="dashboard__item-wrapper">
                <div class="dashboard__count">
                    <span><?= $productsCount ?></span>
                </div>
                <div class="dashboard__item-name">
                    <span>Products</span>
                </div>
            </div>
            <div class="dashboard__item-wrapper">
                <div class="dashboard__count">
                    <span><?= $ordersCount ?></span>
                </div>
                <div class="dashboard__item-name">
                    <span>Orders</span>
                </div>
            </div>
            <div class="dashboard__item-wrapper">
                <div class="dashboard__count">
                    <span><?= $categoriesCount ?></span>
                </div>
                <div class="dashboard__item-name">
                    <span>Admins</span>
                </div>
            </div>
        </div>
    </main>

</body>

</html>