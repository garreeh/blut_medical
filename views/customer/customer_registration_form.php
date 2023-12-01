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

  <title>Customer Register</title>

  <!-- Packages for Toast-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha384-3Ih3/Apz5Pa4MMk8AXzcvvRzMz9Qs0F9Vox6PsrMz9AT+aEKW3DR00MlO2GgHg3h" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<!-- Custom fonts for this template-->
<link href="../../assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
  rel="stylesheet">

<!-- Custom styles for this template-->
<link href="../../assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <!-- Toast container -->
  <div class="toast" id="passwordMismatchToast" role="alert" aria-live="assertive" aria-atomic="true"
    data-bs-autohide="false" data-delay="5000">
    <div class="toast-header">
      <strong class="me-auto">Error Message</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Passwords do not match. Please make sure your passwords match.
    </div>
  </div>

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
              <form class="user" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="First Name" name="first_name"
                      value="" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Last Name" name="last_name"
                      value="" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Username" name="username"
                      value="" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Mobile" name="mobile"
                      value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" placeholder="Email" name="email" value=""
                    required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" placeholder="Address" name="address"
                    value="" required>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="input-group">
                      <input type="password" class="form-control form-control-user" placeholder="Password"
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
                      <input type="password" class="form-control form-control-user" placeholder="Confirm Password"
                        name="confirm_password" id="confirmPassword" required>
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
        var toast = new bootstrap.Toast(document.getElementById('passwordMismatchToast'));
        toast.show();
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

    // Add here
  });

</script>

<style>
  /* This is for the Password */
  #togglePassword,
  #toggleConfirmPassword {
    cursor: pointer;
  }

  /* Custom style to make the toast red */
  #passwordMismatchToast {
    position: fixed;
    background-color: #dc3545;
    color: #fff;
    z-index: 9999;
    /* Set a higher z-index value */
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