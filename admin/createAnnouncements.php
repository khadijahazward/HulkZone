<?php
include('../../HulkZone/connect.php');

$message = $_POST["m"];

date_default_timezone_set('Asia/Colombo');

// Get the current date and time as a string in a specific format
$date = date('Y-m-d H:i:s');

$sql="INSERT into notifications (message,created_at,type) VALUES ('$message','$date',0)";
$result1=mysqli_query($conn,$sql);

// Get the last inserted notification ID
$notificationID = mysqli_insert_id($conn);

 $sql="SELECT userID FROM user WHERE roles <>0";
 $result2=mysqli_query($conn,$sql);
 
 if(mysqli_num_rows($result2)>0){
    while($row=mysqli_fetch_assoc($result2)){
        $userIDs[]=$row['userID'];
    }
 }

 foreach($userIDs as $userID){
    $sql="INSERT into usernotifications(notificationsID,userID,status)VALUES('$notificationID','$userID',0)";
    $result3=mysqli_query($conn,$sql);
 }
 

if ($result1 && $result3) {
    echo "<script> alert('Notification sent to users successfully!'); </script>";
    echo "<script>window.location.replace('viewAnnouncements.php');</script>";
} else {
    echo "Error: " . $conn->error;
}
?>
