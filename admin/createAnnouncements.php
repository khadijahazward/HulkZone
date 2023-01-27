<?php
session_start();
include('../../HulkZone/connect.php');
$message = $_POST["m"];
$date = $_POST["d"];

$sql = "INSERT INTO announcement ( message, date) VALUES ('$message', '$date')";
$rs = mysqli_query($conn, $sql);
if($rs==true){
    header("location: ./viewAnnouncements.php");
}
?>

