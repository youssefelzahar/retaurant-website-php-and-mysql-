
<?php 
  include("../config/config.php");
 //destroy the seesion
 session_destroy();
 header("location:".SITEURL."admin/login.php");
?>