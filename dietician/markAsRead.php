<?php

    include "connect.php";

    $usernotID = mysqli_real_escape_string($conn, $_GET['usernotID']);

    $sqlQuery2 = "UPDATE usernotifications SET status = 1 WHERE usernotificationsID = $usernotID";
    $sqlQueryresult2 = mysqli_query($conn, $sqlQuery2);

    if ($sqlQueryresult2) {
        // Reload the page to reflect the updated notification status
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error updating notification status: " . mysqli_error($conn);
    }


?>