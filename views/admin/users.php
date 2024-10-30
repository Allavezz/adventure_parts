<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - Adventure Parts</title>
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="/js/flashMessage.js"></script>
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="sc-padding-b admin-layout">
        <section class="users">

            <h2 class="title users__title">Users</h2>

            <div class="users__container sc-padding-b">
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
                <table>
                    <thead>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($users as $user) {
                            echo '
                                <tr>
                                    <th>' . $user["user_id"] . '</th>
                                    <th>' . $user["name"] . '</th>
                                    <th>' . $user["email"] . '</th>
                                    <th>
                                        <a class="btn btn-blue btn--small" href="' . ROOT . '/admin/update-user/' . $user["user_id"] . '">Update User</a>
                                        <a class="btn btn--small" href="' . ROOT . '/admin/delete-user/' . $user["user_id"] . '">Delete User</a>
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