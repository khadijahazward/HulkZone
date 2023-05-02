<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

if (isset($_GET['date'])) {
    $monday = $_GET['date'];
}

$mondayDatetime = new DateTime($monday);
$mondayDatetime->add(new DateInterval('P1D'));

$tuesday = $mondayDatetime->format('Y-m-d');
$tuesdayDatetime = new DateTime($tuesday);
$tuesdayDatetime->add(new DateInterval('P1D'));

$wednesday = $tuesdayDatetime->format('Y-m-d');
$wednesdayDatetime = new DateTime($wednesday);
$wednesdayDatetime->add(new DateInterval('P1D'));

$thursday = $wednesdayDatetime->format('Y-m-d');
$thursdayDatetime = new DateTime($thursday);
$thursdayDatetime->add(new DateInterval('P1D'));

$friday = $thursdayDatetime->format('Y-m-d');
$fridayDatetime = new DateTime($friday);
$fridayDatetime->add(new DateInterval('P1D'));

$saturday = $fridayDatetime->format('Y-m-d');
$saturdayDatetime = new DateTime($saturday);
$saturdayDatetime->add(new DateInterval('P1D'));

$sunday = $saturdayDatetime->format('Y-m-d');

$query1 = "SELECT * FROM user JOIN employee ON user.userID = employee.userID WHERE user.userID = '$userID'";
$result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($result1) == 1) {
    $row1 = mysqli_fetch_assoc($result1);
    $employeeID = $row1['employeeID'];
} else {
    echo '<script> window.alert("Error receiving employee ID!");</script>';
}

$query2 = "SELECT * FROM dieticianappointment WHERE employeeID = $employeeID AND date = '$monday'";
$result2 = mysqli_query($conn, $query2);

$query3 = "SELECT * FROM dieticianappointment WHERE employeeID = $employeeID AND date = '$tuesday'";
$result3 = mysqli_query($conn, $query3);

$query4 = "SELECT * FROM dieticianappointment WHERE employeeID = $employeeID AND date = '$wednesday'";
$result4 = mysqli_query($conn, $query4);

$query5 = "SELECT * FROM dieticianappointment WHERE employeeID = $employeeID AND date = '$thursday'";
$result5 = mysqli_query($conn, $query5);

$query6 = "SELECT * FROM dieticianappointment WHERE employeeID = $employeeID AND date = '$friday'";
$result6 = mysqli_query($conn, $query6);

$query7 = "SELECT * FROM dieticianappointment WHERE employeeID = $employeeID AND date = '$saturday'";
$result7 = mysqli_query($conn, $query7);

$query8 = "SELECT * FROM dieticianappointment WHERE employeeID = $employeeID AND date = '$sunday'";
$result8 = mysqli_query($conn, $query8);

?>
<!DOCTYPE html>
<html>

<head>
    <title>View Schedule</title>
    <meta charset="utf-8">
    <meta name="Viewport" content="width=device-width, initial-scale= 1.0">
    <link href="Style/viewSchedule.css" rel="StyleSheet">
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
                <img src="<?php echo $profilePic ?>" alt=" my profile" class="myProfile">
            </div>
        </div>
        <div class="main">
            <div class="topic">
                <p>Selected Time Slots</p>
            </div>
            <form method="POST">
                <div class="chooseDate">
                    <label for="date">Date: </label>
                    <input type="text" name="date" id="date" value="<?php echo $monday ?>">
                </div>
                <div class=" gridContainer">
                    <table class="selected">
                        <thead>
                            <tr>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                                <th>Sunday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php

                                    if (mysqli_num_rows($result2) > 0) {
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            $startDateTime = strtotime($row2['startTime']);
                                            $startTime = date('H:i', $startDateTime);

                                            $endDateTime = strtotime($row2['endTime']);
                                            $endTime = date('H:i', $endDateTime);

                                            echo '
                                            <input type="text" name="mondayTime-slot[]" value="' . $startTime . ' - ' . $endTime . '">
                                            
                                            ';
                                        }
                                    }

                                    ?>

                                </td>
                                <td>
                                    <?php

                                    if (mysqli_num_rows($result3) > 0) {
                                        while ($row3 = mysqli_fetch_assoc($result3)) {
                                            $startDateTime = strtotime($row3['startTime']);
                                            $startTime = date('H:i', $startDateTime);

                                            $endDateTime = strtotime($row3['endTime']);
                                            $endTime = date('H:i', $endDateTime);

                                            echo '
                                                <input type="text" name="mondayTime-slot[]" value="' . $startTime . ' - ' . $endTime . '">
        
                                            ';
                                        }
                                    }

                                    ?>

                                </td>
                                <td>
                                    <?php

                                    if (mysqli_num_rows($result4) > 0) {
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $startDateTime = strtotime($row4['startTime']);
                                            $startTime = date('H:i', $startDateTime);

                                            $endDateTime = strtotime($row4['endTime']);
                                            $endTime = date('H:i', $endDateTime);

                                            echo '
                                                <input type="text" name="mondayTime-slot[]" value="' . $startTime . ' - ' . $endTime . '">
        
                                            ';
                                        }
                                    }

                                    ?>

                                </td>
                                <td>
                                    <?php

                                    if (mysqli_num_rows($result5) > 0) {
                                        while ($row5 = mysqli_fetch_assoc($result5)) {
                                            $startDateTime = strtotime($row5['startTime']);
                                            $startTime = date('H:i', $startDateTime);

                                            $endDateTime = strtotime($row5['endTime']);
                                            $endTime = date('H:i', $endDateTime);

                                            echo '
                                                <input type="text" name="mondayTime-slot[]" value="' . $startTime . ' - ' . $endTime . '">

                                            ';
                                        }
                                    }

                                    ?>

                                </td>
                                <td>
                                    <?php

                                    if (mysqli_num_rows($result6) > 0) {
                                        while ($row6 = mysqli_fetch_assoc($result6)) {
                                            $startDateTime = strtotime($row6['startTime']);
                                            $startTime = date('H:i', $startDateTime);

                                            $endDateTime = strtotime($row6['endTime']);
                                            $endTime = date('H:i', $endDateTime);

                                            echo '
                                                <input type="text" name="mondayTime-slot[]" value="' . $startTime . ' - ' . $endTime . '">

                                            ';
                                        }
                                    }

                                    ?>

                                </td>
                                <td>
                                    <?php

                                    if (mysqli_num_rows($result7) > 0) {
                                        while ($row7 = mysqli_fetch_assoc($result7)) {
                                            $startDateTime = strtotime($row7['startTime']);
                                            $startTime = date('H:i', $startDateTime);

                                            $endDateTime = strtotime($row7['endTime']);
                                            $endTime = date('H:i', $endDateTime);

                                            echo '
                                                <input type="text" name="mondayTime-slot[]" value="' . $startTime . ' - ' . $endTime . '">

                                            ';
                                        }
                                    }

                                    ?>

                                </td>
                                <td>
                                    <?php

                                    if (mysqli_num_rows($result8) > 0) {
                                        while ($row8 = mysqli_fetch_assoc($result8)) {
                                            $startDateTime = strtotime($row8['startTime']);
                                            $startTime = date('H:i', $startDateTime);

                                            $endDateTime = strtotime($row8['endTime']);
                                            $endTime = date('H:i', $endDateTime);

                                            echo '
                                                <input type="text" name="mondayTime-slot[]" value="' . $startTime . ' - ' . $endTime . '">

                                            ';
                                        }
                                    }

                                    ?>

                                </td>
                            </tr>
                    </table>
                </div>
            </form>
            <a href="schedule.php"><button class="saveBtn">Back</button></a>
        </div>
    </div>

</body>

</html>