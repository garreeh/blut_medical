<?php
include "../../connection/connect.php";

if (isset($_POST['order_button'])) {
    $client_id = $_SESSION['client_id'];
    $product_id = $_POST['product_id'];
    $status = "on_cart";

    // Check if the product is already in the cart
    $check_existing_sql = "SELECT * FROM orders WHERE client_id='$client_id' AND product_id='$product_id' AND status='$status'";
    $check_existing_result = mysqli_query($con, $check_existing_sql);

    if (mysqli_num_rows($check_existing_result) > 0) {
        // Update quantity if the product is already in the cart
        $update_quantity_sql = "UPDATE orders SET quantity = quantity + 1 WHERE client_id='$client_id' AND product_id='$product_id' AND status='$status'";
        if (mysqli_query($con, $update_quantity_sql)) {
            echo json_encode(['success' => true, 'message' => 'Quantity updated successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error updating quantity: ' . mysqli_error($con)]);
        }
    } else {
        // Insert new item into the cart
        $insert_sql = "INSERT INTO orders (client_id, product_id, status, quantity) VALUES ('$client_id', '$product_id', '$status', 1)";
        if (mysqli_query($con, $insert_sql)) {
            echo json_encode(['success' => true, 'message' => 'Order placed successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error placing order: ' . mysqli_error($con)]);
        }
    }
}
?>
