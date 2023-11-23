<?php

$con = new mysqli('localhost', 'root', '', 'ecommerce_blut');

if(!$con) {
    die(mysqli_error($con));
}

?>