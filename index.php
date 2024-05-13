<?php include("front-partials/menu.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
  
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php 

              $sql="SELECT * FROM tbl_category WHERE featured='Yes' and active='Yes' limit 3";
              $result=mysqli_query($con,$sql);
              $count=mysqli_num_rows($result);
              if($count>0){
                while($row=mysqli_fetch_array($result)){
                    $id=$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    ?>
                
              
            

           

            <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php
                            if($image_name==""){
                                echo "image not add";
                            }
                            else{
                                ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                 <?php

                            }
                            ?>

                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
            </a>
<?php
                }
            }
            else{
                echo "category not add";
            }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

           
            <?php 
                   $sql2= "SELECT * FROM tbl_food where active='Yes' and featured='Yes'";
                   $result2=mysqli_query($con,$sql2);
                   $count2=mysqli_num_rows($result2);
                   if($count2> 0){
                        while($row=mysqli_fetch_array($result2)){
                            $id=$row["id"];
                            $title=$row["title"];
                            $price=$row['price'];
                            $description=$row['describtion'];
                            $image_name=$row['image_name'];
                            ?>
                            
                            <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            if($image_name== ''){
                                echo 'image not available';

                            }
                            else{
                                ?>  
                                 <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                    <?php
                            }
                            ?>
                            </div>
                            <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">$<?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                //Food Not Available 
                echo "<div class='error'>Food not available.</div>";
            }
            
                            
                        
                   
             ?>
            
            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->




</body>
</html>

<?php  include("front-partials/footer.php");