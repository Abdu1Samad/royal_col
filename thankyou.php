<?php

    session_start();

    if(isset($_SESSION['F_name'])){
        echo "Welcome " . htmlspecialchars($_SESSION['F_name']);
    } else {
        echo "Thank you for your order!";
    }

?>


<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- tittle  -->
    <title>Checkout - Royal Collection</title>

    <!-- Bootstrap-css-link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font-Awesome-Library  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="a.nonymous" referrerpolicy="no-referrer" />

    <!-- google-font-headings  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet">

    <!-- google-font-para  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet">

    <!-- my-css-link  -->
    <link rel="stylesheet" href="css-files-floder/style.css">

    <!-- my-css-link-2  -->
    <link rel="stylesheet" href="css-files-floder/checkout.css">

    <!-- php  -->
    <?php
    include 'navbar.php';
    ?> 

  </head>
  <body>
    
  <?php
      include 'footer.php';
    ?>
      

  <!-- Bootstrap-Javascript-link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
  crossorigin="anonymous"></scrip> 
  
  


  </body>

  </html>