<?php

include '../../connection/connect.php';
include '../../controllers/customer/customer_registration_process.php';
include '../../controllers/customer/customer_login_process.php';

if (isset($_SESSION['client_id'])) {
    header("Location: /blut_medical/views/customer/customer_login_success.php");
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
    <div id="incorrectPasswordToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true"
        data-delay="100">
        <div class="toast-body">
            Incorrect password. Please try again.
        </div>
    </div>

    <div id="userNotFoundToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="100">
        <div class="toast-body">
            User not found. Please check your username or email.
        </div>
    </div>
    <form method="post" class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 custom-form-container">
                    <h2 class="text-center mb-4">Customer Login</h2>

                    <div class="mb-3">
                        <label class="form-label">Username / Email</label>
                        <input type="text" class="form-control" placeholder="Username / Email" name="username_or_email"
                            value="" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                id="password" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="far fa-eye" id="eye-icon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="login_button">Login</button>
                    </div>
                    <div>
                        <a href="/blut_medical/views/customer/customer_registration_form.php"> Create an account </a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i></a>
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
    // document.addEventListener('DOMContentLoaded', function () {
    //     // Add an event listener to the form on submit
    //     document.querySelector('form').addEventListener('submit', function (event) {
    //         // Get the values of the username/email and password fields
    //         var usernameOrEmailInput = document.querySelector('input[name="username_or_email"]');
    //         var passwordInput = document.querySelector('input[name="password"]');
    //         var usernameOrEmail = usernameOrEmailInput.value;
    //         var password = passwordInput.value;

    //         if (usernameOrEmail != usernameOrEmailInput) {
    //             var toast = new bootstrap.Toast(document.getElementById('userNotFoundToast'));
    //             toast.show();
    //             event.preventDefault();
    //         } else if (password != passwordInput) {
    //             // If passwords don't match, prevent form submission and show a toast
    //             var toast = new bootstrap.Toast(document.getElementById('incorrectPasswordToast'));
    //             toast.show();
    //             event.preventDefault();
    //         }
    //     });
    // });

    document.addEventListener('DOMContentLoaded', function () {
        var passwordInput = document.getElementById('password');
        var togglePassword = document.getElementById('togglePassword');
        var eyeIcon = document.getElementById('eye-icon');

        togglePassword.addEventListener('click', function () {
            togglePasswordVisibility(passwordInput, eyeIcon);
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
    #incorrectPasswordToast,
    #userNotFoundToast {
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