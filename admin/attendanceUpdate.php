<?php
include('../connect.php');
if (isset($_POST['date'])) {
    $date = $_POST['date'];
} else {
    $date = "";
}


// Check if the form was submitted
if (isset($_POST['date']) && isset($_POST['memberID']) && isset($_POST['aStatus'])) {
    $date = $_POST['date'];
    $memberID = $_POST['memberID'];
    $aStatus = $_POST['aStatus'];

    $sql = "UPDATE gymuseappointment 
            INNER JOIN slots ON gymuseappointment.slotID = slots.slotID
            SET attendance=1 
            WHERE gymuseappointment.date='$date' 
            AND gymuseappointment.memberID=$memberID";

if (mysqli_query($conn, $sql)) {
         
         header("Location: gymSchedule.php?date=$date");

         exit;
    } else {
        // Handle the error
        echo "Error updating attendance : " . mysqli_error($conn);
    }
} else {
    echo "Form data not submitted";
}

?>







