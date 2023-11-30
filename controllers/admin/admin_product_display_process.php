<?php

include "../../connection/connect.php";
include "../../controllers/admin/admin_update_products_process.php";


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
    <td>
      <a href="#" data-toggle="modal" data-target="#updateModal_<?php echo $product_id; ?>">
        <?php echo $product_code; ?>
      </a>
    </td>

    <td> <a href="#" data-toggle="modal" data-target="#updateModal_<?php echo $product_id; ?>">
        <?php echo $product_name; ?>
      </a></td>

    <td> <a href="#" data-toggle="modal" data-target="#updateModal_<?php echo $product_id; ?>">
        <?php echo $product_description; ?>
      </a></td>
    <td> <a href="#" data-toggle="modal" data-target="#updateModal_<?php echo $product_id; ?>">
        <?php echo $product_price; ?>
      </a></td>
    <td> <a href="#" data-toggle="modal" data-target="#updateModal_<?php echo $product_id; ?>">
        <?php echo $product_qty; ?>
      </a></td>

    <td> <a href="#" data-toggle="modal" data-target="#updateModal_<?php echo $product_id; ?>"><b>Edit</b></a></td>
  </tr>

  <div class="modal fade" id="updateModal_<?php echo $product_id; ?>" tabindex="-1" role="dialog"
    aria-labelledby="updateModalLabel_<?php echo $product_id; ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateModalLabel_<?php echo $product_id; ?>">Product Update</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <div class="form-group">
              <label>Product Code:</label>
              <input type="text" class="form-control" id="product_code" name="product_code"
                placeholder="Enter Product Code" value="<?php echo $product_code; ?>" required>
            </div>

            <div class="form-group">
              <label for="itemDescription">Product Name:</label>
              <input type="text" class="form-control" id="product_name" name="product_name"
                placeholder="Enter Product Name" value="<?php echo $product_name; ?>" required>
            </div>

            <div class="form-group">
              <label>Product Description:</label>
              <input type="text" class="form-control" id="product_description" name="product_description"
                placeholder="Enter Product Description" value="<?php echo $product_description; ?>" required>
            </div>

            <div class="form-group">
              <label>Product Price:</label>
              <input type="number" class="form-control" id="product_price" name="product_price"
                placeholder="Enter Product Price" value="<?php echo $product_price; ?>" required>
            </div>

            <div class="form-group">
              <label>Product Quantity:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-outline-secondary" onclick="decrementQuantityUpdate()">-</button>
                </div>
                <input type="number" class="form-control" id="product_qty" name="product_qty"
                  placeholder="Enter Product Quantity" value="<?php echo $product_qty; ?>" required>
                <div class="input-group-append">
                  <button type="button" class="btn btn-outline-secondary" onclick="incrementQuantityUpdate()">+</button>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Product Image:</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="fileToUpload" name="fileToUpload"
                  value="<?php echo $fileToUpload; ?>" accept="image/*" required>
                <label class="custom-file-label">Choose File</label>
              </div>
            </div>

            <!-- Add a hidden input field to submit the form with the button click -->
            <input type="hidden" name="update_button" value="1">

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Update</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function () {
      // Show the selected file name in the custom file input
      $("#fileToUpload").change(function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).next(".custom-file-label").html(fileName);
      });
    });

    function incrementQuantityUpdate() {
      var quantityInput = document.getElementById('product_qty');
      var currentQuantity = parseInt(quantityInput.value) || 0;
      quantityInput.value = currentQuantity + 1;
    }

    function decrementQuantityUpdate() {
      var quantityInput = document.getElementById('product_qty');
      var currentQuantity = parseInt(quantityInput.value) || 0;
      // Ensure the quantity doesn't go below zero
      quantityInput.value = Math.max(0, currentQuantity - 1);
    }
  </script>

<?php } ?>