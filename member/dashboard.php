<?php 
date_default_timezone_set('Asia/Colombo');
include 'authorization.php';
include '../connect.php';
?>

<?php
    include("setProfilePic.php");
?>

<?PHP
    $memberID = $row1['memberID'];
    $userID = $_SESSION['userID'];
    
    // Get the latest expiry date from the paymentplan table for that member
    $sql5 = "SELECT expiryDate FROM paymentplan WHERE memberID = '$memberID' ORDER BY expiryDate DESC LIMIT 1;";
    $result5 = mysqli_query($conn, $sql5);

    if ($result5 && mysqli_num_rows($result5) > 0) {
        $row5 = mysqli_fetch_assoc($result5);
        $expiryDate = $row5['expiryDate'];

        $cDate = date('y-m-d');
        //seconds divided by seconds to get days
        $dayUntilExpiry = (strtotime($expiryDate) - strtotime($cDate)) / (60 * 60 * 24);

        //days until expiry is 3 or lesser but more than 0
        if ($dayUntilExpiry > 0 && $dayUntilExpiry <= 3) {
            // Check if a notification has already been sent for this expiry date
            // for type: Announcement = 0, Complaint = 1, Payment = 2.
            $sql6 = "SELECT notificationsID FROM notifications WHERE type = 2 AND DATE(created_at) = '$cDate' AND notificationsID IN (SELECT notificationsID FROM usernotifications WHERE userID = $userID)";
            $result6 = mysqli_query($conn, $sql6);

            if ($result6 && mysqli_num_rows($result6) > 0) {
                // Notification has already been sent
            } else {
                // Insert a new record into the notifications table
                $message = "Your membership plan will expire in $dayUntilExpiry days.";
                $type = 2;
                $created_at = date('Y-m-d H:i:s');
    
                $sql7 = "INSERT INTO notifications(message, type, created_at) VALUES ('$message', '$type', '$created_at')";
                $result7 = mysqli_query($conn, $sql7);
    
                if ($result7) {
                    //getting previous inserted notification id
                    $notificationID = mysqli_insert_id($conn);

                    // Insert a new record into the user_notifications table 
                    $sql8 = "INSERT INTO usernotifications(userID, notificationsID) VALUES ('$userID', '$notificationID')";
                    $result8 = mysqli_query($conn, $sql8);
                }else{
                    echo "Error: " . mysqli_error($conn);
                }
            }

        }

        if($dayUntilExpiry == 0){

            // Check if a notification has already been sent to admin
            // for type: Announcement = 0, Complaint = 1, Payment = 2.
            $adminID = 128;
            $sql9 = "SELECT notificationsID FROM notifications WHERE type = 2 AND DATE(created_at) = '$cDate' AND notificationsID IN (SELECT notificationsID FROM usernotifications WHERE userID = $adminID)";
            $result9 = mysqli_query($conn, $sql9);

            if ($result9 && mysqli_num_rows($result9) > 0) {
                // Notification has already been sent
            } else {
                // Insert a new record into the notifications table
                $message = "Member ID $memberID membership plan has expired. The Account Has Been Disabled.";
                $type = 2;
                $created_at = date('Y-m-d H:i:s');
    
                $sql10 = "INSERT INTO notifications(message, type, created_at) VALUES ('$message', '$type', '$created_at')";
                $result10 = mysqli_query($conn, $sql10);
    
                if ($result10) {
                    //getting previous inserted notification id
                    $notificationID = mysqli_insert_id($conn);

                    // Insert a new record into the user_notifications table 
                    $sql11 = "INSERT INTO usernotifications(userID, notificationsID) VALUES ('$adminID', '$notificationID')";
                    $result11 = mysqli_query($conn, $sql11);
                }else{
                    echo "Error: " . mysqli_error($conn);
                }
            }

            // Disable user account
            $sql12 = "UPDATE user SET statuses = 0 WHERE userID = $userID";
            $result12 = mysqli_query($conn, $sql12);
            
            if ($result12) {
                echo "<script>alert('Your Payment plan has expired. Your account has been disabled. Please Pay the Payment to enable your account.');</script>";
                header("Location: ../home/logout.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/dashboard.css">
</head>
<body>
    <div class="container">
        <div class = "nav-bar">
            <?php
                include("navBar.php");
            ?>
        </div>
        <div class="body">
            <div class = "header">
                <div class="left"> 
                    Hello, 
                    <?php
                        echo $_SESSION["firstName"];
                    ?>  
                    <br>
                    Welcome and Let's Do Some Workout Today!
                </div>
                <div class="right">
                    <div class="notification-bell">
                        <?php include("notifications.php"); ?>
                    </div>
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <p>Today’s Meal Plan</p>
                    <div class="row-2">
                        <div class="sub-content">
                            <p>Breakfast</p>
                            <!--retreive-->
                            <div>X</div>
                        </div>
                        <div class="sub-content">
                            <p>Lunch</p>
                            <!--retreive-->
                            <div>X</div>
                        </div>
                        <div class="sub-content">
                            <p>Dinner</p>
                            <!--retreive-->
                            <div>X</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <p>Upcoming Exercises</p>
                    <div class="row" style = "border: 0px; margin-top:0;">
                        <?php
                            //edit this query - wrong
                            $sql3 = "select * from workoutplan where memberID = " . $row1['memberID'];

                            echo '<table> 
                            <tr  style = "background-color: #006837;"> 
                                <th> Exercise </th> 
                                <th> Duration </th> 
                                <th> Rest Time </th> 
                                <th> Status </th> 
                            </tr>';
                            $result3 = mysqli_query($conn, $sql3);
                            if (mysqli_num_rows($result3) > 0) {
                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                    
                                    //retrieving exercise name from the exercise table using exercise ID
                                    $exerciseID = $row3["exerciseID"];

                                    $sql4 = "select exerciseName from exercise where exerciseID =  " . $exerciseID;
                                    $result4 = mysqli_query($conn, $sql4);
                                    $row4 = mysqli_fetch_assoc($result4);
                                    $field1name = $row4["exerciseName"];

                                    $field2name = $row3["duration"];
                                    $field3name = $row3["restTime"];
                                    $field4name = $row3["status"];

                                    echo '<tr> 
                                        <td>'.$field1name.'</td> 
                                        <td>'.$field2name.'</td> 
                                        <td>'.$field3name.'</td> 
                                        <td><input type="checkbox" name="status[]" value="'.$row3["status"].'" '.($field4name == 1 ? 'checked' : '').'></td> 
                                    </tr>';
                                }
                            }else{
                                echo '<tr>
                                    <td colspan="4" style="border-radius: 10px 10px 10px 10px;"> You have not Selected a Service Yet. </td> 

                                </tr>'; 
                            }
                            echo '</table>';
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>