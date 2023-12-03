<?php
include "../../connection/connect.php";

$client_id = $_SESSION['client_id'];

$sqlCart = "SELECT orders.*, products.product_name, products.product_description, products.product_price, products.product_image_path
            FROM orders
            INNER JOIN products ON orders.product_id = products.product_id
            WHERE orders.client_id = '$client_id' AND orders.status = 'on_cart'
            ORDER BY orders.order_id DESC";

$resultCart = mysqli_query($con, $sqlCart);

if (!$resultCart) {
    // Handle errors
    echo 'Error fetching cart items: ' . mysqli_error($con);
    exit;
}

$cartItems = array();

while ($rowCart = mysqli_fetch_assoc($resultCart)) {
    $cartItems[] = $rowCart;
}

$_SESSION['cartItems'] = $cartItems;

mysqli_close($con);
?>