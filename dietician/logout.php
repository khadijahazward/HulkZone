<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['firstName']);
unset($_SESSION['userID']);
unset($_SESSION['role']);
header("Location:Login.php");
?>