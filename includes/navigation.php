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
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="/blut_medical/index.php">BLüT Medical</a></h1>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link" href="/blut_medical/index.php">Home</a></li>
                <li class="dropdown"><a href="#"><span>Veterinary</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/blut_medical/views/veterinary/lab_equipment.php">Lab Equipment</a></li>
                        <li><a href="#">Medical Equipment</a></li>
                        <li><a href="/blut_medical/views/veterinary/surgical.php">Surgery</a></li>
                        <li><a href="#">Medical Supplies</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Human</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="./coming_soon/comingsoon.html">Surgery</a></li>
                        <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li> -->
                        <li><a href="#">Dental</a></li>
                        <li><a href="#">Surgery</a></li>
                        <li><a href="#">Medical Supplies</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="index.php#about">About Us</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>



                <li class="dropdown"><a href="#">
                        <h3 class="bi bi-person"></h3>
                    </a>
                    <ul>
                        <?php
                        if (isset($_SESSION['client_id'])) {
                            ?>
                            <li><a class="nav-link scrollto"
                                    href="/blut_medical/views/customer/customer_login_form.php">Settings</a></li>
                            <li><a href="/blut_medical/controllers/customer/customer_logout_process.php">Logout</a></li>
                            <!-- <li><a class="nav-link" href="#"><img src="/ecommerce/assets/images/cart.svg"></a></li> -->
                            <?php
                        } else {
                            ?>
                            <li><a class="nav-link scrollto"
                                    href="/blut_medical/views/customer/customer_login_form.php">Login</a></li>
                            <li><a href="/blut_medical/views/customer/customer_registration_form.php">Register</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li><a href="#"></a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>

        </nav>


    </div>


    <!-- Include Bootstrap JS (if not already included) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>