<?php 

include('../config/connection.php') ;
include('login-check.php');

?>

<html>
    <header>
        <title>zone.lk</title>

       <link rel="stylesheet" href="../css/admin.css">
    </header>
<body>
    <!--menu start-->
    <div class="menu center">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-product.php">Product</a></li>
                <li><a href="manage-order.php">Order</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <!--end-->