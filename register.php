<?php require_once('components/CreateDb.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <style></style>
</head>
<body>
    
    <div class="header">
        <h2>Register</h2>
    </div>

    <form action="register.php">
        <div class="input-group">
            <label for="uesrname">Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="email">Email</label> 
            <input type="email" name="email">
        </div>
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label for="password_2">Confirm Password</label>
            <input type="password" name="username">
        </div>
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">register</button>
        </div>
        <p>Already a member </p>
</body>
</html>