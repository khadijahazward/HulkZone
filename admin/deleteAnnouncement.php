<?php
include('../../HulkZone/connect.php');

// Sanitize the input
$announcementID = filter_input(INPUT_GET, 'announcementID', FILTER_SANITIZE_NUMBER_INT);

// Use prepared statement
$stmt = $conn->prepare("DELETE FROM announcement WHERE announcementID = ?");
$stmt->bind_param("i", $announcementID);
$stmt->execute();
$stmt->close();

// Redirect to the announcements page
header('Location: viewAnnouncements.php');
?>


