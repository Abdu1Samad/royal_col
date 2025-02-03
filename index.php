<!-- php  -->
 <?php
  session_start();
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

  <!-- my-css-link  -->
  <link rel="stylesheet" href="css-files-floder/style.css">

    <!-- php  -->
    <?php
    include 'navbar.php';
    include 'connection.php';

    $new_arrival = "SELECT * FROM products WHERE product_id BETWEEN 1 AND 8 ORDER BY product_id DESC";
    $new_arrival_query = mysqli_query($con,$new_arrival);

    ?> 

</head>
<body>

  
  <!-- carousel  -->
  <div id="carouselExampleFade" class="carousel slide carousel-fade carousel-container" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/carousel-1.png" class="d-block w-100" alt="...">
        <div class="carousel-1-content">
          <p class="carousel-1-para-1">DRESS TO <span>IMPRESS</span></p>
          <P class="carousel-1-para-2">DISCOVER YOUR STYLE TODAY WITH</P>
          <P class="carousel-1-para-3"><span>ROYAL</span> COLLECTION</P>
          <div class="carousel-1-button">
            <a href="" class="carousel-1-btn">SHOP NOW <i class="fa-solid fa-angle-right"></i></a>
          </div>
        </div>
      </div>
          <div class="carousel-item ">
            <img src="https://media.istockphoto.com/id/2183722167/photo/male-fashion-model-in-a-white-t-shirt-and-jeans-smile-with-teeth-joy-on-a-white-isolated.jpg?s=612x612&w=0&k=20&c=z1s-u-uF1jWwhJHrc4qqZOmU0kUaCFDPWpnQZ9B5WrM=" class="d-block w-100" alt="...">
            <div class="carousel-2-content">
              <div class="carousel-2-para-1">
                <p>Season Deals</p>
              </div>
              <div class="carousel-2-para-2">
                <p>GET CHANCE <span>50%</span> OFF</p>
              </div>
              <div class="carousel-btn">
                <a href="">SHOP NOW <i class="fa-solid fa-angle-right"></i></a>
              </div>
            </div>
          </div>
          <!--<div class="carousel-item">
            <img src="https://builder.dynamicxx.com/templates/b591759d-2f78-4463-a735-388e254ec9c1/images//bg_hero.png" class="d-block w-100" alt="...">
          </div>
        </div> -->
    </div> <!--Carosuel-End-->
</div>

    <!-- new-arrival-products  -->

    <div class="new-arrival-heading">
     <h2>NEW ARRIVALS</h2> 
    </div>
      <section class="new-arival-section">
        <div class="new-arrival-container">
         <!-- php  -->
         <?php
          while($row = mysqli_fetch_Assoc($new_arrival_query)){
         ?>

          <div class="products-card">  
          <a class="product-id-fetching-anchor" href="product-details.php?product_id=<?php echo $row['product_id']?>">
          <div class="card-content">
            <div class="card-img">
            <input type="hidden" class="img-2" value="<?php echo $row['product-img-2'];?>">
              <img class="img-1" src="admin/<?php echo $row['product_img'];?>" alt="">
            </div>
          <div class="card-title">
            <p><?php echo $row['product_name'];?></p>
          </div>
          <div class="card-price">
            <p>PKR:<span><?php echo $row['product_price'];?></span></p>
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





           <!-- Categories-products  -->

           <div class="categories-heading">
            <h2>Products Categories</h2>
           </div> 
           <div class="category-products-grid-container">
            <div class="category-product-grid-items" id="category-products-box-1">
              <img src="https://media.istockphoto.com/id/1202257499/photo/happy-casual-guy-looking-to-side-and-fixing-glasses.jpg?s=612x612&w=0&k=20&c=9By5t2quyhKoiJMZNn1lVtIt487kQfOig9Sceqe4jd8=" alt="">
              <div class="category-products-content-1">
                <p class="categories-para-1">Style Meets Comfort</p>
                <p class="categories-para-2">Men's Wear</p>
                <a href="products.php" class="categories-btn-1">Shop now</a>
              </div>
            </div>
            <div class="category-product-grid-items" id="category-products-box-2">
              <img src="https://media.istockphoto.com/id/1162158579/photo/top-view-of-casual-orange-suede-trainers-on-grey-wooden-planks.jpg?b=1&s=612x612&w=0&k=20&c=ZdbaI8Tz1PNBfYLy1jtmoAA5EtGlfjzlf3HI9SjUQa0=" alt="">
              <div class="category-products-content-2">
                <p class="categories-para-1">Walk With Confidence</p>
                <p class="categories-para-2">Shoes</p>
                <a href="products.php"class="categories-btn-2">Shop now</a>
              </div>
            </div>
            <div class="category-product-grid-items" id="category-products-box-3">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHL5WFSV2dIeS2LTVU9OaSfrYkKfnfdhAvaw&s" alt="">
              <div class="category-products-content-3">
                <p class="categories-para-1">Elevate Every Moment</p>
                <p class="categories-para-2">Watches</p>
                <a href="products.php" class="categories-btn-3" >Shop now</a>
              </div>
            </div>
            <div class="category-product-grid-items" id="category-products-box-4">
              <img src="https://plus.unsplash.com/premium_photo-1676822252274-f81d2d6aab23?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8YmVhdXR5JTIwcHJvZHVjdHMlMjB3aXRoJTIwY29sb3IlMjBiYWNrZ3JvdW5kfGVufDB8fDB8fHww" alt="">
              <div class="category-products-content-4">
                <p class="categories-para-1">Radiate Natural Beauty</p>
                <p class="categories-para-2">Beauty</p>
                <a href="products.php" class="categories-btn-4">Shop now</a>
              </div>
            </div>
            <div class="category-product-grid-items" id="category-products-box-5">
              <img src="images/cat-img-5.avif" alt="">
              <div class="category-products-content-5">
                <p class="categories-para-1">Bags For Adventure</p>
                <p class="categories-para-2">Bags</p>
                <a href="products.php" class="categories-btn-5">Shop now</a>
              </div>
            </div>
            <div class="category-product-grid-items" id="category-products-box-6">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTeW_J885l6P10FXtqs4Tk5MUnCvx3mLV5Mpg&s" alt="">
              <div class="category-products-content-6">
                <p class="categories-para-1">Inspired By You</p>
                <p class="categories-para-2">Women's Wear</p>
                <a href="products.php" class="categories-btn-6">Shop now</a>
              </div>
            </div>
           </div>

           
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