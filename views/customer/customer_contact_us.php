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

  <title>Blüt | Contact Us</title>
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

    <div class="blut_medical-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-8 mx-auto">
            <div class="card shadow border">
              <div class="card-header">
                <h1>Contact Us</h1>
              </div>
              <div class="card-body d-flex flex-column align-items-center">
                <form class="col-md-12" method="post" action="process_contact_form.php">
                  <div class="site-blocks-table">
                    <!-- Add form fields here -->
                    <div class="form-group">
                      <label for="name">Name:</label>
                      <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label for="message">Message:</label>
                      <textarea id="message" name="message" class="form-control" rows="11" required></textarea>
                    </div>
                    <!-- End of form fields -->
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-dark btn-lg">
                        Send
                      </button>
                    </div>
                  </div>
                </form>
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