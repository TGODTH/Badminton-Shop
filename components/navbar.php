<head>
    <link rel="stylesheet" type="text/css" href="/css/style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" type="text/css" href="/css/main.css?<?php echo time(); ?>" />
    <style>
        nav {
            background-color: #b91d13 !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 1px 0 6px 2.5px rgba(0, 0, 0, 0.2);
            height: 9.5rem;
            padding: 0 4rem;
            box-sizing: border-box;
        }

        header h3 {
            font-size: 4.8rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
        }

        .cover-image {
            aspect-ratio: 1/1;
            height: 7rem;
            width: auto;
            background: none;
        }

        .right-container {
            display: flex;
            align-items: center;
        }

        a.link,
        p.user,
        button.logout {
            margin: 0;
            color: white;
            margin-left: 1.5rem;
            font-size: 2rem;
            position: relative;
        }

        a.link:hover {
            color: white;
        }

        .right-container a:hover::after,
        button.logout:hover::after
        {
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

        p.user:hover {
            cursor: default;
        }
    </style>
</head>
<?php
if (isset($_POST['logout'])) {
    session_destroy();
    header("location: /index.php");
    exit;
}
?>
<header id="header">
    <nav>
        <a href="/index.php" class="navbar-brand">
            <h3 class="5">
                Kool Badminton
                <img src="https://image.makewebeasy.net/makeweb/0/RkWxkNYkh/Badminton/%E0%B8%A5%E0%B8%B9%E0%B8%81%E0%B8%82%E0%B8%99%E0%B9%84%E0%B8%81%E0%B9%88_Fierce_3.png" alt="" class="cover-image">
            </h3>
        </a>
        <div class="right-container" <?php if (isset($_SESSION['username'])) {
                                            echo 'style="display:none"';
                                        } ?>>
            <a class="link" href="/pages/login.php">Log In</a>
            <a class="link" href="/pages/signup.php">Sign Up</a>
        </div>
        <?php if (isset($_SESSION['username'])) : ?>

            <div class="right-container">
                <p class="user">Welcome, <?php echo $_SESSION['username']; ?></p>
                <form method="POST">
                    <button class="logout" type="submit" name="logout">Log out</button>
                </form>
            </div>
        <?php endif; ?>

    </nav>
</header>