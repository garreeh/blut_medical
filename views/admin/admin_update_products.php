<?php
include "../../connection/connect.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blüt Medical | Admin</title>

  <link href="./../../assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="./../../assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body id="page-top">

  <script src="./../../assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="./../../assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./../../assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="./../../assets/admin/js/sb-admin-2.min.js"></script>

  <script>
    $(document).ready(function () {
      // Show the selected file name in the custom file input
      $("#fileToUpload").change(function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).next(".custom-file-label").html(fileName);
      });


      function incrementQuantity() {
        var quantityInput = document.getElementById('product_qty');
        var currentQuantity = parseInt(quantityInput.value) || 0;
        quantityInput.value = currentQuantity + 1;
      }

      function decrementQuantity() {
        var quantityInput = document.getElementById('product_qty');
        var currentQuantity = parseInt(quantityInput.value) || 0;
        // Ensure the quantity doesn't go below zero
        quantityInput.value = Math.max(0, currentQuantity - 1);
      }
    });
  </script>

</body>

</html>