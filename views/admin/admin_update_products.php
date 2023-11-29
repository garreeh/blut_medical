<?php
include "../../connection/connect.php";
include "../../controllers/admin/admin_add_products_process.php";
include "../../controllers/admin/admin_add_products_process.php";
include "../../controllers/admin/admin_update_products_process.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blüt Medical | Admin</title>

  <!-- Custom fonts for this template-->
  <link href="./../../assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="./../../assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI/tZ1aZItpi9f3k3G5vl0lMzR7+lSD1P6X8K/9U=" crossorigin="anonymous"></script>
</head>

<body id="page-top">
  <!-- UPDATE PRODUCT -->
  <div class="modal fade" id="updateItemModal" tabindex="-1" role="dialog" aria-labelledby="updateItemModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addItemModalLabel">Update Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php

          include '../../controllers/admin/admin_update_products_process.php';

          if (isset($_GET['product_id'])) {
            $product_id = $con->real_escape_string($_GET['product_id']);
            $sql = "SELECT * FROM `products` WHERE product_id='$product_id'";

            $result = mysqli_query($con, $sql);

            while ($productData = mysqli_fetch_assoc($result)) {
              $product_id = $productData['product_id'];
              $product_code = $productData['product_code'];
              $product_name = $productData['product_name'];
              $product_description = $productData['product_description'];
              $product_price = $productData['product_price'];
              $product_price = $productData['product_price'];
              $fileToUpload = $productData['product_image_path'];

              echo "$product_id";

              ?>
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
                      <button type="button" class="btn btn-outline-secondary" onclick="decrementQuantity()">-</button>
                    </div>
                    <input type="number" class="form-control" id="product_qty" name="product_qty"
                      placeholder="Enter Product Quantity" value="<?php echo $product_qty; ?>" required>
                    <div class="input-group-append">
                      <button type="button" class="btn btn-outline-secondary" onclick="incrementQuantity()">+</button>
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
              <?php
            }
          } else {
            echo "Product ID not provided in the URL.";
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="./../../assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="./../../assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="./../../assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="./../../assets/admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="./../../assets/admin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="./../../assets/admin/js/demo/chart-area-demo.js"></script>
  <script src="./../../assets/admin/js/demo/chart-pie-demo.js"></script>

</body>

</html>

<script>
  $(document).ready(function () {
    // Show the selected file name in the custom file input
    $("#fileToUpload").change(function () {
      var fileName = $(this).val().split("\\").pop();
      $(this).next(".custom-file-label").html(fileName);
    });
  });

  function incrementQuantity() {
    var quantityInput = document.getElementById('product_qty');
    var currentQuantity = parseInt(quantityInput.value) || 0;
    quantityInput.value = currentQuantity + 1;
  }

  function decrementQuantity() {
    var quantityInput = document.getElementById('product_qty');
    var currentQuantity = parseInt(quantityInput.value) || 0;
    // Ensure the quantity doesn't go below zero
    quantityInput.value = Math.max(0, currentQuantity - 1);
  }
</script>


<!-- Add this script to your page -->
<script>
  function openUpdateModal(product_id) {
    $('#updateItemModal').modal('show');
    $('#updateItemModal').find('.modal-body').load('admin_update_products.php?product_id=' + product_id);
  }
</script>