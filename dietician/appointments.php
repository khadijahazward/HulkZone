<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$query1 = "SELECT * FROM employee WHERE userID = $userID";
$result1 = mysqli_query($conn, $query1);

if (mysqli_num_rows($result1) == 1) {
    $row1 = mysqli_fetch_assoc($result1);
    $employeeID = $row1['employeeID'];
} else {
    echo '<script> window.alert("Error of receiving employee details!");</script>';
}


$query2 = "SELECT * FROM dieticianappointment WHERE employeeID = $employeeID AND NOT memberID = '0'";
$result2 = mysqli_query($conn, $query2);



?>


<!DOCTYPE html>
<html>

<head>
    <title>Appointments</title>
    <meta charset="utf-8">
    <meta name="Viewport" content="width=device-width, initial-scale= 1.0">
    <link href="Style/appointments.css" rel="StyleSheet">
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
                <a href="appointments.php" class="active"><i class="fa fa-calendar"></i>Appointments</a>
                <hr>
                <a href="schedule.php"><i class="fa fa-clock-o"></i>Schedule</a>
                <hr>
                <a href="dietPlan.php"><i class="fa fa-heartbeat"></i>Diet Plans</a>
                <hr>
                <a href="chatBox.php"><i class="fa fa-comments"></i>Chat Box</a>
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
                <p>Appointments</p>
            </div>
            <div class="gridContainer">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 70px;"></th>
                            <th>DATE</th>
                            <th>TIME</th>
                            <th>PROFILE</th>
                            <th>MEMBER</th>
                            <th style="width: 250px;">CONTACT NUMBER</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        
                        if(mysqli_num_rows($result2) > 0){
                            while($row2 = mysqli_fetch_assoc($result2)){
                                
                                $memberID = $row2['memberID'];

                                $query3 = "SELECT * FROM user JOIN member ON user.userID = member.userID WHERE member.memberID = $memberID";
                                $result3 = mysqli_query($conn, $query3);
                                $row3 = mysqli_fetch_assoc($result3);

                                $startTime = date('h:i A', strtotime($row2['startTime']));
                                $endTime = date('h:i A', strtotime($row2['endTime']));
                                
                                echo "
                                <tr>
                                    <td><input type='checkbox'></td>
                                    <td>".$row2['date']."</td>
                                    <td>".$startTime." - ".$endTime."</td>
                                    <td><img src=".$row3['profilePhoto']." alt='member's DP'></td>
                                    <td>".$row3['fName']." ".$row3['lName']."</td>
                                    <td>".$row3['contactNumber']."</td>
                                </tr>
                                ";
                                
                            }
                        }else{
                            echo"
                            <tr>
                                <td colspan='6'>
                                    <p>Still you don't have any appointments</p>
                                </td>
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