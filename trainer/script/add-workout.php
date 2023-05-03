<?php
require 'config.php';
require '../../connect.php';


if (isset($_POST['submit'])) {

    $day1ExerciseList = trim($_POST['day1_execise_list']);
    $day2ExerciseList = trim($_POST['day2_execise_list']);
    $day3ExerciseList = trim($_POST['day3_execise_list']);
    $day4ExerciseList = trim($_POST['day4_execise_list']);
    $day5ExerciseList = trim($_POST['day5_execise_list']);
    $day6ExerciseList = trim($_POST['day6_execise_list']);
    $day7ExerciseList = trim($_POST['day7_execise_list']);


    function storeDataInTable($exerciseList, $conn, $day)
    {
        //MemberID
        $memberID = trim($_POST['memberName']);
        $startDate = trim($_POST['startDate']);

        $userID = $_SESSION['userID'];
        $sql = 'SELECT employee.employeeID FROM employee WHERE employee.userID= ' . $userID;
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $employeeID = $row['employeeID'];



        // Split the text area content into an array of records
        $records = explode("\n", $exerciseList);
        $exerciseList = ""; //Reset 

        // Loop through the records
        foreach ($records as $record) {
            $record = trim($record);
            // Split the record into its individual values
            $values = explode(',', $record);
            $record = "";

            // Check the number of values
            if (count($values) === 3) {
                // Reset the variables
                $exerciseName = "";
                $reps = "";
                $restTime = "";
                // Extract the individual values
                list($exerciseName, $reps, $restTime) = $values;

                $sql = "INSERT INTO workoutplan (employeeID, memberID, exerciseName, reps, restTime, day, startDate) VALUES ($employeeID, $memberID, '$exerciseName', '$reps', '$restTime', '$day', '$startDate')";
                // Execute the SQL statement using your preferred method for executing SQL queries
                $res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); //execute query
                $values[0] = "";
                $values[1] = "";
                $values[2] = "";
            }
        }
    }

    if ($day1ExerciseList !== "") {
        $day = 1;
        storeDataInTable($day1ExerciseList, $conn, $day);
        $day1ExerciseList = "";
    }
    if ($day2ExerciseList !== "") {
        $day = 2;
        storeDataInTable($day2ExerciseList, $conn, $day);
        $day2ExerciseList = "";
    }
    if ($day3ExerciseList !== "") {
        $day = 3;
        storeDataInTable($day3ExerciseList, $conn, $day);
        $day3ExerciseList = "";
    }
    if ($day4ExerciseList !== "") {
        $day = 4;
        storeDataInTable($day4ExerciseList, $conn, $day);
        $day4ExerciseList = "";
    }
    if ($day5ExerciseList !== "") {
        $day = 5;
        storeDataInTable($day5ExerciseList, $conn, $day);
        $day5ExerciseList = "";
    }
    if ($day6ExerciseList !== "") {
        $day = 6;
        storeDataInTable($day6ExerciseList, $conn, $day);
        $day6ExerciseList = "";
    }
    if ($day7ExerciseList !== "") {
        $day = 7;
        storeDataInTable($day7ExerciseList, $conn, $day);
        $day7ExerciseList = "";
    }

    header('location: http://localhost/hulkzone/trainer/workouts.php');
}
