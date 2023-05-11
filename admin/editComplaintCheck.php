<?php
require "../connect.php";
$complaintID = mysqli_real_escape_string($conn, $_GET['complaintID']);

$sql="SELECT status FROM complaint WHERE complaintID=?";
$stmt= mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $complaintID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $status = $row['status'];

    if($status != 'Completed'){
        echo "<script>window.location.replace('editComplaint.php?complaintID=$complaintID');</script>";
    }else{
        echo "<script> alert('It is already a completed complaint!'); window.location='manageComplaints.php'; </script>";
    }
?>