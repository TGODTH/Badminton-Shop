<head>
    <style>
        nav {
            background-color: #B91D13 !important;
            display: flex;
            align-items: center;
            box-shadow: 1px 0 5px 2px rgba(0, 0, 0, 0.2);
            height: 9.5rem;

        }

        h3 {
            font-size: 6.4rem;
            color: white;
        }

        h5 {
            font-size: 3.2rem;
        }

        h6 {
            font-size: 2rem;
        }

        .button-text {
            font-size: 1.8rem;
        }

        .cover-image {
            aspect-ratio: 1/1;
            height: 7rem;
            width: auto;
            background: none;
        }

        .card {
            border-radius: 12px !important;
            height: 40.45rem;
        }

        .add-button {
            width: 100%;
            background-color: #0ce86b;
            border: none;
            padding: 1.2rem 2.2rem;
            font-size: 1.2rem;
            font-weight: 500;
            border-radius: 12px !important;
        }

        .add-button:hover {
            background-color: #fbff00;
        }

        .card-body {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: auto minmax(auto, 5rem) auto;
            gap: 1rem;
            height: 100%;
            box-sizing: border-box;
        }

        .card-title {
            font-size: 2rem;
            height: fit-content;
            margin: 0;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        .card-text {
            width: 100%;
            height: 100%;
            font-size: 1.2rem;
            text-overflow: ellipsis;
            overflow: hidden;
            display: -webkit-box !important;
            -webkit-box-orient: vertical;
            white-space: normal;
            margin: 0;
        }

        .price {
            font-size: 3rem;
            font-weight: 700;
        }
    </style>
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