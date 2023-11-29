<?php

include "../../connection/connect.php";

if (isset($_POST['cart_button'])) {
  // Assuming you have client_id and product_id available in your session or through some other means
  $client_id = $_SESSION['client_id']; // Adjust this based on how you store client_id in your session
  $product_id = $_POST['product_id']; // Adjust this based on how you get the product_id

  // SQL query to insert data into the add_to_cart table
  $sql = "INSERT INTO add_to_cart (client_id, product_id) VALUES ('$client_id', '$product_id')";

  if (mysqli_query($con, $sql)) {
    echo "Product Added to Cart Successfully.";
  } else {
    echo "Error placing to Cart: " . mysqli_error($con);
  }
}

?>