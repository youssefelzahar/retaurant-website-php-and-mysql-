<?php include ("partials/menu.php") ?>;
<div class="main-content">
    <div class="wrapper">
        <h1>manage food</h1>
        <br /> <br />
        <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>
        <br /> <br /> <br />
        <table class="tbl-full">

            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <br />
            <?php
            //Create a SQL Query to Get all the Food
            $sql = "SELECT * FROM tbl_food";

            //Execute the qUery
            $res = mysqli_query($con, $sql);

            //Count Rows to check whether we have foods or not
            $count = mysqli_num_rows($res);

            //Create Serial Number VAriable and Set Default VAlue as 1
            $sn = 1;

            if ($count > 0) {
                //We have food in Database
                //Get the Foods from Database and Display
                while ($row = mysqli_fetch_assoc($res)) {
                    //get the values from individual columns
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    ?>

                    <tr>
                        <td><?php echo $sn++; ?>. </td>
                        <td><?php echo $title; ?></td>
                        <td>$<?php echo $price; ?></td>
                        <td>
                            <?php
                            //CHeck whether we have image or not
                            if ($image_name == "") {
                                //WE do not have image, DIslpay Error Message
                                echo "<div class='error'>Image not Added.</div>";
                            } else {
                                //WE Have Image, Display Image
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
                                <?php
                            }
                            ?>
                        </td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="#" class="btn-secondary">Update Food</a>
                            <a href="#" class="btn-danger">Delete Food</a>
                        </td>
                    </tr>

                    <?php
                }
            } else {
                //Food not Added in Database
                echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
            }

            ?>


        </table>
    </div>
</div>
</div>
<?php include ('partials/footer.php') ?>