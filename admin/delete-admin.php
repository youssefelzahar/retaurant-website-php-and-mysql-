
<?php
include("../config/config.php");
//get the id of admin
 $id=$_GET['id'];
 //create ql query to delete
 $sql="DELETE FROM tbl_admin WHERE id=$id";

 //execute the query

 $result=mysqli_query($con,$sql);

 //check whether the query executed successfully or not

 if($result==true){
  //     echo "admin deleted";

  //create session variable to display message
  $_SESSION['delete']='admin deleted successfully';
  header('location:'.SITEURL.'admin/manage-admin.php');
 }
 else{
 //echo "admin not deleted";
 $_SESSION['delete']='faild to delete admin successfully';
  header('location:'.SITEURL.'admin/manage-admin.php');
 }
 //redirect to manage admin page with message(success and error)

 

?>