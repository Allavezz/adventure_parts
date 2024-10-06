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

        <!-- Models Gallery Section -->
        <section class="models sc-padding">
            <div class="models__container">
                <?php
                foreach ($models as $model) {
                    $modelImage = htmlspecialchars($model["model_image"], ENT_QUOTES, 'UTF-8');
                    $modelName = htmlspecialchars($model["model_name"], ENT_QUOTES, 'UTF-8');
                    $modelSlug = htmlspecialchars($model["model_slug"], ENT_QUOTES, 'UTF-8');

                    echo '
                        <a href="parts.html?filter=ktm990">
						    <div class="models__item">
							    <div class="models__image">
							        <img src="./images/models/' . $modelImage . '" alt=" ' . $modelName . ' " />
							    </div>
							    <div class="models__text">
								    <h3 class="models__title">' . $modelName . '</h3>
								    <h4 class="models__cta">Pick Your Bike</h4>
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
                        echo "<p>" . htmlspecialchars(trim($paragraph), ENT_QUOTES, 'UTF-8') . "</p>";
                    }
                    ?>
                </div>
            </div>
        </section>

    </main>

    <?php require("templates/footer.php"); ?>
</body>

</html>