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
    if (isset($_POST['login_user'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($database->loginUser($username, $password)) {
            $_SESSION['username'] = $username;
            unset($_SESSION['error']);
            header('location: /index.php');
            exit;
        } else {
            $_SESSION['error'] = "Invalid username or password";
        }
    }

    ?>
    <div class="header">
        <h2>Login to KoolBadminton </h2>
    </div>

    <form method="post" action="">
        <div class="input-group">
            <label for="uesrname">Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" name="login_user" class="btn">Log In</button>
        </div>
        <?php
        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
            echo "<p class=\"error\">{$_SESSION['error']}</p>";
        }
        ?>
</body>

</html>