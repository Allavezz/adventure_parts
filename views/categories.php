<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $category["category_name"] ?> - Adventure Parts</title>
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

                        // Add active class if the category slug matches the current one
                        $btnActive = ($category["category_slug"] === $categories["category_slug"]) ? 'btn-active' : '';

                        echo '
                            <a href="' . ROOT . '/categories/' . $categories["category_slug"] . '" class="btn-sec ' . $btnActive . ' ">' . $categories["category_name"] . '
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
                <h2 class="title"><?= $category["category_name"] ?></h2>
                <div class="products__gallery">
                    <?php
                    foreach ($products as $product) {
                        echo '
                            <div class="products__card">
                                <a href="' . ROOT . '/products/' . $product["product_slug"] . '">
                                    <div class="products__image">
                                        <img src="/images/products/thumbnail/' . $product["product_image"] . '" alt="' . $product["product_name"] . '"/>
                                    </div>
                                    <div class="products__text">
                                        <h3 class="products__title">' . $product["product_name"] . '</h3>
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