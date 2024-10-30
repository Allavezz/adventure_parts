<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Adventure Parts</title>
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
        <?php if (isset($_SESSION['delete_product_error_message'])) {
            echo '
                    <div id="flash-message">' . $_SESSION['delete_product_error_message'] . '</div>
                ';
            unset($_SESSION['delete_product_error_message']);
        }
        ?>
        <section class="products-layout">

            <h2 class="products-layout__title title">Products</h2>

            <div class="products-layout__container sc-padding-b">

                <span>Click to Edit the Content</span>

                <div class="products-layout__gallery">
                    <?php
                    foreach ($products as $product) {
                        echo '
                            <div class="products__card">
                                <a href="' . ROOT . '/admin/product/' . $product["product_slug"] . '">
                                    <div class="products__image">
                                        <img src="/images/products/thumbnail/' . $product["product_image"] . '" alt="' . $product["product_name"] . '"/>
                                    </div>
                                    <div class="products__text">
                                        <h3 class="products__title">' . $product["product_name"] . '</h3>
                                    </div>
                                </a>
                            </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </section>
        <section class="products-images">

            <h2 class="products-images__title title">Images Stored</h2>

            <div class="sc-padding-b">
                <ul>
                    <?php foreach ($existingImages as $image) {
                        echo '
                            <li>
                                <div>
                                    <img src="/images/products/thumbnail/' . $image . '" alt="image">
                                    <span>' . $image . '</span>
                                </div>
                                <form action="' . ROOT . '/admin/products/" method="POST">
                                    <input type="hidden" name="image" value="' . $image . '">
                                    <button class="btn btn--small" type="submit" name="delete">Delete</button>
                                </form>
                            </li>
                        ';
                    }
                    ?>
                </ul>
                <form class="products-images__add-form" action="<?= ROOT ?>/admin/products/" method="POST" enctype="multipart/form-data">
                    <label for="products_new_image">Upload an Image</label>
                    <span>Requirements: <br> Unique Name <br> 600x440 <br> Max size 2MB <br> JPEG only</span>
                    <input type="file" name="new_image" id="products_new_image">
                    <button class="btn btn-blue" type="submit" name="add">Upload</button>
                </form>
                <?php
                if (isset($newImageMessage)) {
                    echo '<p role="alert">' . $newImageMessage . '</p>';
                }
                ?>
            </div>
        </section>
        <section class="add-product">

            <h2 class="add-product__title title">Add a product</h2>

            <div class="sc-padding-b">
                <?php
                if (isset($addProductMessage)) {
                    echo '<p role="alert">' . $addProductMessage . '</p>';
                }
                ?>
                <form action="<?= ROOT ?>/admin/products/" method="POST">
                    <label for="add_product_name">Product Name</label>
                    <input type="text" name="product_name" id="add_product_name" minlength="3" maxlength="255" required>

                    <label for="add_product_slug">Product Slug</label>
                    <input type="text" name="product_slug" id="add_product_slug" minlength="3" maxlength="50" required>

                    <label for="add_product_image">Select an image</label>
                    <select name="product_image" id="add_product_image">
                        <option value="">-- Select an image --</option>
                        <?php foreach ($existingImages as $image) {
                            echo '
                                <option value="' . $image . '">' . $image . '</option>
                            ';
                        }
                        ?>
                    </select>

                    <label for="add_product_price">Product Price</label>
                    <input type="number" name="price" id="add_product_price" step="0.01" min="0" max="9999" required>

                    <label for="add_product_stock">Product Stock</label>
                    <input type="number" name="stock" id="add_product_stock" min="0" max="9999" required>

                    <button class="btn btn-blue" type="submit" name="create">Add Product</button>
                </form>
            </div>
        </section>
        <section class="manage-product">

            <h2 class="manage-product__title title">Manage Products</h2>

            <div class="manage-product__container sc-padding-b">
                <?php
                if (isset($featuredtMessage)) {
                    echo '<p role="alert">' . $featuredMessage . '</p>';
                }
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Featured</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($products as $product) {
                            echo '
                                <tr>
                                    <td>' . $product["product_id"] . '</td>
                                    <td>' . $product["product_name"] . '</td>
                                    <td>' . $product["product_slug"] . '</td>
                                    <td>' . $product["product_image"] . '</td>
                                    <td>' . $product["price"] . '</td>
                                    <td>' . $product["stock"] . '</td>
                                    <td>' . ($product["is_featured"] ? "Yes" : "No") . '</td>
                                    <td>
                                        <a class="btn btn-blue btn--small" href="' . ROOT . '/admin/product-featured/' . $product["product_slug"] . '?current=' . $product["is_featured"] . '">Change Featured</a>
                                        <a class="btn btn-blue btn--small" href="' . ROOT . '/admin/update-product/' . $product["product_slug"] . '">Update</a>
                                        <a class="btn btn--small" href="' . ROOT . '/admin/delete-product/' . $product["product_slug"] . '">Delete</a>
                                    </td>
                                </tr>
                            ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        <section class="product-categories">

            <h2 class="product-categories__title title">Add Products to Categories</h2>

            <div class="product-categories__container sc-padding-b">
                <form action="<?= ROOT ?>/admin/products" method="POST">
                    <div class="product-categories__container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <?php foreach ($categories as $category): ?>
                                        <th><?= $category["category_name"] ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><?= $product['product_name'] ?></td>
                                        <?php foreach ($categories as $category): ?>
                                            <td>
                                                <input type="checkbox" name="categories[<?= $product['product_id'] ?>][<?= $category['category_id'] ?>]"
                                                    <?php if (in_array($category['category_id'], $productCategories[$product['product_id']])): ?>
                                                    checked
                                                    <?php endif; ?>>
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <button type="submit" name="update_categories" class="btn btn-blue">Update</button>
                </form>
            </div>
        </section>
    </main>

</body>

</html>