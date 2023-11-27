<?php

include '../../connection/connect.php';
session_start();

// Unset all of the session variables
$_SESSION = array();

session_destroy();
header("Location: /blut_medical/index.php");
exit();
?>