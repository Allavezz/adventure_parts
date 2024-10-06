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
                    echo '
                        <a href="parts.html?filter=ktm990">
						    <div class="models__item">
							    <div class="models__image">
							        <img src="./images/models/' . $model["model_image"] . '" alt="KTM 990" />
							    </div>
							    <div class="models__text">
								    <h3 class="models__title">' . $model["model_name"] . '</h3>
								    <h4 class="models__cta">Pick Your Bike</h4>
							    </div>
						    </div>
					    </a>
                    ';
                }

                ?>
            </div>
        </section>

    </main>

    <?php require("templates/footer.php"); ?>
</body>

</html>