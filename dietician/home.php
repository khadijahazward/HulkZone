<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$query = "SELECT * FROM user WHERE userID = $userID";
$result = mysqli_query($conn, $query);
if($result){
    $row = mysqli_fetch_assoc($result);
}else{
    echo '<script> window.alert("Error receiving user data!");</script>';
}

$query1 = "SELECT * FROM employee WHERE userID = $userID";
$result1 = mysqli_query($conn, $query1);

if (mysqli_num_rows($result1) == 1) {
    $row1 = mysqli_fetch_assoc($result1);
    $employeeID = $row1['employeeID'];
} else {
    echo '<script> window.alert("Error of receiving employee details!");</script>';
}

$query2 = "SELECT * FROM serviceCharge WHERE employeeID = $employeeID AND endDate > NOW()";
$result2 = mysqli_query($conn, $query2);

if (mysqli_num_rows($result2) > 0) {
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $memberID = $row2['memberID'];

        $query3 = "SELECT * FROM member WHERE memberID = $memberID";
        $result3 = mysqli_query($conn, $query3);
 
        if ($result3) {
            $row3 = mysqli_fetch_assoc($result3);
            $memberUserID = $row3['userID'];

            $query4 = "SELECT COUNT(*) as count FROM user JOIN member ON user.userID = member.userID WHERE user.userID = $memberUserID";
            $result4 = mysqli_query($conn, $query4);

            if(mysqli_num_rows($result4) > 0){
                $row4 = mysqli_fetch_assoc($result4);
                $memberCount = $row4['count'];
            }else{
                $memberCount = 0;
            }
        }
    }
}else{
    echo "hello";
}


$query5 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 1 AND employeeID = $employeeID";
$result5 = mysqli_query($conn, $query5);
$row5 = mysqli_fetch_assoc($result5);
$rate01 = $row5['count'];

$query6 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 2 AND employeeID = $employeeID";
$result6 = mysqli_query($conn, $query6);
$row6 = mysqli_fetch_assoc($result6);
$rate02 = $row6['count'];

$query7 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 3 AND employeeID = $employeeID";
$result7 = mysqli_query($conn, $query7);
$row7 = mysqli_fetch_assoc($result7);
$rate03 = $row7['count'];

$query8 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 4 AND employeeID = $employeeID";
$result8 = mysqli_query($conn, $query8);
$row8 = mysqli_fetch_assoc($result8);
$rate04 = $row8['count'];

$query9 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 5 AND employeeID = $employeeID";
$result9 = mysqli_query($conn, $query9);
$row9 = mysqli_fetch_assoc($result9);
$rate05 = $row9['count'];

$query10 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 0 AND employeeID = $employeeID";
$result10 = mysqli_query($conn, $query10);
$row10 = mysqli_fetch_assoc($result10);
$rate00 = $row10['count'];

$totalOfRates = ($rate00 * 0) + ($rate01 * 1) + ($rate02 * 2) + ($rate03 * 3) + ($rate04 * 4) + ($rate05 * 5);
$totalCountOfRates = $rate00 + $rate01 + $rate02 + $rate03 + $rate04 + $rate05;
$avarageOfRates = $totalOfRates / $totalCountOfRates;
$formattedAvarageOfRates = number_format($avarageOfRates, 2);

if($rate00 != 0 && $totalCountOfRates != 0){
    $precetageOfRate00 = $rate00 / $totalCountOfRates * 100;
}else{
    $precetageOfRate00 = 0;
}

if($rate01 != 0 && $totalCountOfRates != 0){
    $precetageOfRate01 = $rate01 / $totalCountOfRates * 100;
}else{
    $precetageOfRate01 = 0;
}

if($rate02 != 0 && $totalCountOfRates != 0){
    $precetageOfRate02 = $rate02 / $totalCountOfRates * 100;
}else{
    $precetageOfRate02 = 0;
}

if($rate03 != 0 && $totalCountOfRates != 0){
    $precetageOfRate03 = $rate03 / $totalCountOfRates * 100;
}else{
    $precetageOfRate03 = 0;
}

if($rate04 != 0 && $totalCountOfRates != 0){
    $precetageOfRate04 = $rate04 / $totalCountOfRates * 100;
}else{
    $precetageOfRate04 = 0;
}

if($rate05 != 0 && $totalCountOfRates != 0){
    $precetageOfRate05 = $rate05 / $totalCountOfRates * 100;
}else{
    $precetageOfRate05 = 0;
}

// $query11 = "SELECT * FROM dieticianappointment WHERE employeeID = $employeeID AND date = date('Y-m-d')";
// $result11 = mysqli_query($conn, $query11);

// if(!$result11){
//     echo '<script> window.alert("Error receiving dietician appointment date!");</script>';
// }

$query11 = "SELECT * FROM dieticianappointment WHERE employeeID = $employeeID AND endTime >= NOW() AND status = 1";
$result11 = mysqli_query($conn, $query11);

$query12 = "SELECT COUNT(*) as count FROM dieticianappointment WHERE employeeID = $employeeID AND NOT memberID = '0' AND endTime >= NOW() AND status = 1";
$result12 = mysqli_query($conn, $query12);

if($result12){
    $row12 = mysqli_fetch_assoc($result12);
    $appointmentCount = $row12['count'];
}else{
    // echo '<script> window.alert("Error receiving dietician appointment details!");</script>';
    // $appointmentCount = 0;
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="Viewport" content="width=device-width, initial-scale= 1.0">
    <link href="Style/home.css" rel="StyleSheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
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
                <a href="home.php" class="active"><i class="fa fa-home"></i>Home</a>
                <hr>
                <a href="members.php"><i class="fa fa-group"></i>Members</a>
                <hr>
                <a href="appointments.php"><i class="fa fa-calendar"></i>Appointments</a>
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
                <p>
                    Welcome, <?php echo $row['fName']." ".$row['lName']?>
                </p>
            </div>
            <div class="subTopic">
                <p>Have a nice day at great work</p>
            </div>
            <div class="countArea">
                <table>
                    <tr>
                        <td>
                            <a href="members.php">
                                <div class="memberCountCard">
                                    <div class="left">
                                        <p class="count"><?php echo $memberCount ?></p>
                                        <p class="cardTopic">Members</p>
                                    </div>
                                    <div class="right">
                                        <i class="material-icons">
                                            groups
                                        </i>
                                    </div>
                                </div>
                            </a>
                        </td>
                        <td>
                            <a href="appointments.php">
                                <div class="appointmentCountCard">
                                    <div class="left">
                                        <p class="count"><?php echo $appointmentCount ?></p>
                                        <p class="cardTopic">Appointments</p>
                                    </div>
                                    <div class="right">
                                        <i class="material-icons">
                                            edit_calendar
                                        </i>
                                    </div>
                                </div>
                            </a>
                        </td>
                        <td>
                            <a href="profile.php">
                                <div class="ratesCountCard">
                                    <div class="left">
                                        <p class="count"><?php echo $formattedAvarageOfRates ?>
                                        </p>
                                        <p class="cardTopic">Ratings</p>
                                    </div>
                                    <div class="right">
                                        <i class="material-icons">
                                            star
                                        </i>
                                    </div>
                                </div>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="ratingArea">
                <table class="graph">
                    <caption>
                        <p>Rating</p>
                    </caption>
                    <thead>
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Percent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="height:<?php echo $precetageOfRate05 ?>%">
                            <th scope="row">5</th>
                            <td><span><?php echo $precetageOfRate05 ?>%</span></td>
                        </tr>
                        <tr style="height:<?php echo $precetageOfRate04 ?>%">
                            <th scope="row">4</th>
                            <td><span><?php echo $precetageOfRate04 ?>%</span></td>
                        </tr>
                        <tr style="height:<?php echo $precetageOfRate03 ?>%">
                            <th scope="row">3</th>
                            <td><span><?php echo $precetageOfRate03 ?>%</span></td>
                        </tr>
                        <tr style="height:<?php echo $precetageOfRate02 ?>%">
                            <th scope="row">2</th>
                            <td><span><?php echo $precetageOfRate02 ?>%</span></td>
                        </tr>
                        <tr style="height:<?php echo $precetageOfRate01 ?>%">
                            <th scope="row">1</th>
                            <td><span><?php echo $precetageOfRate01 ?>%</span></td>
                        </tr>
                        <tr style="height:<?php echo $precetageOfRate00 ?>%">
                            <th scope="row">0</th>
                            <td><span><?php echo $precetageOfRate00 ?>%</span></td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="appointmentArea">
                <p class="topic">Recent Appointments</p>
                <a href="appointments.php">
                    <p class="seeMore">View All <i class="fa fa-angle-right"></i></p>
                </a>
                <div class="appointmentGridContainer">
                    <table>
                        <?php
                        
                        if(mysqli_num_rows($result11) > 0){
                            while($row11 = mysqli_fetch_assoc($result11)){
                                
                                $query12 = "SELECT * FROM member JOIN user ON member.userID = user.userID WHERE memberID = $memberID";
                                $result12 = mysqli_query($conn, $query12);
                                $row12 = mysqli_fetch_assoc($result12);

                                $memberPhoto = $row12['profilePhoto'];
                                $memberName = $row12['fName']." ".$row12['lName'];
                                
                                $appointmentStartDateTime = $row11['startTime'];
                                $appointmentStartTime = date("h:i a", strtotime($appointmentStartDateTime));

                                $appointmentEndDateTime = $row11['endTime'];

                                if($appointmentStartDateTime <  date('Y-m-d H:i:s') && $appointmentEndDateTime > date('Y-m-d H:i:s')){
                                    $appointmentStartDateTimeShow = 'Ongoing';
                                }else{
                                    $appointmentStartDateTimeShow = $appointmentStartTime;
                                }
                                
                                echo '
                                <tr>
                                    <td><img src="'.$memberPhoto.'"></td>
                                    <td class="name">
                                        <p>'.$memberName.'</p>
                                    </td>
                                    <td class="time">
                                        <p>'.$appointmentStartDateTimeShow.'</p>
                                    </td>
                                </tr>       
                                
                                ';
                                
                            }
                            
                        }else{
                            echo '
                            <tr>
                                <td colspan="3" class="name">
                                    <p>No appointments for today</p>
                                </td>
                            </tr>
                            ';
                        }
                        
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>