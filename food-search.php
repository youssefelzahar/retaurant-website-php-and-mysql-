<?php include ("front-partials/menu.php"); ?>
<!DOCTYPE html>
<html lang="en">



<body>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($con, $_POST['search']);
            
            ?>


            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            $search = $_POST['search'];
            // $sql="SELECT * FROM tbl_food WHERE title like '%search%' or describtion like '%search%' ";
            $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR describtion LIKE '%$search%'";

            $result = mysqli_query($con, $sql);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['describtion'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            if ($image_name == "") {
                                echo "image not avaliable";

                            } else {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>"
                                    class="img-responsive img-curve">
                                <?php

                            }

                            ?>
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price"><?php $price ?></p>
                            <p class="food-detail">
                                <?php echo $description ?>
                            </p>
                            <br>

                            <a href="#" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                <?php
                }
            } else {
                echo 'food not found';
            }
            ?>



</body>

</html>


<?php include ('front-partials/footer.php'); ?>