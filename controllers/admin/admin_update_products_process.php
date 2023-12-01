<?php

include "../../connection/connect.php";

if (isset($_POST['update_button'])) {
  $product_id = $con->real_escape_string(strip_tags($_POST['product_id']));
  $product_code = $con->real_escape_string(strip_tags($_POST['product_code']));
  $product_name = $con->real_escape_string(strip_tags($_POST['product_name']));
  $product_description = $con->real_escape_string(strip_tags($_POST['product_description']));
  $product_price = $con->real_escape_string(strip_tags($_POST['product_price']));
  $product_qty = $con->real_escape_string(strip_tags($_POST['product_qty']));

  // Check if a new image file is uploaded
  if (!empty($_FILES['fileToUpload']['name'])) {
    // Similar image upload code as in the add process
    $rand = substr(md5(microtime()), rand(0, 26), 5);
    $target_dir = "./../../assets/img/products/" . "$rand";
    $target_filename = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PDF" && $imageFileType != "pdf"
    ) {
      echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        // Update the product with the new image path
        $con->query("UPDATE `products` 
          SET
          `product_code` = '$product_code',
          `product_name` = '$product_name',
          `product_description` = '$product_description',
          `product_price` = '$product_price',
          `product_qty` = '$product_qty',
          `product_image_path` = '$target_file'
          WHERE product_id = '$product_id'");
        // Your success message and any additional logic
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  } else {
    // If no new image file is uploaded, update the product without changing the image
    $con->query("UPDATE `products` 
      SET
      `product_code` = '$product_code',
      `product_name` = '$product_name',
      `product_description` = '$product_description',
      `product_price` = '$product_price',
      `product_qty` = '$product_qty'
      WHERE product_id = '$product_id'");
    // Your success message and any additional logic
  }
}

?>