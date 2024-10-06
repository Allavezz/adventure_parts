<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($category["category_name"], ENT_QUOTES, 'UTF-8') ?> - Adventure Parts</title>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <?php require("templates/header.php"); ?>

    <main>

        <section class="category sc-padding-b">
            <div class="category__container">
                <h2 class="title">Choose your bike</h2>
                <div class="category__nav">
                    <?php
                    // Alphabetic sort by category name
                    usort($categories, function ($a, $b) {
                        return strcmp($a["category_name"], $b["category_name"]);
                    });

                    foreach ($categories as $categories) {
                        $categoriesName = htmlspecialchars($categories["category_name"], ENT_QUOTES, 'UTF-8');
                        $categoriesSlug = htmlspecialchars($categories["category_slug"], ENT_QUOTES, 'UTF-8');

                        // Check if current slug matches page slug
                        $btnActive = ($category["category_slug"] === $categoriesSlug) ? 'btn-active' : '';

                        echo '
                            <a href="' . ROOT . '/categories/' . $categoriesSlug . '" class="btn-sec ' . $btnActive . ' ">' . $categoriesName . '
                            </a>
                        ';
                    }
                    ?>
                </div>
            </div>

        </section>

    </main>

    <?php require("templates/footer.php"); ?>
</body>

</html>