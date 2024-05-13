<?php include('front-partials/menu.php');?>

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
  

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"Category"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
             <?php 
               $sql="SELECT * FROM tbl_category where featured='Yes' and active='Yes'";
               $result=mysqli_query($con,$sql);
               $count=mysqli_num_rows($result);
               if($count> 0){
                while($row=mysqli_fetch_array($result)){
                    $id=$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    ?>


                       <a href="<?php echo SITEURL;?>category-food.php?category_id=<?php echo $id;?>">
                       <div class="box-3 float-container">
                        <?php
                        if($image_name== ""){
                            echo "image not found";
                        }
                        else{
                            ?>
                            <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt"Pizza" class="img-responsive img-curve">
                            <?php
                        }
                        ?>
                           <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

                        <?php
                }
               }
            ?>

               
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

   
</body>
</html>

<?php include("front-partials/footer.php")?>