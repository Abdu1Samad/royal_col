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
  <link rel="stylesheet" href="css-files-floder/login.css">

  <!-- php  -->
  <?php
    session_start();
    include 'navbar.php';
    include 'connection.php';

    if(isset($_POST['submit'])){
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      $fetchdata_login = "SELECT * FROM signup where signup_email = '$email'";
      $login_query = mysqli_query($con,$fetchdata_login);

      if(mysqli_num_rows($login_query) > 0){
        $user = mysqli_fetch_assoc($login_query);

        if($password == $user['signup_password']){
          $_SESSION['login_message'] = "You have succesfully login !";
          $_SESSION['login_message_type'] = "success";
        }else{
          $_SESSION['login_message'] = "Incorrect password !";
          $_SESSION['login_message_type'] = "error";
        }
      }else{
        $_SESSION['login_message'] = "No user found with that email please signup !";
        $_SESSION['login_message_type'] = "error";
      }


    }


  ?>
     
</head>
<body>  

    <!-- login-form  -->

    <section class="login-form-section">
        <div class="login-form-container">
          <!-- php  -->
           <?php
           if(isset($_SESSION['login_message'])){

            $message = $_SESSION['login_message'];
            $message_type = $_SESSION['login_message_type'];

            if($message_type == 'success'){
              $alert_class = 'alert-success';
            }elseif($message_type == 'error'){
              $alert_class = 'alert-danger';
            }

            echo '<div class="alert '. $alert_class .' alert-dismissible fade show" role="alert">
            <strong>' .$_SESSION["login_message"]. '</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            unset($_SESSION['login_message']);
           }
           ?>
            <div class="login-from-heading">
                <h3>Login</h3>
            </div>
            <form action="" method="POST">
                <div class="login-input-1">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" required>
                </div>
                <div class="login-input-2">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" required>
                </div>
                <div class="forget-password-div">
                  <a href="">Forgot password?</a>
                </div>
                <div class="login-input-5">
                  <input type="submit" value="submit" name="submit">
                </div>
                
                <div class="login-input-para">
                    <p>Don't have an account? <a href="signup.php">Signup</a></p>
                </div>
            </form>
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
