<?php
include './connection/connect.php';
include './includes/navigation.php';

if (isset($_SESSION['client_id'])) {
    header("Location: /blut_medical/views/customer/customer_login_success.php");
    exit();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="assets/favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="assets/css/tiny-slider.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <title>Pendragion Vet E-Commerce </title>
</head>

<body>
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h2 style="color:whitesmoke !important;"> Vets with care </h2>
                        <p class="mb-4">Take care of an animal, and it will never forget you.</p>
                        <p>
                            <a href="" class="btn btn-secondary me-2">Shop Now</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="assets/images/animals.png" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Start Product Section -->
    <div class="product-section">
        <div class="container">
            <div class="row">

                <!-- Start Column 1 -->
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="mb-4 section-title">Created with excellent material.</h2>
                    <p class="mb-4">We don't just sell, we provide. </p>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="cart.html">
                        <img src="assets/images/sampledata1.png" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Aspirinr</h3>
                        <strong class="product-price">$50.00</strong>

                        <span class="icon-cross">
                            <img src="assets/images/cross.svg" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 2 -->

                <!-- Start Column 3 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="cart.html">
                        <img src="assets/images/sampledata2.png" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Webbox</h3>
                        <strong class="product-price">$78.00</strong>
                        <span class="icon-cross">
                            <img src="assets/images/cross.svg" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 3 -->

                <!-- Start Column 4 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="cart.html">
                        <img src="assets/images/sampledata3.png" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Dog Food</h3>
                        <strong class="product-price">$43.00</strong>

                        <span class="icon-cross">
                            <img src="assets/images/cross.svg" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 4 -->
            </div>
        </div>
    </div>
    <!-- End Product Section -->

    <!-- Start Why Choose Us Section -->
    <div class="why-choose-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <h2 class="section-title">Why Choose Us</h2>
                    <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit
                        imperdiet dolor tempor tristique.</p>

                    <div class="row my-5">
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="assets/images/truck.svg" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Fast &amp; Free Shipping</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                    vulputate.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="assets/images/bag.svg" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Easy to Shop</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                    vulputate.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="assets/images/support.svg" alt="Image" class="imf-fluid">
                                </div>
                                <h3>24/7 Support</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                    vulputate.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="assets/images/return.svg" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Hassle Free Returns</h3>
                                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                    vulputate.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="assets/images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Why Choose Us Section -->

    <!-- Start We Help Section -->
    <div class="we-help-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="imgs-grid">
                        <div class="grid grid-1"><img src="assets/images/img-grid-1.webp" alt="Pendragon"></div>
                        <div class="grid grid-2"><img src="assets/images/img-grid-2.jpg" alt="Pendragon"></div>
                    </div>
                </div>
                <div class="col-lg-5 ps-lg-5">
                    <h2 class="section-title mb-4">We Help You Make Your Pet Happy</h2>
                    <p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada.
                        Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque
                        habitant morbi tristique senectus et netus et malesuada</p>

                    <ul class="list-unstyled custom-list my-4">
                        <li>Donec vitae odio quis nisl dapibus malesuada</li>
                        <li>Donec vitae odio quis nisl dapibus malesuada</li>
                        <li>Donec vitae odio quis nisl dapibus malesuada</li>
                        <li>Donec vitae odio quis nisl dapibus malesuada</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End We Help Section -->


    <?php
    include './includes/footer.php';
    ?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>