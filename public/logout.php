<?php
    //destroy session and logout user
    session_start();

    if(session_destroy()) {
        header("Location: login.php");
    }

?>