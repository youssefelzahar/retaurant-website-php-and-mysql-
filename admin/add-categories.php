<?php include("partials/menu.php");?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Categories</h1>
        <br/> <br/>
        <?php 
                if(isset($_SESSION["add"])){
                    echo $_SESSION["add"];
                    unset($_SESSION["add"]);
                }
                if(isset($_SESSION["uplode"])){
                    echo $_SESSION["uplode"];
                    unset($_SESSION["uplode"]);
                }
                ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="title">
                    </td>
                </tr>
                <td>select Image:</td>
                    <td>
                        <input type="file" name="image_name">
                    </td>
                </tr>
                <tr>
                    <td>Feature:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured"value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                      <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active"value="No">No
                    </td>
                </tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add category" class="btn-secondery">
                </td>
            </table>
        </form>
    </div>
</div>

<?php include("partials/footer.php");?>


<?php 

  if(isset($_POST["submit"])){
    $title=$_POST["title"];

    if(isset($_POST['featured'])){
        $featured=$_POST["featured"];

    }
    else{
        $featured="NO";
    }
    if(isset($_POST["active"])){
        $active=$_POST["active"];

    }
    else{
        $active='NO';
    }

    //check whether image is selected
     print_r($_FILES['image_name']);
    // die();

     if(isset($_FILES['image_name']['name'])){
         $image_name=$_FILES['image_name']['name'];
         $ext=end(explode('.',$image_name));
         $image_name="Food_Category_".rand(000,999).'.'.$ext;
         $source_path=$_FILES['image_name']['tmp_name'];
         $destination_path="../images/category/".$image_name;
        $uplode= move_uploaded_file($source_path,$destination_path);
        if($uplode==false){
            $_SESSION["uplode"]="failed to uplode image";
            header("location:".SITEURL."admin/manage-category.php");
            die();
        }
        
     }
     else{
        $image_name= "aaa";
     }

    $sql="INSERT INTO tbl_category SET title='$title',image_name='$image_name',featured='$featured',active='$active'";
    $result=mysqli_query($con,$sql);
    if($result==true){
        $_SESSION['add']='categorie add successfully';
        header('location:'.SITEURL.'admin/manage-categories.php');
    }
    else{
        $_SESSION['add']='categorie not add successfully';
        header('location:'.SITEURL.'admin/add-categories.php');
    }

  }
?>