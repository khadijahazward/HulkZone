<?php
  include '../authorization.php';
  include 'C:\xampp\htdocs\HulkZone\connect.php';
  include 'C:\xampp\htdocs\HulkZone\member\setProfilePic.php';
  date_default_timezone_set('Asia/Colombo');

  $memberID = $row1['memberID'];
  $paymentAmount = $_GET['amount'];
  $type = $_GET['type'];
  $currentDate = date('Y-m-d H:i:s');
  $planType = $row1['planType'];
  $employeeID = $_GET['employeeID'];
  
  // Insert the payment into the payment table
  $sql5 = "INSERT INTO payment (paymentDate, amount, type, memberID) VALUES ('$currentDate', $paymentAmount, '$type', $memberID)";
  $result5 = mysqli_query($conn, $sql5);
  
  // Get the ID of the last inserted payment record
  $paymentID = mysqli_insert_id($conn);

  // Update the payment plan with the new expiry date if the type is 0
  if ($type == 0) {
    $sql6 = "SELECT expiryDate FROM paymentplan WHERE memberID = $memberID ORDER BY expiryDate DESC LIMIT 1";
    $result6 = mysqli_query($conn, $sql6);
    $row6 = mysqli_fetch_assoc($result6);
    $lastExpiryDate = $row6['expiryDate'];
    
    switch($planType) {
      case 'oneMonth':
        $newExpiryDate = date('Y-m-d H:i:s', strtotime($lastExpiryDate . ' +1 month'));
        break;
      case 'threeMonth':
        $newExpiryDate = date('Y-m-d H:i:s', strtotime($lastExpiryDate . ' +3 months'));
        break;
      case 'sixMonth':
        $newExpiryDate = date('Y-m-d H:i:s', strtotime($lastExpiryDate . ' +6 months'));
        break;
      case 'twelveMonth':
        $newExpiryDate = date('Y-m-d H:i:s', strtotime($lastExpiryDate . ' +1 year'));
        break;
      default:
        // handle invalid plan type
        break;
    }
    
    $sql7 = "INSERT INTO paymentplan (memberID,  expiryDate) VALUES ($memberID, '$newExpiryDate')";
    $result7 = mysqli_query($conn, $sql7);

    $sql8 = "update user set statuses = 1 where userID = " . $_SESSION['userID'];
    $result8 = mysqli_query($conn, $sql8);

    //for service related
  }else if($type == 1 || $type == 2 || $type == 3 || $type == 4){

    $endDate = date('Y-m-d H:i:s', strtotime('+6 months'));

    $sql7 = "INSERT INTO servicecharge (memberID, paymentID, serviceID, employeeID, startDate, endDate, rate	) VALUES ($memberID, $paymentID, $type, $employeeID, '$currentDate', '$endDate', 0)";
    $result7 = mysqli_query($conn, $sql7);

    // Insert a new record into the notifications table
    switch ($type) {
      case 1:
        $subtype = "CrossFit";
        break;
      case 2:
        $subtype = "BodyBuilding";
        break;
      case 3:
        $subtype = "Diet";
        break;
      case 4:
        $subtype = "Strength";
        break;
      default:
        // Handle invalid type
        break;
    }

    $message = "Member ID $memberID Has Selected You to Train Them for $subtype Service";
    $created_at = date('Y-m-d H:i:s');
    $noti_type = 3;
    $sql10 = "INSERT INTO notifications(message, type, created_at) VALUES ('$message', '$noti_type', '$created_at')";
    $result10 = mysqli_query($conn, $sql10);

    if ($result10) {
        //getting previous inserted notification id
        $notificationID = mysqli_insert_id($conn);

        $sql12 = "SELECT userID FROM employee WHERE employeeID = $employeeID";
        $result = mysqli_query($conn, $sql12);
        if ($result && mysqli_num_rows($result) > 0) {
          
          $row = mysqli_fetch_assoc($result);
          $uID = $row['userID'];

          $sql11 = "INSERT INTO usernotifications(userID, notificationsID) VALUES ('$uID', '$notificationID')";
          $result11 = mysqli_query($conn, $sql11);
        } 
       
    }else{
        echo "Error: " . mysqli_error($conn);
    }
  }

  //for payment plan successful
  if($result5 && $result7){
    echo "<script> alert('Payment Successful');";
    echo "window.location.href = '/HulkZone/member/payment.php';</script>";
  }else{
    echo "<script> alert('Database Error.');";
    echo "window.location.href = '/HulkZone/member/payment.php';</script>";
  }
  
?>
