<?php

include "../../connection/connect.php";

// Assuming you have a query to select data from your database
$select_query = "SELECT product_id, product_code, product_name, product_description, product_price, product_qty FROM products";
$result = mysqli_query($con, $select_query);

while ($row = mysqli_fetch_assoc($result)) {
  $product_id = $row['product_id'];
  $product_code = $row['product_code'];
  $product_name = $row['product_name'];
  $product_description = $row['product_description'];
  $product_price = $row['product_price'];
  $product_qty = $row['product_qty'];
  ?>

  <tr>
    <!-- This is an example of clickable data with id on it -->
    <td>
      <a href="#" data-toggle="modal" data-target="#updateItemModal"
        data-product-id="<?php echo $product_id; ?>">
        <?php echo $product_code; ?>
      </a>
    </td>

    <td> <a href="views/admin/admin_update_products.php?id=<?php echo $product_id; ?>">
        <?php echo $product_name; ?>
      </a></td>

    <td> <a href="views/admin/admin_update_products.php?id=<?php echo $product_id; ?>">
        <?php echo $product_description; ?>
      </a></td>
    <td> <a href="views/admin/admin_update_products.php?id=<?php echo $product_id; ?>">
        <?php echo $product_price; ?>
      </a></td>
    <td> <a href="views/admin/admin_update_products.php?id=<?php echo $product_id; ?>">
        <?php echo $product_qty; ?>
      </a></td>

    <td> <a href="#" data-toggle="modal" data-target="#updateItemModal"><b>Edit</b></a></td>

  </tr>

<?php } ?>