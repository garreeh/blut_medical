<?php

include "../../connection/connect.php";

// Assuming you have a query to select data from your database
$select_query = "SELECT order_id, client_id, product_id, created_at, status FROM orders";
$result = mysqli_query($con, $select_query);

while ($row = mysqli_fetch_assoc($result)) {
  $order_id = $row['order_id'];
  $client_id = $row['client_id'];
  $product_id = $row['product_id'];
  $status = $row['status'];
  $created_at = $row['created_at'];

  ?>

  <tr>
    <td> <?php echo $client_id; ?> </td>
    <td> <?php echo $product_id; ?> </td>
    <td> <?php echo $status; ?> </td>
    <td> <?php echo $created_at; ?> </td>


    <!-- This is an example of clickable data with id on it -->
    <!-- <td> <a href="views/viewUser.php?id=</?php echo $order_id; ?>"></?php echo $status; ?> </a></td> -->

  </tr>

<?php } ?>