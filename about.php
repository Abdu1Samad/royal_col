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
  <title>About</title>

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
  <link rel="stylesheet" href="css-files-floder/about.css">

  <!-- php  -->
  <?php
     include 'navbar.php';
  ?> 


</head>

<body>



  <!-- about-label  -->

  <section class="aboutlabel">
    <div class="about-label-container">
      <div class="about-label-img">
        <div class="about-label-content">
          <label for="">About Us</label>
        </div>
      </div>
    </div>
  </section>


  <section class="about-img-section">
    <div class="about-img-container">
      <div class="about-img-left">
        <img
          src="https://qx-gluck.myshopify.com/cdn/shop/files/about-filler1.jpg?v=1704875468&width=720"
          alt="">
      </div>
      <div class="about-img-para-right">
        <h1>About Royal Collection?</h1>
        <p>The Royal Collection is one of the most significant and expansive art collections in the world, holding more
          than a million objects. Spanning centuries of history, it encompasses a wide array of art, including
          paintings, sculptures, manuscripts, decorative arts, and royal treasures. These items are housed in various
          royal residences, such as Buckingham Palace, Windsor Castle, and the Palace of Holyroodhouse, providing an
          intimate connection with the lives and legacy of the pakistan monarchy. Each piece in the collection offers
          valuable insight into the cultural and historical shifts that have shaped the pakistan and its royal
          family.
          <br>
          <span class="about-para-2">
          Managed by the Royal Collection Trust, the collection is carefully preserved and made available to the public,
          showcasing the artistic tastes and achievements of British kings and queens throughout the centuries. It
          represents not only royal patronage but also the influence of artists, designers, and craftspeople who have
          contributed to the evolution of pakistan culture. The collection also highlights the royal family's role in the
          global exchange of art and culture, as they have collected significant works from around the world.
        </span>
        </p>
        <div class="about-right-btn">
          <a href="">SHOP PRODUCTS <i class="fa-solid fa-angle-right"></i></a>
        </div>
      </div>
    </div>
  </section>

  <!-- about-Testimonail  -->

  <section class="about-testimonail-section">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="testimonial-heading">
        <h2>TESTIMONIALS</h2>
      </div>
        <div class="carousel-item active">
          <div class="testimonial-content-1">
          <img src="images/testimonial-person-1.png" class="" alt="...">
          <label for="">Michael Clarke</label>
          <p>"Shopping at ROYAL COLLECTION is a pleasure! Their user-friendly website made finding what I needed a breeze, and the variety of products is outstanding. I couldn't be happier with my purchase."
          </p>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="testimonial-content-1">
            <img src="images/testimonial-person-2.png" class="" alt="...">
            <label for="">David Ramirez</label>
            <p>"I've been a loyal customer of ROYAL COLLECTION for a while now. The selection of products is vast, the prices are competitive, and the shipping is always on time. It's a one-stop shop for all my needs!"
            </p>
         </div>
        </div>
        <div class="carousel-item ">
          <div class="testimonial-content-1">
            <img src="images/testimonail-person-3.png" class="" alt="...">
            <label for="">Sarah Anderson</label>
            <p>"I've shopped online extensively, and ROYAL COLLECTION stands out as one of the best. Their customer service is top-notch, and the products are of the highest quality. I highly recommend them to anyone looking for great deals and a seamless shopping experience."
            </p>
         </div>
        </div>
         <div class="carousel-item">
          <div class="testimonial-content-1">
            <img src="images/testimonial-person-4.png" class="" alt="...">
            <label for="">Mark Daniel</label>
            <p>"I recently ordered from ROYAL COLLECTION and was impressed with the product's quality and the quick delivery. The website is well-organized, making it easy to find what I was looking for. This is my new go-to for online shopping."
            </p>
         </div>
        </div>
         <div class="carousel-item">
          <div class="testimonial-content-1">
            <img src="images/testimonial-person-5.png" class="" alt="...">
            <label for="">Laura John </label>
            <p>"I am beyond thrilled with my recent purchase from ROYAL COLLECTION. The product quality exceeded my expectations, and the speedy delivery made my shopping experience truly exceptional. I'll definitely be back for more!"
            </p>
         </div>
      </div>
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