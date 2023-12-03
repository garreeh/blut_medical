<?php
include "../../connection/connect.php";

if (isset($_POST['order_button'])) {
  $client_id = $_SESSION['client_id'];
  $product_id = $_POST['product_id'];
  $status = "on_cart";

  $sql = "INSERT INTO orders (client_id, product_id, status) VALUES ('$client_id', '$product_id', '$status')";

  if (mysqli_query($con, $sql)) {
    // Return a success message
    echo json_encode(['success' => true, 'message' => 'Order placed successfully.']);
  } else {
    // Return an error message
    echo json_encode(['success' => false, 'message' => 'Error placing order: ' . mysqli_error($con)]);
  }
}
?>
