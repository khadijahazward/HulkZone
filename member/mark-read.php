<?php
    include 'authorization.php';
    include '../connect.php';
    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "UPDATE usernotifications SET status = 1 WHERE usernotificationsID = $id";
        mysqli_query($conn, $sql);
    }

    mysqli_close($conn);

    // Redirect back to the page where the notification was marked as read
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
?>