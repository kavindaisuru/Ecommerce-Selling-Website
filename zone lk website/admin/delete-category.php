<?php
    //include db file
    include('../config/connection.php');
    //echo "delete page";
    //check id and image_name is set or not
    if(isset($_GET['id'])AND isset($_GET['image_name']))
    {
        //get the value
        //echo "get value and delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove the phisical image file is available
        if($image_name!="")
        {
            //image is availble so remove it
            $path = "../images/category/" .$image_name;
            //remove the image
            $remove = unlink($path);

            //if fail to remve image then shoe errormsg
            if($remove = false)
            {
                //set the sesstion msg
                $_SESSION['remove'] = "<div class = 'error'>Fail to remove image.</div>";
                //redirect to the manage categopry
                header('location:'. $siteurl.'admin/manage-category.php');
                //stope the prccess
                die();
            }
        }

        //delete data from db
        //sql query to delete  data form db
        $sql = "DELETE FROM tbl_category WHERE  id=$id";

        //execute the query
        $res = mysqli_query($conn,$sql);

        //check data is delete from db o not
        if($res == true)
        {
            //set success msg end redirect
            $_SESSION['delete'] = "<div calss = 'succsess'>Deleted success.</div>";
            //redirect to manage category
            header('location:'.$siteurl.'admin/manage-category.php');
        }
    }
    else
    {
        //redirect to manage category page
        //echo "not working";
        header('location:'.$siteurl.'admin/manage-category.php');
    }

?>