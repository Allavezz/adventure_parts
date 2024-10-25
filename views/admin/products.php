<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="sc-padding-b admin-layout">

        <section class="products-layout">

            <h2 class="products-layout__title title">Products</h2>

            <div class="products-layout__container sc-padding-b">

                <span>Press to Edit the Content</span>

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

            </div>

        </section>

        <section class="add-product">

            <h2 class="add-product__title title">Add a product</h2>

            <div class="sc-padding-b">
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
                                    <th>' . $product["product_id"] . '</th>
                                    <th>' . $product["product_name"] . '</th>
                                    <th>' . $product["product_slug"] . '</th>
                                    <th>' . $product["product_image"] . '</th>
                                    <th>' . $product["price"] . '</th>
                                    <th>' . $product["stock"] . '</th>
                                    <th>' . ($product["is_featured"] ? "Yes" : "No") . '</th>
                                    <th>
                                        <a class="btn btn-blue btn--small" href="' . ROOT . '/admin/product-featured/' . $product["product_slug"] . '?current=' . $product["is_featured"] . '">Change Featured</a>
                                        <a class="btn btn-blue btn--small" href="' . ROOT . '/admin/update-product/' . $product["product_slug"] . '">Update</a>
                                        <a class="btn btn--small" href="' . ROOT . '/admin/delete-product/' . $product["product_slug"] . '">Delete</a>
                                    </th>
                                </tr>
                            ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </section>

    </main>

</body>

</html>