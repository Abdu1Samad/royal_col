
<?php

    include '../connection.php';
    if(isset($_POST['id'])){
        $product_id = $_POST['id'];

        $Deletequery = "DELETE FROM products WHERE product_id = '$product_id'";

        if(mysqli_query($con,$Deletequery)){
            header("location:admin-product-show.php");
            exit();
        }else{
            ?>
            <script>
                alert("product deleted error");
            </script>
            <?php
        }

    }


?>