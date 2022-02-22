<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br>
        <?php 
            if(isset($_SESSION['add'])){ //checking sesstion
                echo $_SESSION['add']; // display sesstion msg
                unset ($_SESSION['add']); //remove msg
            }
        ?>

        <form action="" method="POST">
            
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                        <td>
                            <input type="text" name="Full_name" placeholder="Enter Your Name">
                        </td>
                </tr>

                <tr>
                    <td>User Name:</td>
                        <td>
                            <input type="text" name="user_name" placeholder="Enter User Name">
                        </td>
                </tr>

                <tr>
                    <td>Password:</td>
                        <td>
                            <input type="password" name="password" placeholder="Enter Password">
                        </td>
                </tr>

                <tr>
                    <td  colspan="2">
                        <input type="submit" name="submit" value="Add admin" class="btn-secondary">
                    </td>       
                </tr>
            </table>

        </form>
    </div>
</div>




<?php

    //process the values from form and save in database
    //check the btton is clicked or not

    if (isset($_POST["submit"]))
    {
        //button click
        //echo "Button clicked";

        //get data from form
        $Full_Name = $_POST["Full_name"];
        $user_name = $_POST["user_name"];
        $password = md5($_POST["password"]); //md5 is password encripting

        //sql code

        $sql = "INSERT INTO tbl_admin SET 
                full_name = '$Full_Name',
                username = '$user_name', 
                password = '$password'";

        //executing query and saving
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            //data insert
            //create a session variable to dispaly message
            $_SESSION['add'] = "Admin added success";
            //redirect page
            header("location:".$siteurl.'admin/manage-admin.php');
        }
        else
        {
            //die();
            //fail data insert
            //create a session variable to dispaly message
            $_SESSION['add'] = "fail add admin";
            //redirect page
            header("location:".$siteurl.'admin/Add-admin.php');

        }
    };
?>
<?php include('partials/footer.php'); ?>