<?php include('partials/menu.php');?>

<div class="mai-content">
    <div class="wrapper">
        <h1>Add Product</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class = "tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Product">
                    </td>
                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <input type="text" name="description" placeholder="description of the Product">
                    </td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">

                            <?php 
                                //create php code to dispay category form db
                                //create sql to get all active categories form db
                                $sql = "SELECT * FROM tbl_category WHERE active = 'yes'";

                                //executeing the suery
                                $res = mysqli_query($conn,$sql);

                                //count rows to check we have category or not
                                $count = mysqli_num_rows($res);

                                //if count greater than zero,we have category else we dont have category
                                if($count>0)
                                {
                                    //we have category
                                    while($rows = mysqli_fetch_assoc($res))
                                    {
                                        //get the details of category
                                        $id = $rows['id'];
                                        $title = $rows['title'];
                                        ?>
                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                        <?php 

                                    }
                                }
                                else
                                {
                                    //we dont have category
                                    ?>
                                    <option value="0">No category found</option>
                                    <?php
                                }

                                //display dropdown

                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Product" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>

        <?php 
        
        //check the button is cliced or not
        if(isset($_POST['submit']))
        {
            //add the product in db
            //echo "clicked";

            //get the data from form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            //check radio buttn for featued and active are check orr not
            if(isset($_POST['featured']))
            {
                $featured = $_POST['featured'];
            }
            else
            {
                $featured = "No";//setting default value
            }

            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else
            {
                $active = "No";//setting default value
            }

            //uplaod the image if seletced
            //chech the image is click or not and upload the image if the image is selected
            if(isset($_FILES['image']['name']))
            {
                //get the details of the sleted image
                $image_name = $_FILES['image']['name'];

                //check th image is sleeted or not and upload only if seleted
                if($image_name!="")
                {
                    //image is seletced
                    //rename the image
                    //get the exetention of sleeted image
                    $ext = end(explode('.', $image_name));

                    //create new name for image
                    $image_name = "Product_name-".rand(0000,9999).".".$ext;//new image named like Product-name-657.jpg

                    //upload the image
                    //get the src path is current location of the image

                    //source path is current location of the image
                    $src = $_FILES['image']['tmp_name'];

                    //destination path for the image to upload
                    $dst = "../images/product/".$image_name;

                    //uplaod the image now
                    $uplaod = move_uploaded_file($src,$dst);

                    //check image is upload or not
                    if($uplaod == false)
                    {
                        //faild to upload image
                        //redirect to add product page with error message
                        $_SESSION['upload'] = "<div class = 'error'>Faild to Upload Image</div>";
                        header('location:'. $siteurl.'admin/add-product.php');
                        //stop the process
                        die();
                    }
                }
            }
            else
            {
                $image_name = "";//setting defoult value
            }

            //insert into db

            //create a sql query to save or add product
            $sql2 = "INSERT INTO tbl_product SET
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            category_id = '$category',
            featured = '$featured',
            active = '$active'

            ";

            //execute the query
            $res = mysqli_query($conn,$sql2);
            //check data insert or nor
            //redirect with msg to manage product
            if($res == true)
            {
                //data insert success
                $_SESSION['add'] = "<div class = 'success'>Product Add Successfully</div>";
                header('location:'. $siteurl.'admin/manage-product.php');
            }
            else
            {
                //fail to insert data
                $_SESSION['add'] = "<div class = 'error'>Fail to Add PRoduct</div>";
                header('location:'. $siteurl.'admin/manage-product.php');
            }
            
        }
        
        
        ?>
    </div>
</div>

<?php include('partials/footer.php');?>