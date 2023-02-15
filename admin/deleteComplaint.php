<?php

include('../../HulkZone/connect.php');
if(isset($_GET['complaintID'])) {
    $complaintID = $_GET['complaintID'];

    $sql = "DELETE FROM complaint WHERE complaintID = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $complaintID);
    mysqli_stmt_execute($stmt);

    if (mysqli_affected_rows($conn) > 0) {
        header("Location: manageComplaints.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
