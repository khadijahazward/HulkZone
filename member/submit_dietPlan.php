<?php

include 'authorization.php';
include '../connect.php';
include("setProfilePic.php");

$completedDate = $_POST["completedDate"];
$dietID = $_POST["dietID"];

echo $completedDate . "  " . $dietID;
?>