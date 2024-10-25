<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product["product_name"] ?> - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="sc-padding-b admin-layout">

        <section class="admin-product-hero">

            <h2 class="admin-product-hero__title title">Hero Section</h2>

            <div class="admin-product-hero__container sc-padding-b">
                <div class="product-hero admin-product-hero__hero" style="background-image: url('/images/products/hero/<?= $productHero["hero_image_url"] ?>')">
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
                        <p href="<?= ROOT ?>/cart/?add-to-cart=<?= $product["product_slug"] ?>" class="product-hero__link btn">Order now for €<?= $product["price"] ?></p>
                    </div>
                </div>

                <?php
                if (!empty($productHero)) {
                    echo '
                        <form class="admin-product-hero__add-form" action="' . ROOT . '/admin/product/' . $product["product_slug"] . '" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="current_image" value="' . $productHero["hero_image_url"] . '">
                            <label for="product_hero_new_image">Upload an Image</label>
                            <span>Requirements: <br> Unique Name <br> 2000x600 <br> Max size 2MB <br> JPEG only</span>
                            <input type="file" name="new_image" id="product_hero_new_image">
                            <button class="btn btn-blue" type="submit" name="update-hero">Update</button>
                        </form>
                    ';
                } else {
                    echo '
                        <form class="admin-product-hero__add-form" action="' . ROOT . '/admin/product/' . $product["product_slug"] . '" method="POST" enctype="multipart/form-data">
                            <label for="product_hero_new_image1">Upload an Image</label>
                            <span>Requirements: <br> Unique Name <br> 2000x600 <br> Max size 2MB <br> JPEG only</span>
                            <input type="file" name="new_image" id="product_hero_new_image1">
                            <button class="btn btn-blue" type="submit" name="add-hero">Add</button>
                        </form>
                    ';
                }

                ?>
            </div>

        </section>

    </main>

</body>

</html>