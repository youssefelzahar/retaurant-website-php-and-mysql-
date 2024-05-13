<?php include("partials/menu.php");?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add admin</h1>
        <br/> <br/>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your name">
                    </td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter your username">
                    </td>
                </tr>
                <tr>
                    <td>password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter your pasword">
                    </td>
                </tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add admin" class="btn-secondery">
                </td>
            </table>
        </form>
    </div>
</div>

<?php include("partials/footer.php");?>


<?php
//process the value from form and save it in DB
//check whether the submit button is clicked or not

if(isset($_POST["submit"])){
    //buuton clicked
    echo "clicked";
    //get data from form
    $full_name=$_POST["full_name"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    
    //sql query to save data 
    $sql="INSERT INTO tbl_admin SET full_name='$full_name',username='$username',password='$password'";
    
    $res=mysqli_query($con, $sql);

     if($res==true){
        $_SESSION['add']="Admin add successful";
        header("location:".SITEURL.'admin/manage-admin.php');
     }
     else{
        $_SESSION['add']="Admin not add successful";
        header("location:".SITEURL.'admin/add-admin.php');
     }     
    
    }



?>