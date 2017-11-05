<?php 
    // 1. Create a database connection
    $dbhost = "localhost";
    $dbuser = "alloggio";
    $dbpass = "123456";
    $dbname = "alloggio";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    // Test if connection occured.
    if(mysqli_connect_errno()) {
        die("Database connection failed: " . 
            mysqli_connect_error() . 
            " (" . mysqli_connect_errno() . ")"
        );
    }
?>