<?php

    session_start();
    if($_SESSION["logged_in"] == false)
    {
        header("../home/login.php");
    }

?>