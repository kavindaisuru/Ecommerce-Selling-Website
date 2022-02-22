<?php include('partials/menu.php');?>

<div class = "main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>

        <?php 

            //check id is set or not
            if(isset($_GET['id']))
            {
                //get the is and other details
                //echo"getting dat";
                $id = $_GET['id'];
                //create sql query to get all other adta
                $sql = "SELECT * FROM tbl_category WHERE id= $id";

                //execute the query
                $res = mysqli_query($conn,$sql);

                //count the rows for check id is vaild or not
                $count = mysqli_num_rows($res);
                if($count == 1)
                {
                    //get all data
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];

                }
                else
                {
                    //rediret to manage categpry
                    $_SESSION['no-category-found'] = "<div calss = 'error'>category not found.</div>";
                    header('location:'.$siteurl.'admin/manage-category.php'); 
                } 
            } 
            else
            {
                //redirect to manage category
                //$_SESSION['no-category-found'] = "<div class = 'error'>categpry not found.</div>";
                header('location:'.$siteurl.'admin/manage-category.php');
            } 
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        <table class = "tbl_30">
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name = "title" value=" <?php  echo $title;  ?>">
                </td>
            </tr>

            <tr>
                <td>Current Image</td>
                <td>
                    <?php 
                        if($current_image !="")
                        {
                            //display the image
                            ?>
                            <img src="<?php echo $siteurl; ?>images/category/<?php echo $current_image; ?>" width="150px">
                            <?php
                        }
                        else
                        {
                            //display msg
                            echo "<div class = 'error' >image  not addded.</div>";
                        }
                    
                    ?>
                </td>
            </tr>

            <tr>
                <td>New Image</td>
                <td>
                    <input type="file" name = "image">
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($featured == "yes") {echo "checked";} ?> type="radio" name = "featured" value="yes"> Yes
                    <input <?php if($featured == "no") {echo "checked";} ?> type="radio" name = "featured" value="no"> No
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active == "yes") {echo "checked";} ?> type="radio" name = "active" value="yes"> Yes
                    <input <?php if($active == "no") {echo "checked";} ?> type="radio" name = "active" value="no"> No
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="current_iamge" value="<?php echo $current_image; ?>">
                    <input type="hidden"  name="id" value="<?php echo $id; ?>"> 
                    <input type="submit" name="submit" value="Update Category" class = "btn-secondary">
                </td>
            </tr> 

        </table>
        </form>

        <?php 
            if(isset($_POST['submit']))
            {
                //echo "clicked";
                //get all the value form form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //updateing new image if slected
                //check image is selected or not
                if(isset($_FILES['image']['name']))
                {
                    //get image details
                    $image_name = $_FILES['image']['name'];

                    //check the image is availbel or not
                    if($image_name != "")
                    {
                        //image availble
                        //A.upload the new image
                        
                        //auto rename image
                        //get the extention our image
                        $ext = end(explode('.',$image_name));

                        //rename the image
                        $image_name = "prodcut_category_".rand(000,999).'.'.$ext; //new image name here


                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/category/".$image_name;

                        //upload image
                        $upload = move_uploaded_file($source_path,$destination_path);

                        //check the image is uploaded or not

                        if($upload ==false)
                        {
                            //set msg
                            $_SESSION['upload'] = "<div class = error>fail pload image.</div>";
                            //redirect to  add category page
                            header('location:'. $siteurl.'admin/manage-category.php');
                            //stop the process
                            die ();
                        }

                        //B.remove the curennt iamge
                        if($current_image != "")
                        {
                            $remove_path = "../images/category".$current_image;

                            $remove = unlink($remove_path);

                            //check image is remove or not
                            //if faild to remove then diaply massge and stop th eproceess
                            if($remove == false)
                            {
                                //fail to remove image
                                $_SESSION['fail-remove'] = "<div class = 'error'>Fiald to remoe image</div>";
                                header('location:'. $siteurl.'admin/manage-cateogry.php');
                                die();//stop process
                            }
                        }
                        
                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image;
                }


                //update the db
                $sql2 = "UPDATE tbl_category SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE id= $id
                ";

                //execute the query
                $res2 = mysqli_query($conn,$sql2);

                
                //check execute or not
                if($res2 == true)
                {
                    //category updated
                    $_SESSION['update'] = "<div class ='success'>Category updated success.</div>";
                    //redirect to the manage category
                    header('location:'.$siteurl.'admin/manage-category.php');
                }
                else
                {
                   // faild to update category
                   $_SESSION['update'] = "<div calss = 'error'>fail update category.</div>";
                   header('location:'.$siteurl.'admin/manage-category.php');
                }
            }
        ?> 
    </div>
</div>

<?php include('partials/footer.php'); ?>
