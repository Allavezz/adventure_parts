<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="update-category admin-layout sc-padding-b">

        <h2 class="title">Update Category</h2>

        <div class="update-category__form-container sc-padding-b">

            <form method="POST" action="<?= ROOT ?>/admin/update-category/<?= $category["category_slug"] ?>">
                <label for="update_category_name">Category Name</label>
                <input type="text" name="category_name" id="update_category_name" required minlength="3" maxlength="255" placeholder="<?= $category["category_name"] ?>">

                <label for="update_category_slug">Category Slug</label>
                <input type="text" name="category_slug" id="update_category_slug" required minlength="3" maxlength="20" placeholder="<?= $category["category_slug"] ?>">

                <label for="update_category_image">Select an image</label>
                <select name="category_image" id="update_category_image">
                    <option value="">-- Select an image --</option>
                    <?php
                    foreach ($existingImages as $image) {
                        $selected = ($image == $category["category_image"]) ? "selected" : "";
                        echo '
                            <option value="' . $image . '" ' . $selected . '>' . $image . '</option>
                        ';
                    }
                    ?>
                </select>

                <button class="btn btn-blue" type="submit" name="update">Update Category</button>
            </form>

        </div>

    </main>

</body>

</html>