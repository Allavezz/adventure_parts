<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($category["category_name"], ENT_QUOTES, 'UTF-8') ?> - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="/js/productsGallery.js"></script>
</head>

<body>
    <?php require("templates/header.php"); ?>

    <main>

        <!-- Category Navigation -->
        <section class="category sc-padding">
            <div class="category__container">
                <h2 class="title">Choose your bike</h2>
                <div class="category__nav">
                    <?php

                    foreach ($categories as $categories) {
                        $categoriesName = htmlspecialchars($categories["category_name"], ENT_QUOTES, 'UTF-8');
                        $categoriesSlug = htmlspecialchars($categories["category_slug"], ENT_QUOTES, 'UTF-8');

                        // Add active class if the category slug matches the current one
                        $btnActive = ($category["category_slug"] === $categoriesSlug) ? 'btn-active' : '';

                        echo '
                            <a href="' . ROOT . '/categories/' . $categoriesSlug . '" class="btn-sec ' . $btnActive . ' ">' . $categoriesName . '
                            </a>
                        ';
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Producs Section -->
        <section class="products sc-padding-b">
            <div class="products__container">
                <h2 class="title"><?= htmlspecialchars($category["category_name"], ENT_QUOTES, 'UTF-8') ?></h2>
                <div class="products__gallery">
                    <?php
                    foreach ($products as $product) {
                        $productName = htmlspecialchars($product["product_name"], ENT_QUOTES, 'UTF-8');
                        $productSlug = htmlspecialchars($product["product_slug"], ENT_QUOTES, 'UTF-8');
                        $productImage = htmlspecialchars($product["product_image"], ENT_QUOTES, 'UTF-8');

                        echo '
                            <div class="products__card">
                                <a href="' . ROOT . '/products/' . $productSlug . '">
                                    <div class="products__image">
                                        <img src="/images/products/thumbnail/' . $productImage . '" alt="' . $productName . '"/>
                                    </div>
                                    <div class="products__text">
                                        <h3 class="products__title">' . $productName . '</h3>
                                        <h4 class="products__cta">Explore this part</h4>
                                    </div>
                                </a>
                            </div>
                        ';
                    }
                    ?>
                </div>
                <div class="products__pagination"></div>
            </div>
        </section>
    </main>

    <?php require("templates/footer.php"); ?>
</body>

</html>