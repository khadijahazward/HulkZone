<?php
include('../../HulkZone/connect.php');

// Sanitize the input
$notificationsID = filter_input(INPUT_GET, 'notificationsID', FILTER_SANITIZE_NUMBER_INT);


$sql="SELECT message,created_at FROM notifications WHERE notificationsID=?";
$stmt=mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $notificationsID);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$row = mysqli_fetch_assoc($result);

$message = $row['message'];
$created_at=$row['created_at'];

// Insert notification into notifications table
$announcement="Ignore the previously posted announcement.Announcement:".$message.",Posted on:".$created_at;
$stmt1 = mysqli_prepare($conn, "INSERT INTO notifications (message, created_at, type) VALUES (?, NOW(), 0)");
mysqli_stmt_bind_param($stmt1, "s", $announcement);
mysqli_stmt_execute($stmt1);
$notificationsIDnew = mysqli_insert_id($conn);
mysqli_stmt_close($stmt1);

// Insert notification into usernotifications table
$stmt2=mysqli_prepare($conn, "INSERT INTO usernotifications (userID, notificationsID, status) SELECT userID, ?, 0 FROM user WHERE roles <> 0");
mysqli_stmt_bind_param($stmt2, "i", $notificationsIDnew);
mysqli_stmt_execute($stmt2);
mysqli_stmt_close($stmt2);


$query = "DELETE FROM notifications WHERE notificationsID = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $notificationsID);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
 

// Use another prepared statement to delete from usernotifications table
$query = "DELETE FROM usernotifications WHERE notificationsID = ?";
$stmt=mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $notificationsID);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

// Redirect to the announcements page
header('Location: viewAnnouncements.php');

?>


