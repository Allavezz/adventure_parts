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

            <h2 class="categories-layout__title title">Categories Gallery</h2>

            <div class="categories-layout__container">
                <div class="sc-padding-b categories__container">
                    <?php
                    foreach ($categories as $category) {
                        echo '
                        <a href="' . ROOT . '/admin/category/' . $category["category_slug"] . '">
						    <div class="categories__item">
							    <div class="categories__image">
							        <img src="/images/categories/' . $category["category_image"] . '" alt=" ' . $category["category_name"] . ' " />
							    </div>
							    <div class="categories__text">
								    <h3 class="categories__title">' . $category["category_name"] . '</h3>
								    <h4 class="categories__cta">Pick Your Bike</h4>
							    </div>
						    </div>
					    </a>
                    ';
                    }

                    ?>
                </div>
            </div>
        </section>

    </main>

</body>

</html>