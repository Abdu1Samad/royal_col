<!-- php  -->
<?php

  session_start();
  include 'connection.php';

  if(!isset($_SESSION['signup_id'])){
     $_SESSION['redirect_cart_page'] = $_SERVER['REQUEST_URI']; 
     header("Location: login.php");
     exit();
  }


  if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['product_id']) ) {
    
    $product_id_to_delete = $_GET['product_id'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['product_id'] == $product_id_to_delete) {
            unset($_SESSION['cart'][$key]); 
            $_SESSION['cart'] = array_values($_SESSION['cart']); 
            break; 
        }
    }

    if(isset($_SESSION['signup_id'])){

      $user_id = $_SESSION['signup_id'];
      $cart_delete_query = "DELETE FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id_to_delete'";
      $execute_delete_query = mysqli_query($con,$cart_delete_query);

    }

    header('Location: add-to-cart.php');
    exit();
  }

  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(); // Initialize cart if not set
  }


  if(isset($_GET['product_id']) && isset($_GET['qty']) && !isset($_GET['added']) ){

    $product_id = $_GET['product_id'];
    $qty = (int)$_GET['qty']; // Cast to integer to prevent errors

    $fetch_product_data = "SELECT * FROM products WHERE product_id = '$product_id'";
    $fetch_product_query = mysqli_query($con,$fetch_product_data);

    if($fetch_product_query){
      $product_data = mysqli_fetch_assoc($fetch_product_query);

      $product_exist = false;

      foreach ($_SESSION['cart'] as $key => $item) {
        // Ensure that 'product_id' exists before checking its value
        if (isset($item['product_id']) && $item['product_id'] == $product_id) {
            $_SESSION['cart'][$key]['qty'] += $qty; // If product exists, update the quantity
            $product_exist = true;
            break;
        }
      }


      if(!$product_exist){
      $_SESSION['cart'][] = array(
       'product_id' => $product_data['product_id'],
       'product_name' => $product_data['product_name'], 
       'product_price' => $product_data['product_price'],
       'qty' => $qty 
      ); 
    }

      $user_id = $_SESSION['signup_id'];

      $Select_cart_quary = "SELECT * FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
      $execute_cart_query = mysqli_query($con,$Select_cart_quary);

      if(mysqli_num_rows($execute_cart_query) > 0){

        $cart_update_query = "UPDATE cart SET qunatity = qunatity + $qty WHERE user_id = '$user_id' AND product_id = '$product_id'";
        $execute_update_query = mysqli_query($con,$cart_update_query);
      }
      else{
        $cart_insert_query = "INSERT INTO cart (`cart_id`,`user_id`,`product_id`,`qunatity`)VALUES(null,'$user_id','$product_id','$qty')";
        $execute_insert_query = mysqli_query($con,$cart_insert_query); 
      }

  } 
    header('Location: add-to-cart.php?added=true');  // Redirect with 'added' flag to avoid duplication
    exit();  // Don't forget to exit after header redirect
  }
   
   

  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- tittle  -->
  <title>Cart - Royal Collection</title>

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
  <link rel="stylesheet" href="css-files-floder/add-to-cart.css">

  <!-- php  -->
  <?php
  include 'navbar.php';
  ?> 

</head>
<body>
     
            <!-- Cart-label  -->
            <section class="cartlabel">
                <div class="cart-label-container">
                  <div class="cart-label-img">
                    <div class="cart-label-content">
                      <label for="">Shopping Bag</label>
                    </div>
                  </div>
                </div>
              </section>   

              
                <!-- empty-cart-content  -->
                 <?php if(empty($_SESSION['cart'])) :?>
                <section class="empty-cart-section">
                  <div class="empty-cart-container">
                    <div class="empty-cart-btn">
                        <a href="products.php">CART EMPTY! LETS FILL IT UP. <i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                    <div class="empty-cart-para">
                      <p>SALE UP TO 40% OFF FOR ALL CLOTHES & FASHION ITEMS, ON ALL BRANDS.</p>
                    </div>
                  </div>
                </section>
              <?php else:  ?>
                <section class="add-to-cart-table">
                <div class="add-to-cart-table-container ">
                  <div class="continue-shopping-div">
                  <a href="products.php"><i class="fa-solid fa-arrow-left"></i> CONTINUE SHOPPING</a>
                  </div>
 
              <table class="table">
              <thead>
                <tr class="row">
                  <th scope="" class=" line col-12 col-sm-12 col-md-12 col-lg-2">DELETE</th>
                  <th scope="" class="col-12 col-sm-12 col-md-12 col-lg-3">NAME</th>
                  <th scope="" class="col-12 col-sm-12 col-md-12 col-lg-2">PRICE</th>
                  <th scope="" class="col-12 col-sm-12 col-md-12 col-lg-2">QUANTITY</th>
                  <th scope="" class="col-12 col-sm-12 col-md-12 col-lg-3">TOTAL</th>
                </tr>
              </thead>
              <tbody>
                <!-- php  -->
                <?php
                  if(isset($_SESSION['cart'])){
                    $total_amount = 0;
                    foreach($_SESSION['cart'] as $item){
                      $qty = isset($item['qty']) ? $item['qty'] : 1;
                      $total_price = $item['product_price'] * $qty;
                      

                      

                  echo"<tr class='row'>
                      <td class='icon-table col-12 col-sm-12 col-md-12 col-lg-2'><a href='add-to-cart.php?action=delete&product_id=" . $item['product_id'] . "'><i class='fa-solid fa-x'></i></a></td>
                      <td class='col-12 col-sm-12 col-md-12 col-lg-3'>{$item['product_name']}</td>
                      <td class='col-12 col-sm-12 col-md-12 col-lg-2'>{$item['product_price']}</td>
                      <td class='col-12 col-sm-12 col-md-12 col-lg-2'>{$qty}</td>
                      <td class='col-12 col-sm-12 col-md-12 col-lg-3'>PKR " . number_format($total_price) . "</td>
                    </tr>";
                    $total_amount += $total_price;
                }
              }
              ?>
              </tbody>
            </table>

            <section class="sub-total-section">
              <div class="sub-total-container">
                <div class="sub-total-heading">
                    <h3>CART TOTALS</h3>
                </div>
                <div class="sub-total-list">
                  <div class="sub-total-list-1">
                    <p>SUBTOTAL: <span>PKR <?php echo number_format($total_amount) ?></span></p>
                  </div>
                  <div class="checkout-btn">
                    <a href="checkout.php?id=''">PROCEED TO CHECKOUT</a>
                  </div>
                </div>
              </div>
            </section>
            <?php endif;?>
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
 
 


</body>

</html>