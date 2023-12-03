<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
  <?php
  include "./../../includes/navigation.php";
  include "../../controllers/admin/admin_orders_process.php";
  include "../../controllers/customer/customer_add_to_cart_process.php";
  include "../../connection/connect.php";

  if (!isset($_SESSION['client_id'])) {
    header("Location: /blut_medical/views/customer/customer_login_form.php");
    exit();
  }
  ?>
</header><!-- End Header -->

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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

<body>
  <main id="main">
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <?php
          foreach ($_SESSION['cartItems'] as $item) {
            ?>
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <div class="box featured">
                <form class="productsForm" method="post">
                  <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">
                  <div>
                    <h3>
                      <?php echo $item['product_name']; ?>
                    </h3>
                    <div class="pic">
                      <img src="<?php echo $item['product_image_path']; ?>" class="img-fluid" alt="">
                    </div>
                    <ul>
                      <li>Description:
                        <?php echo $item['product_description']; ?>
                      </li>
                      <li>Price:
                        <?php echo $item['product_price']; ?>
                      </li>
                    </ul>
                  </div>
                  <!-- You can add additional features for cart items, such as quantity, remove button, etc. -->
                </form>
              </div>
            </div>
            <?php
          }
          ?>
        </div>

      </div>

      <div class="col-lg-12" id="order-summary" data-aos="fade-up" data-aos-delay="100">
        <h2>Order Summary</h2>
        <div id="order-items">
          <!-- Order items will be dynamically added here -->
        </div>
        <hr>
        <div class="order-total">
          <p><strong>Subtotal:</strong> <span id="subtotal">0.00</span></p>
          <p><strong>Shipping Fee:</strong> <span id="shipping-fee">0.00</span></p>
          <p><strong>Total:</strong> <span id="total">0.00</span></p>
        </div>
        <button id="proceed-to-checkout" class="btn btn-success btn-user btn-block">Proceed to Checkout</button>
      </div>

      </div>


    </section>
    <!-- End Pricing Section -->
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

  <!-- Template Main JS File -->
  <script src="./../../assets/js/main.js"></script>
</body>

</html>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const orderItemsContainer = document.getElementById('order-items');
    const subtotalSpan = document.getElementById('subtotal');
    const shippingFeeSpan = document.getElementById('shipping-fee');
    const totalSpan = document.getElementById('total');
    const proceedToCheckoutBtn = document.getElementById('proceed-to-checkout');

    const selectAllCheckbox = document.createElement('input');
    selectAllCheckbox.type = 'checkbox';
    selectAllCheckbox.id = 'select-all';
    selectAllCheckbox.addEventListener('change', function () {
      const checkboxes = document.querySelectorAll('.select-item');
      checkboxes.forEach(checkbox => checkbox.checked = selectAllCheckbox.checked);
      updateOrderSummary();
    });

    const selectAllLabel = document.createElement('label');
    selectAllLabel.htmlFor = 'select-all';
    selectAllLabel.textContent = 'Select All';

    document.getElementById('order-summary').insertBefore(selectAllLabel, document.getElementById('order-items'));
    document.getElementById('order-summary').insertBefore(selectAllCheckbox, document.getElementById('order-items'));

    const updateOrderSummary = () => {
      // Logic to update order summary based on selected items
    };

    // Implement logic to dynamically add/remove items to/from order summary and update totals
  });
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