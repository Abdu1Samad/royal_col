<?php
    include 'includes/header.php';
    include 'includes/admin-sidebar.php';
    include 'includes/admin-navbar.php';
    include '../connection.php';
    $fetchdata = "SELECT * FROM products";
    $fetchquery = mysqli_query($con,$fetchdata);

?>

    <section class="show-product-table">
        <div class="show-product-table-container p-6">
            <table class="table-responsive">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Rating</th>
                <th scope="col">Description</th>
                <th scope="col">Img-1</th>
                <th scope="col">Img-2</th>
                <th scope="col">Img-3</th>
                <th scope="col" class="operator-column">Operations</th>
                </tr>
            </thead>
            <tbody>
                <!-- php  -->
                <?php
                while($row = mysqli_fetch_assoc($fetchquery)){   
                echo '<tr>';
                echo'<td>'.$row['product_id'].'</td>';
                echo'<th scope="row">'.$row['product_name'].'</th>';
                echo'<td>'.$row['product_price'].'</td>';
                echo'<td>'.$row['product_rating'].'</td>';
                echo'<td>'.$row['product-desc'].'</td>';
                echo'<td><img src="'. $row['product_img'].'"style="width:100px; height:100px; object-fit:contain; class="product-show-img""></td>';
                echo'<td><img src="'.$row['product-img-2'].'"style="width:100px; height:100px; object-fit:contain;"></td>';
                echo'<td><img src="'.$row['product-img-3'].'"style="width:100px; height:100px; object-fit:contain;"</td>';
                echo'<td>
                <a href="./admin-update-fields.php?id='.$row['product_id'].'"<button type="button" class="btn btn-primary">Update</button></a>
                <form action="admin-delete.php" method="POST" style="display:inline;">
                <input type="hidden" name="id" value="'. $row['product_id'] .'" >
                <button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this product?\');">Delete</button>
                </form>
                </td>';
                echo'</tr>';
            }
            ?>
            </tbody>
            </table>
        </div>
    </section>

<?php
    include 'includes/admin-footer.php';
?>