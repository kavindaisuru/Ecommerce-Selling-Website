<?php include('config/connection.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/new/Zonelk.png" alt="zonelk Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <div class="box-shadow">
                        <li>
                            <a href="<?php echo $siteurl;  ?> ">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo $siteurl; ?>categories.php">Categories</a>
                        </li>
                        <li>
                            <a href="<?php echo $siteurl; ?>product.php">Products</a>
                        </li>
                        
                    <!--  <li>
                            <a href="#">Contact</a>
                        </li> -->


                        <li>
                            <a href="<?php echo $siteurl; ?>register/register.php" >Registration</a>
                            
                        </li>
                        <li>
                            <a href="<?php echo $siteurl; ?>login/login.html" class ="alignment">Login</a>
                            <!--<?php //echo $siteurl; ?>product.php -->
                        </li>
                    </div>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->