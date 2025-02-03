<!-- php  -->
<?php
  session_start();
 ?>
 
<?php
  include_once('connection.php');

  $fetchProducts = "
    select * from products;
  ";

  $result = mysqli_query($con, $fetchProducts);

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- tittle -->
  <title>Royal collection</title>

  <!-- Bootstrap-css-link  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font-Awesome-Library  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- google-font  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">

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

  <!-- my-css-link  -->
  <link rel="stylesheet" href="css-files-floder/products.css"> 
  
  <!-- php  -->
  <?php

    include 'navbar.php';
    include 'connection.php';

    $fetchdata = "SELECT * FROM products";
    $fetch_query = mysqli_query($con,$fetchdata);

  ?> 

</head>
<body>

    <!-- prodcucts-label  -->
    <section class="productslabel">
        <div class="products-label-container">
        <div class="products-label-img">
            <div class="products-label-content">
            <label for="">Explore Products</label>
            </div>
        </div>
        </div>
    </section>


    <section class="new-arival-section">
     <div class="new-arrival-container">
      <!-- php  -->
      <?php
        while($row = mysqli_fetch_assoc($fetch_query)){
     
      ?>
     <div class="products-card">
      <a class="product-id-fetching-anchor" href="./product-details.php?product_id=<?php echo $row['product_id']?>">
            <div class="card-content">
            <div class="card-img">
              <input type="hidden" class="img-2" value="<?php echo "admin/" . $row['product-img-2'];?>">
              <img class="img-1" src="admin/<?php echo $row['product_img'];?>" alt="">
            </div>
          <div class="card-title">
            <p><?php echo $row['product_name'];?></p>
          </div>
          <div class="card-price">
            <p>pkr<span><?php echo $row['product_price'];?></span></p>
          </div>
          <div class="card-ratings">
            <!-- php  -->
            <?php
            $ratings = $row['product_rating'];
            for($i = 1; $i <= 5; $i ++){
              if($i <=$ratings){
                echo '<i class="fa-solid fa-star"></i>';
              }else{
                echo ' <i class="fa-regular fa-star"></i>';
              }
            }
            ?>
          </div>
          <div class="card-desription">
            <p><?php echo substr($row['product-desc'], 0, 80)?>...</p>
          </div>
        </div>
        </a>
      </div>
          <?php
          }
        ?>
     </div>
    </section>  

   


  <!-- php  -->
   <?php
     include 'footer.php';
   ?>


   <!-- Bootstrap-Javascript-link -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script> 

   
          <!-- Vanilla JS -->
          <script src="script.js"></script>

</body>

</html>
