<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Parts</title>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <?php require("templates/header.php"); ?>

    <main>

        <!-- Categories Gallery Section -->
        <section class="categories sc-padding">
            <div class="categories__container">
                <?php
                foreach ($categories as $category) {
                    $categoryImage = htmlspecialchars($category["category_image"], ENT_QUOTES, 'UTF-8');
                    $categoryName = htmlspecialchars($category["category_name"], ENT_QUOTES, 'UTF-8');
                    $categorySlug = htmlspecialchars($category["category_slug"], ENT_QUOTES, 'UTF-8');

                    echo '
                        <a href="' . ROOT . '/categories/' . $categorySlug . '">
						    <div class="categories__item">
							    <div class="categories__image">
							        <img src="./images/categories/' . $categoryImage . '" alt=" ' . $categoryName . ' " />
							    </div>
							    <div class="categories__text">
								    <h3 class="categories__title">' . $categoryName . '</h3>
								    <h4 class="categories__cta">Pick Your Bike</h4>
							    </div>
						    </div>
					    </a>
                    ';
                }

                ?>
            </div>
        </section>

        <!-- About Us -->
        <?php
        if ($about) {
            $aboutTitle = htmlspecialchars($about["about_title"], ENT_QUOTES, 'UTF-8');
            $aboutImage = htmlspecialchars($about["about_image"], ENT_QUOTES, 'UTF-8');
            $aboutAlt = htmlspecialchars($about["image_alt"], ENT_QUOTES, 'UTF-8');
            $aboutParagraphs = explode(";", $about["about_text"]);
        }
        ?>
        <section class="about sc-padding-b">
            <div class="about_container">
                <div class="about__image">
                    <img src="../images/about/<?= $aboutImage ?>" alt="<?= $aboutAlt ?>">
                </div>
                <div class="about__content">
                    <h2 class="title"><?= $aboutTitle ?></h2>
                    <?php
                    foreach ($aboutParagraphs as $paragraph) {
                        echo "<p class='text'>" . htmlspecialchars(trim($paragraph), ENT_QUOTES, 'UTF-8') . "</p>";
                    }
                    ?>
                </div>
            </div>
        </section>

    </main>

    <?php require("templates/footer.php"); ?>
</body>

</html>