<?php
include "../../connection/connect.php";

// Assuming you have a query to select data from your database
$select_query = "SELECT o.order_id, c.first_name, c.last_name, p.product_name, o.quantity, o.status, o.created_at
                 FROM orders o
                 JOIN client_registration c ON o.client_id = c.client_id
                 JOIN products p ON o.product_id = p.product_id";

$result = mysqli_query($con, $select_query);

while ($row = mysqli_fetch_assoc($result)) {
    $order_id = $row['order_id'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $product_name = $row['product_name'];
    $quantity = $row['quantity'];
    $status = $row['status'];
    $created_at = $row['created_at'];
    ?>

    <tr>
        <td> <?php echo $first_name . ' ' . $last_name; ?> </td>
        <td> <?php echo $product_name; ?> </td>
        <td> <?php echo $quantity; ?> </td>
        <td> <?php echo $status; ?> </td>
        <td> <?php echo $created_at; ?> </td>
    </tr>

<?php } ?>
