<?php require_once('components/CreateDb.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body{
            background-color:white;
        }
        html{
            font-size: 10px;
        }

        .header{
            width : 30%;
            margin: 5rem auto 0;
            color:white;
            background-color: #700000;
            text-align: center;
            border: 0.1rem solid   #b0c4de;
            border-bottom: none;
            border-radius: 1rem 1rem 0 0;
            padding: 2rem;
        }
        
        form, .content{
            width: 30%;
            margin: 0 auto;
            padding: 2rem;
            border: 0.1rem solid  #b0c4de;
            background: white;
            border-radius: 0 0 0 0;
        }

        .input-group {
            margin: 1rem 0 0 0;  
        }

        .input-group label {
            display: block;
            text-align:left;
            margin: 0.3rem;
        }
        .input-group input{
            height: 3rem;
            width: 93%;
            padding: 0.5rem 1rem;
            font-size: 1.6rem;
            border-radius: 0.5rem;
            border: 0.1rem solid gray;
        }
        .btn{
            padding: 1rem;
            font-size: 1.5rem;
            color: white;
            background: #54eeff ;
            border: none;
            border-radius: 0.5rem;
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
        .success{
            color: #3c763d;
            background: #dff9d8;
             border: 0.1rem solid #3c763d;
             margin-bottom: 2rem;
        }
    </style>
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