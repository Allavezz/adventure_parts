<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product["product_name"], ENT_QUOTES, 'UTF-8') ?> - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php require("templates/header.php"); ?>

    <main>
        <section class="product-hero" style="background-image: url('/images/products/hero/<?= htmlspecialchars($productHero["hero_image_url"], ENT_QUOTES, 'UTF-8') ?>')">
            <div class="product-hero__content">
                <?php

                $stock = htmlspecialchars($product["stock"], ENT_QUOTES, 'UTF-8');

                if ($stock < 1) {
                    echo '
                        <span class="product-hero__stock product-hero__stock--empty">Out of Stock</span>
                    ';
                } else {
                    echo '
                        <span class="product-hero__stock">' . $stock . ' in stock</span>
                    ';
                }
                ?>
                <h2 class="product-hero__title"><?= htmlspecialchars($product["product_name"], ENT_QUOTES, 'UTF-8') ?></h2>
                <a href="" class="product-hero__link btn">Order now for €<?= htmlspecialchars($product["price"], ENT_QUOTES, 'UTF-8') ?></a>
            </div>
        </section>

        <section class="product-description sc-padding-b">
            <div class="product-description__container">
                <h2 class="product-description__title title">
                    <span><?= htmlspecialchars($product["product_name"], ENT_QUOTES, 'UTF-8') ?></span>
                    <br>
                    <strong>features and benefits</strong>
                </h2>
                <div class="product-description__content">

                </div>
            </div>
        </section>
    </main>

    <?php require("templates/footer.php"); ?>
</body>

</html>