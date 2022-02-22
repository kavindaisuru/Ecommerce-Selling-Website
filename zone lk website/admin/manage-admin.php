<?php include('partials/menu.php');?>

    <!--main content start-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>

            <br>

            <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //disaplay meaaage
                    unset($_SESSION['add']); //remove messge
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete']; //disaplay meaaage
                    unset($_SESSION['delete']); //remove messge
                }

               // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
               //$ses = '$_SESSION'

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update']; //disaplay meaaage
                    unset($_SESSION['update']); //remove messge
                } 

                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found']; //disaplay meaaage
                    unset($_SESSION['user-not-found']); //remove messge
                } 
                if(isset($_SESSION['psw-not-match']))
                {
                    echo $_SESSION['psw-not-match']; //disaplay meaaage
                    unset($_SESSION['psw-not-match']); //remove messge
                }
                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd']; //disaplay meaaage
                    unset($_SESSION['change-pwd']); //remove messge
                }
                
                /*<script>
                    function myFunction() {
                    alert("This is an Alert!");
                    }
                </script>

                echo '<script>alert("Welcome to Geeks for Geeks")</script>';
                */


            ?>
            <br><br><br>

            <!--button to add admin-->
            <a href="Add-admin.php" class="btn-primary">Add Admin</a> 
            <br><br><br>

            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>User Name</th>
                    <th>Action</th>
                </tr>

                <?php
                    //get data from db of admin
                    $sql = "SELECT * from tbl_admin";
                    //execute query
                    $res = mysqli_query($conn, $sql);
                    //check query is execute or not
                    if($res == true)
                    {
                        //check data in db
                        $count = mysqli_num_rows($res); //function to get all the wars in db

                        //$sn = 1; //create a variable and assign the value for id

                        if($count>0)
                        {
                            while($rows = mysqli_fetch_assoc($res))
                            {
                                //usign while loop to get all data in from db
                                //and while loop will run as long as we have data in db

                                //get data 
                                $id = $rows['id'];
                                $full_name = $rows['full_name'];
                                $username = $rows['username'];

                                //display the data in db
                                ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php  echo $full_name; ?></td>
                                        <td><?php  echo $username; ?></td>
                                            <td>
                                                <a href="<?php echo $siteurl; ?>admin/update-password.php ? id= <?php echo $id; ?>" class="btn-primary">Change password</a>
                                                <a href="<?php echo $siteurl; ?>admin/update-admin.php ? id= <?php echo $id; ?>" class="btn-secondary">Update</a>
                                                <a href="<?php echo $siteurl; ?>admin/delete_admin.php ? id= <?php echo $id; ?> " class="btn-danger">Delete</a>
                                            </td>
                                    </tr>

                                <?php 
                            }

                        }

                    }

                ?>
            </table>
        </div>
    </div>
    <!--end-->


<?php include('partials/footer.php'); ?>