<head>
    <link rel="stylesheet" type="text/css" href="/css/style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" type="text/css" href="/css/main.css?<?php echo time(); ?>" />
    <style>
        nav {
            background-color: #b91d13 !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 1px 0 5px 2px rgba(0, 0, 0, 0.2);
            height: 9.5rem;
        }

        header h3 {
            font-size: 4.8rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .links {
            display: flex;
            ;
            align-items: center;
        }

        a {
            color: white;
            margin-left: 1.5rem;
            font-size: 2rem;
            position: relative;
        }

        a:hover {
            color: white;
        }

        .links a:hover::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translate(-50%, 0.2rem);
            width: 100%;
            height: 0.2rem;
            background-color: white;
            animation: slideleft 0.3s forwards cubic-bezier(0.1, .3, .57, 1);
        }

        @keyframes slideleft {
            from {
                width: 0;
            }
        }

        .links a:last-child {
            margin-right: 3rem;
        }
    </style>
</head>

<header id="header">
    <nav>
        <a href="/index.php" class="navbar-brand">
            <h3 class="px-5">
                Kool Badminton
                <img src="https://image.makewebeasy.net/makeweb/0/RkWxkNYkh/Badminton/%E0%B8%A5%E0%B8%B9%E0%B8%81%E0%B8%82%E0%B8%99%E0%B9%84%E0%B8%81%E0%B9%88_Fierce_3.png" alt="" class="cover-image">
            </h3>
        </a>
        <div class="links">
            <a href="/pages/admin.php">Admin</a>
            <a href="/pages/login.php">Log In</a>
            <a href="/pages/signup.php">Sing Up</a>
        </div>
    </nav>
</header>