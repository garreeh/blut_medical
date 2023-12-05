<?php

session_start();

include "../../connection/connect.php";

// Check if client_id is set in the session
if (!isset($_SESSION['client_id'])) {
    // Handle the case where client_id is not set in the session
    echo json_encode(['error' => 'client_id is not set in the session.']);
    exit;
}

$client_id = $_SESSION['client_id'];

$sqlCart = "SELECT orders.order_id, orders.*, products.product_name, products.product_description, products.product_price, products.product_image_path
            FROM orders
            INNER JOIN products ON orders.product_id = products.product_id
            WHERE orders.client_id = '$client_id' AND orders.status = 'on_cart'
            ORDER BY orders.order_id DESC";

$resultCart = mysqli_query($con, $sqlCart);

if (!$resultCart) {
    // Handle errors
    echo json_encode(['error' => 'Error fetching cart items: ' . mysqli_error($con)]);
    exit;
}

$cartItems = array();

while ($rowCart = mysqli_fetch_assoc($resultCart)) {
    $cartItems[$rowCart['product_id']] = $rowCart; // Use product_id as the array key
}

// Assign cart items to the session variable
$_SESSION['cartItems'] = $cartItems;

// Handle the AJAX request for updating the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = json_decode(file_get_contents("php://input"), true);

    $productId = $requestData['productId'];
    $newQuantity = $requestData['newQuantity'];

    // Validate and sanitize input if necessary

    // Update the cart in the database
    $updateQuery = "UPDATE orders SET quantity = $newQuantity WHERE product_id = $productId AND client_id = '$client_id' AND status = 'on_cart'";

    $updateResult = mysqli_query($con, $updateQuery);

    if ($updateResult) {
        // Fetch the updated data after the update
        $updatedCartData = mysqli_query($con, $sqlCart);
        $updatedCartItems = array();

        while ($row = mysqli_fetch_assoc($updatedCartData)) {
            $updatedCartItems[$row['product_id']] = $row;
        }

        // Update the session variable with the updated data
        $_SESSION['cartItems'] = $updatedCartItems;

        // Return the new total or success status
        $newTotal = $updatedCartItems[$productId]['product_price'] * $newQuantity;
        echo json_encode(['newTotal' => $newTotal]);
    } else {
        // Handle update error
        http_response_code(500); // Internal Server Error
        echo json_encode(['error' => 'Failed to update quantity in the database']);
    }
}
?>