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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="../../assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                placeholder="Enter Email | Username" name="username_or_email"
                                                id="username_or_email" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                placeholder="Password" name="password" id="password" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block"
                                            name="login_button">Login</button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small"
                                            href="/blut_medical/views/customer/customer_forgot_password.php">Forgot
                                            Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small"
                                            href="/blut_medical/views/customer/customer_registration_form.php">Create an
                                            Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../assets/admin/js/sb-admin-2.min.js"></script>

</body>

</html>

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