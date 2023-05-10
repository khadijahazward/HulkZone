<?php
    include 'authorization.php';
    include '../connect.php';

    $slotID = $_POST["slotID"];

    //booking date
    $bDate = $_POST["bDate"];

    //day number
    $weekdayID = $_POST["weekdayID"];

    //employee id
    $empid = $_POST["empid"];

    //user id of employee
    $query3 = "select userID from employee where employeeID = $empid";
    $result3 = mysqli_query($conn, $query3);
    $row3 = mysqli_fetch_assoc($result3);
    $emp_userID = $row3['userID'];

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
    $query2 = "SELECT * FROM trainerappointment WHERE memberID = '$memberID' AND date = '$bDate' And employeeID = '$empid'";
    $result1 = mysqli_query($conn, $query2);

    // Check if there is a record for the current date
    if (mysqli_num_rows($result1) > 0) {

        echo "<script>alert('You already have an active appointment for $bDate.');</script>";
        echo "<script>window.location = 'gymuse.php';</script>";

    }else{

        //using transaction
        mysqli_autocommit($conn, false); // turn off auto-commit

        $query3 = "INSERT into gymuseappointment (date, memberID, slotID, attendance) values ('$bDate', '$memberID', '$slotID', 0)";
        $query4 = "UPDATE timeslots SET availableSlots = availableSlots - 1 WHERE slotID = $slotID AND weekDayID = $weekdayID";
        $query5 = "UPDATE trainerappointment SET memberID = '$memberID', status = 1  WHERE date = '$bDate' AND employeeID = '$empid' AND startTime = '$startTime'";
        
        $result3 = mysqli_query($conn, $query3);
        $result4 = mysqli_query($conn, $query4);
        $result5 = mysqli_query($conn, $query5);
        
        if ($result3 && $result4 && $result5) {
            mysqli_commit($conn); // commit changes if all queries succeed
            mysqli_autocommit($conn, true); // turn on auto-commit again

            //getting start time and end time from the slots table
            $sql3 = "SELECT endTime FROM trainerappointment WHERE memberID = '$memberID' AND employeeID = '$empid' AND date = '$bDate' AND startTime = '$startTime'";
            $result4 = mysqli_query($conn, $sql3);

            $row = mysqli_fetch_assoc($result4);

            $st = date('H:i:s', strtotime($startTime));
            $endTime = date('H:i:s', strtotime($row["endTime"]));

            echo "<script>alert('Appointment confirmed! Your Appointment is from $st to $endTime on $bDate.');</script>";
            echo "<script>window.location = 'gymuse.php';</script>";

            // Insert a new record into the notifications table
            $message = "There is an active appointment for Member ID $memberID  on $bDate at $st - $endTime.";
            $type = 4;
            $created_at = date('Y-m-d H:i:s');

            $sql7 = "INSERT INTO notifications(message, type, created_at) VALUES ('$message', '$type', '$created_at')";
            $result7 = mysqli_query($conn, $sql7);

            if ($result7) {
                //getting previous inserted notification id
                $notificationID = mysqli_insert_id($conn);

                // Insert a new record into the user_notifications table 
                $sql8 = "INSERT INTO usernotifications(userID, notificationsID) VALUES ('$emp_userID', '$notificationID')";
                $result8 = mysqli_query($conn, $sql8);
            }else{
                echo "Error: " . mysqli_error($conn);
            }

        } else {
            mysqli_rollback($conn); // rollback changes if any query fails
            mysqli_autocommit($conn, true); // turn on auto-commit again

            echo "<script>alert('Sorry there was an error! Please try again!');</script>";
            echo "<script>window.location = 'gymuse.php';</script>";
        }
        
    }
        

?>