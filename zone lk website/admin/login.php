<?php include('../config/connection.php'); ?>
<html>
<head>
    <title>Login - Online Selling System</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

    <body class = "bg-color">

        <div class="login">
            <h1 class="text-center">Login</h1>
       <!--  <body> -->
            <br><br>
        
            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login']; //disaplay meaaage
                    unset($_SESSION['login']); //remove messge
                } 
                if(isset($_SESSION['no-login-mesege']))
                {
                    echo $_SESSION['no-login-mesege']; //disaplay meaaage
                    unset($_SESSION['no-login-mesege']); //remove messge
                } 
                
            ?>

            <!--Login Form Starts Here-->


         <form action ="" method = "POST" class="text-center">
            <b>
                
            User Name</b> <br>

            <input type="text" name="username" placeholder="Enter username">
            <br><br>
            <b>

            Password</b><br>

            <input type="password" name="password" placeholder="Enter password">
            <br><br>

            <input type="submit" name="submit" value="login" class="btn-primary">
            <br><br>
            </form> 
            <!--Login Form Ends HEre--> 


          <b><p class="text-center">Created By Zone.lk Team - <a href="../index.html">Zone.lk</a></p></b>
        </div>
    </body>
</html>

<?php

    //CHeck whether the submit button is Clicked or Not
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2. SQL to check whether the user with username and password exists or not
        $sql ="SELECT * FROM tbl_admin WHERE username ='$username' AND password='$password'";

        //execute the Query
        $res = mysqli_query($conn, $sql);

        //4.count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

                if($count == 1)
                {
                    //echo "click";
                    //user Available and Login Success
                    //$_SESSION['login'] = "<div class = 'success'>Loign suscess.</div>" ;
                   // $_SESSION['username'] = $username; //check user log or not nad logout
                   // REdirect to Home page/Dashboard
                    header('location:'.$siteurl.'admin/');
                }

                else
                    {
                        //fail to update admin
                        //$_SESSION['login'] = "<div class ='error'>login fail try again. </div>";
                        //redirect to manage admin page
                        header('location:'.$siteurl.'admin/login.php');
                    }
        }
?>
