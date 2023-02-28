<?php

require '../../connect.php';

if (isset($_POST['submit'])) {

    $workoutID = $_GET['id'];

    $memberName = $_POST['memberName'];
    $planPeriod = $_POST['planPeriod'];
    $duration = $_POST['duration'];
    $contact = $_POST['memberContact'];
    $day1 = nl2br($_POST['day1']);
    $day2 = nl2br($_POST['day2']);
    $day3 = nl2br($_POST['day3']);
    $day4 = nl2br($_POST['day4']);
    $day5 = nl2br($_POST['day5']);
    $day6 = nl2br($_POST['day6']);
    $date = date('y-m-d', strtotime($_POST['date']));


    $sql = "UPDATE workoutplan SET
        duration = '$duration',
        restPeriod = '$planPeriod',
        memberName = '$memberName',
        date = '$date',
        contact = '$contact',
        day1 = '$day1',
        day2 = '$day2',
        day3 = '$day3',
        day4 = '$day4',
        day5 = '$day5',
        day6 = '$day6'
    WHERE workoutID=$workoutID";

    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); //execute query

    if ($res == TRUE) {

        header('location: http://localhost/hulkzone/trainer/viewWorkout.php?id='.$workoutID);
    } else {
        header('location: http://localhost/hulkzone/trainer/dashboard.php');
    }
}
