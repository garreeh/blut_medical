<?php

// Time and Date
// date_default_timezone_set('Asia/Manila');
// echo "<span style='color:red;font-weight:bold;'>Date: </span>" . date('F j, Y h:i:s A');

if (isset($_POST['submit_button'])) {

    $first_name = $con->real_escape_string($_POST['first_name']);
    $last_name = $con->real_escape_string($_POST['last_name']);
    $username = $con->real_escape_string($_POST['username']);
    $address = $con->real_escape_string($_POST['address']);
    $email = $con->real_escape_string($_POST['email']);
    $mobile = $con->real_escape_string($_POST['mobile']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $confirm_password = $con->real_escape_string($_POST['confirm_password']);

    $sql = "insert into `client_registration` (first_name, last_name, username, address, email, mobile, password, confirm_password) values 
    ('$first_name', '$last_name', '$username', '$address', '$email', '$mobile', '$password', '$confirm_password')";


    if ($_POST["password"] != $_POST["confirm_password"]) {
        echo "Password does not match!";
    } else {
        mysqli_query($con, $sql);
        header("Location:/blut_medical/index.php");
    }
}
?>