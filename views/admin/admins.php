<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admins - Adventure parts</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php require("templates/nav.php") ?>

    <main class="sc-padding-b admin-layout">
        <h2>Admins</h2>

        <?php
        if (isset($_SESSION["success_message"])) {
            echo '
                    <div>
                        <span>' . $_SESSION["success_message"] . '</span>
                    </div>      
                ';
            unset($_SESSION["success_message"]);
        }
        ?>
        <?php
        if (isset($_SESSION["error_message"])) {
            echo '
                    <div>
                        <span>' . $_SESSION["error_message"] . '</span>
                    </div>      
                ';
            unset($_SESSION["error_message"]);
        }
        ?>

        <a href="<?= ROOT ?>/admin/create-admin">Create Admin</a>

        <table>
            <thead>
                <tr>
                    <th>Admin ID</th>
                    <th>Name</th>
                    <th>Employee Number</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($admins as $admin) {
                    echo '
                    <tr>
                        <th>' . $admin["admin_id"] . '</th>
                        <th>' . $admin["name"] . '</th>
                        <th>' . $admin["employee_number"] . '</th>
                        <th>' . $admin["email"] . '</th>
                        <th>
                            <a href="' . ROOT . '/admin/update-admin/' . $admin["admin_id"] . '">Update Admin</a>
                            <a href="' . ROOT . '/admin/delete-admin/' . $admin["admin_id"] . '">Delete Admin</a>
                        </th>
                    </tr>
                ';
                }
                ?>
            </tbody>
        </table>

    </main>



</body>

</html>