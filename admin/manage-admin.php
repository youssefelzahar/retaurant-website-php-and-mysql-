
<?php include("partials/menu.php")?>;

        <div class="main-content">
            <div class="wrapper">
                <h1>manage admin</h1>
                <br /> <br/>
                <?php 
                if(isset($_SESSION["add"])){
                    echo $_SESSION["add"];
                    unset($_SESSION["add"]);
                }
                if(isset($_SESSION["delete"])){
                    echo $_SESSION["delete"];
                    unset($_SESSION["delete"]);
                }
                if(isset($_SESSION["update"])){
                    echo $_SESSION["update"];
                    unset($_SESSION["update"]);
                }

                if(isset($_SESSION["pwd-not-match"])){
                    echo $_SESSION["pwd-not-match"];
                    unset($_SESSION["pwd-not-match"]);
                }
                if(isset($_SESSION["change-password"])){
                    echo $_SESSION["change-password"];
                    unset($_SESSION["change-password"]);
                }
                ?>
                <a href="add-admin.php"class="btn-primary">Add Admin</a>
                <br /> <br/> <br/>
                <table class="tbl-full">
                    
                    <tr>
                        <th>S.N.</th>
                        <th>full name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                    $sql=   "SELECT * FROM tbl_admin";
                    $res=mysqli_query($con,$sql);
                    if($res){
                        $count=mysqli_num_rows($res);
                         if($count> 0){
                            while($row=mysqli_fetch_array($res)){
                                $id=$row['id'];
                                $full_name=$row['full_name'];
                                $username=$row['username'];
    
    
                                ?>
                                  <tr>
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $full_name;?></td>
                                    <td><?php echo $username;?></td>
                            <td>
                               <a href="<?php echo SITEURL; ?>admin/change-password.php?id=<?php echo $id;?>"class="btn-primary">change password</a>
                               <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>"class="btn-secondery">Update admin</a>
                               <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?>"class="btn-delete">delete admin</a>
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
           <?php include('partials/footer.php')?>       