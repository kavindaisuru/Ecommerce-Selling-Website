<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <?php
        
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        
        ?>

        <br><br>
        <!--add categroy start -->
            <form action="" method="POST" enctype="multipart/form-data"> <!--this allow us to upload file or image-->

                <table class = tbl-30>

                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" placeholder="Category Title">
                        </td>
                    </tr>

                    <tr>
                        <td>Select Image</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="yes">yes
                            <input type="radio" name="featured" value="no">No
                        </td>
                    </tr>

                    <tr>
                        <td>Active</td>
                        <td>
                            <input type="radio" name="active" value="yes">Yes
                            <input type="radio" name="active" value="no">No
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"></td>
                        <input type="submit" name="submit" value="Add Category" class = "btn-secondary">
                    </tr>

                </table>

            </form>

        <!--add categroy end -->

        <?php 

            //check submit btn click
            if(isset($_POST['submit']))
            {
                //echo 'Clickd';

                //get the value form form in cate=groy section

                $title = $_POST['title'];

                //for radio input type btn check btn is selected or not

                if(isset($_POST['featured']))
                {
                    //get the value from form
                    $featured = $_POST['featured'];
                }
                else
                {
                    //set the defoult value
                    $featured = "no";
                }
                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = 'no';
                }

                //check image is selected or not and set value fro image name accordingly
               // print_r($_FILES['image']);

                //die();//breake the code

                if(isset($_FILES['image']['name']))
                {
                    
                    //upload image
                    //to upload image image name and source pah destination path
                    $image_name = $_FILES['image']['name'];

                    //uplaod the image
                    if($image_name!="")
                    {

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
                            header('location:'. $siteurl.'admin/add-category.php');
                            //stop the process
                            die ();
                        }
                    }
                    //if the image is not upload thme we will stop the process redirect msg with eror smg
                }
                else
                {
                    //do not upload image adn srt the image name valye as black
                    $image_name = "";
                }

                //create sql query for insert category into databse

                $sql = "INSERT INTO tbl_category SET  
                title = '$title',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active'
                ";

                //execute the query adn save in db
                $res = mysqli_query($conn, $sql);

                //check qury executed or not and data added or not
                if($res = true)
                {
                    //query executed adn categroy added
                    $_SESSION['add'] = "<div class = 'success'>category added succesful.</div>";
                    
                    //redirect to manage category
                    header('location:'. $siteurl.'admin/manage-category.php');
                }
                else
                {
                    //fail to add category
                    $_SESSION['add'] = "<div class = 'error'>fail add category.</div>";
                   
                    //redirect to manage category
                    header('location:'. $siteurl.'admin/add-category.php');
                }
            }


        ?>
    </div>
</div>



<?php include('partials/footer.php'); ?>