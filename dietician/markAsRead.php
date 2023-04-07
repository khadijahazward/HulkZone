<?php

include 'connect.php';
include 'authorization.php';

if (isset($_GET['usernotID']) && is_numeric($_GET['usernotID'])) {
    $usernotID = $_GET['usernotID'];

    $query1 = "UPDATE usernotifications SET status = 1 WHERE usernotificationID = $usernotID";
    mysqli_query($conn, $query1);
}

mysqli_close($conn);

    // Redirect back to the page where the notification was marked as read
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
?>