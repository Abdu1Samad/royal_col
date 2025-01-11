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
  <link rel="stylesheet" href="css-files-floder/signup.css">

  <!-- php  -->
  <?php
    session_start();
    include 'navbar.php';
    include 'connection.php';

    if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $pass = $_POST['password'];
      $Con_pass = $_POST['Con_password'];
      $error = false;

      if(strlen($name) < 3){
        $_SESSION['name_error'] = "name must be in 3 characters";  
        $error = true;
      }
      else{
        unset($_SESSION['name_error']);
      }

      if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/" , $pass)){
        $_SESSION['special_char_error'] = "Password length must be 8 chars, 1 Uppercase, 1 Lowercase & atleast 1 special character.";
        $error = true;
      }else{
        unset($_SESSION['special_char_error']);
      }

      if($pass !== $Con_pass){
        $_SESSION['Confirm_pass_error'] = "password and confirm password does not match";
        $error = true;
      }else{
        unset($_SESSION['confirm_pass_error']);
      }

      $checkemail = "SELECT * FROM signup WHERE signup_email = '$email'";
      $email_Check_query = mysqli_query($con,$checkemail);

      if(mysqli_num_rows($email_Check_query) > 0){
        $_SESSION['email_error'] = "This email is already registered";
        $error = true;
      }

      if(!$error){
        $Insert = "INSERT INTO signup(`signup_id`,`signup_name`,`signup_email`,`signup_password`,`Confirm_password`)VALUES(null,'$name','$email','$pass','$Con_pass')";

        $iquery = mysqli_query($con,$Insert);  
      
        if($iquery){
          $_SESSION['success_message'] = "you have successfully signed up!";
          header('Location: ' . $_SERVER['PHP_SELF']);
          exit();
        }else{
            echo "inserted error";
        }
      }
    }

  ?> 
</head>
<body>

    <!-- signup-form  -->

    <section class="signup-form-section">
              <div class="signup-form-container">
                    <?php
          if(isset($_SESSION['success_message'])){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> Your account has been created successfully.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            unset($_SESSION['success_message']);
          }    
          ?>

            <div class="signup-from-heading">
                <h3>Signup</h3>
            </div>
            <form action="" method="POST">
                <div class="signup-input-1">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" required>
                    <?php
                    if(isset($_SESSION['name_error'])){
                      echo '<div class="error-message">'.$_SESSION['name_error'].'</div>';
                      unset($_SESSION['name_error']);
                    }
                    ?>
                </div>
                <div class="signup-input-2">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" required>
                    <?php
                    if(isset($_SESSION['email_error'])){
                      echo '<div class="error-message">'.$_SESSION['email_error'].'</div>';
                      unset($_SESSION['email_error']);

                    }
                    ?>
                </div>
                <div class="signup-input-3">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" required>
                    <?php
                    if(isset($_SESSION['special_char_error'])){   
                      echo '<div class="error-message">'.$_SESSION['special_char_error'].'</div>';
                      unset($_SESSION['special_char_error']);
                    }
                    ?>
                </div>
                <div class="signup-input-4">
                    <label for="">Confirm password</label>
                    <input type="password" name="Con_password" id="" required>
                    <?php
                    if(isset($_SESSION['Confirm_pass_error'])){   
                      echo '<div class="error-message">'.$_SESSION['Confirm_pass_error'].'</div>';
                      unset($_SESSION['Confirm_pass_error']);
                    }
                    ?>
                </div>
                <div class="signup-input-5">
                  <input type="submit" value="submit" name="submit">
                </div>
                <div class="signup-input-para">
                    <p>You have an account? <a href="login.php"> Login</a></p>
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
