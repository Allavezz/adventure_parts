<aside class="admin-nav">
    <div class="admin-nav__container">

        <h2><a href="<?= ROOT ?>/">Adventure Parts</a></h2>

        <nav>
            <ul>
                <li><a href="<?= ROOT ?>/admin/">Dashboard</a></li>
                <li><a href="<?= ROOT ?>/admin/contact-queries/">Contact Queries</a></li>
                <li><a href="<?= ROOT ?>/admin/orders/">Orders</a></li>
                <li><a href="<?= ROOT ?>/admin/users/">Users</a></li>
                <li><a href="<?= ROOT ?>/admin/about">About Section</a></li>
                <li><a href="<?= ROOT ?>/admin/categories/">Categories</a></li>
                <li><a href="<?= ROOT ?>/admin/products/">Products</a></li>
                <li><a href="<?= ROOT ?>/admin/countries/">Countries</a></li>
                <li><a href="<?= ROOT ?>/admin/admins/">Admins</a></li>
                <li><a href="<?= ROOT ?>/admin/logout/">Logout</a></li>
            </ul>
        </nav>
        <div class="admin-nav__employee">
            <span><?= $_SESSION["name"] ?></span>
            <span>Employee N. <?= $_SESSION["employee_number"] ?></span>
            <span><?= $_SESSION["email"] ?></span>
        </div>

    </div>
</aside>