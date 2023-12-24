<?php
// Include your database connection file
include './../connection/connect.php';

// PayPal IPN validation
// See PayPal documentation for IPN verification steps
file_put_contents('ipn_log.txt', date('Y-m-d H:i:s') . " - IPN Request:\n" . print_r($_POST, true) . "\n\n", FILE_APPEND);

$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req .= "&$key=$value";
}

// Set up PayPal sandbox URL for IPN verification
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
// Change to live URL when you go live
// $paypal_url = 'https://www.paypal.com/cgi-bin/webscr';

// Use cURL to post the verification data back to PayPal
$ch = curl_init($paypal_url);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

file_put_contents('ipn_log.txt', date('Y-m-d H:i:s') . " - IPN Response: $req\n\n", FILE_APPEND);

// Execute cURL post and get the PayPal response
if (!($res = curl_exec($ch))) {
    // cURL error
    error_log("cURL error: " . curl_error($ch));
} else {
    // Successful cURL execution
    if (strcmp($res, "VERIFIED") == 0) {
        // IPN verification successful, process the payment

        // Get the client ID
        $client_id = $_POST['custom'];

        file_put_contents('ipn_log.txt', date('Y-m-d H:i:s') . " - Client ID - $client_id\n\n", FILE_APPEND);

        // Change the status
        $ship_status = 'To Ship';

        foreach ($_POST as $key => $value) {
            if (strpos($key, 'item_number') !== false) {
                // Extract the item number from the key
                $item_number = str_replace('product_id_', '', $key);

                // Get the product ID for the current item
                $product_id = $item_number;

                // Check if the product_id is present and not empty
                if (!empty($product_id)) {
                    file_put_contents('ipn_log.txt', date('Y-m-d H:i:s') . " - Product ID - $product_id\n\n", FILE_APPEND);

                    // Update order status for a specific client and product
                    $update_status_sql = "UPDATE orders SET status = '$ship_status' WHERE client_id='$client_id' AND status='Cart'";

                    // Execute SQL query
                    if (mysqli_query($con, $update_status_sql)) {
                        // Update order status to "To Ship"
                        echo "Order status updated to 'To Ship' successfully for product ID: $product_id.<br>";
                    } else {
                        echo "Error updating order status: " . mysqli_error($con) . "<br>";
                    }
                }

            }
        }
    } else {
        // IPN verification failed
        error_log("IPN verification failed: $res");
    }


}

// Close cURL session
curl_close($ch);
?>