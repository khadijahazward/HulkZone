<?php

// database connection
include '../connect.php';

// check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date'])) {
    // get the current date
    $date = date('Y-m-d');
    // check if the submitted date matches the current date
    //if ($_POST['date'] === $date && date('D', strtotime($date)) === 'Sun') {
        // prepare the SQL query to update all rows in the `timeslots` table
        $query = "UPDATE timeslots SET availableSlots = 10";
        // execute the query
        $result = mysqli_query($conn, $query);
        // check if the query was successful
        if ($result) {
            echo "<script> alert('Available timeslots updated to 10!'); </script>";
            echo "<script>window.location.replace('gymSchedule.php');</script>";
        } else {
            echo "Error updating available slots: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid date submitted.";
    }
//}
?>
