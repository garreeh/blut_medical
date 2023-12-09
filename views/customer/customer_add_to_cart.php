<?php
include "../../connection/connect.php";
include "../../controllers/admin/admin_orders_process.php";
include "../../controllers/customer/customer_add_to_cart_process.php";

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['client_id'])) {
  header("Location: /blut_medical/views/customer/customer_login_form.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blut Medical</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./../../assets/img/favicon.ico" rel="icon">
  <link href="./../../assets/img/favicon.ico" rel="icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Include Toastr CSS and JS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>

<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
  rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="./../../assets/vendor/aos/aos.css" rel="stylesheet">
<link href="./../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="./../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="./../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="./../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="./../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="./../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="./../../assets/css/style.css" rel="stylesheet">
<link href="./../../assets/css/product_designs.css" rel="stylesheet">

<body>
  <main id="main">
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
      <?php
      include "./../../includes/navigation.php";
      ?>
    </header>
    <!-- End Header -->

    <div class="blut_medical-section before-footer-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table">
                <thead>
                  <tr>
                    <th class="product-select-all">
                      <input type="checkbox" id="selectAllCheckbox" onclick="toggleSelectAll()">
                      <label for="selectAllCheckbox"></label>
                    </th>
                    <th class="product-thumbnail">Product Photo</th>
                    <th class="product-name">Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($_SESSION['cartItems'] as $item) { ?>
                    <tr>
                      <td class="product-select-all">
                        <input type="checkbox" class="product-checkbox" name="selectedProducts[]"
                          value="<?php echo $item['product_id']; ?>">
                      </td>
                      <td class="product-thumbnail">
                        <img src="<?php echo $item['product_image_path']; ?>" alt="Product Image" class="img-fluid" />
                      </td>
                      <td class="product-name">
                        <h2 class="h5 text-black">
                          <?php echo $item['product_name']; ?>
                        </h2>
                        <p>
                          <?php echo $item['product_description']; ?>
                        </p>
                      </td>
                      <td id="basePrice-<?php echo $item['product_id']; ?>">
                        <?php echo "₱ " . number_format($item['product_price'], 2); ?>
                      </td>
                      <td>
                        <div class="input-group mb-3 d-flex align-items-center quantity-container"
                          style="max-width: 120px">
                          <div class="input-group-prepend">
                            <button class="btn btn-outline-black decrease" type="button" id="cartDecrease"
                              onclick="decrementQuantityCart(<?php echo $item['product_id']; ?>, document.getElementById('quantity-<?php echo $item['product_id']; ?>'), document.getElementById('price-<?php echo $item['product_id']; ?>'))">−</button>
                          </div>
                          <input type="text" class="form-control text-center quantity-amount"
                            id="quantity-<?php echo $item['product_id']; ?>" value="<?php echo $item['quantity']; ?>"
                            placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1"
                            disabled />
                          <div class="input-group-append">
                            <button class="btn btn-outline-black increase" type="button" id="cartIncrease"
                              onclick="incrementQuantityCart(<?php echo $item['product_id']; ?>, document.getElementById('quantity-<?php echo $item['product_id']; ?>'), document.getElementById('price-<?php echo $item['product_id']; ?>'))">+</button>
                          </div>
                        </div>
                      </td>
                      <td id="price-<?php echo $item['product_id']; ?>">
                        ₱
                        <?php echo number_format($item['product_price'] * $item['quantity'], 2, '.', ','); ?>
                      </td>

                      <td>
                        <form class="productsForm" method="post">
                          <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">
                          <input type="hidden" name="quantity" value="<?php echo $item['quantity']; ?>">

                          <a href="./../../controllers/customer/customer_delete_cart_process.php?order_id=<?php echo $item['order_id']; ?>"
                            type="submit" class="btn btn-sm btn-danger shadow-sm">Remove Product</a>
                        </form>
                      </td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <a class="btn btn-dark btn-sm btn-block">
                  Show Ordered Products
                </a>
              </div>
              <div class="col-md-6">
                <a href="/blut_medical/views/veterinary/lab_equipment.php" class="btn btn-dark btn-sm btn-block">
                  Continue Shopping
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-3" id="subtotalRow">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal:</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black" id="subtotalAmount">₱0.00</strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total:</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black" id="totalAmount">₱0.00</strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-dark btn-lg py-3 btn-block" onclick="window.location='checkout.html'">
                      Proceed To Checkout
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "./../../includes/footer.php" ?>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="./../../assets/vendor/aos/aos.js"></script>
  <script src="./../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="./../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="./../../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="./../../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="./../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="./../../assets/js/main.js"></script>
</body>

</html>

<script>
  $(document).ready(function () {
    function updateTotal() {
      var totalAmount = 0;

      $('.product-checkbox:checked').each(function () {
        var productId = $(this).val();
        var quantity = parseInt($('#quantity-' + productId).val());

        console.log('Product ID:', productId);
        console.log('Quantity:', quantity);

        var productPrice = parseFloat($('#basePrice-' + productId).text().replace('₱', '').replace(',', ''));
        console.log('Product Price:', productPrice);

        var productTotal = productPrice * quantity;
        console.log('Product Total:', productTotal);

        totalAmount += productTotal;
        console.log('Current Total:', productTotal);
      });

      $('#totalAmount').text('₱' + totalAmount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
    }

    $('.product-checkbox').change(function () {
      updateTotal();
    });

    $('.quantity-amount').change(function () {
      updateTotal();
    });

    $('.increase, .decrease').click(function () {
      updateTotal();
    });

    $('#selectAllCheckbox').click(function (event) {
      $('.product-checkbox').prop('checked', this.checked);
      updateTotal();
    });
  });

  function updateCart(productId, quantityInput, priceCell) {
    var newQuantity = parseInt(quantityInput.value, 10);

    fetch('./../../controllers/customer/customer_add_to_cart_process.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        productId: productId,
        newQuantity: newQuantity,
      }),
    })
      .then(response => response.json())
      .then(data => {
        if (data.newTotal !== undefined) {
          // Update both quantity and price in the UI
          quantityInput.value = newQuantity;
          priceCell.textContent = '₱ ' + data.newTotal.toLocaleString('en-US', { minimumFractionDigits: 2 });
        } else {
          console.error('Update failed:', data.error);
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
  function incrementQuantityCart(productId, quantityInput, priceCell) {
    quantityInput.value = parseInt(quantityInput.value, 10) + 1;
    updateCart(productId, quantityInput, priceCell);
  }

  function decrementQuantityCart(productId, quantityInput, priceCell) {
    var currentQuantity = parseInt(quantityInput.value, 10);

    if (currentQuantity > 1) {
      quantityInput.value = currentQuantity - 1;
      updateCart(productId, quantityInput, priceCell);
    }
  }

</script>

<style>
  .box {
    max-width: 300px;
    /* Set a fixed width for each product box */
    margin: 0 auto;
    /* Center the product box within its container */
  }

  .pic img {
    max-width: 100%;
    /* Make sure the image doesn't exceed the width of its container */
    height: auto;
    /* Allow the height to adjust proportionally with the width */
  }

  .bottom {
    text-align: center;
    /* Center the checkbox */
  }

  #order-summary {
    max-width: 400px;
    /* Set a fixed width for the order summary */
    margin: 0 auto;
    /* Center the order summary within its container */
  }
</style>