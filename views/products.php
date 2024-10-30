<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product["product_name"] ?> - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php require("templates/header.php"); ?>

    <main>
        <section class="product-hero" style="background-image: url('/images/products/hero/<?= $productHero["hero_image_url"] ?>')">
            <div class="product-hero__content">
                <?php
                if ($product["stock"] < 1) {
                    echo '
                        <span class="product-hero__stock product-hero__stock--empty">Out of Stock</span>
                    ';
                } else {
                    echo '
                        <span class="product-hero__stock">' . $product["stock"] . ' in stock</span>
                    ';
                }
                ?>
                <h2 class="product-hero__title"><?= $product["product_name"] ?></h2>

                <?php
                if ($product["stock"] >= 1) {
                ?>
                    <a href="<?= ROOT ?>/cart/?add-to-cart=<?= $product["product_slug"] ?>" class="product-hero__link btn">Order now for €<?= $product["price"] ?></a>
                <?php
                }
                ?>

            </div>
        </section>

        <section class="product-description sc-padding-b">
            <div class="product-description__container">
                <h2 class="product-description__title title">
                    <span><?= $product["product_name"] ?></span>
                    <br>
                    <strong>features and benefits</strong>
                </h2>
                <div class="product-description__content">
                    <?php
                    foreach ($productDescriptions as $index => $description) {
                        $descriptionId = $description['product_descriptions_id'];
                        $descriptionContents = $contents[$descriptionId] ?? [];

                        $flexDirection = ($index % 2 === 0) ?
                            'product-description__item' : 'product-description__item product-description__item--reverse';
                    ?>
                        <div class="<?= $flexDirection ?>">
                            <div class="product-description__text">
                                <h3><?= $description["title"] ?></h3>
                                <?php
                                foreach ($descriptionContents as $content) {
                                    if ($content["content_type"] === 'paragraph') {
                                        $paragraphs = explode(";", $content["content"]);

                                        foreach ($paragraphs as $paragraph) {
                                            echo '<p class="text">' . $paragraph . '</p>';
                                        }
                                    } elseif ($content["content_type"] === 'list') {
                                        $list = explode(";", $content["content"]);

                                        echo '<ol>';
                                        foreach ($list as $listItem) {
                                            echo '<li class="text">' . $listItem . '</li>';
                                        }
                                        echo '</ol>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="product-description__image">
                                <img src="/images/products/description/<?= $description["image_url"] ?>" alt="<?= $description["image_alt"] ?>" />
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="product-cta sc-padding-b">
            <div class="product-cta__container sc-padding-b">
                <div class="product-cta__action">
                    <h2 class="title">Order the <span><?= $product["product_name"] ?></span> now.</h2>

                    <?php
                    if ($product["stock"] >= 1) {
                    ?>
                        <a href="<?= ROOT ?>/cart/?add-to-cart=<?= $product["product_slug"] ?>" class="btn">Order now for €<?= $product["price"] ?></a>
                    <?php
                    } else {
                        echo '
                        <span class="product-hero__stock product-hero__stock--empty">Out of Stock</span>
                    ';
                    }
                    ?>


                </div>
                <div class="product-cta__description">
                    <h3>It takes just a few seconds:</h3>
                    <ol>
                        <li>Click on the order button</li>
                        <li>Fill in your delivery address and production year of your bike</li>
                        <li>Choose credit card or PayPal payment</li>
                        <li>The package will be shipped usually within three working days all around the world with tracking number</li>
                    </ol>
                </div>
            </div>
            <div class="sc-padding product-cta__icons">
                <div class="product-cta__icon">
                    <i class="fa-regular fa-calendar-check"></i>
                    <span>In stock now</span>
                </div>
                <div class="product-cta__icon">
                    <i class="fa-solid fa-earth-asia"></i>
                    <span>We ship worldwide</span>
                </div>
                <div class="product-cta__icon">
                    <i class="fa-solid fa-money-check-dollar"></i>
                    <span>100% money back guarantee</span>
                </div>
            </div>
        </section>
    </main>



    <?php require("templates/footer.php"); ?>
</body>

</html>