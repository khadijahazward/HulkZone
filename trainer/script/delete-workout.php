<?php
require 'config.php';
require '../../connect.php';



//MemberID
$memberID = trim($_GET['memberID']);

$userID = $_SESSION['userID'];
$sql = 'SELECT employee.employeeID FROM employee WHERE employee.userID= ' . $userID;
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$employeeID = $row['employeeID'];


$sql = "DELETE FROM workoutplan WHERE memberID =" . $memberID . " AND employeeID =" . $employeeID;
// Execute the SQL statement using your preferred method for executing SQL queries
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); //execute query

header('location: http://localhost/hulkzone/trainer/workouts.php');
