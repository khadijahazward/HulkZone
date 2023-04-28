<?php
include('../connect.php');


$userID = $_SESSION['userID'];

$sqlQuery = "SELECT COUNT(*) AS count FROM usernotifications WHERE userID = '$userID' AND status = '0'";
$sqlQueryresult = mysqli_query($conn, $sqlQuery);
$count = mysqli_fetch_assoc($sqlQueryresult)['count'];
?>