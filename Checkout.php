
<!-- php  -->
<?php
   
   session_start();
   include 'connection.php';

   if(isset($_POST['checkout_btn'])){

    $F_name = $_POST['F_name'];
    $L_name = $_POST['L_name'];
    $Company_name = $_POST['Company_name'];
    $Adress = $_POST['Adress'];
    $City = $_POST['City'];
    $Country = $_POST['Country'];
    $Postcode = $_POST['Postcode'];
    $Phone_no = $_POST['Phone'];
    $Email = $_POST['Email'];

    
    if(!isset($_SESSION['errors'])){   //isko smjhna he 

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
    if(empty($F_name)){
       $_SESSION['errors']['F_name'] = "Please enter first name in this field!"; 
    }
    if(empty($L_name)){
      $_SESSION['errors']['L_name'] = "Please enter Last name in this field!"; 
    }
    if(empty($Adress)){
      $_SESSION['errors']['Adress'] = "Please enter Adress in this field!"; 
    }
    if(empty($City)){
      $_SESSION['errors']['City'] = "Please enter city/Town name in this field!"; 
    }
    if(empty($Country)){
      $_SESSION['errors']['Country'] = "Please select your state/country!"; 
    }
    if(empty($Postcode)){
      $_SESSION['errors']['Postcode'] = "Please enter your Postal/Zipcode!"; 
    }
    if(empty($Phone_no)){
      $_SESSION['errors']['Phone'] = "Please enter your phone number!"; 
    }
    if($Phone_no < 11){
      $_SESSION['errors']['Phone'] = "Phone number must be in 11 !";
    }
    if(empty($Email)){
      $_SESSION['errors']['Email'] = "Email adress canot be empty!"; 
    }
    if(!Filter_var($Email,FILTER_VALIDATE_EMAIL)){
      $_SESSION['error']['Email'] = "Please enter @ in your email!";
    }

    if(isset($_SESSION['errors']) && !empty($_SESSION['errors'])){
        foreach($_SESSION['errors'] as $error){
            echo "<p style='color:red;'>$error</p>";
        }
    }else{
      $checkout_insert_data = "INSERT INTO checkout (`Id`,`F_name`,`L_name`,`Company_name`,`Adress`,`City`,`Country`,`Postcode`,`Phone_no`,`Email`,`Date_time`) VALUES (null,'$F_name','$L_name','$Company_name','$Adress','$City','$Country','$Postcode','$Phone_no','$Email',Now())";

      $checkout_insert_query = mysqli_query($con,$checkout_insert_data);

      if($checkout_insert_query){
        echo "inserted succesfully";
      }
      else{
        echo "insert error";
      }

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
  include 'navbar.php';
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
            <div class="row">
            <div class="checkout-left-container col-12 col-md-6 col-lg-4">
              <form action="" method="POST">
                  <div class="checkout-left-container-heading">
                      <h3>BILLING DETAILS</h3>
                  </div>
                    <div class="checkout-label-1">  
                      <label for="">FIRST NAME <span>*</span></label>                    
                      <label for="">LAST NAME <span>*</span></label>    
                    </div>
                    <div class="checkout-input-1">
                      <input type="text" name="F_name" id="">
                      <!-- php  -->
                      <?php
                        if(isset($_SESSION['errors']['F_name'])){
                          echo "<p class='errors'>". $_SESSION['errors']['F_name'] ."</p>";
                          unset($_SESSION['errors']);
                        }
                      ?>
                      <input type="text" name="L_name" id="">
                      <!-- php  -->
                      <?php
                        if(isset($_SESSION['errors']['L_name'])){
                          echo "<p class='errors'>". $_SESSION['errors']['L_name'] ."</p>";
                          unset($_SESSION['errors']);
                        }
                      ?>
                    </div>
                    <div class="checkout-input-2">
                      <label for="">COMPANY NAME (OPTIONAL) </label>  
                      <input type="text" name="Company_name" id="">
                      <!-- php  -->
                      <?php
                        if(isset($_SESSION['errors']['Company_name'])){
                          echo "<p class='errors'>". $_SESSION['errors']['Company_name'] ."</p>";
                          unset($_SESSION['errors']);
                        }
                      ?>
                    </div>
                    <div class="checkout-input-3">
                       <label for="">STREET ADRESS <span>*</span></label>  
                      <textarea name="Adress" id=""></textarea>
                      <!-- php  -->
                      <?php
                        if(isset($_SESSION['errors']['Adress'])){
                          echo "<p class='errors'>". $_SESSION['errors']['Adress'] ."</p>";
                          unset($_SESSION['errors']);
                        }
                      ?>
                    </div>
                    <div class="checkout-label-4">
                       <label for="">TOWN/CITY <span>*</span></label>  
                       <label for="">STATE/COUNTRY <span>*</span></label>  
                      </div>
                      <div class="checkout-input-4">
                      <input type="text" name="City" id="">
                       <!-- php  -->
                        <?php
                          if(isset($_SESSION['errors']['City'])){
                            echo "<p class='errors'>". $_SESSION['errors']['City'] ."</p>";
                            unset($_SESSION['errors']);
                          }
                        ?>
                      <select name="Country" id="">
                       <!-- php  -->
                        <?php
                          if(isset($_SESSION['errors']['Country'])){
                            echo "<p class='errors'>". $_SESSION['errors']['Country'] ."</p>";
                            unset($_SESSION['errors']);
                          }
                        ?>
                          <option value="">SELECT STATE</option>
                          <option value="">AZAD KASHMIR</option>
                          <option value="">BALOCHISTAN</option>
                          <option value="">FATA</option>
                          <option value="">GILGIT BALDISTAN</option>
                          <option value="">ISLAMABAD</option>
                          <option value="">KHYBAR PAKHTUNKHWA</option>
                          <option value="">SINDH</option>
                          <option value="">PUNJAB</option>
                      </select>
                    </div>
                    <div class="checkout-label-5">
                       <label for="">POSTCODE/ZIP <span>*</span></label>  
                       <label for="">PHONE <span>*</span></label>  
                      </div>
                      <div class="checkout-input-5">
                        <input type="text" name="Postcode" id="">
                      <!-- php  -->
                        <?php
                          if(isset($_SESSION['errors']['Postcode'])){
                            echo "<p class='errors'>". $_SESSION['errors']['Postcode'] ."</p>";
                            unset($_SESSION['errors']);
                          }
                        ?>
                        <input type="text" name="Phone" id="">
                      <!-- php  -->
                        <?php
                          if(isset($_SESSION['errors']['Phone'])){
                            echo "<p class='errors'>". $_SESSION['errors']['Phone'] ."</p>";
                            unset($_SESSION['errors']);
                          }
                        ?>
                    </div>
                    <div class="checkout-input-6">
                       <label for="">EMAIL ADRESS <span>*</span></label>  
                       <input type="text" name="Email" id="">
                      <!-- php  -->
                        <?php
                          if(isset($_SESSION['errors']['Email'])){
                            echo "<p class='errors'>". $_SESSION['errors']['Email'] ."</p>";
                            unset($_SESSION['errors']);
                          }
                        ?>
                    </div>      
            </div>
            <div class="checkout-right-container col-12 col-md-6 col-lg-4">
                 <div class="checkout-right-content-box">
                    <div class="checkout-right-content-heading">
                        <h3>INVOICE DETAILS</h3>
                        <div class="checkout-right-ul">
                            <label for="">PRODUCT SUBTOTAL</label>
                            <li></li>
                            <label for="">TOTAL <span></span> PKR</label>
                        </div>
                        <div class="checkout-right-payment">
                            <label for="">SELECT PAYMENT METHOD<span></span></label>
                            <ul>
                                <li><input type="radio" name="" id="">MASTERCARD</li>
                                <li><input type="radio" name="" id="">JAZZCASH</li>
                                <li><input type="radio" name="" id="">VISA</li>
                                <li><input type="radio" name="" id="" checked>CASH ON DELIVARY</li>
                            </ul>
                            <div class="checkout-btn">
                               <input type="submit" value="PLACE ORDER" name="checkout_btn">
                            </div>
                            </form>
                        </div>
                    </div>
                 </div>   
            </div>
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
 crossorigin="anonymous"></script> 
 
 


</body>

</html>