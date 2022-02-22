<?php  include('partials/menu.php'); ?>


<?php 

    //check id is set or not
    if(isset($_GET['id']))
        {
            //get the is and other details
            //echo"getting dat";
            $id = $_GET['id'];
            //create sql query to get seleted product
            $sql2 = "SELECT * FROM tbl_Product WHERE id=$id";

            //execute the query
            $res2 = mysqli_query($conn,$sql2);

            //get the value based on query executed
            $row2 = mysqli_fetch_assoc($res2);
            //get the individual value of selected product
            $title = $row2['title'];
            $description = $row2['description'];
            $price = $row2['price'];
            $current_image = $row2['image_name'];
            $current_category = $row2['category_id'];
            $featured = $row2['featured'];
            $active = $row2['active'];
        }    
            else
            {
                //rediret to manage product
                $_SESSION['no-category-found'] = "<div calss = 'error'>product not found.</div>";
                header('location:'.$siteurl.'admin/manage-product.php'); 
            } 
        
?>



<div class = "main-content">
    <div class="wrapper">
        <h1>Update Product</h1>

        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class = "tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name ="description" cols = "30" rows ="5"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php 
                        //echo "work"
                        
                        if($current_image == "")
                        {
                            //image not availble
                            echo"<div class = 'error'>Image is not Availble.</div>";
                        }
                        else
                        {
                            //image availble
                            ?>
                            <img src="<?php echo $siteurl; ?>images/product/<?php echo $current_image; ?>" width="150px">
                            <?php
                        }
                        
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Select New  Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">

                        <?php 
                                
                                //query to get active category
                                $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";

                                //executeing the suery
                                $res = mysqli_query($conn,$sql);

                                //count rows to check we have category or not
                                $count = mysqli_num_rows($res);

                                //check category available
                                if($count>0)
                                {
                                    //we have category
                                    while($row = mysqli_fetch_assoc($res))
                                    {
                                        //get the details of category
                                        $category_title = $row['title'];
                                        $category_id = $row['id'];
                                        ?>
                                        <option <?php if($current_category == $category_id) {echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                        <?php 

                                    }
                                }
                                else
                                {
                                    //category not availble
                                    ?>
                                    <option value="0">No category found</option>
                                    <?php
                                }

                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured == "Yes") {echo "checked";}?> type="radio" name="featured" value="Yes">Yes
                        <input <?php if($featured == "No") {echo "checked";}?> type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active == "Yes") {echo "checked";}?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active == "No") {echo "checked";}?> type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                        <input type="submit" name="submit" value="Update Product" class="btn-secondary">
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
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];

                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //uplaod image if slected
                //check iupload button is clicked or not
                if(isset($_FILES['image']['name']))
                {
                    //upload buttn clicked
                    $image_name = $_FILES['image']['name']; //new image name

                    //check the file is availbel or not
                    if($image_name!="")
                    {
                        //image availble
                        //rename image
                        //get the extention our image
                        $ext = end(explode('.',$image_name)); //gets the exetension

                        //rename the image
                        $image_name = "Product-Name-".rand(0000,9999).'.'.$ext; //new image name here

                        //get the sour path and destiantion path
                        $src_path = $_FILES['image']['tmp_name'];//source path
                        $dest_path = "../images/product/".$image_name; //destinaton path

                        //upload image
                        $upload = move_uploaded_file($src_path,$dest_path);

                        //check the image is uploaded or not
                        if($upload==false)
                        {
                            //set msg
                            $_SESSION['upload'] = "<div class = 'error'>fail upload image.</div>";
                            //redirect to  manage prodcut page
                            header('location:'. $siteurl.'admin/manage-product.php');
                            //stop the process
                            die ();
                        }

                        //B.remove the curennt iamge
                        if($current_image!="")
                        {
                            //current image available
                            //remove the image
                            $remove_path = "../images/product".$current_image;

                            
                            $remove = unlink($remove_path);

                            //check image is remove or not
                            //if faild to remove then diaply massge and stop th eproceess
                            if($remove == false)
                            {
                                //fail to remove image
                                $_SESSION['remove-failed'] = "<div class ='error'>Fiald to remove current image</div>";
                                //redirect to manage product
                                header('location:'. $siteurl.'admin/manage-product.php');
                                //stop process
                                die();
                            }
                        }
                    }
                }
                else
                {
                    $image_name = $current_image;
                }


                //update the db
                $sql3 = "UPDATE tbl_product SET
                    title = '$title',
                    description = '$description',
                    price = '$price',
                    image_name = '$image_name',
                    category_id = '$category'
                    featured = '$featured',
                    active = '$active'
                    WHERE id = $id
                ";

                //execute the query
                $res3 = mysqli_query($conn,$sql3);
                //$res3 = mysqli_query($conn,$sql3);

                
                //check execute or not
                if($res3 == true)
                {
                    //category updated
                    $_SESSION['update'] = "<div class ='success'>Category updated success.</div>";
                    //redirect to the manage category
                    header('location:'.$siteurl.'admin/manage-product.php');
                }
                else
                {
                   // faild to update category
                   $_SESSION['update'] = "<div calss = 'error'>fail update category.</div>";
                   header('location:'.$siteurl.'admin/manage-product.php');
                }
            }
        ?> 

    </div>
</div>
<?php include('partials/footer.php');?>