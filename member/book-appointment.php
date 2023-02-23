<?php

include 'authorization.php';
include '../connect.php';


    $slotID = $_POST["slotID"];

    //booking date
    $bDate = $_POST["bDate"];

    //day number
    $weekdayID = $_POST["weekdayID"];

    //getting member id using session
    $query = "SELECT * from member where userID = " . $_SESSION['userID'];
    $result = mysqli_query($conn, $query); 

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $memberID = $row['memberID'];
    }
    
    // Query the appointments table to check for an active appointment
    $query2 = "SELECT * FROM gymuseappointment WHERE memberID = '$memberID' AND date = '$bDate'";
    $result1 = mysqli_query($conn, $query2);


    // Check if there is a record for the current date
    if (mysqli_num_rows($result1) > 0) {

        echo "<script>alert('You already have an active appointment for $bDate.');</script>";
        echo "<script>window.location = 'gymuse.php';</script>";

    } else {

        $sql = "INSERT into gymuseappointment (date, memberID, slotID, attendance) values ('$bDate', '$memberID', '$slotID', 0)";

        $sql2 = "UPDATE timeslots SET availableSlots = availableSlots - 1 WHERE slotID = $slotID AND weekDayID = $weekdayID";

        $result2 = mysqli_query($conn, $sql);
        $result3 = mysqli_query($conn, $sql2);


        if($result2 &&  $result3){
            
            //getting start time and end time from the slots table
            $sql3 = "SELECT sl.sTime, sl.eTime FROM  slots sl JOIN timeslots ts  ON ts.slotID = sl.slotID WHERE ts.weekDayID = '$weekdayID' and sl.slotID = $slotID";
            $result4 = mysqli_query($conn, $sql3);

            $row = mysqli_fetch_assoc($result4);
            $startTime = $row['sTime'];
            $endTime = $row['eTime'];

            echo "<script>alert('Appointment confirmed! Your Appointment is from $startTime to $endTime on $bDate.');</script>";
            echo "<script>window.location = 'gymuse.php';</script>";

        }else{
            echo "<script>alert('Sorry there was an error! Please try again!');</script>";
            echo "<script>window.location = 'gymuse.php';</script>";
        }
    }
?>