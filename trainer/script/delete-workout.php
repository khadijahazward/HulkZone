<?php

require '../../connect.php';



    $workoutID = $_GET['id'];


    $sql = "DELETE FROM workoutplan WHERE workoutID=$workoutID";

    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); //execute query

    if ($res == TRUE) {

        header('location: http://localhost/hulkzone/trainer/Workouts.php');
    } else {
        header('location: http://localhost/hulkzone/trainer/dashboard.php');
    }
