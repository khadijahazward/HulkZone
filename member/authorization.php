<?php
//checking if the user had already logged in
    session_start();
    if(($_SESSION["logged_in"] == false)) 
    {
        header('location: \HulkZone\home\login.php');
    }

?>