<?php
include '../../connection/connect.php';

function generateRandomPassword($length = 8)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $password;
}

if (isset($_POST['reset_button'])) {
    $email = $con->real_escape_string($_POST['email']);

    // Check if the email exists in the database
    $result = mysqli_query($con, "SELECT * FROM client_registration WHERE email='$email'");
    if ($result->num_rows > 0) {
        // User found, generate a temporary password
        $tempPassword = generateRandomPassword(10);

        // Update the password in the database
        $hashedTempPassword = password_hash($tempPassword, PASSWORD_DEFAULT);
        mysqli_query($con, "UPDATE client_registration SET password='$hashedTempPassword', confirm_password='$tempPassword' WHERE email='$email'");

        // Optionally, send the temporary password to the user's email
        // You need to implement the email sending logic here

        // Redirect to the thank you page
        header("Location: ../../views/customer/customer_thankyou.php");
    } else {
        echo "Email not found!";
    }
}

?>
