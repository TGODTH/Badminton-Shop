</head>
<header id="header">
    <nav>
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
                Kool Badminton
                <img src="https://image.makewebeasy.net/makeweb/0/RkWxkNYkh/Badminton/%E0%B8%A5%E0%B8%B9%E0%B8%81%E0%B8%82%E0%B8%99%E0%B9%84%E0%B8%81%E0%B9%88_Fierce_3.png"
                    alt="" class="cover-image">
                <!-- TODO : add img -->
            </h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\">$count</span>";
                        } else {
                            echo "<span id=\"cart_count\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header>