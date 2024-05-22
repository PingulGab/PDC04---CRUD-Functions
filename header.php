<?php
    session_start();
    include "db_connection.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        nav a{
            margin-left: 50px;
            margin-right: 50px;
            color: lightblue;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header style="background-color: gray;">
        <nav style="display: flex; justify-content: center; align-items: center;">
            <a href="home.php">Home</a>
            <a href="view.php">View</a>
            <?php
                // Assuming $userLevel is retrieved from your database after user login
                $userLevel = $_SESSION['user_level']; // Example user level
                if ($userLevel == 1) {
                    // Display "Admin Page" button for admin users
                    echo '<a href="create.php">Create User</a>';
                    echo '<a href="admin-page.php">Admin Page</a>';
                } else {
                    // Display "User Page" button for regular users
                    echo '<a href="user-page.php">User Page</a>';
                }
            ?>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <!-- Your content goes here -->
</body>
</html>
