<?php include("../config/config.php");?>
<html>
    <head>
        <title>
            Login - Food Order System
        </title>
        <link rel="stylesheet" href="..\css\admin.css">

    </head>
    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br/>
            <?php   if(isset($_SESSION["login"])){
                    echo $_SESSION["login"];
                    unset($_SESSION["login"]);
            }
                    if(isset($_SESSION["no-login-message"])){
                        echo $_SESSION["no-login-message"];
                        unset($_SESSION["no-login-message"]);
                }
                ?>
            <form action="" method="POST" class="text-center">
                Username: <br/> <br/>
                <input type="text" name="username" placeholder="ussername"> <br/> <br/>
                Password: <br/> <br/>
                <input type="password" name="password"placeholder="password">
                <br/> <br/>
                <input type="submit" name="submit" value="Login" class="btn-primary">
                        </form>
                        <br/>
            <p class="text-center">Created By -<a href="#">youssef elzahar</a></p>
        </div>
    </body>
</html>


<?php 
if(isset($_POST["submit"])){
   $username=$_POST['username'];
   $password=$_POST['password'];

   //check whether the user with username and password
   $sql="SELECT * FROM tbl_admin WHERE username='$username' and password='$password' " ;
   $res=mysqli_query($con,$sql);

   $count=mysqli_num_rows($res);

   if($count==1){
    $_SESSION['login']="login successfully";
    $_SESSION["user"]= $username;

    header("location:".SITEURL.'admin/');
 }
 else{
    $_SESSION['login']="not login successful";
    header("location:".SITEURL.'admin/login.php');
 }    

}
?>