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

  <title>Customer | Login</title>

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
  <div class="toast" id="userNotFound" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false"
    data-delay="5000">
    <div class="toast-header">
      <strong class="me-auto">Error Message</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      The entered username or email was not found.
    </div>
  </div>

  <!-- Toast container -->
  <div class="toast" id="wrongPassword" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false"
    data-delay="5000">
    <div class="toast-header">
      <strong class="me-auto">Error Message</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      The entered password is incorrect.
    </div>
  </div>

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
                    <h1 class="h4 text-gray-900 mb-4">Customer | Login</h1>
                  </div>
                  <form class="user" method="post" id="loginForm">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" placeholder="Enter Email | Username"
                        name="username_or_email" id="username_or_email" value="" required>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <input type="password" class="form-control form-control-user" placeholder="Password"
                          name="password" id="password" required>
                        <div class="input-group-append">
                          <span class="input-group-text" id="togglePassword">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                          </span>
                        </div>
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
                    <a class="small" href="/blut_medical/views/customer/customer_forgot_password.php">Forgot
                      Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="/blut_medical/views/customer/customer_registration_form.php">Create an
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
  <!-- Jquery Library -->

</body>

</html>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('togglePassword').addEventListener('click', function () {
      var passwordInput = document.getElementById('password');
      var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      var icon = document.querySelector('#togglePassword i');
      icon.classList.toggle('fa-eye-slash');
    });

  });

  $(document).ready(function () {
    // Assuming your form has an ID of 'loginForm'
    $('#loginForm').submit(function (e) {
      e.preventDefault();

      // Your logic to submit the form asynchronously using AJAX
      $.ajax({
        type: 'POST',
        url: '/blut_medical/controllers/customer/customer_login_process.php', // Replace with the actual path
        data: $(this).serialize(),
        success: function (response) {
          // Check the response from the server
          if (response === 'success') {
            // If the login is successful, redirect the user or perform other actions
            window.location.href = '/blut_medical/views/customer/customer_login_success.php';
          } else if (response === 'wrongPassword') {
            // Show wrong password toast
            $('#wrongPassword').toast('show');
          } else if (response === 'userNotFound') {
            // Show user not found toast
            $('#userNotFound').toast('show');
          } else {
            // Handle other response cases if needed
            console.log('Unexpected response:', response);
          }
        },
        error: function (xhr, status, error) {
          // Handle AJAX errors if needed
          console.error('AJAX Error:', status, error);
        }
      });
    });
  });



</script>

<style>
  #togglePassword {
    cursor: pointer;
  }

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