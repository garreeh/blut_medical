<?php

include "../../connection/connect.php";

if (isset($_POST['order_button'])) {
  // Assuming you have client_id and product_id available in your session or through some other means
  $client_id = $_SESSION['client_id']; // Adjust this based on how you store client_id in your session
  $product_id = $_POST['product_id']; // Adjust this based on how you get the product_id

  // Status can be set to some default value or retrieved from the form
  $status = "Pending"; // Adjust this based on your requirements

  // SQL query to insert data into the orders table
  $sql = "INSERT INTO orders (client_id, product_id, status) VALUES ('$client_id', '$product_id', '$status')";

  if (mysqli_query($con, $sql)) {
    echo "Order placed successfully.";
  } else {
    echo "Error placing order: " . mysqli_error($con);
  }
}
?>