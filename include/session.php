<?php
    //this verifies if session exists then redirect to user dashboard if not then goto login page
    include('../include/conn.php');
    session_start();

    $user_check = $_SESSION['logined_user']; //check if user is logined

    $ses_sql = mysqli_query($connection, "SELECT username from login where username = '$user_check' ");

    $result = mysqli_fetch_assoc($ses_sql);

    $login_session = $result['username'];

    if(!isset($_SESSION['logined_user'])) {
        header("Location: login.php");
    }
?>