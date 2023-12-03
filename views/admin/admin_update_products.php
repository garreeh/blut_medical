<?php

include "../../connection/connect.php";
include "../../controllers/admin/admin_update_products_process.php";

// Assuming you have a query to select data from your database
$select_query = "SELECT product_id, product_code, product_name, product_description, product_price, product_qty, product_image_path FROM products";
$result = mysqli_query($con, $select_query);

while ($row = mysqli_fetch_assoc($result)) {
  $product_id = $row['product_id'];
  $product_code = $row['product_code'];
  $product_name = $row['product_name'];
  $product_description = $row['product_description'];
  $product_price = $row['product_price'];
  $product_qty = $row['product_qty'];
  $product_image_path = $row['product_image_path'];
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
        <?php echo "₱ " . $product_price; ?>
      </a></td>

    <td> <a href="#" data-toggle="modal" data-target="#updateModal_<?php echo $product_id; ?>">
        <?php echo $product_qty; ?>
      </a></td>
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
                  <button type="button" class="btn btn-outline-secondary decrement-btn"
                    data-target="update_product_qty">-</button>
                </div>
                <input type="number" class="form-control update_product_qty" name="product_qty"
                  placeholder="Enter Product Quantity" value="<?php echo $product_qty; ?>" required>
                <div class="input-group-append">
                  <button type="button" class="btn btn-outline-secondary increment-btn"
                    data-target="update_product_qty">+</button>
                </div>
              </div>
            </div>

            <!-- Display the current image -->
            <div class="form-group">
              <label>Current Image:</label>
              <?php if (!empty($product_image_path)): ?>
                <img src="<?php echo $product_image_path; ?>" alt="Current Image" style="max-width: 100px;">
                <input type="hidden" name="current_image_path" value="<?php echo $product_image_path; ?>">
              <?php else: ?>
                <p>No image available</p>
              <?php endif; ?>
            </div>

            <!-- Allow the user to upload a new image -->
            <div class="form-group">
              <label>Upload a new image:</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="fileToUpdate<?php echo $product_id; ?>"
                  name="fileToUpload" accept="image/*">
                <label class="custom-file-label">Choose new file</label>
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <script>
    $(document).ready(function () {
      // Show the selected file name in the custom file input
      $("[id^='fileToUpdate']").change(function () {
        var fileNameUpdate = $(this).val().split("\\").pop();
        $(this).next(".custom-file-label").html(fileNameUpdate);
      });
    });

    // function incrementQuantityUpdate() {
    //   var quantityInput = document.getElementById('update_product_qty');
    //   var currentQuantity = parseInt(quantityInput.value) || 0;
    //   quantityInput.value = currentQuantity + 1;

    //   console.log("Before increment:", currentQuantity);
    //   console.log("After increment:", quantityInput);
    // }

    // function decrementQuantityUpdate(button) {
    //   var quantityInput = button.closest(".input-group").find('.update_product_qty');
    //   var currentQuantity = parseInt(quantityInput.value) || 0;
    //   // Ensure the quantity doesn't go below zero
    //   quantityInput.val(Math.max(0, currentQuantity - 1));
    // }

    // IT HAS BUG THE CODE BELOW, IT THROWS CONSOLE LOG 4 TIMES

    $(document).ready(function () {
      $(document).on("click", ".increment-btn, .decrement-btn", function () {
        updateQuantity($(this));
      });
    });

    function updateQuantity(button) {
      var targetInputClass = button.data("target");
      var quantityInput = button.closest(".input-group").find('.' + targetInputClass);
      var currentQuantity = parseInt(quantityInput.val()) || 0;
      quantityInput.value = currentQuantity + 1;

      if (button.hasClass("increment-btn")) {
        quantityInput.val(currentQuantity + 1);
      } else if (button.hasClass("decrement-btn")) {
        // Ensure the quantity doesn't go below zero
        quantityInput.val(Math.max(0, currentQuantity - 1));
      }

      console.log("Before update:", currentQuantity);
      console.log("After update:", quantityInput.val());
    }
    
  </script>

  <style>
    #update_product_qty,
    #product_price {
      /* For Firefox */
      -moz-appearance: textfield;

      /* For other browsers */
      appearance: textfield;

      /* For Webkit browsers like Chrome and Safari */
      -webkit-appearance: none;
      margin: 0;
    }

    #update_product_qty::-webkit-inner-spin-button,
    #update_product_qty::-webkit-outer-spin-button,
    #product_price::-webkit-inner-spin-button,
    #product_price::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  </style>


<?php } ?>