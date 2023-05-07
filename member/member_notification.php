<?php

//for GYM SERVICES
    $userID = $_SESSION['userID'];

   $query = "SELECT * FROM serviceCharge WHERE memberID = $row1[memberID] AND serviceID IN (1, 2, 4) AND endDate <= NOW() ORDER BY endDate DESC LIMIT 1";
   $result = mysqli_query($conn, $query);

   if ($result && mysqli_num_rows($result) > 0) {
       $row = mysqli_fetch_assoc($result);
       $endDate = date('Y-m-d', strtotime($row['endDate'])); // Retrieves only the date part of the endDate field 
       $serviceID = $row['serviceID'];

       $service = "gym";

        if($serviceID == 1){
            $service = "CrossFit"; 
        }else if($serviceID == 2){
            $service = "BodyBuilding"; 
        }else if($serviceID == 4){
            $service = "Strength"; 
        }
       
       // for type: Announcement = 0, Complaint = 1, Payment = 2, service = 3, appointment = 4
       $sql6 = "SELECT notificationsID FROM notifications WHERE type = 3 AND DATE(created_at) = '$endDate' AND notificationsID IN (SELECT notificationsID FROM usernotifications WHERE userID = $userID)";
       $result6 = mysqli_query($conn, $sql6);

       if ($result6 && mysqli_num_rows($result6) > 0) {
           // Notification has already been sent
       } else {
           // Insert a new record into the notifications table
           $message = "Congratulations on completing the $service service! We hope that it was a valuable experience for you and we look forward to serving you again in the future.";
           $type = 3;
           $created_at = $row['endDate'];

           $sql7 = "INSERT INTO notifications(message, type, created_at) VALUES ('$message', '$type', '$created_at')";
           $result7 = mysqli_query($conn, $sql7);

           if ($result7) {
               //getting previous inserted notification id
               $notificationID = mysqli_insert_id($conn);

               // Insert a new record into the user_notifications table 
               $sql8 = "INSERT INTO usernotifications(userID, notificationsID) VALUES ('$userID', '$notificationID')";
               $result8 = mysqli_query($conn, $sql8);
           }else{
               echo "Error: " . mysqli_error($conn);
           }
       }
    }

?>