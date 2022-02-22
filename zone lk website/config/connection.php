<?php   
        //satrt session
        session_start();

    $siteurl = "http://localhost/zone-lk/website/";
    $servername = "localhost";
    $database = "zone_lk";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database,);
    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }  
?>