<?php require_once('../utils/CreateDb.php');ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kool Badminton - Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" type="text/css" href="/css/main.css?<?php echo time(); ?>" />
    <style>
        .header {
            width: 90%;
            max-width: 59rem;
            margin: 5rem auto 0;
            color: white;
            background-color: #700000;
            text-align: center;
            border: 0.1rem solid #b0c4de;
            border-bottom: none;
            border-radius: 1rem 1rem 0 0;
            padding: 2rem;
            box-sizing: border-box;
        }

        .header h2 {
            font-size: 3.2rem;
        }

        form,
        .content {
            width: 90%;
            max-width: 59rem;
            margin: 0 auto;
            padding: 2rem;
            border: 0.1rem solid #b0c4de;
            background: white;
            border-radius: 0 0 0 0;
            box-sizing: border-box;
        }

        .input-group {
            margin: 0 0 1rem 0;
            width: 100%;
        }

        .input-group label {
            display: block;
            text-align: left;
            margin: 0.3rem;
            font-size: 2.2rem;
        }

        .input-group input {
            appearance: none;
            height: 3.5rem;
            width: 100%;
            padding: 0.5rem 1rem;
            font-size: 2.4rem;
            border-radius: 0.7rem !important;
            border: 0.1rem solid gray;
            box-sizing: border-box;
        }

        .btn {
            margin-top: 1rem;
            padding: 1rem;
            font-size: 2rem;
            color: white;
            background: #0080ff;
            border: none;
            border-radius: 0.7rem !important;
            width: 100%;
        }

        .error {
            width: 92%;
            margin: 0 auto;
            padding: 1rem;
            border: 0.1rem solid #a94442;
            color: #a94442;
            background: #f2dede;
            border-radius: 0.5rem;
            text-align: left;
        }

        .success {
            color: #3c763d;
            background: #dff9d8;
            border: 0.1rem solid #3c763d;
            margin-bottom: 2rem;
        }
    </style>
</head>

<body>
    <?php require_once("../components/navbar.php");
    require_once("../utils/CreateDb.php");
    $database = new CreateDb();

    if (isset($_POST['reg_user'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($password_1 == $password_2) {
            if ($database->insertUser($username, $password_1)) {
                $_SESSION['success'] = "You are now logged in";
                header('location: /index.php');
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
        <h2>Login to KoolBadminton </h2>
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
            <button type="submit" name="login_user" class="btn">Log In</button>
        </div>
        <p>Already a member </p>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>