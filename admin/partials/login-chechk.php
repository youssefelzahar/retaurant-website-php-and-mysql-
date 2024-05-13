<?php
  if(!isset($_SESSION['user'])){
    $_SESSION['no-login-message']='Please login to access';
    header("location:".SITEURL.'admin/login.php');
  }
?>