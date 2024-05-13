<?php include("partials/menu.php");?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add admin</h1>
        <br/> <br/>
        <?php 
          $id=$_GET['id'];
          $sql="SELECT * FROM tbl_admin";
          $res=mysqli_query($con,$sql);
          if($res==true){
            $count=mysqli_num_rows($res);
            if($count==1){
               $row=mysqli_fetch_array($res);
               $full_name=$row['full_name'];
               $username=$row['username'];
            }
            else{
                  header('location'.SITEURL.'admin/manage-admin.php');
            }
          }    
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name?>">
                    </td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $full_name?>">
                    </td>
                </tr>
                
                <td colspan="2">
                    <input type="submit" name="submit" value="update admin" class="btn-secondery">
                </td>
            </table>
        </form>
    </div>
</div>

<?php include("partials/footer.php");?>


<?php
if(isset($_POST["submit"])){
    //buuton clicked
    echo "clicked";
    //get data from form
    $full_name=$_POST["full_name"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    
    //sql query to save data 
    $sql="UPDATE  tbl_admin SET full_name='$full_name',username='$username' WHERE id=$id";
    
    $res=mysqli_query($con, $sql);

     if($res==true){
        $_SESSION['update']="Admin update successful";
        header("location:".SITEURL.'admin/manage-admin.php');
     }
     else{
        $_SESSION['update']="Admin not update successful";
        header("location:".SITEURL.'admin/add-admin.php');
     }     
    
    }

?>


