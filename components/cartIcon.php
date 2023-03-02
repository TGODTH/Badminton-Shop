<head>
    <style>
        .cart {
            background-color: black;
            position: fixed;
            bottom: 28px;
            right: 28px;
            padding: 1rem 1.9rem;
            font-size: 3.2rem;
            box-sizing: border-box;
            text-decoration: none;
            color: white;
            box-shadow: 0 0 5px 1px rgba(0, 0, 0, 0.5);
            border-radius: 5px;
        }

        .cart:hover {
            background-color: white;
            color: black;
        }

        .cart-text {
            display: inline-block;
            margin: 0;
        }
    </style>
</head>

<body>
    <a href="/pages/Cart.php" class="cart">
        <p class="cart-text">Cart
            <?php
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
                echo "<span id=\"cart_count\">$count</span>";
            } else {
                echo "<span id=\"cart_count\">0</span>";
            }
            ?>
            ชิ้น
        </p>
    </a>
</body>