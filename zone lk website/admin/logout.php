<?php 
    //db file
    include('../config/connection.php');
    //destroy the session
    session_destroy(); //unset $_session['user']

    //redirect to login page
    header('location:'.$siteurl.'admin/login.php');

?>