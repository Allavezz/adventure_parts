<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Section - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="sc-padding-b admin-layout">

        <section class="about-layout">

            <h2 class="about-layout__title title">About Section</h2>

            <div class="about sc-padding-b">
                <div class="about__container">
                    <div class="about__image">
                        <img src="/images/about/<?= $about["about_image"] ?>" alt="<?= $about["image_alt"] ?>">
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
            </div>

        </section>

        <section class="about-images">

            <h2 class="about-images__title title">Images Stored</h2>

            <div class="sc-padding-b">
                <ul>
                    <?php foreach ($existingImages as $image) {
                        echo '
                        <li>
                            <div>
                                <img src="/images/about/' . $image . '" alt="image">
                                <span>' . $image . '</span>
                            </div>
                            <form action=" ' . ROOT . ' "/admin/about/" method="POST">
                                <input type="hidden" name="image" value="' . $image . '">
                                <button class="btn btn--small" type="submit" name="delete">Delete</button>
                            </form>
                        </li>
                    ';
                    }
                    ?>

                </ul>

                <form class="about-images__add-form" action="<?= ROOT ?>/admin/about/" method="POST" enctype="multipart/form-data">
                    <label for="new_image">Upload an Image</label>
                    <span>Requirements: <br> Unique Name <br> 1140x600 <br> Max size 2MB</span>
                    <input type="file" name="new_image" id="new_image">
                    <button class="btn btn-blue" type="submit" name="add">Upload</button>
                </form>

            </div>

        </section>

        <section class="about-update">

            <h2 class="about-update__title title">Update About Section</h2>

            <div class="sc-padding-b">
                <form action="<?= ROOT ?>/admin/about/" method="POST">

                    <label for="existing_image">Select an image</label>
                    <select name="about_image" id="existing_image" required>
                        <option value="">-- Select an image --</option>
                        <?php
                        foreach ($existingImages as $image) {
                            $selected = ($image == $about["about_image"]) ? "selected" : "";
                            echo '
                            <option value="' . $image . '" ' . $selected . '>' . $image . '</option>
                        ';
                        }
                        ?>
                    </select>

                    <label for="image_alt">Image Alt text</label>
                    <input type="text" id="image_alt" name="image_alt" minlength="3" maxlength="255" required>

                    <label for="about_title">Title</label>
                    <input type="text" id="about_title" name="about_title" minlength="3" maxlength="255" required>

                    <label for="about_text">Description</label>
                    <span>Use a <strong>;</strong> at the end of a phrase to start a new paragraph!</span>
                    <textarea name="about_text" id="description" rows="10" cols="50" maxlength="65535" required></textarea>

                    <button class="btn btn-blue" type="submit" name="update">Update About Section</button>
                </form>
            </div>
        </section>

    </main>

</body>

</html>