<?php include('partials/menu.php')?>
        </div>
        <div class="main-content">
            <div class="wrapper">
              <h1>DASHBOARD</h1>
              <div class="col-4 text-center">
                <?php
                  $sql='SELECT * FROM tbl_category';
                  $result=mysqli_query($con,$sql);
                  $count=mysqli_num_rows($result);
                ?>
                <h1><?php echo $count?></h1>
              <br />

              categorie
            </div>
            
        <div class="col-4 text-center">
        <?php
                  $sql='SELECT * FROM tbl_food';
                  $result=mysqli_query($con,$sql);
                  $count=mysqli_num_rows($result);
                ?>
                <h1><?php echo $count?></h1>
              <br />

              food
            </div>
            
     
        <div class="col-4 text-center">
        <?php
                  $sql='SELECT * FROM tbl_order';
                  $result=mysqli_query($con,$sql);
                  $count=mysqli_num_rows($result);
                ?>
                <h1><?php echo $count?></h1>
              <br />

              orders
            
            </div>
        
        <div class="col-4 text-center">
        <?php
                  $sql='SELECT SUM(total) as Total FROM tbl_order where status="Ordered"';
                  $result=mysqli_query($con,$sql);
                  $row=mysqli_fetch_assoc($result);
                  $count=$row['Total'];
                ?>
                <h1><?php echo $count?></h1>
              <br />

              revenu
            </div>
            
      <?php include('partials/footer.php')?>