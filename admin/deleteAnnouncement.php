<?php
include('../../HulkZone/connect.php');

// Sanitize the input
$notificationsID = filter_input(INPUT_GET, 'notificationsID', FILTER_SANITIZE_NUMBER_INT);

// Use prepared statement to delete from notifications table
/*$stmt = $conn->prepare("DELETE FROM notifications WHERE notificationsID = ?");
$stmt->bind_param("i", $notificationsID);
$stmt->execute();
$stmt->close();*/

$query = "DELETE FROM notifications WHERE notificationsID = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $notificationsID);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
 

// Use another prepared statement to delete from usernotifications table
$query = "DELETE FROM usernotifications WHERE notificationsID = ?";
$stmt=mysqli_prepare($conn, $query);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

// Redirect to the announcements page
header('Location: viewAnnouncements.php');

?>


