
<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['firstName']);
unset($_SESSION['userID']);
unset($_SESSION['role']);
unset($_SESSION["logged_in"]);
header("Location:login.php");

?>