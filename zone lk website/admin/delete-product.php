<?php 
    //echo"work";
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
            $path = "../images/product/" .$image_name;
            //remove the image
            $remove = unlink($path);

            //if fail to remve image then shoe errormsg
            if($remove = false)
            {
                //set the sesstion msg
                $_SESSION['upload'] = "<div class = 'error'>Fail to remove Product.</div>";
                //redirect to the manage product
                header('location:'. $siteurl.'admin/manage-product.php');
                //stope the prccess
                die();
            }
        }

        //delete data from db
        //sql query to delete  data form db
        $sql = "DELETE FROM tbl_product WHERE id=$id";

        //execute the query
        $res = mysqli_query($conn,$sql);

        //check data is delete from db o not
        if($res == true)
        {
            //product deleted
            $_SESSION['delete'] = "<div calss ='succsess'>Deleted success.</div>";
            //redirect to manage category
            header('location:'.$siteurl.'admin/manage-product.php');
        }
        else
        {
            //fail product delete
            $_SESSION['delete'] = "<div calss ='error'>fail to delete food.</div>";
            //redirect to manage category
            header('location:'.$siteurl.'admin/manage-product.php');
        }
    }
    else
    {
        //redirect to manage category page
        //echo "not working";
        $_SESSION['Unauthorized'] = "<div calss = 'succsess'>Unauthorized Access.</div>";
        header('location:'.$siteurl.'admin/manage-product.php');
    }

?>

?>
