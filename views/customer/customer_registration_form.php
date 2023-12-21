<?php

include "../../connection/connect.php";
include "../../controllers/customer/customer_registration_process.php";
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
  <link href="./../../assets/img/favicon.ico" rel="icon">

  <title>Customer | Register</title>

</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

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
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" id="registrationForm">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input id="first_name" type="text" class="form-control form-control-user" placeholder="First Name"
                      name="first_name" value="" required>
                  </div>
                  <div class="col-sm-6">
                    <input id="last_name" type="text" class="form-control form-control-user" placeholder="Last Name"
                      name="last_name" value="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input id="username" type="text" class="form-control form-control-user" placeholder="Username"
                      name="username" value="" required>
                  </div>
                  <div class="col-sm-6">
                    <input id="mobile" type="text" class="form-control form-control-user" placeholder="Mobile" name="mobile"
                      value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <input id="email" type="email" class="form-control form-control-user" placeholder="Email" name="email"
                    value="" required>
                  <span id="emailAvailability"></span>
                </div>
                <div class="form-group">
                  <input id="address" type="text" class="form-control form-control-user" placeholder="Address"
                    name="address" value="" required>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="input-group">
                      <input id="password" type="password" class="form-control form-control-user" placeholder="Password"
                        name="password" id="password" required>
                      <div class="input-group-append">
                        <span class="input-group-text" id="togglePassword">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="input-group">
                      <input id="confirm_password" type="password" class="form-control form-control-user"
                        placeholder="Confirm Password" name="confirm_password" id="confirmPassword" required>
                      <div class="input-group-append">
                        <span class="input-group-text" id="toggleConfirmPassword">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-user btn-block" name="submit_button">Submit</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="/blut_medical/views/customer/customer_login_form.php">Already have an account?
                  Login!</a>
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

  <!-- Include Toastify.js from CDN -->
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>

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
        Toastify({
          text: "Passwords do not match. Please make sure your passwords match.",
          duration: 3000,
          close: true,
          gravity: "top",
          position: "right",
          backgroundColor: "red",
        }).showToast();
        console.log("Passwords do not match. Please make sure your passwords match.")
        event.preventDefault();
      }
    });

    // This is for the password toggle eye
    document.getElementById('togglePassword').addEventListener('click', function () {
      var passwordInput = document.getElementById('password');
      var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      var icon = document.querySelector('#togglePassword i');
      icon.classList.toggle('fa-eye-slash');
    });

    document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
      var confirmPasswordInput = document.getElementById('confirmPassword');
      var type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      confirmPasswordInput.setAttribute('type', type);
      var icon = document.querySelector('#toggleConfirmPassword i');
      icon.classList.toggle('fa-eye-slash');
    });
  });

  function showToast(message) {
    Toastify({
      text: message,
      duration: 3000,
      close: true,
      gravity: 'top',
      position: 'right',
      backgroundColor: 'red',
    }).showToast();
  }

  // $(document).ready(function () {
  //   // Variable to track whether the email exists
  //   var emailExists = false;

  //   // Click event on the submit button
  //   $("form#registrationForm").submit(function (e) {
  //     // Get the email value
  //     var email = $("#email").val();

  //     // Check the email using AJAX
  //     $.ajax({
  //       url: '../../controllers/customer/customer_registration_process.php',
  //       type: 'POST',
  //       data: { email: email },
  //       success: function (response) {
  //         console.log(response);
  //         if (response.trim() === "exists") { // Trim to remove whitespace
  //           // Email exists, show error message
  //           showToast("Email already exists!");
  //           emailExists = true;
  //         } else {
  //           // Email does not exist, proceed with registration
  //           showToast("Registration successful!"); // You can customize this message
  //           emailExists = false;

  //           // Proceed with the form submission
  //           $("form#registrationForm").unbind('submit').submit();
  //           window.location.href = "/blut_medical/index.php";

  //         }
  //       }
  //     });

  //     // Prevent the default form submission
  //     e.preventDefault();
  //   });
  // });


  $(document).ready(function () {
    // Variable to track whether the email exists
    var emailExists = false;

    // Click event on the submit button
    $("form#registrationForm").submit(function (e) {
      // Get the email value
      var clientID = $("#client_id").val();
      var firstName = $("#first_name").val();
      var lastName = $("#last_name").val();
      var username = $("#username").val();
      var address = $("#address").val();
      var email = $("#email").val();
      var mobile = $("#mobile").val();
      var password = $("#password").val();
      var confirmPassword = $("#confirm_password").val();

      // Check the email using AJAX
      $.ajax({
        url: '../../controllers/customer/customer_registration_process.php',
        type: 'POST',
        data: {
          client_id: clientID,
          first_name: firstName,
          last_name: lastName,
          username: username,
          address: address,
          email: email,
          mobile: mobile,
          password: password,
          confirm_password: confirmPassword
        },
        success: function (response) {
          console.log(response);
          if (response.trim() === "exists") { // Trim to remove whitespace
            // Email exists, show error message
            showToast("Email already exists!");
            emailExists = true;
          } else {
            // Email does not exist, proceed with registration
            showToast("Registration successful!"); // You can customize this message
            emailExists = false;

            // Proceed with the form submission
            $("form#registrationForm").unbind('submit').submit();
            window.location.href = "/blut_medical/index.php";

          }
        }
      });

      // Prevent the default form submission
      e.preventDefault();
    });
  });

</script>

<style>
  /* This is for the Password */
  #togglePassword,
  #toggleConfirmPassword {
    cursor: pointer;
  }
</style>