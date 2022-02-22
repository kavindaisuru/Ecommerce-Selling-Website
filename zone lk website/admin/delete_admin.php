<?php 

    //include config 
    include ('../config/connection.php');
    //get the id of admin to be deleted

    echo $id = $_GET['id'];


    //create sql query
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //redirect to the manage admin page
    $res = mysqli_query($conn, $sql);

    //check query execute

 if($res == true)
    {
        //success
        //echo "admin deleted";

        $_SESSION['delete'] = "admin delete success";
        //redirect to managage admin to page
        header('location:'.$siteurl.'admin/manage-admin.php');
    }
    else
    {
        //fails
        //echo "fails";

        $_SESSION['delete'] = "fail to deleted";
        header('location:'.$siteurl.'admin/manage-admin.php');
    }
?>