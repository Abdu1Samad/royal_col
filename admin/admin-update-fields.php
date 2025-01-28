
<?php
    include 'includes/header.php';
    include 'includes/admin-sidebar.php';
    include 'includes/admin-navbar.php';
    include '../connection.php';

    if(isset($_GET['id'])){
        $product_id = $_GET['id'];
        $selectdata_for_update = "SELECT * FROM products WHERE product_id = '$product_id'";
        $select_for_update_query = mysqli_query($con,$selectdata_for_update);
        $fetch_data_for_update = mysqli_fetch_Assoc($select_for_update_query);
    }

?>

<section class="admin-product-form-section">
        <div class="admin-product-form-container">
            <div class="admin-product-from-heading">
                <h3>Update Products</h3>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="admin-product-input-1">
                    <label for="">Name</label>
                    <input type="text"  id="" name="name" value=" <?php echo $fetch_data_for_update['product_name'] ;?>">
                </div>
                <div class="admin-product-input-2">
                    <label for="">Price</label>
                    <input type="number" id="" name="price" value="<?php echo $fetch_data_for_update['product_price'];?>">
                </div>
                <div class="admin-product-input-3">
                    <label for="">Rating</label>
                    <input type="number" id="" name="rating" value="<?php echo $fetch_data_for_update['product_rating'];?>">
                </div>
                <div class="admin-product-input-7">
                    <label for="">Description</label>
                    <textarea type="text"  id="" name="desc"><?php echo $fetch_data_for_update['product-desc'] ;?>"</textarea>
                </div>
                <div class="admin-product-input-4">
                    <label for="">Image-1</label>
                    <!-- php -->
                        <?php
                        if(!empty($fetch_data_for_update['product_img'])):?>
                            <img src="uploads/<?php echo $fetch_data_for_update['product_img']; ?>"alt="" style="width:100px; height:100px; object-fit:contain;">
                        <?php endif; ?>
                    <input type="file"  id="" class="file-input" name="img1">
                </div>
                <div class="admin-product-input-5">
                    <label for="">Image-2</label>
                    <!-- php -->
                        <?php
                        if(!empty($fetch_data_for_update['product-img-2'])):?>
                            <img src="/<?php echo $fetch_data_for_update['product-img-2']; ?>"alt="" style="width:100px; height:100px; object-fit:contain;">
                        <?php endif; ?>
                    <input type="file"  id="" class="file-input"  name="img2">
                </div>
                <div class="admin-product-input-6">
                    <label for="">Image-3</label>
                    <!-- php -->
                        <?php
                        if(!empty($fetch_data_for_update['product-img-3'])):?>
                            <img src="uploads/<?php echo $fetch_data_for_update['product-img-3']; ?>"alt="" style="width:100px; height:100px; object-fit:contain;">
                        <?php endif; ?>
                    <input type="file" id="" class="file-input"  name="img3">
                </div>
                <div class="admin-product-input-8">
                    <input type="submit" name="update" id="" value="Update">
                </div>
            </form>
        </div>
    </section>

    <!-- php  -->
    <?php

     if(isset($_POST['update'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $rating = $_POST['rating'];
        $desc = $_POST['desc'];
    
        
        $upload_dir = "uploads/";
        $img1 =  $_FILES['img1'];
        $img2 =  $_FILES['img2'];
        $img3 =  $_FILES['img3'];

        $updatequery = "UPDATE products SET `product_name` = '$name',`product_price` = '$price',`product_rating` ='$rating', `product-desc` = '$desc'";

        if(!empty($_FILES['img1']['name'])){
            $img1 = $_FILES['img1']['name'];
            $img1path = $upload_dir .basename($img1);
            move_uploaded_file($_FILES['img1']['tmp_name'], $img1path);
            $updatequery .= ", `product_img` = '$img1'";
        }
        if(!empty($_FILES['img2']['name'])){
            $img2 = $_FILES['img2']['name'];
            $img2path = $upload_dir .basename($img2);
            move_uploaded_file($_FILES['img2']['tmp_name'], $img2path);
            $updatequery .= ", `product-img-2` = '$img2'";
        }if(!empty($_FILES['img3']['name'])){
            $img3 = $_FILES['img3']['name'];
            $img3path = $upload_dir.basename($img3);
            move_uploaded_file($_FILES['img3']['tmp_name'], $img3path);
            $updatequery .= ", `product-img-3` = '$img3'";
        }

        $updatequery .= " WHERE product_id='$product_id'";

        if(mysqli_query($con,$updatequery)){
            header("location:admin-product-show.php");
            exit();
        }else{
            ?>
            <script>
                alert("Error updating");
            </script>
            <?php
        }

     }   
    
    ?>




<?php
    include 'includes/admin-footer.php';
?>