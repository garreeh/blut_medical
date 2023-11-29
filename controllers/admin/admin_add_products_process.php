<?php

include "../../connection/connect.php";

// Insert new product
if (isset($_POST['add_product_button'])) {

  $product_code = $con->real_escape_string($_POST['product_code']);
  // RANDOM NAME
  $rand = substr(md5(microtime()), rand(0, 26), 5);
  $target_dir = "./../../assets/img/products/" . "$rand";
  $target_filename = basename($_FILES["fileToUpload"]["name"]);
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // CHECK IF FILE ALREADY EXISTS
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // LIMIT FILE SIZE
  // if ($_FILES["fileToUpload"]["size"] > 500000) {
  //   echo "Sorry, your file is too large.";
  //   $uploadOk = 0;
  // }

  // Allow certain file formats
  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PDF" && $imageFileType != "pdf"
  ) {
    echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
    $uploadOk = 0;
  }


  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  $product_name = $con->real_escape_string($_POST['product_name']);
  $product_description = $con->real_escape_string($_POST['product_description']);
  $product_price = $_POST['product_price'];
  $product_qty = $_POST['product_qty'];
  // $product_image_path = $con->real_escape_string($_POST['product_image_path']);

  $sql = "INSERT INTO `products`
   (product_code, product_name, product_description, product_price, product_qty, product_image_path)
    VALUES 
  ('$product_code', '$product_name', '$product_description', '$product_price', '$product_qty', '$target_file')";

  mysqli_query($con, $sql);
}

// Fetch all products
$result = mysqli_query($con, "SELECT * FROM products");
?>