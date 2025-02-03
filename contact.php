<!-- php  -->
<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- tittle  -->
  <title>Contact</title>

  <!-- Bootstrap-css-link  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font-Awesome-Library  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

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
  <link rel="stylesheet" href="css-files-floder/contact.css">

  <!-- php  -->
  <?php
  include 'navbar.php';
  ?> 

</head>

<body>
    <!-- Contact-label  -->

    <section class="contactlabel">
        <div class="contact-label-container">
          <div class="contact-label-img">
            <div class="contact-label-content">
              <label for="">Contact Us</label>
            </div>
          </div>
        </div>
      </section>

    <!-- contact-us-boxes -->

    <section class="Contact-us-boxes">
        <div class="container Contact-us-boxes-container">
            <div class="contact-box-1">
                <i class="fa-solid fa-envelope"></i>
                <label for="">Email Us</label>
                <p>Sammadaltaf43@gmail.com</p>
            </div>
            <div class="contact-box-2">
                <i class="fa-solid fa-phone"></i>
                <label for="">Call Us</label>
                <p>03373169656</p>
            </div>
            <div class="contact-box-3">
                <i class="fa-solid fa-location-dot"></i>
                <label for="">Location</label>
                <p>ROYAL COLLECTION - Dolmen Mall DHA</p>
            </div>
        </div>
    </section>

    <!-- contact-form  -->

    <section class="contact-form-section">
      <div class="contact-form-container">
        <div class="contact-form-left">
          <div class="contact-form">
            <h3>GET IN TOUCH WITH US</h3>
            <form action="">
              <div class="input-1">
              <label for="">Name</label>
              <input type="text" value="">
              </div>
              <div class="input-2">
              <label for="">Email</label>  
              <input type="email">
              </div>
              <div class="input-3">
              <label for="">Subject</label>  
              <input type="text" name="" id="">
              </div>
              <div class="input-4">
              <label for="">Message</label>  
              <input type="text" name="" id="" class="contact-message-input">
              </div>
              <div class="input-5">
              <input type="submit" value="SEND MESSAGE" class="contact-form-submit-btn">
              </div>
            </form>
          </div>
        </div>
        <div class="contact-form-right">
          <div class="contact-from-img">
            <img src="https://images.unsplash.com/photo-1496440737103-cd596325d314?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fGxhZHklMjBtb2RlbHxlbnwwfHwwfHx8MA%3D%3D" alt="">
          </div>
        </div>
      </div>
    </section>    

    <!-- Google-map-contact-page  -->
    <section class="google-map-section">
    <div class="google-map-container">
    <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=500&amp;hl=en&amp;q=Dollmen mall DHA&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://sprunkiphasez.com/">Sprunki Phase</a></div><style>.mapouter{position:relative;text-align:center;width:70%;height:500px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:500px;}.gmap_iframe {height:500px!important;}</style></div>
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