<?php
include "../../connection/connect.php";
include "../../controllers/admin/admin_orders_process.php";

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

  <title>Blüt | Check-out</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
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

    <div class="blut_medical-section ">
      <div class="container">
        <h1>Order Summary</h1>
        <div>
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table">
                <thead>
                  <tr>
                    <th class="product-name">Product Name</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $totalAmount = 0; // Initialize total amount variable
                  foreach ($_SESSION['cartItems'] as $item) { ?>
                    <tr>
                      <td class="product-name">
                        <h2 class="h5 text-black">
                          <?php echo $item['product_name']; ?>
                        </h2>
                      </td>
                      <td>
                        <?php echo $item['quantity']; ?>
                      </td>
                      <td>

                        <?php
                        $totalCheckout = $item['product_price'] * $item['quantity'];

                        echo '₱' . number_format($totalCheckout, 2);

                        ?>
                      </td>

                    </tr>

                  <?php } ?>
                  <!-- Add a row for the total -->
                  <tr>
                  <tr>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td>
                      <strong class="text-black" id="totalAmount">₱
                        <?php echo number_format($totalAmount, 2); ?>
                      </strong>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="row">
              <div class="col-md-12 text-center">
                <a class="btn btn-dark btn-lg py-3 btn-block" href="#">
                  Place Order Now
                </a>
              </div>
            </div>
          </form>


          <!--LIVE -->
          <!-- <form name="_xclick" action="https://www.paypal.com/webapps/mpp/paypal-popup" method="post"> -->

          <!-- SANDBOX -->
          <form name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

            <!-- PayPal form details -->
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="upload" value="1">
            <input type="hidden" name="business" value="sb-to8dm28879899@business.example.com">
            <input type="hidden" name="currency_code" value="PHP">

            <?php
            $itemCount = 0; // Counter for items
            
            foreach ($_SESSION['cartItems'] as $item) {
              $itemCount++;
              ?>
              <!-- Product details for PayPal -->
              <input type="hidden" name="item_name_<?php echo $itemCount; ?>"
                value="<?php echo $item['product_name']; ?>">
              <input type="hidden" name="quantity_<?php echo $itemCount; ?>" value="<?php echo $item['quantity']; ?>">
              <input type="hidden" name="amount_<?php echo $itemCount; ?>" value="<?php echo $item['product_price']; ?>">

              <!-- Display product ID for each item -->
              <input type="text" name="product_id[]" value="<?php echo $item['product_id']; ?>">
            <?php } ?>

            <!-- Additional PayPal form fields -->
            <input type="hidden" name="notify_url"
              value="https://ba7b-120-29-87-209.ngrok-free.app/blut_medical/controllers/paypal_ipn.php">
            <input type="hidden" name="return"
              value="https://ba7b-120-29-87-209.ngrok-free.app/blut_medical/controllers/paypal_ipn.php">
            <input type="hidden" name="cancel_return" value="http://localhost/blut_medical/cancel.php">

            <input type="hidden" name="custom" value="<?php echo $_SESSION['client_id']; ?>">

            <input type="text" name="status" value="<?php echo $item['status']; ?>">

            <!-- Total amount for PayPal -->
            <input type="hidden" name="amount" value="<?php echo $totalAmount; ?>">

            <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png"
              border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" />
          </form>


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

  function updateTotal() {
    fetch('./../../controllers/customer/customer_add_to_cart_process.php')
      .then(response => response.json())
      .then(data => {
        if (data.total !== undefined) {
          // Update the total in the UI
          document.getElementById("totalAmount").innerText = '₱' + data.total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        } else {
          console.error('Failed to fetch total:', data.error);
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
  updateTotal();

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