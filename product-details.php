<!-- php  -->

<?php
  session_start();
  include 'connection.php';

//   if(!isset($_SESSION['signup_id'])){
//      header("location: login.php");   
//      exit();
//   }

    if(isset($_GET['product_id']) && is_numeric($_GET['product_id'])){
        $product_ID = $_GET['product_id'];
    }else{
        $product_ID = 1;
    }

    $select_query = "SELECT * FROM products WHERE product_id = $product_ID";
    $result = mysqli_query($con,$select_query);
    if($result){
        $product_data = mysqli_fetch_assoc($result);

    }  

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- tittle -->
  <title>Royal collection - <?php echo htmlspecialchars($product_data['product_name']);?></title>

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

  <!-- my-css-link-2 -->
  <link rel="stylesheet" href="css-files-floder/product-details.css">

    <!-- php  -->
    <?php
    
      include 'navbar.php';
      
    ?> 

</head>
<body>

        <section class="product-detail-section"> 
            <div class="product-detail-main-container">
                <div class="products-detail-left-content">
                <div class="other-imgs">
                    <div class="product-img-1 p-o-img">
                        <img src="admin/<?php echo $product_data['product_img'];?>" alt="">
                    </div>
                    <div class="product-img-2 p-o-img">
                        <img src="admin/<?php echo $product_data['product-img-2'];?>" alt="">
                    </div>
                    <div class="product-img-3 p-o-img">
                        <img src="admin/<?php echo $product_data['product-img-3'];?>" alt="">
                    </div>
                </div>
                <div class="main-img">
                    <img src="admin/<?php echo $product_data['product_img'];?>" alt="">
                </div>
                </div>
            <div class=" products-details-right-content">
                <h3><?php echo $product_data['product_name'];?></h3>
                <p class="product-details-para1"><span>PKR</span> <?php echo $product_data['product_price'];?></p>
                <p class="product-details-para2">
                <?php
                $rating = $product_data['product_rating'];
                 for($i = 1; $i <=5; $i++){
                    if($i<=$rating){
                        echo '<i class="fa-solid fa-star"></i>';
                    }else{
                        echo '<i class="fa-regular fa-star"></i>';
                    }
                 }
                ?></p>
                <p class="product-details-para3">PRODUCT DESCRIPTION: <br><?php echo $product_data['product-desc'];?></p>
                <hr class="product-detail-page-line">
                <div class="qty-add-cart">
                    <form method="GET" action="add-to-cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $product_data['product_id'];?>">
                        <label for="">QUANTITY:</label>
                        <input type="number" class="qty" name="qty" value="1" min="1">
                        <input type="submit" value="ADD TO CART" name="" class ="add-to-cart" placeholder="ADD TO CART">
                    </form>
                </div>
            </div>
        </div>
            </section>         


    <?php include 'footer.php'; ?>

  <!-- Bootstrap-Javascript-link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
  crossorigin="anonymous"></script> 

</body>

</html>