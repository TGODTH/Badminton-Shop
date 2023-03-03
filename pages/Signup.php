<?php 
session_start();
require_once('../utils/CreateDb.php');
ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kool Badminton - Sign up</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" type="text/css" href="/css/main.css?<?php echo time(); ?>" />
    <link rel="stylesheet" type="text/css" href="/css/loginSignup.css?<?php echo time(); ?>" />
</head>

<body>
    <?php require_once("../components/navbar.php");
    require_once("../utils/CreateDb.php");
    $database = new CreateDb();
    unset($_SESSION['error']);
    if (isset($_POST['reg_user'])) {
        $username = $_POST['username'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];

        if ($password_1 == $password_2) {
            if ($database->insertUser($username, $password_1)) {
                $_SESSION['success'] = "You are now logged in";
                unset($_SESSION['error']);
                header('location: /pages/login.php');
                exit;
            } else {
                $_SESSION['error'] = "Database error: Could not register user";
            }
        } else {
            $_SESSION['error'] = "The two passwords do not match";
        }
    }

    ?>
    <div class="header">
        <h2>START SHOPPING TODAY!</h2>
    </div>

    <form method="post" action="">
        <div class="input-group">
            <label for="uesrname">Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label for="password_2">Confirm Password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">Sign Up</button>
        </div><?php
                if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
                    echo "<p class=\"error\">{$_SESSION['error']}</p>";
                }
                ?>
</body>

</html>