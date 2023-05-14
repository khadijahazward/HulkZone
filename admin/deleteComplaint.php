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
// for type: Announcement = 0, Complaint = 1, Payment = 2, service selection =3
if(isset($_GET['complaintID'])) {
    $complaintID = $_GET['complaintID'];

    $sql1="SELECT status FROM complaint WHERE complaintID=?";
    $stmt3= mysqli_prepare($conn, $sql1);
    mysqli_stmt_bind_param($stmt3, "i", $complaintID);
    mysqli_stmt_execute($stmt3);
    $result = mysqli_stmt_get_result($stmt3);
    $row = mysqli_fetch_assoc($result);
    $status = $row['status'];

    if($status != 'Completed'){
    // Update status of complaint to "Ignored"
    $stmt = mysqli_prepare($conn, "UPDATE complaint SET status='Ignored' WHERE complaintID=?");
    mysqli_stmt_bind_param($stmt, "i", $complaintID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Get userID for the complaint
   $sql= "SELECT userID FROM complaint WHERE complaintID=$complaintID";
   $result=mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($result);
   $userID=$row['userID'];
 
   // mysqli_stmt_bind_result($stmt2, $userID);
    //mysqli_stmt_fetch($stmt2);

  
    // Get subject and dateReported from complaint table
$sql = "SELECT subject, dateReported FROM complaint WHERE complaintID=$complaintID";
/*$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $complaintID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);*/
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$subject = $row['subject'];
$dateReported = $row['dateReported'];


    // Insert notification into notifications table
    $message = "Your complaint is ignored. Subject: ".$subject.", Date Reported: ".$dateReported;
    $stmt1 = mysqli_prepare($conn, "INSERT INTO notifications (message, created_at, type) VALUES (?, NOW(), 1)");
    mysqli_stmt_bind_param($stmt1, "s", $message);
    mysqli_stmt_execute($stmt1);
    $notificationsID = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt1);

    // Insert notification into usernotifications table
    $stmt2 = mysqli_prepare($conn, "INSERT INTO usernotifications (notificationsID, userID, status) VALUES (?, ?, 0)");
    mysqli_stmt_bind_param($stmt2, "ii", $notificationsID, $userID);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_close($stmt2);

    header("Location: manageComplaints.php");
    exit();
}else{
     echo "<script> alert('It is a completed complaint!'); window.location='manageComplaints.php'; </script>";
}


mysqli_close($conn);
}
?>