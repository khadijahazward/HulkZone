<?php

include 'authorization.php';
include '../connect.php';


    $slotID = $_POST["slotID"];

    //getting member id using session
    $query = "SELECT * from member where userID = " . $_SESSION['userID'];
    $result = mysqli_query($conn, $query); 

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $memberID = $row['memberID'];
    }

    $currentDate = date("Y-m-d");

    // Query the appointments table to check for an active appointment
    $query2 = "SELECT * FROM gymuseappointment WHERE memberID = '$memberID' AND date = '$currentDate'";
    $result1 = mysqli_query($conn, $query2);

    // Check if there is a record for the current date
    if (mysqli_num_rows($result1) > 0) {

        echo "<script>alert('You already have an active appointment for today.');</script>";
        echo "<script>window.location = 'gymuse.php';</script>";

    } else {

        $sql = "INSERT into gymuseappointment (date, memberID, slotID, attendance) values ('$currentDate', '$memberID', '$slotID', 0)";

        $sql2 = "UPDATE slots SET availableSlots = availableSlots - 1 WHERE slotID = $slotID";

        $result2 = mysqli_query($conn, $sql);
        $result3 = mysqli_query($conn, $sql2);


        if($result2 && $result3){
            
            //getting start time and end time from the slots table
            $sql3 = "SELECT sTime, eTime FROM slots WHERE slotID = '$slotID'";
            $result3 = mysqli_query($conn, $sql3);
            $row = mysqli_fetch_assoc($result3);
            $startTime = $row['sTime'];
            $endTime = $row['eTime'];

            echo "<script>alert('Appointment confirmed! Your Appointment is from $startTime to $endTime.');</script>";
            echo "<script>window.location = 'gymuse.php';</script>";

        }else{
            echo "<script>alert('Sorry there was an error! Please try again!');</script>";
            echo "<script>window.location = 'gymuse.php';</script>";
        }
    }
?>