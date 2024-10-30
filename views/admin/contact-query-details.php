<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Query <?= $contactQuery["contact_id"] ?> Details - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php"); ?>

    <main class="contact-query admin-layout sc-padding-b">

        <h2 class="contact-query__title title">Contact Query Details</h2>

        <div class="contact-query__container sc-padding-b">
            <dl>
                <dt>Contact Query ID:</dt>
                <dd><?= $contactQuery["contact_id"] ?></dd>
                <dt>Topic:</dt>
                <dd><?= $contactQuery["topic"] ?></dd>
                <dt>Description:</dt>
                <dd><?= $contactQuery["description"] ?></dd>
                <dt>Motorcycle Category:</dt>
                <?php
                if (isset($contactQuery["category"])) {
                    echo '<dd>' . $contactQuery["category"] . '</dd>';
                } else {
                    echo '<dd>Not specified</dd>';
                }
                ?>
                <dt>Motorcycle Year:</dt>
                <?php
                if (isset($contactQuery["year"])) {
                    echo '<dd>' . $contactQuery["year"] . '</dd>';
                } else {
                    echo '<dd>Not specified</dd>';
                }
                ?>
                <dt>Order ID:</dt>
                <?php
                if (isset($contactQuery["order_id"])) {
                    echo '<dd>' . $contactQuery["order_id"] . '</dd>';
                } else {
                    echo '<dd>Not specified</dd>';
                }
                ?>
                <dt>Contact Email:</dt>
                <dd><?= $contactQuery["email"] ?></dd>
                <dt>Country:</dt>
                <dd><?= $contactQuery["country"] ?></dd>
                <dt>Contact Query Date:</dt>
                <dd><?= $contactQuery["created_at"] ?></dd>
            </dl>

            <a class="btn btn-blue" href="mailto:<?= $contactQuery["email"] ?>">Reply</a>
        </div>

    </main>

</body>

</html>