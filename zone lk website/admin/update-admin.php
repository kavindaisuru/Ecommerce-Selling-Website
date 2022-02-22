<?php include ('partials/menu.php') ?>


    <div class="main-content">
        <div class="wrapper">
            <h1>Update Admin</h1>

            <brr><br>

            <?php
                //get id of selected admin
                $id =$_GET['id'];

                //sql query for get details
                $sql = "SELECT * FROM tbl_admin WHERE id=$id";

                //execute query
                $res = mysqli_query($conn, $sql);

                //check query execute or not
                if($res == true)
                {
                    //check data available
                    $count = mysqli_num_rows($res);
                    //check admin data or not
                   if($count == 1)
                    {
                       // echo "admin here";
                       $row = mysqli_fetch_assoc($res);

                       $full_name = $row['full_name'];
                       $user_name = $row['username'];


                    }
                   else
                    {
                        header('location:'.$siteurl.'admin/manage-admin.php');
                    }
                    
                }
                



            ?>

                <form action="" method="POST">
                    <table class="tbl-30">
                        <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                        </td>
                        </tr>

                        <tr>
                        <td>User Name:</td>
                        <td>
                            <input type="text" name="user_name" value="<?php echo $user_name; ?>">
                        </td>
                        </tr>
                        <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="submit" name="submit" value="Update admin" class="btn-secondary">
                        </td>
                        </tr>
                        
                    </table>
                </form>

        </div>
    </div>

    <?php 
    ///check btn is clicked
    if(isset($_POST['submit']))
    {
        //echo'btn clicked';
        //get value form form to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];

        //create sql query update admin

        $sql = "UPDATE tbl_admin SET 
        full_name = '$full_name' ,
        username = '$user_name' 
        WHERE id= '$id' ";

        //execute query
        $res = mysqli_query($conn,$sql);

        //check query executed or not
        if($res == true)
        {
            //query executed and admin update
            $_SESSION['update'] = "<div class ='success'>admin update succsess. </div>";
            //redirect to manage admin page
            header('location:'.$siteurl.'admin/manage-admin.php');
        }
        else
        {
            //fail to update admin
            $_SESSION['update'] = "<div class ='error'>fail. </div>";
            //redirect to manage admin page
            header('location:'.$siteurl.'admin/manage-admin.php');
        }
    }
    
    
    ?>
<?php include ('partials/footer.php') ?>