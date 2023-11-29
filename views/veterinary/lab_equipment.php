<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
  <?php
  include "./../../includes/navigation.php";
  include './../../controllers/admin/admin_add_products_process.php';
  include "../../controllers/admin/admin_orders_process.php";
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- Template Main CSS File -->
  <link href="./../../assets/css/style.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<body>

  <main id="main">
    <!-- This is the modal for the specific product -->
    <div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addItemModalLabel">Product Solo Display</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div>
              <h3 id="modalProductName"></h3>
              <div class="pic">
                <img id="modalProductImage" class="img-fluid" alt="">
              </div>
              <ul>
                <li><span id="modalProductDescription"></span></li>
                <li><span id="modalProductPrice"></span></li>
                <button type="submit" class="btn btn-primary btn-user btn-block" name="order_button">Add To
                  Cart</button>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap Static Header -->
    <div class="p-5 text-center bg-image" style="
      background-image: url('./../../assets/img/jumbotron.png');
      width: 100%;
      background-size: cover;
      margin-top: 58px;
      min-height: 40vh;
    ">
    </div>

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Laboratory Equipment</h2>
        </div>
        <div class="row">
          <?php
          // Use a while loop to iterate through the fetched data
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <a href="#" onclick="openModal(
                '<?php echo $row['product_name']; ?>',
                '<?php echo $row['product_description']; ?>',
                '<?php echo $row['product_price']; ?>',
                '<?php echo $row['product_image_path']; ?>'
              )" data-target="#addItemModal">
                <div>
                  <h3>
                    <?php echo $row['product_name']; ?>
                  </h3>
                  <div class="pic">
                    <img src="<?php echo $row['product_image_path']; ?>" class="img-fluid" alt="">
                  </div>

                  <ul>
                    <li>Description:
                      <?php echo $row['product_description']; ?>
                    </li>
                    <li>Price:
                      <?php echo $row['product_price']; ?>
                    </li>
                    <!-- You can remove the button if you want the entire box to be clickable -->
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="order_button">Add To
                      Cart</button>
                  </ul>
                </div>

              </a>
            </div>
            <?php
          }
          ?>
        </div>

      </div>
    </section>
    <!-- End Pricing Section -->

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
                        <img src="./../../assets/img/lab_equipments//hematology.png" alt="">
                      </div>

                      <div class="swiper-slide">
                        <img src="./../../assets/img/lab_equipments/hematology-2.png" alt="">
                      </div>



                    </div>
                    <div class="swiper-pagination"></div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="portfolio-description">
                    <h2>Hematology Machine</h2>
                    <p>
                      Description
                    </p>
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

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="./../../assets/img/lab_equipments/pcr analyzer.png" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>Realtime Fluorescence Quantitative PCR</h4>
                <!-- <span>Short Description</span> -->
                <p>Lorem Ipsum Dolor Sit Amet</p>
                <div class="social">
                  <ul>
                    <li>Reagent volume: 0.3mL</li>
                    <li>Throughput: 80 samples/hr</li>
                    <li>Calibration: Automatic or on-demand</li>
                    <li>Up to 2000 test storage</li>
                    <li>RS-232 interface</li>
                    <li>Temperature: 15-30oC</li>
                    <li>Humidity: 20%-80%</li>
                    <li>Power requirement: 110-240AV+10%,</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="./../../assets/img/lab_equipments/immunofluorecence.png" class="img-fluid"
                  alt="">
              </div>
              <div class="member-info">
                <h4>Dry Immunofluorescence quantitative analyzer</h4>
                <!-- <span>Short Description</span> -->
                <p>Lorem Ipsum Dolor Sit Amet</p>
                <div class="social">
                  <ul>
                    <li>-Throughout: 60T/H</li>
                    <li>-8-inch touch screen</li>
                    <li>-20 parameters + 3 histogram</li>
                    <li>-3 counting modes</li>
                    <li>-100, 000 sample results</li>
                    <li>-Support LIS and external printer</li>
                    <li>-Net weight: 21kg</li>
                    <li>-CE marked</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Team Section -->
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

  <!-- Template Main JS File -->
  <script src="./../../assets/js/main.js"></script>
</body>

</html>

<script>
  var selectedItem = {};

  function openModal(productName, productDescription, productPrice, productImagePath) {
    selectedItem = {
      'product_name': productName,
      'product_description': productDescription,
      'product_price': productPrice,
      'product_image_path': productImagePath
    };

    // Update modal content
    document.getElementById('modalProductName').innerHTML = selectedItem.product_name;
    document.getElementById('modalProductDescription').innerHTML = 'Description: ' + selectedItem.product_description;
    document.getElementById('modalProductPrice').innerHTML = 'Price: ' + selectedItem.product_price;
    document.getElementById('modalProductImage').src = selectedItem.product_image_path;

    // Display the modal
    $('#addItemModal').modal('show');

  }
</script>