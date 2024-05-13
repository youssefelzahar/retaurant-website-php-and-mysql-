
<?php
session_start();
define("SITEURL","http://localhost:8080/web-design-course-restaurant/");
define('LOCALHOST','localhost:3307');
define('DB_USERNAME','root');
define('DB_PASSWORD','admin');
define('DB_NAME','food_order');
$con=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) ;
$db_select=mysqli_select_db($con,DB_NAME);
?>
