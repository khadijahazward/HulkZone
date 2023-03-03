<?php
include('../../HulkZone/connect.php');

// Sanitize the input
$notificationsID = filter_input(INPUT_GET, 'notificationsID', FILTER_SANITIZE_NUMBER_INT);

// Use prepared statement to delete from notifications table
$stmt = $conn->prepare("DELETE FROM notifications WHERE notificationsID = ?");
$stmt->bind_param("i", $notificationsID);
$stmt->execute();
$stmt->close();

// Use another prepared statement to delete from usernotifications table
$stmt = $conn->prepare("DELETE FROM usernotifications WHERE notificationsID = ?");
$stmt->bind_param("i", $notificationsID);
$stmt->execute();
$stmt->close();

// Redirect to the announcements page
header('Location: viewAnnouncements.php');

?>


