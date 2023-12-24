<?php
include "../../connection/connect.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Get the client ID
$client_id = $_SESSION['client_id'];

// Change this to the desired status
$ship_status = 'To Ship';

// Loop through each item in the cart
foreach ($_SESSION['cartItems'] as $item) {
    // Get the product ID for the current item
    $product_id = $item['product_id'];


    // Update order status for a specific client and product
    $update_status_sql = "UPDATE orders SET status = '$ship_status' WHERE client_id='$client_id' AND product_id='$product_id' AND status='Cart'";

    // Display information about each item
    echo "Client ID: " . $client_id . "<br>";
    echo "Product Name: " . $item['product_name'] . "<br>";
    echo "Product ID: " . $product_id . "<br>";
    
    if (mysqli_query($con, $update_status_sql)) {
        // Update order status to "To Ship"
        echo "Order status updated to 'To Ship' successfully for product ID: $product_id.<br>";
    } else {
        echo "Error updating order status: " . mysqli_error($con) . "<br>";
    }
}

?>

<?php
// // Insert a new record into the transactions table
    // $payment_total = isset($_POST['payment_gross']) ? $_POST['payment_gross'] : ''; // Assuming 'payment_gross' is the total amount paid
    // $payment_status = 'Paypal'; // Assuming PayPal payment status should be recorded in the 'transactions' table
    // $date_created = date('Y-m-d H:i:s'); // Current date and time

    // $insert_transaction_sql = "INSERT INTO transactions (client_id, payment_total, payment_status, date_created) VALUES ('$client_id', '$payment_total', '$payment_status', '$date_created')";

    // if (mysqli_query($con, $insert_transaction_sql)) {
    //     echo "Transaction record inserted successfully.";
    // } else {
    //     echo "Error inserting transaction record: " . mysqli_error($con);
    // }
?>
<!-- The rest of your PayPal form remains unchanged -->






