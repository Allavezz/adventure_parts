<header class="header">
    <div class="header__container">
        <h2 class="header__logo"><a href="<?= ROOT ?>/">Adventure/Parts</a></h2>
        <nav class="header__nav">
            <ul class="header__nav-links">
                <li><a href="<?= ROOT ?>/categories/all">Parts</a></li>
                <li><a href="support.html">Support</a></li>
                <?php
                if (isset($_SESSION["user_id"])) {
                    echo '
                        <li><a href="' . ROOT . '/logout/"> Logout</a></li>
                    ';
                } else {
                    echo '
                        <li><a href="' . ROOT . '/login/">Login</a></li>
                    ';
                }
                ?>
                <li><a href="<?= ROOT ?>/cart/">Cart</a></li>
            </ul>
        </nav>
    </div>
</header>