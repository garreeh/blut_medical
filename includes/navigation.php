<?php

session_start(); // Start the session

// For testing the session if working
// if (isset($_SESSION['client_id'])) {
//     echo "User is logged in";
// } else {
//     echo "User is not logged in";
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Your navigation bar">
        <div class="container">
            <a class="navbar-brand" href="/ecommerce/index.php">Pendragon</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsYourSite"
                aria-controls="navbarsYourSite" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsYourSite">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/ecommerce/index.php">Home</a>
                    </li>
                    <li><a class="nav-link" href="#">Shop</a></li>
                    <li><a class="nav-link" href="#">About us</a></li>
                    <li><a class="nav-link" href="/ecommerce/views/customer/contact_us.php">Contact Us</a></li>
                </ul>
                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="/ecommerce/assets/images/user.svg" alt="User Account">
                        </a>
                        <?php
                        if (isset($_SESSION['client_id'])) {
                            ?>
                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/ecommerce/views/customer/login_form.php">Settings</a>
                                <a class="dropdown-item" href="/ecommerce/controllers/customer/logout_process.php">Logout</a>
                            </div>
                        <li><a class="nav-link" href="#"><img src="/ecommerce/assets/images/cart.svg"></a></li>
                        <?php
                        } else {
                            ?>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="/blut_medical/views/customer/customer_login_form.php">Login</a>
                            <a class="dropdown-item" href="/blut_medical/views/customer/customer_registration_form.php">Register</a>
                        </div>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Include Bootstrap JS (if not already included) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

