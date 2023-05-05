<?php
//checking if the user had already logged in
    session_start();
    if(($_SESSION["logged_in"] == false)) 
    {
        header('location: ..\home\login.php');
    }

    date_default_timezone_set('Asia/Colombo');

?>