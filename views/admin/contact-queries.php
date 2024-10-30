<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Queries - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="/js/flashMessage.js"></script>
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="sc-padding-b admin-layout contact-queries">
        <?php if (isset($_SESSION['success_message'])) {
            echo '
                    <div id="flash-message">' . $_SESSION['success_message'] . '</div>
                ';
            unset($_SESSION['success_message']);
        }
        ?>

        <h2 class="contact-queries__title title">Contact Queries</h2>

        <div class="contact-queries__container sc-padding-b">

            <?php if (isset($_SESSION['error_message'])) {
                echo '
                    <div id="flash-message">' . $_SESSION['error_message'] . '</div>
                ';
                unset($_SESSION['error_message']);
            }
            ?>

            <table>
                <thead>
                    <tr>
                        <th>Query ID</th>
                        <th>Email</th>
                        <th>Topic</th>
                        <th>Query Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($contactQueries as $query) {
                        echo '
                                <tr>
                                    <td>' . $query["contact_id"] . '</td>
                                    <td>' . $query["email"] . '</td>
                                    <td>' . $query["topic"] . '</td>
                                    <td>' . $query["created_at"] . '</td>
                                    <td>
                                        <a class="btn btn-blue btn--small" href="' . ROOT . '/admin/contact-query-details/' . $query["contact_id"] . '">See Details</a>
                                        <a class="btn btn--small" href="' . ROOT . '/admin/delete-contact-query/' . $query["contact_id"] . '">Delete Query</a>
                                    </td>
                                </tr>
                            ';
                    }
                    ?>
                </tbody>
            </table>

        </div>

    </main>

</body>

</html>