<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countries - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="sc-padding-b admin-layout">

        <section class="countries">

            <h2 class="title countries__title">Countries</h2>

            <div class="countries__container sc-padding-b">

                <a class="btn btn-blue countries__create" href="<?= ROOT ?>/admin/create-country/">Create Country</a>

                <table>
                    <thead>
                        <tr>
                            <th>Country Code</th>
                            <th>Country Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>

            </div>

        </section>

    </main>

</body>

</html>