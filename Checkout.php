
  <!-- php  -->
  <?php
    
    session_start();
    include 'connection.php';

    $total_amount = 0;

    if(isset($_SESSION['cart'])){

      foreach($_SESSION['cart'] as $item){

          $sub_total = $item['product_price'] * $item['qty'];

      }

    }


    $haserror = false;

    if ($haserror == false) {
      unset($_SESSION['errors']);
    }


    if(isset($_POST['checkout_btn'])){

      $F_name = trim($_POST['F_name']);
      $L_name = trim($_POST['L_name']);
      $Company_name = trim($_POST['Company_name']);
      $Adress = trim($_POST['Adress']);
      $City = trim($_POST['City']);
      $Country = trim($_POST['Country']);
      $Postcode = trim($_POST['Postcode']);
      $Phone_no = trim($_POST['Phone']);
      $Email = trim($_POST['Email']);

      if(!isset($_SESSION['errors'])){   

        $_SESSION['errors'] = [

          'F_name' => '',
          'L_name' => '',
          'Company_name' => '',
          'Adress' => '',
          'City' => '',
          'Country' => '',
          'Postcode' => '',
          'Phone' => '',
          'Email'=> ''   

        ];
      }
    }
      if(empty($F_name)){
        $_SESSION['errors']['F_name'] = "Please enter first name in this field!"; 
        $haserror = true;
      
      }else if(strlen($F_name) < 3){
        $_SESSION['errors']['F_name'] = "first name must contain atleast 3 words"; 
        $haserror = true;
      }
      if(empty($L_name)){
        $_SESSION['errors']['L_name'] = "Please enter Last name in this field!"; 
        $haserror = true;
      }
      if(empty($Adress)){
        $_SESSION['errors']['Adress'] = "Please enter Adress in this field!"; 
        $haserror = true;
      }
      if(empty($City)){
        $_SESSION['errors']['City'] = "Please enter city/Town name in this field!"; 
        $haserror = true;
      }
      if(empty($Country)){
        $_SESSION['errors']['Country'] = "Please select your state/country!"; 
        $haserror = true;
      }
      if(empty($Postcode)){
        $_SESSION['errors']['Postcode'] = "Please enter your Postal/Zipcode!"; 
        $haserror = true;
      }
      if(empty($Phone_no)){
        $_SESSION['errors']['Phone'] = "Please enter your phone number!"; 
        $haserror = true;
      }else if(strlen($Phone_no) < 11){
        $_SESSION['errors']['Phone'] = "Phone number must be in 11 !";
        $haserror = true;
      }
      if(empty($Email)){
        $_SESSION['errors']['Email'] = "Email adress canot be empty!"; 
        $haserror = true;
      }else if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
        $_SESSION['errors']['Email'] = "Please enter @ in your email!";
        $haserror = true;
      }

      if($haserror == false){
         
        $user_id = isset($_SESSION['cart']);
        
        $select_data_from_cart = "SELECT cart_id, product_id, qunatity, 
                   (SELECT product_price FROM products WHERE product_id = cart.product_id) AS product_price 
                   FROM cart 
                   WHERE user_id='$user_id'";

        $result_select_data_query = mysqli_query($con,$select_data_from_cart);
        
        if(mysqli_fetch_assoc($result_select_data_query)){

          $total_amount = 0;
          $cart_item = array();

          while($row = mysqli_fetch_assoc($result_select_data_query)){

            $quantity = $row['qunatity'];
            $product_price = $row['product_price'];

            $sub_total = $quantity * $product_price;
            $total_amount += $sub_total;

            $cart_item[] = array(

              'cart_id' => $row['cart_id'], 
              'product_id' => $row['product_id'],
              'qunatity' => $quantity,
              'product_price' => $product_price,
              'sub_total' => $sub_total

            );

          }

                    
              $insert_order_data = "INSERT INTO orders 
              (F_name, L_name, Company_name, Adress, City, Country, Postcode, Phone_no, Email, user_id, total_price, order_date)
              VALUES ('$F_name', '$L_name', '$Company_name', '$Adress', '$City', '$Country', '$Postcode', '$Phone_no', '$Email', '$user_id', '$total_price', NOW())";

              if(mysqli_query($con,$insert_order_data)){
                $order_id = mysqli_insert_id($con);
            
                // Insert each item into order_items table
                foreach($cart_items as $item){
                    $prod_id = $item['product_id'];
                    $quantity = $item['quantity'];
                    $price = $item['price'];
                    $sub_total = $item['sub_total'];
                    
                    $item_sql = "INSERT INTO order_items (order_id, product_id, quantity, price, total_price)
                                 VALUES ('$order_id', '$prod_id', '$quantity', '$price', '$sub_total')";
                    mysqli_query($con, $item_sql);
                }
                
                // Delete cart items for the user after successful order placement
                $delete_sql = "DELETE FROM cart WHERE user_id='$user_id'";
                mysqli_query($con, $delete_sql);
                
                echo "<script>
                        alert('Order placed successfully');
                        window.location.href = 'thankyou.php';
                      </script>";
                exit;
            } else {
                echo "Error inserting order: " . mysqli_error($con);
            }
            
        } else {
            echo "<script>alert('Your cart is empty');</script>";
        }
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
    // include 'navbar.php';
    ?> 

  </head>
  <body>
      
      <!-- checkout-label  -->
      <section class="checkoutlabel">
          <div class="checkout-label-container">
            <div class="checkout-label-img">
              <div class="checkout-label-content">
                <label for="">Checkout</label>
              </div>
            </div>
          </div>
        </section>


      <!-- checkout-main-content   -->
      <section class="checkout-content-section">
          <div class="checkout-content-container">
            <form action="" method="POST">
              <div class="row main-row">
              <div class="checkout-left-container col-12 col-md-6 col-lg-4">
                    <div class="checkout-left-container-heading">
                        <h3>BILLING DETAILS</h3>
                    </div>
                      <div class="row billing-form-row">
                      <div class="checkout-input-1 col-12 col-sm-12 col-md-12 col-lg-6">  
                        <label for="">FIRST NAME <span>*</span></label>                    
                        <input type="text" name="F_name" id="" value="<?php echo isset($_POST['F_name']) ? htmlspecialchars($_POST['F_name']) : ''; ?>">
                        <!-- php  -->
                        <?php
                          if(isset($_SESSION['errors']['F_name'])){
                            echo "<p class='errors'>". $_SESSION['errors']['F_name'] ."</p>";
                          }
                        ?>
                      </div>
                      <div class="checkout-input-2 col-12 col-sm-12 col-md-12 col-lg-6" >
                        <label for="">LAST NAME <span>*</span></label>   
                        <input type="text" name="L_name" id="" value="<?php echo isset($_POST['L_name']) ? htmlspecialchars($_POST['L_name']) : ''; ?>">
                        <!-- php  -->
                        <?php
                          if(isset($_SESSION['errors']['L_name'])){
                            echo "<p class='errors'>". $_SESSION['errors']['L_name'] ."</p>";
                          }
                        ?>
                      </div>
                      <div class="checkout-input-3 col-12 col-md-12 col-lg-12">
                        <label for="">COMPANY NAME (OPTIONAL) </label>  
                        <input type="text" name="Company_name" id="" value="<?php echo isset($_POST['Company_name']) ? htmlspecialchars($_POST['Company_name']) : ''; ?>">
                        <!-- php  -->
                        <?php
                          if(isset($_SESSION['errors']['Company_name'])){
                            echo "<p class='errors'>". $_SESSION['errors']['Company_name'] ."</p>";
                          }
                        ?>
                      </div>
                      <div class="checkout-input-4 col-12 col-md-12 col-lg-12">
                        <label for="">STREET ADRESS <span>*</span></label>  
                        <textarea name="Adress" id="" placeholder="House number and street name Apartment, suite, unit,etc.(optional)" >
                        <?php echo isset($_POST['Adress']) ? htmlspecialchars($_POST['Adress']) : ''; ?>
                        </textarea>
                        <!-- php  -->
                        <?php
                          if(isset($_SESSION['errors']['Adress'])){
                            echo "<p class='errors'>". $_SESSION['errors']['Adress'] ."</p>";
                          }
                        ?>
                      </div>
                      <div class="checkout-input-5 col-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="">TOWN/CITY <span>*</span></label>  
                        <input type="text" name="City" id="" value="<?php echo isset($_POST['City']) ? htmlspecialchars($_POST['City']) : ''; ?>">
                        <!-- php  -->
                        <?php
                            if(isset($_SESSION['errors']['City'])){
                              echo "<p class='errors'>". $_SESSION['errors']['City'] ."</p>";
                            }
                          ?>
                        </div>
                        <div class="checkout-input-6 col-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="">STATE/COUNTRY <span>*</span></label>                
                        <select name="Country" id="">
                            <option value="">SELECT STATE</option>
                            <option value="AZAD KASHMIR">AZAD KASHMIR</option>
                            <option value="BALOCHISTAN">BALOCHISTAN</option>
                            <option value="FATA">FATA</option>
                            <option value="GILGIT BALDISTAN">GILGIT BALDISTAN</option>
                            <option value="ISLAMABAD">ISLAMABAD</option>
                            <option value="KHYBAR PAKHTUNKHWA">KHYBAR PAKHTUNKHWA</option>
                            <option value="SINDH">SINDH</option>
                            <option value="PUNJAB">PUNJAB</option>
                        </select>
                        <!-- php  -->
                        <?php
                            if(isset($_SESSION['errors']['Country'])){
                              echo "<p class='errors'>". $_SESSION['errors']['Country'] ."</p>";
                            }
                          ?>
                      </div>
                      <div class="checkout-label-7 col-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="">POSTCODE/ZIP <span>*</span></label>  
                        <input type="text" name="Postcode" id="" value="<?php echo isset($_POST['Postcode']) ? htmlspecialchars($_POST['Postcode']) : ''; ?>">
                        <!-- php  -->
                        <?php
                            if(isset($_SESSION['errors']['Postcode'])){
                              echo "<p class='errors'>". $_SESSION['errors']['Postcode'] ."</p>";
                            }
                          ?>
                        </div>
                        <div class="checkout-input-8 col-12 col-sm-12 col-md-12 col-lg-6">
                          <label for="">PHONE <span>*</span></label>  
                          <input type="text" name="Phone" id="" value="<?php echo isset($_POST['Phone']) ? htmlspecialchars($_POST['Phone']) : ''; ?>">
                        <!-- php  -->
                          <?php
                            if(isset($_SESSION['errors']['Phone'])){
                              echo "<p class='errors'>". $_SESSION['errors']['Phone'] ."</p>";
                            }
                          ?>
                      </div>
                      <div class="checkout-input-9">
                        <label for="">EMAIL ADRESS <span>*</span></label>  
                        <input type="text" name="Email" id="" value="<?php echo isset($_POST['Email']) ? htmlspecialchars($_POST['Email']) : ''; ?>">
                        <!-- php  -->
                          <?php
                            if(isset($_SESSION['errors']['Email'])){
                              echo "<p class='errors'>". $_SESSION['errors']['Email'] ."</p>";
                            }
                          ?>
                      </div>      
                      <div class="checkout-btn">
                        <input type="submit" value="PLACE ORDER" name="checkout_btn">
                      </div> 
                  </div>
              </div>
              <div class="checkout-right-container col-12 col-md-6 col-lg-4">
                  <div class="checkout-right-content-box">
                      <div class="checkout-right-content-heading">
                          <h3>INVOICE DETAILS</h3>
                          </div>
                          <div class="checkout-right-ul">
                              <label for="" class="right-section-dark">PRODUCT <span></span> SUBTOTAL</label>
                              <!-- <li>  echo .$product_name.'.<span></span>.'. $product_price ;</li> -->
                              <?php
                              if(isset($_SESSION['cart'])){

                                    foreach($_SESSION['cart'] as $item){
                                      $sub_total = $item['product_price'] * $item['qty'];

                                      $total_amount += $sub_total;
                                
                              ?>
                              <li>
                                <span style="float: left;"><?php echo $item['product_name']; ?></span>
                                <span style="float: right;"><?php echo number_format($sub_total); ?></span>
                              </li>
                              <?php
                              }
                            }
                            ?>
                              <label for="">TOTAL <span></span> PKR <?php echo number_format($total_amount);?></label>
                          </div>
                          <div class="checkout-right-payment-img">
                              <label for="">SELECT PAYMENT METHOD<span></span></label>
                              <div class="checkout-right-img">
                              <img src="images/footer-payment-1.png" alt="">
                              <img src="images/footer-payment-2.png" alt="">
                              <img src="images/footer-payment-3.png" alt="">
                              </div>
                          </div>
                              <div class="checkout-right-payment-label">
                                <div class="payment-method-1"> 
                                  <input type="checkbox" name="" id="">
                                  <label for="">Mastercard</label>
                                </div>
                                <div class="payment-method-1">
                                  <input type="checkbox" name="" id="">
                                  <label for="">JAZZCASH</label>
                                </div>
                                <div class="payment-method-1">
                                  <input type="checkbox" name="" id="">   
                                  <label for="">VISA</label>
                                </div>
                                <div class="payment-method-1">
                                  <input type="checkbox" name="" id="" checked>
                                  <label for="">CASH ON DELIVARY</label>
                                </div>
                              </div>
                            </form>
                      </div>
                  </div>
                          <!-- </div> -->
              </div> <!-- row-div -->
          </div> <!-- container-div -->
      </section>






      <!-- php  -->
    <?php
      include 'footer.php';
    ?>
      

  <!-- Bootstrap-Javascript-link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
  crossorigin="anonymous"></scrip> 
  
  


  </body>

  </html>