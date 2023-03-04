<?php

function component($productname, $productdescription, $productprice, $productimg)
{
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>
                       
                            <p class=\"card-text\">
                              $productdescription
                            </p>
                          
                
                                <span class=\"price\">฿$productprice</span>
                         

                            <input type='hidden' name='product_name' value='$productname'>
                            </div>
                            </div>
                            <button type=\"submit\" class=\"add-button\" name=\"add\">Add to Cart<i class=\"fas fa-shopping-cart\"></i></button>
                            </form>
            </div>
    ";
    echo $element;
}

function cartElement($productimg, $productname, $productprice)
{
    $product_quantity = 1;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cart_item) {
            if ($cart_item['product_name'] === $productname && isset($cart_item['product_quantity'])) {
                $product_quantity = $cart_item['product_quantity'];
                break;
            }
        }
    }
    $price = (int) $productprice * (int) $product_quantity;

    $element = "
    <form method=\"post\" class=\"cart-items\">
        <div class=\"border rounded\">
            <div class=\"row bg-white\">
                <div class=\"col-md-3 pl-0\">
                    <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid\">
                </div>
                <div class=\"col-md-6\">
                    <h5 class=\"pt-2\">$productname</h5>
                    <h5 class=\"pt-2\">฿$price</h5>
                    <button type=\"submit\" class=\"btn btn-danger mx-2 button-text\" name=\"remove\">Remove</button>
                </div>
                <div class=\"col-md-3 py-5\">
                    <div>
                        <button type=\"button\" class=\"btn bg-light border rounded-circle\" name=\"update_cart\" onclick=\"decreaseQuantity('$productname')\"><i class=\"fas fa-minus\"></i></button>
                        <input type=\"number\" value=\"$product_quantity\" step=\"1\" min=\"1\" id=\"quantity-$productname\" class=\"form-control w-25 d-inline\" name=\"$productname\">
                        <button type=\"button\" class=\"btn bg-light border rounded-circle\" name=\"update_cart\" onclick=\"increaseQuantity('$productname')\"><i class=\"fas fa-plus\"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>";

    echo $element;
}
