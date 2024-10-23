<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="sc-padding-b admin-layout">

        <section class="categories-layout">

            <h2 class="categories-layout__title title">Categories Section</h2>

            <div class="categories-layout__container">
                <div class="sc-padding-b categories__container">
                    <?php
                    foreach ($categories as $category) {
                        echo '
						    <div class="categories__item">
							    <div class="categories__image">
							        <img src="/images/categories/' . $category["category_image"] . '" alt=" ' . $category["category_name"] . ' " />
							    </div>
							    <div class="categories__text">
								    <h3 class="categories__title">' . $category["category_name"] . '</h3>
								    <h4 class="categories__cta">Pick your Bike</h4>
							    </div>
						    </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="categories-images">

            <h2 class="categories-images__title title">Images Stored</h2>

            <div class="sc-padding-b">
                <ul>
                    <?php foreach ($existingImages as $image) {
                        echo '
                            <li>
                                <div>
                                    <img src="/images/categories/' . $image . '" alt="image">
                                    <span>' . $image . '</span>
                                </div>
                                <form action="' . ROOT . '/admin/categories/" method="POST">
                                    <input type="hidden" name="image" value="' . $image . '">
                                    <button class="btn btn--small" type="submit" name="delete">Delete</button>
                                </form>
                            </li>
                        ';
                    }
                    ?>
                </ul>

                <form class="categories-images__add-form" action="<?= ROOT ?>/admin/categories/" method="POST" enctype="multipart/form-data">
                    <label for="categories_new_image">Upload in Image</label>
                    <span>Requirements: <br> Unique Name <br> 600x440 <br> Max size 2MB <br> JPEG only</span>
                    <input type="file" name="new_image" id="categories_new_image">
                    <button class="btn btn-blue" type="submit" name="add">Upload</button>
                </form>

            </div>

        </section>

        <section class="add-category">

            <h2 class="add-category__title title">Add a Category</h2>

            <div class="sc-padding-b">
                <form action="<?= ROOT ?>/admin/categories/" method="POST">
                    <label for="add_category_name">Category Name</label>
                    <input type="text" name="category_name" id="add_category_name" required minlength="3" maxlength="255">

                    <label for="add_category_slug">Category Slug</label>
                    <input type="text" name="category_slug" id="add_category_slug" required minlength="3" maxlength="20">

                    <label for="add_category_image">Select an image</label>
                    <select name="category_image" id="add_category_image">
                        <option value="">-- Select an image --</option>
                        <?php
                        foreach ($existingImages as $image) {
                            echo '
                                <option value="' . $image . '">' . $image . '</option>
                            ';
                        }
                        ?>
                    </select>

                    <button class="btn btn-blue" type="submit" name="create">Add Category</button>
                </form>
            </div>
        </section>

        <section class="manage-category">

            <h2 class="manage-category__title title">Manage Categories</h2>

            <div class="manage-category__container sc-padding-b">
                <table>
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Category Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($categories as $category) {
                            echo '
                            <tr>
                                <th>' . $category["category_id"] . '</th>
                                <th>' . $category["category_name"] . '</th>
                                <th>' . $category["category_slug"] . '</th>
                                <th>' . $category["category_image"] . '</th>
                                <th>
                                    <a class="btn btn-blue btn--small" href="' . ROOT . '/admin/update-category/' . $category["category_slug"] . '">Update Category</a>
                                    <a class="btn btn--small" href="' . ROOT . '/admin/delete-category/' . $category["category_slug"] . '">Delete Category</a>
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