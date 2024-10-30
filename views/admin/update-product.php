<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="update-product admin-layout sc-padding-b">

        <h2 class="title">Update Product</h2>

        <div class="update-product__form-container sc-padding-b">
            <?php
            if (isset($message)) {
                echo '<p role="alert">' . $message . '</p>';
            }
            ?>
            <form method="POST" action="<?= ROOT ?>/admin/update-product/<?= $product["product_slug"] ?>">
                <label for="update_product_name">Product Name</label>
                <input type="text" name="product_name" id="update_product_name" minlength="3" maxlength="255" required placeholder="<?= $product["product_name"] ?>">

                <label for="update_product_slug">Product Slug</label>
                <input type="text" name="product_slug" id="update_product_slug" minlength="3" maxlength="50" required placeholder="<?= $product["product_slug"] ?>">

                <label for="update_product_image">Select an image</label>
                <select name="product_image" id="update_product_image">
                    <option value="">-- Select an image --</option>
                    <?php
                    foreach ($existingImages as $image) {
                        $selected = ($image == $product["product_image"]) ? "selected" : "";
                        echo '
                            <option value="' . $image . '" ' . $selected . '>' . $image . '</option>
                        ';
                    }
                    ?>
                </select>

                <label for="update_product_price">Product Price</label>
                <input type="number" name="price" id="update_product_price" step="0.01" min="0" max="9999" required placeholder="<?= $product["price"] ?>">

                <label for="update_product_stock">Product Stock</label>
                <input type="number" name="stock" id="update_product_stock" min="0" max="9999" required placeholder="<?= $product["stock"] ?>">

                <button class="btn btn-blue" type="submit" name="update">Update Product</button>
            </form>
        </div>
    </main>

</body>

</html>