
<?php

    session_start();
    include 'includes/header.php';
    include 'includes/admin-sidebar.php';
    include 'includes/admin-navbar.php';
    include '../connection.php';

    $_SESSION['message'] = "";


    if(isset($_POST['submit'])){
        $name = trim($_POST['name']);
        $price = trim($_POST['price']);
        $rating = trim($_POST['rating']);
        $desc = trim($_POST['desc']);

        $img1 = null;
        $img2 = null;
        $img3 = null;
        $error = false;

       if(empty($_FILES['img1']['name'])){
            $_SESSION['img-1-error'] = "Image 1 is required";
            $error = true;
       }
       
       if(empty($_FILES['img2']['name'])){
            $_SESSION['img-2-error'] = "Image 2 is required";
            $error = true;
       }
   
       if(empty($_FILES['img3']['name'])){
            $_SESSION['img-3-error'] = "Image 3 is required";
            $error = true;
       }

        if(empty($name)){
            $_SESSION['tittle-error'] = "product tittle is required";
            $error = true;
        }
        if(empty($price) || !is_numeric($price)){
            $_SESSION['price-error'] = "please must be a valid number .";
            $error = true;
        }
        if(empty($rating) || !is_numeric($rating)){
            $_SESSION['Rating-error'] = "Rating must be a number between 0 and 5";
            $error = true;
        }
        if(empty($desc)){
            $_SESSION['desc-error'] = "Description is required";
            $error = true;
        }

        $allowedtypes = ['image/jpeg','image/png','image/gif', 'image/avif', 'image/webp'];

        foreach(['img1','img2','img3'] as $imgfield){
            if(isset($_FILES[$imgfield]) && $_FILES[$imgfield]['error'] == 0){
                if(!in_array($_FILES[$imgfield]['type'], $allowedtypes)){
                    $_SESSION[$imgfield.'-error'] = "img field must be in jpeg,png,gif,avif,webp.";
                    $error = true;
                }else{
                    $target_dir = "uploads/";
                    $target_file = $target_dir .basename($_FILES[$imgfield]["name"]);

                    if(move_uploaded_file($_FILES[$imgfield]["tmp_name"],$target_file)){
                        if($imgfield == 'img1') {
                            $img1 = $target_file;
                        } elseif($imgfield == 'img2') {
                            $img2 = $target_file;
                        } elseif($imgfield == 'img3') {
                            $img3 = $target_file;
                        }
                    }else{
                        $_SESSION['message'] = "Error uploading the image";
                        $error = true;
                    }
                }
            }
        }

        if(!$error){    

            $product_insert = "INSERT INTO products(`product_name`,`product_price`,`product_rating`,`product_img`,`product-img-2`,`product-img-3`,`product-desc`)VALUES('$name','$price','$rating','$img1','$img2','$img3','$desc')";

            $product_query = mysqli_query($con,$product_insert);

            if($product_query){
                $_SESSION['sucess-message'] = "Products has been succesfully Inserted!";
            }else{
                $_SESSION['sucess-message'] = "Error Inserting the products!";
            }

        }

    }

?>


    <section class="admin-product-form-section">
        <div class="admin-product-form-container">
            <!-- php  -->
            <?php
                if(isset($_SESSION['sucess-message'])){        
                    echo '<div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <strong>' .$_SESSION["sucess-message"]. '</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    unset($_SESSION['sucess-message']);
                }
            ?>
            <div class="admin-product-from-heading">
                <h3>Product Form</h3>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="admin-product-input-1">
                    <label for="">Name</label>
                    <input type="text"  id="" name="name">
                    <!-- php  -->
                    <?php
                    if(isset($_SESSION['tittle-error'])){
                        echo '<div class ="error-message">'.$_SESSION['tittle-error'] . '</div>';
                        unset($_SESSION['tittle-error']);
                    }
                    ?>
                </div>
                <div class="admin-product-input-2">
                    <label for="">Price</label>
                    <input type="number"  id="" name="price">
                    <!-- php  -->
                    <?php
                    if(isset($_SESSION['price-error'])){
                        echo '<div class ="error-message">'.$_SESSION['price-error'] . '</div>';
                        unset($_SESSION['price-error']);
                    }
                    ?>
                </div>
                <div class="admin-product-input-3">
                    <label for="">Rating</label>
                    <input type="number"  id="" name="rating">
                    <!-- php  -->
                    <?php
                    if(isset($_SESSION['Rating-error'])){
                        echo '<div class ="error-message">'.$_SESSION['Rating-error'] . '</div>';
                        unset($_SESSION['Rating-error']);
                    }
                    ?>
                </div>
                <div class="admin-product-input-7">
                    <label for="">Description</label>
                    <textarea type="text"  id="" name="desc"></textarea>
                    <!-- php  -->
                    <?php
                    if(isset($_SESSION['desc-error'])){
                        echo '<div class ="error-message">'.$_SESSION['desc-error'] . '</div>';
                        unset($_SESSION['desc-error']);
                    }
                    ?>
                </div>
                <div class="admin-product-input-4">
                    <label for="">Image-1</label>
                    <input type="file"  id="" class="file-input" name="img1">
                    <!-- php  -->
                    <?php
                    if(isset($_SESSION['img-1-error'])){
                        echo '<div class ="error-message">'.$_SESSION['img-1-error'] . '</div>';
                        unset($_SESSION['img-1-error']);
                    }
                    ?>
                </div>
                <div class="admin-product-input-5">
                    <label for="">Image-2</label>
                    <input type="file"  id="" class="file-input"  name="img2">
                    <!-- php  -->
                    <?php
                    if(isset($_SESSION['img-2-error'])){
                        echo '<div class ="error-message">'.$_SESSION['img-2-error'] . '</div>';
                        unset($_SESSION['img-2-error']);
                    }
                    ?>
                </div>
                <div class="admin-product-input-6">
                    <label for="">Image-3</label>
                    <input type="file" id="" class="file-input"  name="img3">
                    <!-- php  -->
                    <?php
                    if(isset($_SESSION['img-3-error'])){
                        echo '<div class ="error-message">'.$_SESSION['img-3-error'] . '</div>';
                        unset($_SESSION['img-3-error']);
                    }
                    ?>
                </div>
                <div class="admin-product-input-8">
                    <input type="submit" name="submit" id="" value="Submit">
                </div>
            </form>
        </div>
    </section>






<?php 
 include 'includes/admin-footer.php';
?>                   
    
