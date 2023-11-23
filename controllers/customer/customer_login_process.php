<?php

session_start();

include "../../connection/connect.php";

if (isset($_POST['login_button'])) {
  $usernameOrEmail = $con->real_escape_string($_POST['username_or_email']);
  $password = $_POST['password'];

  // Check if the input is a valid email address
  if (filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
    $condition = "`email`='$usernameOrEmail' OR `username`='$usernameOrEmail'";
  } else {
    $condition = "`username`='$usernameOrEmail' OR `email`='$usernameOrEmail'";
  }

  $query = "SELECT * FROM `client_registration` WHERE $condition";
  $result = mysqli_query($con, $query);

  if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row) {
      if (password_verify($password, $row['password'])) {
        // Password is correct, set session variables
        $_SESSION['client_id'] = $row['client_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];

        // Redirect to the home page or any other authenticated page
        header("Location: /blut_medical/views/customer/customer_login_success.php");
        exit();
      } else {
        echo "Incorrect password. Please try again.";
      }
    } else {
      echo "User not found. Please check your username or email.";
    }
  } else {
    echo "Error executing query: " . mysqli_error($con);
  }
}

?>