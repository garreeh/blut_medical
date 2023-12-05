<?php
include "../../connection/connect.php";

$product_id = $con->real_escape_string($_GET['product_id']);
$sqldelete = "DELETE FROM products WHERE product_id= $product_id";

if ($con->query($sqldelete) === TRUE) {
  header("Location: ./../../views/admin/admin_add_products.php");
  exit(); 
} else {
  echo "Error deleting record: " . $con->error;
}
?>