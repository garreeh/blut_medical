<?php
include "../../connection/connect.php";
include "../../controllers/admin/admin_add_products_process.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendragon</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

  <div class="container mt-5">
    <button class="btn btn-success" data-toggle="modal" data-target="#addItemModal">Add Product</button>

    <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addItemModalLabel">Add Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="itemName">Product Code:</label>
                <input type="text" class="form-control" id="product_code" name="product_code"
                  placeholder="Enter Product Code" required>
              </div>

              <div class="form-group">
                <label for="itemDescription">Product Name:</label>
                <input type="text" class="form-control" id="product_name" name="product_name"
                  placeholder="Enter Product Name" required>
              </div>

              <div class="form-group">
                <label for="itemDescription">Product Description:</label>
                <input type="text" class="form-control" id="product_description" name="product_description"
                  placeholder="Enter Product Description" required>
              </div>

              <div class="form-group">
                <label for="itemDescription">Product Price:</label>
                <input type="number" class="form-control" id="product_price" name="product_price"
                  placeholder="Enter Product Price" required>
              </div>

              <div class="form-group">
                <label for="itemImage">Product Image:</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="fileToUpload" name="fileToUpload" accept="image/*" required>
                  <label class="custom-file-label" for="itemImage">Choose file</label>
                </div>
              </div>

              <!-- Add a hidden input field to submit the form with the button click -->
              <input type="hidden" name="add_product_button" value="1">

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

  <script>
    $(document).ready(function () {
      // Show the selected file name in the custom file input
      $("#fileToUpload").change(function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).next(".custom-file-label").html(fileName);
      });
    });
  </script>

</body>

</html>