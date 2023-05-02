<?php
include('../../HulkZone/connect.php');

$message = $_POST["m"];
//$date = date('Y-m-d H:i:s'); // get the current date and time
// Create a new DateTime object with the current date and time in UTC timezone
$currentDateTime = new DateTime('now', new DateTimeZone('UTC'));

// Set the timezone to Sri Lanka
$currentDateTime->setTimezone(new DateTimeZone('Asia/Colombo'));

// Format the date and time as a string in a specific format
$date = $currentDateTime->format('Y-m-d H:i:s');


// Insert into notifications table
$stmt1 = $conn->prepare("INSERT INTO notifications (message, created_at, type) VALUES (?, ?, 0)");
$stmt1->bind_param("ss", $message, $date);
$stmt1->execute();

// Get the last inserted notification ID
$notificationID = mysqli_insert_id($conn);

// Insert into usernotifications table for all users with status 0
$stmt2 = $conn->prepare("INSERT INTO usernotifications (userID, notificationsID, status) SELECT userID, ?, 0 FROM user WHERE roles <> 0");
$stmt2->bind_param("i", $notificationID);
$stmt2->execute();

if ($stmt1 && $stmt2) {
    echo "<script> alert('Notification sent to users successfully!'); </script>";
    echo "<script>window.location.replace('viewAnnouncements.php');</script>";
} else {
    echo "Error: " . $conn->error;
}
?>
