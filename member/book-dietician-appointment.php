<?php

include 'authorization.php';
include '../connect.php';

//employee id
$empid = $_POST["empid"];

//booking date
$bDate = $_POST["bDate"];

//booking start time
$startTime = $_POST["startTime"];

//getting member id using session
$query = "SELECT * from member where userID = " . $_SESSION['userID'];
$result = mysqli_query($conn, $query); 

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $memberID = $row['memberID'];
}

// Query the appointments table to check for an active appointment
$query2 = "SELECT * FROM dieticianappointment WHERE memberID = '$memberID' AND date = '$bDate' And employeeID = '$empid'";
$result1 = mysqli_query($conn, $query2);

// Check if there is a record for the current date
if (mysqli_num_rows($result1) > 0) {

    echo "<script>alert('You already have an active appointment for $bDate.');</script>";
    echo "<script>window.location = 'dietUse.php';</script>";

}else{
    $sql = "UPDATE dieticianappointment SET memberID = '$memberID', status = 1 WHERE date = '$bDate' AND employeeID = '$empid' AND startTime = '$startTime'";
    
    $result2 = mysqli_query($conn, $sql);

    if($result2){
            
        //getting start time and end time from the slots table
        $sql3 = "SELECT endTime FROM dieticianappointment WHERE memberID = '$memberID' AND employeeID = '$empid' AND date = '$bDate' AND startTime = '$startTime'";
        $result4 = mysqli_query($conn, $sql3);

        $row = mysqli_fetch_assoc($result4);

        $st = date('H:i:s', strtotime($startTime));
        $endTime = date('H:i:s', strtotime($row["endTime"]));

        echo "<script>alert('Appointment confirmed! Your Appointment is from $st to $endTime on $bDate.');</script>";
        echo "<script>window.location = 'dietUse.php';</script>";

    }else{
        echo "<script>alert('Sorry there was an error! Please try again!');</script>";
        echo "<script>window.location = 'dietUse.php';</script>";
    }
}

?>