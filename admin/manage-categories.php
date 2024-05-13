<?php include("partials/menu.php")?>;
        <div class="main-content">
            <div class="wrapper">
                <h1>manage categories</h1>
                <br /> <br/>
                <a href="add-categories.php"class="btn-primary">Add categories</a>
                <br /> <br/> <br/>
                <table class="tbl-full">
                    
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>image_name</th>

                        <th>Featured</th>
                        <th>Active</th>
                    </tr>
                    <br/>
                    <?php 
                    $sql=   "SELECT * FROM tbl_category";
                    $res=mysqli_query($con,$sql);
                    if($res){
                        $count=mysqli_num_rows($res);
                         if($count> 0){
                            while($row=mysqli_fetch_array($res)){
                                $id=$row['id'];
                                $title=$row['title'];
                                $image_name=$row['image_name'];

                                $featured=$row['featured'];
                                $active=$row['active'];
    
    
                                ?>
                                  <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $title;?></td>
                                    <td><?php if($image_name!=""){
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" width="100px">
                                        <?php
                                    }
                                    else{
                                                 echo"image not add";

                                    }
                                    ?></td>

                                    <td><?php echo $featured;?></td>
                                    <td><?php echo $active;?></td>


                            <td>
                               <a href="<?php echo SITEURL;?>admin/delete-categories.php?id=<?php echo $id?>"class="btn-delete">delete category</a>
                               <a href="<?php echo SITEURL;?>admin/update-categories.php?id=<?php echo $id?>"class="btn-secondery">update category</a>
                            </td>
                        </tr>
                                <?php
                            }
                        }
                         }
                       

                    else{}   
                    ?>
                </table>
        </div>
           </div>
            </div>
           <?php include('partials/footer.php')?>       