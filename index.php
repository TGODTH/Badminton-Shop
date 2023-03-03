<?php

session_start();

require_once('utils/CreateDb.php');
require_once('components/component.php');


// create instance of Createdb class
$database = new CreateDb();

if (isset($_POST['add'])) {
    $item_array = array(
        'product_name' => $_POST['product_name'],
        'product_quantity' => 1
    );

    if (isset($_SESSION['cart'])) {
        $item_array_name = array_column($_SESSION['cart'], "product_name");

        if (in_array($_POST['product_name'], $item_array_name)) {
            echo "<script>alert('Product is already added in the cart..!')</script>";
        } else {
            array_push($_SESSION['cart'], $item_array);
        }
    } else {
        $_SESSION['cart'][0] = $item_array;
    }
}



?>

<!doctype html>
<html lang="en">
<style>
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
        border-radius: 12px;
        margin-top: 1rem;
        box-shadow: 0 0 5px 1px rgba(0, 0, 0, 0.2);
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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kool Badminton</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css?<?php echo time(); ?>" />
    <link rel="stylesheet" type="text/css" href="/css/main.css?<?php echo time(); ?>" />
</head>

<body>


    <?php require_once("components/navbar.php"); ?>
    <div class="container">
        <div class="row text-center py-5">
            <?php
            $result = $database->getData("producttb");
            while ($row = mysqli_fetch_assoc($result)) {
                component($row['product_name'], $row['product_description'], $row['product_price'], $row['product_image']);
            }
            ?>
        </div>
    </div>
    <?php require_once("components/cartIcon.php"); ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>