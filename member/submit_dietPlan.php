<?php

include 'authorization.php';
include '../connect.php';
include("setProfilePic.php");

$completedDate = $_POST["completedDate"];
$dietID = $_POST["dietID"];
$memberID = $row1['memberID'];

$sql2 = "select * from diet_plan_status where CompletedDate = $completedDate and member_id = $memberID";

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
    $sql3 = "INSERT INTO diet_plan_status (member_id, CompletedDate, status, dietID) VALUES ($memberID, '$completedDate', $status, $dietID)";
    
    if (mysqli_query($conn, $sql3)) {
        //echo "<script>alert('Record inserted successfully.');</script>";
        header('Location: dietPlan.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>