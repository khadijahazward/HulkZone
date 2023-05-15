<?php
include '../connect.php';
include 'script/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/dashboard.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Hulkzone</title>
    <script src="js/main.js" defer></script>
</head>
<?php
if (!$_SESSION['username']) {
    header('location: http://localhost/hulkzone/');
}



//Get profilePhoto URL to Session
$userID = $_SESSION['userID'];
$sql2 = "SELECT * FROM user WHERE userID=" . $userID;
$res2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($res2);
$profilePhotoURL = $row['profilePhoto'];

if($profilePhotoURL == NULL){
    $_SESSION['profilePhoto'] = "img/profile-icon.png";
}else{
    $_SESSION['profilePhoto'] = $profilePhotoURL;    
}
// Retrieve employeeid and details
$query1 = "SELECT * FROM employee WHERE userID = $userID";
$result1 = mysqli_query($conn, $query1);

if (mysqli_num_rows($result1) == 1) {
    $row1 = mysqli_fetch_assoc($result1);
    $employeeID = $row1['employeeID'];
} else {
    echo '<script> window.alert("Error of receiving employee details!");</script>';
}

//Get a count of members who gave rate as 1 after their service
$query5 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 1 AND employeeID = $employeeID AND endDate <= NOW()";
$result5 = mysqli_query($conn, $query5);
$row5 = mysqli_fetch_assoc($result5);
$rate01 = $row5['count'];

//Get a count of members who gave rate as 2 after their service
$query6 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 2 AND employeeID = $employeeID AND endDate <= NOW()";
$result6 = mysqli_query($conn, $query6);
$row6 = mysqli_fetch_assoc($result6);
$rate02 = $row6['count'];

//Get a count of members who gave rate as 3 after their service
$query7 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 3 AND employeeID = $employeeID AND endDate <= NOW()";
$result7 = mysqli_query($conn, $query7);
$row7 = mysqli_fetch_assoc($result7);
$rate03 = $row7['count'];

//Get a count of members who gave rate as 4 after their service
$query8 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 4 AND employeeID = $employeeID AND endDate <= NOW()";
$result8 = mysqli_query($conn, $query8);
$row8 = mysqli_fetch_assoc($result8);
$rate04 = $row8['count'];

//Get a count of members who gave rate as 5 after their service
$query9 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 5 AND employeeID = $employeeID AND endDate <= NOW()";
$result9 = mysqli_query($conn, $query9);
$row9 = mysqli_fetch_assoc($result9);
$rate05 = $row9['count'];

//Get a count of members who gave rate as 0 after their service
$query10 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 0 AND employeeID = $employeeID AND endDate <= NOW()";
$result10 = mysqli_query($conn, $query10);
$row10 = mysqli_fetch_assoc($result10);
$rate00 = $row10['count'];

        $totalOfRates = ($rate00 * 0) + ($rate01 * 1) + ($rate02 * 2) + ($rate03 * 3) + ($rate04 * 4) + ($rate05 * 5); // total of rates
        $totalCountOfRates = $rate00 + $rate01 + $rate02 + $rate03 + $rate04 + $rate05; //Count of rates

if($totalOfRates != 0 && $totalCountOfRates != 0){
    $averageOfRates = $totalOfRates / $totalCountOfRates;
    $formattedAverageOfRates = number_format($averageOfRates, 2);
}else{
    $averageOfRates = 0;
}

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

$query11 = "SELECT * FROM trainerappointment WHERE employeeID = $employeeID AND endTime >= NOW() AND status = 1";
$result11 = mysqli_query($conn, $query11);


?>

<body>

    <nav class="main-sidebar">
        <img src="img/gymLogo 3.png" alt="Logo">
        <div class="navbar-items">
            <ul>
                <li>
                    <a href="<?php echo HOME ?>">
                        <span class="material-symbols-outlined">
                            home
                        </span> Home
                    </a>
                </li>
                <li>
                    <a href="<?php echo WORKOUT_PLAN ?>">
                        <span class="material-symbols-outlined">
                            fitness_center
                        </span> Workout Plan
                    </a>
                </li>
                <li>
                    <a href="<?php echo MEMBERS ?>">
                        <span class="material-symbols-outlined">
                            groups
                        </span> Members
                    </a>
                </li>
                <li>
                    <a href="<?php echo TIMESLOTS ?>">
                        <span class="material-symbols-outlined">
                            alarm
                        </span> Timeslots
                    </a>
                </li>
                <li>
                    <a href="<?php echo COMPLAINTS ?>">
                        <span class="material-symbols-outlined">
                            patient_list
                        </span> Complaints
                    </a>
                </li>
                <li>
                    <a href="<?php echo SETTINGS ?>">
                        <span class="material-symbols-outlined">
                            settings
                        </span> Settings
                    </a>
                </li>
                <li id="nav-logout">
                    <a href="<?php echo LOGOUT ?>">
                        <span class="material-symbols-outlined">
                            logout
                        </span> Logout
                    </a>
                </li>

            </ul>
        </div>
    </nav>
    <section class="top-navbar">


        <div class="topbar-right">
            <div class="topbar-notification">
                <span class="material-symbols-outlined">
                    <?php include "notifications.php" ?>
                </span>
            </div>
            <a href="settings.php"><img id="profile-photo-style" class="profilePic" src="<?php echo $_SESSION['profilePhoto']; ?>" alt="profile-icon"></a>
        </div>

    </section>
    <section class="main-content-container" id="dashboard-page">

        <div class="top-container">
            <div class="top-box" id="left-top">
                <p>Today is <span id="today-day"></span></p>
                <h3 id="today-date">30 DEC 2020</h3>
            </div>
            <div class="top-box">
                <h3>Total Members</h3>
                <?php



                // Get EmployeeID
                $userID = $_SESSION['userID'];
                $sql = 'SELECT employee.employeeID FROM employee WHERE employee.userID= ' . $userID;
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($res);
                $employeeID = $row['employeeID'];

                $sql = 'SELECT u.fName, u.lName, s.serviceName, u.contactNumber, u.gender,ms.endDate,ms.startDate,m.memberID
                FROM user u
                JOIN member m ON m.userID = u.userID
                JOIN servicecharge ms ON ms.memberID = m.memberID
                JOIN service s ON ms.serviceID = s.serviceID
                WHERE ms.employeeID =' . $employeeID . ' AND NOW() < ms.endDate ';



                $result = mysqli_query($conn, $sql);
                $members_num_rows = mysqli_num_rows($result);
                ?>
                <div>
                    <span class="material-symbols-outlined">
                        assignment
                    </span>
                    <p><?php echo $members_num_rows; ?></p>
                </div>
            </div>
            <div class="top-box">
                <h3>Workout Plans</h3>
                <?php

                $sql = "SELECT u.fName, u.lName, w.memberID, COUNT(*) AS total_exercises
                FROM user u
                JOIN member m ON m.userID = u.userID
                JOIN workoutplan w ON w.memberID = m.memberID
                WHERE w.employeeID = " . $employeeID . " GROUP BY w.memberID";
                $result = mysqli_query($conn, $sql);
                $workout_num_rows = mysqli_num_rows($result);

                ?>
                <div>
                    <span class="material-symbols-outlined">
                        assignment
                    </span>
                    <p><?php echo $workout_num_rows; ?></p>
                </div>
            </div>
        </div>

        <div class="middle-container">

            <h2>Hello <?php
                        echo $_SESSION["firstName"];
                        ?> !</h2>
            <p>The only person you are destined to become is the person you decide to be.</p>
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
                <a href="trainerAppointments.php">
                    <p class="seeMore">View All <i class="fa fa-angle-right"></i></p>
                </a>
                <div class="appointmentGridContainer">
                    <table>
                        <?php
                        
                        if(mysqli_num_rows($result11) > 0){
                            while($row11 = mysqli_fetch_assoc($result11)){

                                $appointmentMemberID = $row11['memberID'];
                                
                                $query12 = "SELECT * FROM member JOIN user ON member.userID = user.userID WHERE memberID = $appointmentMemberID";
                                $result12 = mysqli_query($conn, $query12);
                                $row12 = mysqli_fetch_assoc($result12);

                                if(!empty($row12['profilePhoto'])){
                                    $memberPhoto = $row12['profilePhoto']; 
                                }else{
                                    $memberPhoto = "../asset/images/dp.png";
                                }
                                
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

    </section>
</body>

</html>