<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="/js/heroSlider.js"></script>
</head>

<body>
    <?php require("templates/header.php"); ?>

    <main>
        <!-- Hero Section -->
        <section class="hero">

            <div class="hero__slides">
                <?php
                $isFirstSlide = true;
                foreach ($products as $product) {
                    $activeClass = $isFirstSlide ? 'hero__slide--active' : '';

                    echo '
                        <div class="hero__slide ' . $activeClass . '" style="background-image: url(\'/images/products/hero/' . $product["hero_image_url"] . ' \')">
                            <div class="hero__content">
                                <h2 class="hero__title"> ' . $product["product_name"] . ' </h2>
                                <a href="' . ROOT . '/products/' . $product["product_slug"] . '" class="hero__link btn">Learn More</a>
                            </div>
                        </div>
                    ';

                    $isFirstSlide = false;
                }
                ?>
            </div>
        </section>

        <!-- Categories Gallery Section -->
        <section class="categories sc-padding">
            <div class="categories__container">
                <?php
                foreach ($categories as $category) {
                    echo '
                        <a href="' . ROOT . '/categories/' . $category["category_slug"] . '">
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
        </section>

        <!-- About Us -->
        <?php
        if ($about) {
            $aboutParagraphs = explode(";", $about["about_text"]);
        }
        ?>
        <section class="about sc-padding-b">
            <div class="about__container">
                <div class="about__image">
                    <img src="../images/about/<?= $about["about_image"] ?>" alt="<?= $about["image_alt"] ?>">
                </div>
                <div class="about__content">
                    <h2 class="title"><?= $about["about_title"] ?></h2>
                    <?php
                    foreach (explode(";", $about["about_text"]) as $paragraph) {
                        echo "<p class='text'>" . $paragraph . "</p>";
                    }
                    ?>
                </div>
            </div>
        </section>

    </main>

    <?php require("templates/footer.php"); ?>
</body>

</html>