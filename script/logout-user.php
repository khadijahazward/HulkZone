<?php
include '../config/config.php';
unset($_SESSION['loggedInUser']);
session_destroy();
header('location: http://localhost/hulkzone/');