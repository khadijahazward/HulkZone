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

    require("member_notification.php");
    
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
            // for type: Announcement = 0, Complaint = 1, Payment = 2, service selection =3 
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
    <link rel="icon" type="image/png" href="../asset/images/gymLogo.png"/>
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

            <!-- Diet PLAN -->
                <div class="row">
                    <p>Meal Plan For <?php echo date("Y-m-d"); ?></p>
                    <div class="row-2">
                        <?php
                        $dayNumber = date('N');
                        $sql6 = "SELECT * FROM serviceCharge WHERE memberID = $row1[memberID] AND serviceID = 3 AND endDate >= CURDATE() LIMIT 1";
                        $result6 = mysqli_query($conn, $sql6);
                        
                        if (mysqli_num_rows($result6) > 0) {
                            $row6 = mysqli_fetch_assoc($result6);
                            $startDate = $row6['startDate'];
                            $empid = $row6['employeeID'];
                            $memberID = $row6['memberID'];
                        
                            $sql7 = "SELECT * FROM dietplan WHERE startDate = '$startDate' AND employeeID = '$empid' AND memberID = '$memberID' AND day = $dayNumber";
                            $result7 = mysqli_query($conn, $sql7);
                        
                            if (mysqli_num_rows($result7) > 0) {
                                $row7 = mysqli_fetch_assoc($result7);
                                $breakfastMeal = $row7['breakfastMeal'];
                                $lunchMeal = $row7['lunchMeal'];
                                $dinnerMeal = $row7['dinnerMeal'];
                        
                                // Output the meal plan
                                echo '<div class="sub-content">
                                        <p>Breakfast</p>
                                        <div>'.$breakfastMeal.'</div>
                                    </div>
                                    <div class="sub-content">
                                        <p>Lunch</p>
                                        <div>'.$lunchMeal.'</div>
                                    </div>
                                    <div class="sub-content">
                                        <p>Dinner</p>
                                        <div>'.$dinnerMeal.'</div>
                                    </div>';
                            }else{
                                $message = "No information available";
                                // Output the meal plan
                                echo '<div class="sub-content">
                                        <p>Breakfast</p>
                                        <div>'.$message.'</div>
                                    </div>
                                    <div class="sub-content">
                                        <p>Lunch</p>
                                        <div>'.$message.'</div>
                                    </div>
                                    <div class="sub-content">
                                        <p>Dinner</p>
                                        <div>'.$message.'</div>
                                    </div>';
                            }
                        }else{
                            $message = "No information available";
                            // Output the meal plan
                            echo ' <div class="sub-content">
                                    <p>Breakfast</p>
                                    <div>'.$message.'</div>
                                </div>
                                <div class="sub-content">
                                    <p>Lunch</p>
                                    <div>'.$message.'</div>
                                </div>
                                <div class="sub-content">
                                    <p>Dinner</p>
                                    <div>'.$message.'</div>
                                </div>';
                        }
                        ?>
                        
                    </div>
                </div>
                <div class="row">
                    <p>Upcoming Exercises For <?php echo date("Y-m-d"); ?></p>
                    <div class="row" style = "border: 0px; margin-top:0;">
                        <?php

                            $sql8 = "SELECT * FROM serviceCharge WHERE memberID = $row1[memberID] AND serviceID in (1,2,4) AND endDate >= CURDATE() LIMIT 1";
                            $result8 = mysqli_query($conn, $sql8);

                            echo '<table> 
                            <tr  style = "background-color: #006837;"> 
                                <th> Exercise Name </th> 
                                <th> Reps </th> 
                                <th> Sets </th> 
                                <th> Rest Time </th> 
                            </tr>';

                            if (mysqli_num_rows($result8) > 0) {
                                $row8 = mysqli_fetch_assoc($result8);
                                $startDate = $row8['startDate'];
                                $empid = $row8['employeeID'];

                                $sql = "SELECT * FROM workoutplan WHERE employeeID = '$empid' AND startDate = '$startDate' AND day = $dayNumber AND memberID = $row1[memberID]";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $field2name = $row["exerciseName"];
                                        $field3name = $row["reps"];
                                        $field4name = $row["sets"];
                                        $field5name = "2 - 3 Minutes";
                            
                                        echo '<tr> 
                                            <td>'.$field2name.'</td> 
                                            <td>'.$field3name.'</td> 
                                            <td>'.$field4name.'</td> 
                                            <td>'.$field5name.'</td> 
                                        </tr>';
                                    }
                                    echo '</table>';
                                }else{
                                    echo '<tr>
                                        <td colspan="03" style="border-radius: 10px 10px 10px 10px;"> No Exercises For the Day. </td> 
                                    </tr>'; 
                                    echo '</table>';
                                }

                            }else{
                                echo '<tr>
                                    <td colspan="03" style="border-radius: 10px 10px 10px 10px;"> You have not Selected a Service Yet. </td> 
                                </tr>'; 
                                echo '</table>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>