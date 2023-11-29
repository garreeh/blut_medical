<?php
// ob_start();
// error_reporting(0);
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include "../../connection/connect.php";

if (isset($_POST['update_button'])) {
  $product_id = $con->real_escape_string(strip_tags($_POST['product_id']));
  $product_code = $con->real_escape_string(strip_tags($_POST['product_code']));
  $product_name = $con->real_escape_string(strip_tags($_POST['product_name']));
  $product_description = $con->real_escape_string(strip_tags($_POST['product_description']));
  $product_price = $con->real_escape_string(strip_tags($_POST['product_price']));
  $product_qty = $con->real_escape_string(strip_tags($_POST['product_qty']));

  // Use the correct table name and column names
  $con->query("UPDATE `products` 
        SET
        `product_code` = '$product_code',
        `product_name` = '$product_name',
        `product_description` = '$product_description',
        `product_price` = '$product_price',
        `product_qty` = '$product_qty'
        WHERE product_id = '$product_id'");

  // Your success message and any additional logic
}


?>