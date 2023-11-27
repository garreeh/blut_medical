<?php

include "../../connection/connect.php";
include "../../controllers/customer/customer_registration_process.php";
include '../../controllers/customer/customer_login_process.php';

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
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Vendor CSS Files -->
    <link href="./../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="./../../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="./../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="./../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="./../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="./../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="./../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="./../../assets/css/style.css" rel="stylesheet">

    <!-- Product Slider Main CSS File -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title> Blut Medical </title>

</head>

<body>

    <!-- Toast HTML -->
    <div id="passwordMismatchToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true"
        data-delay="100">
        <div class="toast-body">
            Passwords do not match. Please make sure your passwords match.
        </div>
    </div>

    <form class="d-flex align-items-center justify-content-center" style="min-height: 100vh;" method="post">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 custom-form-container">
                    <h2 class="text-center mb-4">Customer Registration</h2>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="First Name" name="first_name"
                                    value="" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-4">
                                <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                                    value="" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <input type="text" class="form-control" placeholder="Username" name="username" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <input type="text" class="form-control" placeholder="Address" name="address" value=""
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <input type="email" class="form-control" placeholder="Email" name="email" value=""
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <input type="text" class="form-control" placeholder="Mobile" name="mobile" value=""
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password"
                                        id="password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="far fa-eye" id="eye-icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Confirm Password"
                                        name="confirm_password" id="confirmPassword" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="far fa-eye" id="eye-icon-confirm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="submit_button">Submit</button>
                    </div>
                    <div>
                        <a href="/blut_medical/views/customer/customer_login_form.php"> Already have an account? Login
                            here </a>
                        <a href="/blut_medical/index.php" style="float: right;">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add an event listener to the form on submit
        document.querySelector('form').addEventListener('submit', function (event) {
            // Get the values of the password and confirm password fields
            var password = document.querySelector('input[name="password"]').value;
            var confirmPassword = document.querySelector('input[name="confirm_password"]').value;

            // Compare the values
            if (password !== confirmPassword) {
                // If passwords don't match, prevent form submission and show a toast
                var toast = new bootstrap.Toast(document.getElementById('passwordMismatchToast'));
                toast.show();
                event.preventDefault();
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var passwordInput = document.getElementById('password');
        var confirmPasswordInput = document.getElementById('confirmPassword');
        var togglePassword = document.getElementById('togglePassword');
        var toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        var eyeIcon = document.getElementById('eye-icon');
        var eyeIconConfirm = document.getElementById('eye-icon-confirm');

        togglePassword.addEventListener('click', function () {
            togglePasswordVisibility(passwordInput, eyeIcon);
        });

        toggleConfirmPassword.addEventListener('click', function () {
            togglePasswordVisibility(confirmPasswordInput, eyeIconConfirm);
        });

        function togglePasswordVisibility(inputField, icon) {
            var type = inputField.type === 'password' ? 'text' : 'password';
            inputField.type = type;
            icon.className = type === 'password' ? 'far fa-eye' : 'far fa-eye-slash';
        }
    });
</script>

<style>
    .custom-form-container {
        border: 1px solid #ced4da;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: whitesmoke;
        padding: 20px;
        margin-top: 50px;
    }

    /* Custom style to make the toast red */
    #passwordMismatchToast {
        position: fixed;
        background-color: #dc3545;
        color: #fff;
    }

    @media (max-width: 576px) {
        #passwordMismatchToast {
            width: 100%;
            right: 0;
            margin: 0;
            transform: none;
            top: 70px;
            /* Adjust as needed */
        }
    }
</style>