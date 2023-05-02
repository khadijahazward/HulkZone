<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';


$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$query1 = "SELECT * FROM employee WHERE userID = $userID";
$result1 = mysqli_query($conn, $query1);

if(!$result1){
    echo '<script> window.alert("Error receiving employee details!");</script>';
}else{
    $row1 = mysqli_fetch_assoc($result1);
    $employeeID = $row1['employeeID'];
}

$query2 = "SELECT * FROM servicecharge WHERE employeeID = $employeeID AND  endDate >= NOW()";
$result2 = mysqli_query($conn, $query2);

if(!$result2){
    echo '<script> window.alert("Error receiving contact list!");</script>';
}


?>


<!DOCTYPE html>
<html>

<head>
    <title>Chat Box</title>
    <meta charset="utf-8">
    <meta name="Viewport" content="width=device-width, initial-scale= 1.0">
    <link href="Style/chatBox.css" rel="StyleSheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class="container">
        <div class="topBar">
            <div class="gymLogo"><img src="Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <div class="notification">
                    <?php
                        include 'notifications.php'; 
                    ?>
                </div>
                <img src="<?php echo $profilePic ?>" alt="my profile" class="myProfile">
            </div>
        </div>
        <div class="leftBar">
            <div class="leftBarContent">
                <hr>
                <a href="home.php"><i class="fa fa-home"></i>Home</a>
                <hr>
                <a href="members.php"><i class="fa fa-group"></i>Members</a>
                <hr>
                <a href="appointments.php"><i class="fa fa-calendar"></i>Appointments</a>
                <hr>
                <a href="schedule.php"><i class="fa fa-clock-o"></i>Schedule</a>
                <hr>
                <a href="dietPlan.php"><i class="fa fa-heartbeat"></i>Diet Plans</a>
                <hr>
                <a href="chatBox.php" class="active"><i class="fa fa-comments"></i>Chat Box</a>
                <hr>
                <a href="profile.php"><i class="fa fa-user"></i>My Profile</a>
                <hr>
                <a href="complaint.php"><i class="fa fa-cog"></i>Complaints</a>
                <hr>
                <a href="../home/logout.php"><i class="fa fa-sign-out"></i>Log out</a>
                <hr>
            </div>
        </div>
        <div class="main">
            <div class="topic">
                <p>Chat</p>
            </div>
            <div class="gridContainer">
                <table>
                    <tbody>
                        <?php
                        
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                $memberID = $row2['memberID'];

                                $query3 = "SELECT * FROM member WHERE memberID = $memberID";
                                $result3 = mysqli_query($conn, $query3);

                                if ($result3) {
                                    $row3 = mysqli_fetch_assoc($result3);
                                    $memberUserID = $row3['userID'];

                                    $query4 = "SELECT * FROM user JOIN member ON user.userID = member.userID WHERE user.userID = $memberUserID";
                                    $result4 = mysqli_query($conn, $query4);

                                    $query5 = "SELECT * FROM servicecharge WHERE memberID = $memberID";
                                    $result5 = mysqli_query($conn, $query5);
                                    $row5 = mysqli_fetch_assoc($result5);
                                    $expiredON = date('Y-m-d', strtotime($row5['endDate']));

                                    if (mysqli_num_rows($result4) > 0) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {

                                            $memberFName = $row4['fName'];
                                            $memberLName = $row4['lName'];
                                            $memberProfilePic = $row4['profilePhoto'];

                                            $query6 = "SELECT * FROM chat WHERE senderID = $memberUserID AND receiverID = $userID ORDER BY dateTime DESC";
                                            $result6 = mysqli_query($conn, $query6);

                                            if(mysqli_num_rows($result6) == 0){
                                                $message = "";
                                            }else{
                                                $row6 = mysqli_fetch_assoc($result6);
                                                $message = $row6['message'];   
                                            }

                                            $query7 = "SELECT COUNT(*) as count FROM chat WHERE senderID = $memberUserID AND receiverID = $userID AND status = 1";
                                            $result7 = mysqli_query($conn, $query7);

                                            $row7 = mysqli_fetch_assoc($result7);
                                            $unReadMsg = $row7['count'];

                                            if($unReadMsg != 0){
                                                $unReadMsg = $row7['count'];
                                            }else{
                                                $unReadMsg = 0;
                                            }

                                            echo "<tr>
                                                <td>" . $memberID . "</td>
                                                <td><img src=" . $memberProfilePic . " alt='member's DP'></td>
                                                <td class='name'>" . $memberFName . " " . $memberLName . "</td>
                                                <td colspan='3' class='message'>" . $message . "</td>
                                                <td><div class='unreadMsg'>" . $unReadMsg . "</div></td>
                                                <td><a href='messageHistory.php?memberuserID=" . $memberUserID . "'><button class='view'>View More</button></a></td>
                                            </tr>";
                                        }
                                    }
                                }
                            }
                        }else{
                            echo "
                            <tr>
                                <td colspan='7'>Still you don't have members</td>
                            </tr>
                        ";
                        }


                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>