<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product["product_name"] ?> - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="/js/flashMessage.js"></script>
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="sc-padding-b admin-layout">

        <?php if (isset($_SESSION['success_message'])) {
            echo '
                    <div id="flash-message">' . $_SESSION['success_message'] . '</div>
                ';
            unset($_SESSION['success_message']);
        }
        ?>

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
                            <label for="product_hero_new_image">Update Hero</label>
                            <span>Requirements: <br> Unique Name <br> 2000x600 <br> Max size 2MB <br> JPEG only</span>
                            <input type="file" name="new_image" id="product_hero_new_image">
                            <button class="btn btn-blue" type="submit" name="update-hero">Update</button>
                        </form>
                    ';
                } else {
                    echo '
                        <form class="admin-product-hero__add-form" action="' . ROOT . '/admin/product/' . $product["product_slug"] . '" method="POST" enctype="multipart/form-data">
                            <label for="product_hero_new_image1">Add Hero</label>
                            <span>Requirements: <br> Unique Name <br> 2000x600 <br> Max size 2MB <br> JPEG only</span>
                            <input type="file" name="new_image" id="product_hero_new_image1">
                            <button class="btn btn-blue" type="submit" name="add-hero">Add</button>
                        </form>
                    ';
                }

                ?>

                <?php
                if (isset($bannerImageMessage)) {
                    echo '<p role="alert">' . $bannerImageMessage . '</p>';
                }
                ?>
            </div>



        </section>

        <section class="admin-product-description">

            <h2 class="admin-product-description__title title">Descriptions</h2>

            <div class="admin-product-description__container sc-padding-b">

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

                            <a class="btn btn--small admin-product-description__delete" href="<?= ROOT ?>/admin/delete-description/<?= $descriptionId ?>">Delete Description</a>
                        <?php
                        }
                        ?>

                        <?php if (isset($_SESSION['delete_description_message'])) {
                            echo '
                                <div id="flash-message">' . $_SESSION['delete_description_message'] . '</div>
                            ';
                            unset($_SESSION['delete_description_message']);
                        }
                        ?>
                    </div>
                    <div class="admin-product-description__create-form">

                        <h3>Add a new description</h3>

                        <form action="<?= ROOT ?>/admin/product/<?= $product["product_slug"] ?>" method="POST" enctype="multipart/form-data">

                            <label for="create-description-title">Title</label>
                            <input type="text" name="new_title" id="create_description-title" minlength="3" maxlength="255" required>

                            <label for="create-description-image">Image</label>
                            <input type="file" name="new_image" id="create-description-image" required>

                            <label for="create-description-alt">Image Alt</label>
                            <input type="text" name="new_alt" id="create_description-alt" minlength="3" maxlength="255" required>

                            <label for="create-description-order">Sort Order</label>
                            <input id="create-description-order" type="number" name="new_sort" min="0" max="99" required>

                            <div id="new-content-section">

                                <h4>Add Content</h4>

                                <div class="description-content-item">

                                    <label for="create-content-type">Content Type</label>
                                    <select name="new_content_type[]" id="create-content-type" required>
                                        <option value="paragraph">Paragraph</option>
                                        <option value="list">List</option>
                                    </select>

                                    <label for="create-content-text">Content (separate items by semicolon for lists)</label>
                                    <textarea name="new_content[]" id="create-content-text" required rows="10" cols="50"></textarea>

                                    <label for="create-content-order">Sort Order</label>
                                    <input id="create-content-order" type="number" name="new_content_sort[]" min="1" max="99" required>

                                </div>

                            </div>

                            <button class="btn- btn-blue btn--small" type="button" onclick="addNewContentItem()">Add more Content</button>

                            <button class="btn btn-blue" type="submit" name="create_description">Create Description</button>

                            <?php
                            if (isset($descriptionMessage)) {
                                echo '<p role="alert">' . $descriptionMessage . '</p>';
                            }
                            ?>

                        </form>

                    </div>
                </div>

            </div>

        </section>

    </main>

    <script>
        function addNewContentItem() {
            const contentSection = document.getElementById('new-content-section');
            const newContent = document.createElement('div');
            newContent.classList.add('description-content-item');
            newContent.innerHTML = `
                                    <label for="create-content-type">Content Type</label>
                                    <select name="new_content_type[]" id="create-content-type" required>
                                        <option value="paragraph">Paragraph</option>
                                        <option value="list">List</option>
                                    </select>

                                    <label for="create-content-text">Content (separate items by semicolon for lists)</label>
                                    <textarea name="new_content[]" id="create-content-text" required rows="10" cols="50"></textarea>

                                    <label for="create-content-order">Sort Order</label>
                                    <input id="create-content-order" type="number" name="new_content_sort[]" min="1" max="99" required>
                                `;
            contentSection.appendChild(newContent);
        }
    </script>

</body>

</html>