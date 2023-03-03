<?php

session_start();

require_once("../utils/createDb.php");
require_once("../components/component.php");

$db = new CreateDb();

if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            echo "</pre>";
            if (trim($value["product_name"]) == trim($_GET['product_name'])) {
                unset($_SESSION['cart'][$key]);
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_cart'])) {
        $_SESSION['cart'] = json_decode($_POST['cartItems'], true);
    } elseif (isset($_POST['submit_order'])) {
        $user_name = $_SESSION['username'];

        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $cart_item) {
                $product_name = $cart_item['product_name'];
                if (isset($cart_item['product_quantity'])) {
                    $product_amount = $cart_item['product_quantity'];
                } else {
                    $product_amount = 1;
                }
                if ($db->addOrder($user_name, $product_name, $product_amount)) {
                } else {
                    echo "<script>alert('Error adding order list.')</script>";
                }
            }
            unset($_SESSION['cart']);
            echo "<script>alert('orders added successfully!')</script>";
        } else {
            echo "<script>alert('Cart is empty.')</script>";
        }
    }
}
?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kool Badminton - Cart</title>
    <style>
        .btnPay{
            margin-top: 1rem;
            padding: 1rem;
            font-size: 2rem;
            color: white;
            background: #0080ff;
            border: none;
            border-radius: 0.7rem !important;
            width: 100%;
        }
    </style>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" type="text/css" href="/css/main.css?<?php echo time(); ?>" />

</head>

<body class="bg-light">

    <?php
    require_once('../components/navbar.php');
    ?>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>

                    <?php

                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        $product_id = array_column($_SESSION['cart'], 'product_name');

                        $result = $db->getData("producttb");
                        while ($row = mysqli_fetch_assoc($result)) {
                            foreach ($product_id as $product_name) {
                                if ($row['product_name'] == $product_name) {
                                    cartElement($row['product_image'], $row['product_name'], $row['product_price']);
                                    $total = $total + (int) $row['product_price'];
                                }
                            }
                        }
                    } else {
                        echo "<h5>Cart is Empty</h5>";
                    }

                    ?>

                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

                <div class="pt-4">
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            } else {
                                echo "<h6>Price (0 items)</h6>";
                            }
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Total</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>฿
                                <?php echo $total; ?>
                            </h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>฿
                                <?php
                                echo $total;
                                ?>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <form method="post" action=""><button type="submit" name="submit_order" class="btnPay"> Pay </button></form>
        </div>
    </div>
    <?php require_once("../components/cartIcon.php"); ?>


    <script>
        function increaseQuantity(productName) {
            console.log("Increasing quantity")
            var quantityField = document.getElementById('quantity-' + productName);
            var quantity = parseInt(quantityField.value);
            quantityField.value = quantity + 1;
            changeQuantity(productName);
        }

        function decreaseQuantity(productName) {
            var quantityField = document.getElementById('quantity-' + productName);
            var quantity = parseInt(quantityField.value);
            if (quantity > 1) {
                quantityField.value = quantity - 1;
                changeQuantity(productName);
            }
        }

        function changeQuantity(productName) {
            var quantityField = document.getElementById('quantity-' + productName);
            var newQuantity = parseInt(quantityField.value);
            var cartItems = JSON.parse('<?php echo json_encode($_SESSION['cart']); ?>');
            for (var i in cartItems) {
                if (cartItems[i]['product_name'] === productName) {
                    cartItems[i]['product_quantity'] = newQuantity;
                    break;
                }
            }

            var form = document.createElement('form');
            form.setAttribute('method', 'POST');
            form.setAttribute('action', 'cart.php');

            var updateCartInput = document.createElement('input');
            updateCartInput.setAttribute('type', 'hidden');
            updateCartInput.setAttribute('name', 'update_cart');
            updateCartInput.setAttribute('value', '1');
            form.appendChild(updateCartInput);

            var cartItemsInput = document.createElement('input');
            cartItemsInput.setAttribute('type', 'hidden');
            cartItemsInput.setAttribute('name', 'cartItems');
            cartItemsInput.setAttribute('value', JSON.stringify(cartItems));
            console.log("🚀 ~ file: cart.php:193 ~ changeQuantity ~ JSON.stringify(cartItems):", JSON.stringify(cartItems))
            form.appendChild(cartItemsInput);

            document.body.appendChild(form);
            form.submit();

        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>