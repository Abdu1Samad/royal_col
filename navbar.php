
<!-- Navbar  -->
<nav class="navbar navbar-expand-md bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="images/Navbar-logo.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
        style="background-color: white;">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">PRODUCTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Blogs.php">BLOGS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">ABOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">CONTACT US</a>
          </li>
        </ul>
        <div class="navbar-icons">
          <i class="fa-solid fa-magnifying-glass"></i>
          <div class="dropdown">
            <button class="btn auth-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-user-large"></i>
            </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <?php if(isset($_SESSION['user_authenticated'])) : ?>

            <li>
              <form method="POST">
                <button class="dropdown-item">Logout</button>
              </form>
            </li>

            
            <?php else : ?>
              
            <li><a class="dropdown-item" href="login.php">Login</a></li>
            <li><a class="dropdown-item" href="signup.php">Signup</a></li>

            <?php endif; ?>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
          </div>
          <i class="fa-solid fa-cart-shopping nav-cart-icon"></i>
        </div>
      </div>
    </div>
  </nav> <!--Navbar-End-->

