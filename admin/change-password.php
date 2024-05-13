<?php include("partials/menu.php");?>
<div class="main-content">
    <div class="wrapper">
        <h1>change password</h1>
        <br/> <br/>
       
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current password:</td>
                    <td>
                        <input type="text" name="current_password" placeholder="Current password">
                    </td>
                </tr>
                <tr>
                    <td>new password:</td>
                    <td>
                        <input type="text" name="new_password" placeholder="new_password">
                    </td>
                </tr>
                <tr>
                    <td>confirm password:</td>
                    <td>
                        <input type="text" name="confirm_password" placeholder="confirm_password">
                    </td>
                </tr>
                <td colspan="2">
                    <input type="hidden" name="id"value="<?php echo $id;?>">
                    <input type="submit" name="submit" value="change password" class="btn-secondery">
                </td>
            </table>
        </form>
    </div>
</div>

<?php include("partials/footer.php");?>


<?php 

  if(isset($_POST["submit"])){
    $id=$_POST["id"];
    $current_password=md5($_POST["current_password"]);
    $new_password=md5($_POST["new_password"]);
    $confirm_password=  md5($_POST["confirm_password"]);

    $sql="SELECT * FROM tbl_admin where id=$id AND password='$current_password'";
    $result=mysqli_query($con,$sql);
    if($result==true){
        $count=mysqli_num_rows($result);
        if($count==1){
            if($new_password==$current_password){
                $sql2= "UPDATE tbl_admin SET password='$new_password' where id=$id";
            }

            $res2=mysqli_query($con,$sql2);

            if($res2==true){
                $_SESSION['change-password']="password change successful";
                header("location:".SITEURL.'admin/manage-admin.php');
            }
            else{
                $_SESSION['change-password']="password not change successful";
                header("location:".SITEURL.'admin/change-password.php');
            }
        }
        else{
            $_SESSION['pwd-not-match']="password not change ";
            header("location:".SITEURL.'admin/change-password.php');
        }
    }
  }
?>
