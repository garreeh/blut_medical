<?php
include "../../connection/connect.php";

// Assuming you have a query to select data from your database
$select_query = "SELECT t.transaction_id, c.first_name, c.last_name, t.payment_status, t.date_created
                 FROM transactions t
                 JOIN client_registration c ON t.client_id = c.client_id";

$result = mysqli_query($con, $select_query);

while ($row = mysqli_fetch_assoc($result)) {
    $transaction_id = $row['transaction_id'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $payment_status = $row['payment_status'];
    $date_created = $row['date_created'];
    ?>

    <tr>
        <td> <?php echo $first_name . ' ' . $last_name; ?> </td>
        <td> <?php echo $transaction_id; ?> </td>
        <td> <?php echo $payment_status; ?> </td>
        <td> <?php echo $date_created; ?> </td>
    </tr>

<?php } ?>
