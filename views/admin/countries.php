<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countries - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="/js/flashMessage.js"></script>
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="sc-padding-b admin-layout">

        <section class="countries">

            <h2 class="title countries__title">Countries</h2>

            <div class="countries__container sc-padding-b">

                <?php if (isset($_SESSION['success_message'])) {
                    echo '
                    <div id="flash-message">' . $_SESSION['success_message'] . '</div>
                ';
                    unset($_SESSION['success_message']);
                }
                ?>
                <?php if (isset($_SESSION['error_message'])) {
                    echo '
                    <div id="flash-message">' . $_SESSION['error_message'] . '</div>
                ';
                    unset($_SESSION['error_message']);
                }
                ?>

                <a class="btn btn-blue countries__create" href="<?= ROOT ?>/admin/create-country/">Create Country</a>

                <table>
                    <thead>
                        <tr>
                            <th>Country Code</th>
                            <th>Country Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($countries as $country) {
                            echo '
                                <tr>
                                    <th>' . $country["code"] . '</th>
                                    <th>' . $country["name"] . '</th>
                                    <th>
                                        <a class="btn btn-blue btn--small" href="' . ROOT . '/admin/update-country/' . $country["code"] . '">Update Country</a>
                                        <a class="btn btn--small" href="' . ROOT . '/admin/delete-country/' . $country["code"] . '">Delete Country</a>
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