<?php

require '../../connect.php';

if (isset($_POST['submit'])) {
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
    $date = date('y-m-d',strtotime($_POST['date']));

    //Get employeeID using userID
    $userid = $_SESSION["userID"];


    $sql = "SELECT * FROM employee WHERE userID=$userid";

    $result = mysqli_query($conn, $sql);


    if($result==TRUE)
    {
        $count = mysqli_num_rows($result);
        if($count==1)
        {   
            $rows=mysqli_fetch_assoc($result);
            $employeeID=$rows['employeeID'];
        }   
    }


    $sql = "INSERT INTO workoutplan SET
        employeeID = '$employeeID',
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
        ";

    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); //execute query

    if ($res == TRUE) {
      
        header('location: http://localhost/hulkzone/trainer/workouts.php');
        
    } else {
        header('location: http://localhost/hulkzone/trainer/dashboard.php');
      
    }

}
