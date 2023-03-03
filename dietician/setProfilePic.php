<?php

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);


$query = "SELECT * from user where userID = '$userID'";
    $result = mysqli_query($conn, $query);
    $query1 = "SELECT * from employee where userID = '$userID'";
    $result1 = mysqli_query($conn, $query1);
    if (mysqli_num_rows($result) == 1 && mysqli_num_rows($result1) == 1) {
        $row = mysqli_fetch_assoc($result);
        $row1 = mysqli_fetch_assoc($result1);
    } else {
        echo '<script> window.alert("Error receiving data!");</script>';
    }

    if(isset($row['profilePhoto']) && $row['profilePhoto'] != NULL){
        //dp link from db
        $profilePic = $row['profilePhoto'];
    }else{
        $profilePic = 'Images/Profile.png';
    }
?>