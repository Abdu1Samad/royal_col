
<?php
    include 'includes/header.php';
    include 'includes/admin-sidebar.php';
    include 'includes/admin-navbar.php';
    include '../connection.php';

    session_start();
    if(isset($_POST['submit'])){
        $name = trim($_POST['name']);
        $price = trim($_POST['price']);
        $rating = trim($_POST['rating']);
        $desc = trim($_POST['desc']);

        $img1 = $_files['img1'];
        $img2 = $_files['img2'];
        $img3 = $_files['img3'];

        if(empty($name)){
            $_SESSION['message'] = "product tittle is required";
        }
        if(empty($price) || !is_numeric($price)){
            $_SESSION['message'] = "please must be a valid number .";
        }
        if(empty($rating) || !is_numeric($rating)){
            $_SESSION['message'] = "Rating must be a number between 0 and 5";
        }
        if(empty($desc)){
            $_SESSION['message'] = "Description is required";
        }

        $allowedtypes = ['image/jpeg','image/png','image/gif'];

        foreach(['img1','img2','img3'] as $imgfield){
            if(isset($_fILES[$imgfield]) && $_FILES[$imgfield]['error'] == 0){
                if(!in_array($_fILES[$imgfield]['type'], $allowedtypes)){
                    $_SESSION['message'] = "img field must be in jpeg,png,gif";
                }
            }
        }

        if(!empty($_SESSION)){    

            $product_insert = "INSERT INTO products(`product_name`,`product_price`,`product_rating`,`product_img`,`product-img-2`,`product-img-3`,`product-desc`)VALUES('$name','$price','$rating','$img1','$img2','$img3','$desc')";

            $product_query = mysqli_query($con,$product_insert);

            if($product_query){
                echo "product has been succesfully inserted";
            }else{
                echo "$_SESSION ";
            }
        }

    }

?>


    <section class="admin-product-form-section">
        <div class="admin-product-form-container">
            <div class="admin-product-from-heading">
                <h3>Product Form</h3>
            </div>
            <form action="" method="POST">
                <div class="admin-product-input-1">
                    <label for="">Name</label>
                    <input type="text"  id="" name="name">
                </div>
                <div class="admin-product-input-2">
                    <label for="">Price</label>
                    <input type="number"  id="" name="price">
                </div>
                <div class="admin-product-input-3">
                    <label for="">Rating</label>
                    <input type="number"  id="" name="rating">
                </div>
                <div class="admin-product-input-7">
                    <label for="">Description</label>
                    <input type="text"  id="" name="desc">
                </div>
                <div class="admin-product-input-4">
                    <label for="">Image-1</label>
                    <input type="file"  id="" class="file-input" name="img1">
                </div>
                <div class="admin-product-input-5">
                    <label for="">Image-2</label>
                    <input type="file"  id="" class="file-input"  name="img2">
                </div>
                <div class="admin-product-input-6">
                    <label for="">Image-3</label>
                    <input type="file" id="" class="file-input"  name="img3">
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
    
