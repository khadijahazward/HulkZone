<?php

include 'authorization.php';
include '../connect.php';
include("setProfilePic.php");

$date = $_POST["date"];
$startDate = $_POST["startDate"];
$memberID = $row1['memberID'];

$sql2 = "select * from workout_plan_status where CompletedDate = $date and memberID = $memberID AND startDate = '$startDate'";

$result2 = mysqli_query($conn, $sql2);

if (!$result2) {
    // There was an error executing the query
    echo "Error: " . mysqli_error($conn);
} elseif (mysqli_num_rows($result2) > 0) {
    // The record already exists
    echo "<script>alert('You Have Already Completed the Plan for Today.');</script>";
} else {
    // Insert the new record into the diet_plan_status table
    $status = 1;
    $sql3 = "INSERT INTO workout_plan_status (memberID, CompletedDate, status, startDate) VALUES ($memberID, '$date', $status, '$startDate')";
    
    if (mysqli_query($conn, $sql3)) {
        //echo "<script>alert('Record inserted successfully.');</script>";
        header('Location: workout.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>