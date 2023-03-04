<?php

/*include('../../HulkZone/connect.php');
if(isset($_GET['complaintID'])) {
    $complaintID = $_GET['complaintID'];

    //$sql = "DELETE FROM complaint WHERE complaintID = ?";
    $sql = "UPDATE complaint SET status='Ignored' WHERE complaintID=?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $complaintID);
    mysqli_stmt_execute($stmt);

    if (mysqli_affected_rows($conn) > 0) {
        header("Location: manageComplaints.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);*/



include('../../HulkZone/connect.php');

if(isset($_GET['complaintID'])) {
    $complaintID = $_GET['complaintID'];

    // Update status of complaint to "Ignored"
    $stmt1 = mysqli_prepare($conn, "UPDATE complaint SET status='Ignored' WHERE complaintID=?");
    mysqli_stmt_bind_param($stmt1, "i", $complaintID);
    mysqli_stmt_execute($stmt1);
    mysqli_stmt_close($stmt1);

    // Get userID for the complaint
    $stmt2 = mysqli_prepare($conn, "SELECT userID FROM complaint WHERE complaintID=?");
    mysqli_stmt_bind_param($stmt2, "i", $complaintID);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_bind_result($stmt2, $userID);
    mysqli_stmt_fetch($stmt2);
    mysqli_stmt_close($stmt2);
    // Get subject and dateReported from complaint table
$sql = "SELECT subject, dateReported FROM complaint WHERE complaintID=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $complaintID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$subject = $row['subject'];
$dateReported = $row['dateReported'];


    // Insert notification into notifications table
    $message = "Your complaint is ignored. Subject: ".$subject.", Date Reported: ".$dateReported;
    $stmt3 = mysqli_prepare($conn, "INSERT INTO notifications (message, created_at, type) VALUES (?, NOW(), 2)");
    mysqli_stmt_bind_param($stmt3, "s", $message);
    mysqli_stmt_execute($stmt3);
    $notificationsID = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt3);

    // Insert notification into usernotifications table
    $stmt4 = mysqli_prepare($conn, "INSERT INTO usernotifications (notificationsID, userID, status) VALUES (?, ?, 0)");
    mysqli_stmt_bind_param($stmt4, "ii", $notificationsID, $userID);
    mysqli_stmt_execute($stmt4);
    mysqli_stmt_close($stmt4);

    header("Location: manageComplaints.php");
    exit();
}

mysqli_close($conn);



?>


