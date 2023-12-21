<?php
include '../../connection/connect.php';

if (isset($_POST['email'])) {
    $email = $con->real_escape_string($_POST['email']);

    // Check if the email already exists
    $emailCheckResult = mysqli_query($con, "SELECT * FROM client_registration WHERE email='$email'");

    if ($emailCheckResult->num_rows > 0) {
        echo "exists";
    } else {
        echo "notexisting";
        $first_name = $con->real_escape_string($_POST['first_name']);
        $last_name = $con->real_escape_string($_POST['last_name']);
        $username = $con->real_escape_string($_POST['username']);
        $address = $con->real_escape_string($_POST['address']);
        $mobile = $con->real_escape_string($_POST['mobile']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $confirm_password = $con->real_escape_string($_POST['confirm_password']);

        // Check if passwords match
        if ($_POST["password"] != $_POST["confirm_password"]) {
            $response = array("status" => "error", "message" => "Password does not match!");
            echo json_encode($response);
        } else {
            // Passwords match, proceed with insertion
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `client_registration` (first_name, last_name, username, address, email, mobile, password, confirm_password) VALUES 
                    ('$first_name', '$last_name', '$username', '$address', '$email', '$mobile', '$hashed_password', '$confirm_password')";

            // Execute the insertion query
            if (mysqli_query($con, $sql)) {
                $response = array("status" => "success", "message" => "Registration successful");
                echo json_encode($response);
            } else {
                $response = array("status" => "error", "message" => "Error inserting data into the database");
                echo json_encode($response);
            }
        }
    }
}
?>