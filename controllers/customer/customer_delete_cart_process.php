<?php
include "../../connection/connect.php";

$order_id = $con->real_escape_string($_GET['order_id']);
$sqldelete = "DELETE FROM orders WHERE order_id= $order_id";

if ($con->query($sqldelete) === TRUE) {
  header("Location: ./../../views/customer/customer_add_to_cart.php");
  exit(); 
} else {
  echo "Error deleting record: " . $con->error;
}
?>