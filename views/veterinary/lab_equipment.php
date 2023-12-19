<?php
include "../../connection/connect.php";
include './../../controllers/admin/admin_add_products_process.php';
include "../../controllers/admin/admin_orders_process.php";

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blüt | Showcase</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./../../assets/img/favicon.ico" rel="icon">

  <!-- Include jQuery and toast -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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

    <!-- This is the modal for the specific product -->
    <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-center"> <!-- Added 'text-center' class for centering content -->
          <div class="modal-header">
            <h5 class="modal-title" id="addItemModalLabel">Product Display</h5>
          </div>
          <div class="modal-body">
            <form method="post">
              <input type="hidden" name="product_id" value="">
              <h3 id="modalProductName"></h3>
              <div class="pic">
                <img id="modalProductImage" class="img-fluid product-thumbnail" alt="">
              </div>
              <h3 id="modalProductDescription"></h3>
              <p id="modalProductPrice"></p>
              <button type="button" class="btn btn-primary btn-block addToCartButton"
                data-productid="<?php echo $row['product_id']; ?>">
                Add To Cart
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing product-section">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Buy Laboratory Equipment</h2>
        </div>
        <div class="row">

          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div style="margin-bottom: 80px;" class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <div class="box featured">

                <form method="post" id="addToCartForm<?php echo $row['product_id']; ?>">
                  <a href="#" class="product-item" onclick="openModal(
                    '<?php echo $row['product_id']; ?>',
                    '<?php echo $row['product_name']; ?>',
                    '<?php echo $row['product_description']; ?>',
                    '<?php echo ($row['product_price'] == 0) ? 'Ask for Price, please!' : '₱' . number_format($row['product_price'], 2); ?>',
                    '<?php echo $row['product_image_path']; ?>'
                )" data-target="#addItemModal">

                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                    <div>
                      <h3>
                        <?php echo $row['product_name']; ?>
                      </h3>
                      <div class="pic">
                        <img src="<?php echo $row['product_image_path']; ?>" class="img-fluid product-thumbnail" alt="">
                      </div>
                    </div>
                  </a>

                  <h3>
                    <?php echo ($row['product_price'] == 0) ? 'Ask for Price, please!' : '₱' . number_format($row['product_price'], 2); ?>
                  </h3>

                  <p>
                    <?php echo $row['product_description']; ?>
                  </p>

                  <?php if ($row['product_price'] == 0) { ?>
                    <!-- Redirect to contact page button -->

                    <div class="text-center">
                    <a href="./../customer/customer_contact_us.php" class="btn btn-primary btn-block" role="button">Contact Us</a>
                    </div>
                  <?php } else { ?>
                    <!-- Add to Cart button -->

                    <div class="text-center">
                    <button type="button" class="btn btn-primary btn-block addToCartButton" 
                      data-productid="<?php echo $row['product_id']; ?>">
                      Add To Cart
                    </button>
                    </div>
                  <?php } ?>
                </form>
              </div>
            </div>
            <?php
          }
          ?>

        </div>
      </div>
    </section>

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" style="background-color:aliceblue;" class="portfolio-details">
      <div class="container">

        <div class="section-title">
          <h2>FEATURED EQUIPMENT</h2>
          <!-- <p>Short write up here. Lorem ipsum Dolor sit amet</p> -->
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="row gy-4" style="background-color:aliceblue">

                <div class="col-lg-6">
                  <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">

                      <div class="swiper-slide">
                        <img src="./../../assets/img/featured//hematology-first.png" alt="">
                      </div>

                      <div class="swiper-slide">
                        <img src="./../../assets/img/featured/hematology-second.png" alt="">
                      </div>
                    </div>
                    <div class="swiper-pagination"></div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="portfolio-description">
                    <h2>Hematology Machine</h2>
                    <div class="portfolio-info">
                      <h3>Product Information</h3>
                      <ul>
                        <li>Throughout: 60T/H</li>
                        <li>8-inch touch screen</li>
                        <li>20 parameters + 3 histogram</li>
                        <li>3 counting modes</li>
                        <li>100, 000 sample results</li>
                        <li>Support LIS and external printer</li>
                        <li>Net weight: 21kg</li>
                        <li>CE marked</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Portfolio Details Section -->
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
  <script src="./../../assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Include Toastify.js from CDN -->
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


</body>

</html>

<script>

  var selectedItem = {};

  function formatCurrency(amount) {
    return amount.toLocaleString('en-US');
  }

  function openModal(productID, productName, productDescription, productPrice, productImagePath) {
    selectedItem = {
      'product_id': productID,
      'product_name': productName,
      'product_description': productDescription,
      'product_price': productPrice,
      'product_image_path': productImagePath
    };

    // Update modal content
    document.getElementById('modalProductName').innerHTML = selectedItem.product_name;
    document.getElementById('modalProductDescription').innerHTML = selectedItem.product_description;
    document.getElementById('modalProductPrice').innerHTML = selectedItem.product_price;
    document.getElementById('modalProductImage').src = selectedItem.product_image_path;

    // Set the product_id in the hidden input of the form
    document.querySelector('#addItemModal form [name="product_id"]').value = selectedItem.product_id;

    // Display the modal
    $('#addItemModal').modal('show');
  }

  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".addToCartButton").forEach(function (button) {
      button.addEventListener("click", function () {
        <?php
        if (!isset($_SESSION['client_id'])) {
          ?>
          window.location.href = '/blut_medical/views/customer/customer_login_form.php';
          <?php
        } else {
          ?>
          var form = this.closest('form');
          var formData = new FormData(form);

          formData.append('order_button', 'true');

          fetch("./../../controllers/admin/admin_orders_process.php", {
            method: "POST",
            body: formData,
          })
            .then(response => {
              if (!response.ok) {
                throw new Error('Network response was not ok');
              }
              // Check if the response body is empty
              if (!response.headers.get('content-length')) {
                throw new Error('Empty response');
              }
              return response.json();
            })
            .then(data => {
              if (data) {
                if (data.success) {
                  // Show success toast notification
                  Toastify({
                    text: data.message,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "green",
                  }).showToast();
                } else {
                  // Show error toast notification
                  Toastify({
                    text: "Error: " + data.message,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "red",
                  }).showToast();
                }
              } else {
                throw new Error('Empty response or invalid JSON');
              }
            })
            .catch(error => {
              // Show error toast notification for fetch failure
              Toastify({
                text: "Fetch request failed: " + error.message,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "red",
              }).showToast();
            });
          <?php
        }
        ?>
      });
    });
  });


</script>