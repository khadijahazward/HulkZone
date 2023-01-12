<?php

include '../config/config.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $plan = $_POST['plan'];


    $sql = "INSERT INTO members_table SET
        name = '$name',
        gender = '$gender',
        contact = '$contact',
        plan= '$plan',
        profile_link='http://localhost/hulkzone/img/profile-icon.png' "; //Default value

    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); //execute query

    if ($res == TRUE) {
      
        header('location: http://localhost/hulkzone/members.php');
        
    } else {
        header('location: http://localhost/hulkzone/members.php');
      
    }
}


?>