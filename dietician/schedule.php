<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$query1 = "SELECT * FROM employee INNER JOIN user ON employee.userID = user.userID WHERE user.userID = '$userID'";
$result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($result1) == 1) {
    $row = mysqli_fetch_assoc($result1);
    $employeeID = $row['employeeID'];
} else {
    echo '<script> window.alert("Error receiving employee ID!");</script>';
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['date'])) {

        $monday = $_POST['date']; 
        $is_monday = (date('N', strtotime($monday)) == 1); // 1 represents Monday in the 'N' format

        if ($is_monday) {
            $monday = $_POST['date'];
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


            if (isset($_POST['mondayTime-slot'])) {
                $mondayTimeSlots = $_POST['mondayTime-slot'];
        
                foreach ($mondayTimeSlots as $mondayTimeSlot) {
                    $mondayTimes = explode("-", $mondayTimeSlot);
                    $mondayStartTimeString = $mondayTimes[0];
                    $mondayEndTimeString = $mondayTimes[1];
        
                    $mondayStartTime = strtotime($mondayStartTimeString);
                    $mondayStartTimeString = date("H:i:s", $mondayStartTime);
        
                    $mondayEndTime = strtotime($mondayEndTimeString);
                    $mondayEndTimeString = date("H:i:s", $mondayEndTime);
        
                    $query2 = "INSERT INTO dieticianappointment 
                            (employeeID, date, startTime, endTime, status) VALUES
                            ('$employeeID', '$monday', '$mondayStartTimeString', '$mondayEndTimeString', 'Pending')";
        
                    $result2 = mysqli_query($conn, $query2);
                }
            }
        
        
            if (isset($_POST['tuesdayTime-slot'])) {
                $tuesdayTimeSlots = $_POST['tuesdayTime-slot'];
        
                foreach ($tuesdayTimeSlots as $tuesdayTimeSlot) {
                    $tuesdayTimes = explode("-", $tuesdayTimeSlot);
                    $tuesdayStartTimeString = $tuesdayTimes[0];
                    $tuesdayEndTimeString = $tuesdayTimes[1];
        
                    $tuesdayStartTime = strtotime($tuesdayStartTimeString);
                    $tuesdayStartTimeString = date("H:i:s", $tuesdayStartTime);
        
                    $tuesdayEndTime = strtotime($tuesdayEndTimeString);
                    $tuesdayEndTimeString = date("H:i:s", $tuesdayEndTime);
        
                    $query3 = "INSERT INTO dieticianappointment 
                            (employeeID, date, startTime, endTime, status) VALUES
                            ('$employeeID', '$tuesday', '$tuesdayStartTimeString', '$tuesdayEndTimeString', 'Pending')";
        
                    $result3 = mysqli_query($conn, $query3);
                }
            }
        
        
            if (isset($_POST['wednesdayTime-slot'])) {
                $wednesdayTimeSlots = $_POST['wednesdayTime-slot'];
        
                foreach ($wednesdayTimeSlots as $wednesdayTimeSlot) {
                    $wednesdayTimes = explode("-", $wednesdayTimeSlot);
                    $wednesdayStartTimeString = $wednesdayTimes[0];
                    $wednesdayEndTimeString = $wednesdayTimes[1];
        
                    $wednesdayStartTime = strtotime($wednesdayStartTimeString);
                    $wednesdayStartTimeString = date("H:i:s", $wednesdayStartTime);
        
                    $wednesdayEndTime = strtotime($wednesdayEndTimeString);
                    $wednesdayEndTimeString = date("H:i:s", $wednesdayEndTime);
        
                    $query4 = "INSERT INTO dieticianappointment 
                            (employeeID, date, startTime, endTime, status) VALUES
                            ('$employeeID', '$wednesday', '$wednesdayStartTimeString', '$wednesdayEndTimeString', 'Pending')";
        
                    $result4 = mysqli_query($conn, $query4);
                }
            }
        
        
            if (isset($_POST['thursdayTime-slot'])) {
                $thursdayTimeSlots = $_POST['thursdayTime-slot'];
        
                foreach ($thursdayTimeSlots as $thursdayTimeSlot) {
                    $thursdayTimes = explode("-", $thursdayTimeSlot);
                    $thursdayStartTimeString = $thursdayTimes[0];
                    $thursdayEndTimeString = $thursdayTimes[1];
        
                    $thursdayStartTime = strtotime($thursdayStartTimeString);
                    $thursdayStartTimeString = date("H:i:s", $thursdayStartTime);
        
                    $thursdayEndTime = strtotime($thursdayEndTimeString);
                    $thursdayEndTimeString = date("H:i:s", $thursdayEndTime);
        
                    $query5 = "INSERT INTO dieticianappointment 
                            (employeeID, date, startTime, endTime, status) VALUES
                            ('$employeeID', '$thursday', '$thursdayStartTimeString', '$thursdayEndTimeString', 'Pending')";
        
                    $result5 = mysqli_query($conn, $query5);
                }
            }
        
        
            if (isset($_POST['fridayTime-slot'])) {
                $fridayTimeSlots = $_POST['fridayTime-slot'];
        
                foreach ($fridayTimeSlots as $fridayTimeSlot) {
                    $fridayTimes = explode("-", $fridayTimeSlot);
                    $fridayStartTimeString = $fridayTimes[0];
                    $fridayEndTimeString = $fridayTimes[1];
        
                    $fridayStartTime = strtotime($fridayStartTimeString);
                    $fridayStartTimeString = date("H:i:s", $fridayStartTime);
        
                    $fridayEndTime = strtotime($fridayEndTimeString);
                    $fridayEndTimeString = date("H:i:s", $fridayEndTime);
        
                    $query6 = "INSERT INTO dieticianappointment 
                            (employeeID, date, startTime, endTime, status) VALUES
                            ('$employeeID', '$friday', '$fridayStartTimeString', '$fridayEndTimeString', 'Pending')";
        
                    $result6 = mysqli_query($conn, $query6);
                }
            }
        
        
            if (isset($_POST['saturdayTime-slot'])) {
                $saturdayTimeSlots = $_POST['saturdayTime-slot'];
        
                foreach ($saturdayTimeSlots as $saturdayTimeSlot) {
                    $saturdayTimes = explode("-", $saturdayTimeSlot);
                    $saturdayStartTimeString = $saturdayTimes[0];
                    $saturdayEndTimeString = $saturdayTimes[1];
        
                    $saturdayStartTime = strtotime($saturdayStartTimeString);
                    $saturdayStartTimeString = date("H:i:s", $saturdayStartTime);
        
                    $saturdayEndTime = strtotime($saturdayEndTimeString);
                    $saturdayEndTimeString = date("H:i:s", $saturdayEndTime);
        
                    $query7 = "INSERT INTO dieticianappointment 
                            (employeeID, date, startTime, endTime, status) VALUES
                            ('$employeeID', '$saturday', '$saturdayStartTimeString', '$saturdayEndTimeString', 'Pending')";
        
                    $result7 = mysqli_query($conn, $query7);
                }
            }
        
        
            if (isset($_POST[''])) {
                $sundayTimeSlots = $_POST['sundayTime-slot'];
        
                foreach ($sundayTimeSlots as $sundayTimeSlot) {
                    $sundayTimes = explode("-", $sundayTimeSlot);
                    $sundayStartTimeString = $sundayTimes[0];
                    $sundayEndTimeString = $sundayTimes[1];
        
                    $sundayStartTime = strtotime($sundayStartTimeString);
                    $sundayStartTimeString = date("H:i:s", $sundayStartTime);
        
                    $sundayEndTime = strtotime($sundayEndTimeString);
                    $sundayEndTimeString = date("H:i:s", $sundayEndTime);
        
                    $query8 = "INSERT INTO dieticianappointment 
                            (employeeID, date, startTime, endTime, status) VALUES
                            ('$employeeID', '$sunday', '$sundayStartTimeString', '$sundayEndTimeString', 'Pending')";
        
                    $result8 = mysqli_query($conn, $query8);
                }
            }

            
        } else {
            echo '<script> window.alert("Please enter monday date!");</script>';
        }
    } else {
        echo '<script> window.alert("Enter the date!");</script>';
    }


    
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Schedule</title>
    <meta charset="utf-8">
    <meta name="Viewport" content="width=device-width, initial-scale= 1.0">
    <link href="Style/schedule.css" rel="StyleSheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="topBar">
            <div class="gymLogo"><img src="Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <img src="<?php echo $profilePic ?>" alt=" my profile" class="myProfile">
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
                <a href="schedule.php" class="active"><i class="fa fa-clock-o"></i>Schedule</a>
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
                <p>Time Slots</p>
            </div>
            <form method="POST">
                <div class="chooseDate">
                    <label for="date">Choose the 1st date of the Week: </label>
                    <input type="date" name="date" id="date" value="<?php echo $monday ?>">
                    <p class="dateError">*jhkh</p>
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

                                    $start_time = new DateTime('08:00:00');
                                    $end_time = new DateTime('22:00:00');
                                    $interval = new DateInterval('PT1H');

                                    $html = '';

                                    while ($start_time < $end_time) {
                                        $Time_slot_start = $start_time->format('H:i');
                                        $start_time->add($interval);
                                        $Time_slot_end = $start_time->format('H:i');
                                        $value = $Time_slot_start . '-' . $Time_slot_end;

                                        $html .=
                                            '<label class="checkbox-button">
                                            <input type="checkbox" name="mondayTime-slot[]" value="' . $value . '" />
                                            <span class="checkbox-button-label">' . $Time_slot_start . ' - ' . $Time_slot_end . '</span>
                                            </label>';
                                    }

                                    echo '<table><tr><td>' . $html . '</td></tr></table>';

                                    ?>
                                </td>
                                <td>
                                    <?php

                                    $start_time = new DateTime('08:00:00');
                                    $end_time = new DateTime('22:00:00');
                                    $interval = new DateInterval('PT1H');

                                    $html = '';

                                    while ($start_time < $end_time) {
                                        $Time_slot_start = $start_time->format('H:i');
                                        $start_time->add($interval);
                                        $Time_slot_end = $start_time->format('H:i');
                                        $value = $Time_slot_start . '-' . $Time_slot_end;

                                        $html .=
                                            '<label class="checkbox-button">
                                            <input type="checkbox" name="tuesdayTime-slot[]" value="' . $value . '" />
                                            <span class="checkbox-button-label">' . $Time_slot_start . ' - ' . $Time_slot_end . '</span>
                                            </label>';
                                    }

                                    echo '<table><tr><td>' . $html . '</td></tr></table>';

                                    ?>

                                </td>
                                <td>
                                    <?php

                                    $start_time = new DateTime('08:00:00');
                                    $end_time = new DateTime('22:00:00');
                                    $interval = new DateInterval('PT1H');

                                    $html = '';

                                    while ($start_time < $end_time) {
                                        $Time_slot_start = $start_time->format('H:i');
                                        $start_time->add($interval);
                                        $Time_slot_end = $start_time->format('H:i');
                                        $value = $Time_slot_start . '-' . $Time_slot_end;

                                        $html .=
                                            '<label class="checkbox-button">
                                            <input type="checkbox" name="wednesdayTime-slot[]" value="' . $value . '" />
                                            <span class="checkbox-button-label">' . $Time_slot_start . ' - ' . $Time_slot_end . '</span>
                                            </label>';
                                    }

                                    echo '<table><tr><td>' . $html . '</td></tr></table>';

                                    ?>

                                </td>
                                <td>
                                    <?php

                                    $start_time = new DateTime('08:00:00');
                                    $end_time = new DateTime('22:00:00');
                                    $interval = new DateInterval('PT1H');

                                    $html = '';

                                    while ($start_time < $end_time) {
                                        $Time_slot_start = $start_time->format('H:i');
                                        $start_time->add($interval);
                                        $Time_slot_end = $start_time->format('H:i');
                                        $value = $Time_slot_start . '-' . $Time_slot_end;

                                        $html .=
                                            '<label class="checkbox-button">
                                            <input type="checkbox" name="thursdayTime-slot[]" value="' . $value . '" />
                                            <span class="checkbox-button-label">' . $Time_slot_start . ' - ' . $Time_slot_end . '</span>
                                            </label>';
                                    }

                                    echo '<table><tr><td>' . $html . '</td></tr></table>';

                                    ?>

                                </td>
                                <td>
                                    <?php

                                    $start_time = new DateTime('08:00:00');
                                    $end_time = new DateTime('22:00:00');
                                    $interval = new DateInterval('PT1H');

                                    $html = '';

                                    while ($start_time < $end_time) {
                                        $Time_slot_start = $start_time->format('H:i');
                                        $start_time->add($interval);
                                        $Time_slot_end = $start_time->format('H:i');
                                        $value = $Time_slot_start . '-' . $Time_slot_end;

                                        $html .=
                                            '<label class="checkbox-button">
                                            <input type="checkbox" name="fridayTime-slot[]" value="' . $value . '" />
                                            <span class="checkbox-button-label">' . $Time_slot_start . ' - ' . $Time_slot_end . '</span>
                                            </label>';
                                    }

                                    echo '<table><tr><td>' . $html . '</td></tr></table>';

                                    ?>

                                </td>
                                <td>
                                    <?php

                                    $start_time = new DateTime('08:00:00');
                                    $end_time = new DateTime('22:00:00');
                                    $interval = new DateInterval('PT1H');

                                    $html = '';

                                    while ($start_time < $end_time) {
                                        $Time_slot_start = $start_time->format('H:i');
                                        $start_time->add($interval);
                                        $Time_slot_end = $start_time->format('H:i');
                                        $value = $Time_slot_start . '-' . $Time_slot_end;

                                        $html .=
                                            '<label class="checkbox-button">
                                            <input type="checkbox" name="saturdayTime-slot[]" value="' . $value . '" />
                                            <span class="checkbox-button-label">' . $Time_slot_start . ' - ' . $Time_slot_end . '</span>
                                            </label>';
                                    }

                                    echo '<table><tr><td>' . $html . '</td></tr></table>';

                                    ?>

                                </td>
                                <td>
                                    <?php

                                    $start_time = new DateTime('08:00:00');
                                    $end_time = new DateTime('22:00:00');
                                    $interval = new DateInterval('PT1H');

                                    $html = '';

                                    while ($start_time < $end_time) {
                                        $Time_slot_start = $start_time->format('H:i');
                                        $start_time->add($interval);
                                        $Time_slot_end = $start_time->format('H:i');
                                        $value = $Time_slot_start . '-' . $Time_slot_end;

                                        $html .=
                                            '<label class="checkbox-button">
                                            <input type="checkbox" name="sundayTime-slot[]" value="' . $value . '" />
                                            <span class="checkbox-button-label">' . $Time_slot_start . ' - ' . $Time_slot_end . '</span>
                                            </label>';
                                    }

                                    echo '<table><tr><td>' . $html . '</td></tr></table>';

                                    ?>

                                </td>
                            </tr>
                    </table>
                </div>
                <button name="save" class="saveBtn">Save</button>
            </form>
        </div>
    </div>

    <div id="popUp" class="popUpContent">
        <div class="popUpContainer">
            <span class="close">&times;</span>
            <img src="../Images/Ok.png" alt="Done" style="width: 50px; height: 60px; top: 40px;">
            <p>Your TimeSlots Placed Succesfully!</p>
            <button class="acceptBtn" onclick="window.location.href='../Schedule/schedule.php';">OK</button>
        </div>
    </div>

    <script>
    var popUpContent = document.getElementById('popUp');
    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        popUpContent.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == popUpContent) {
            popUpContent.style.display = "none";
        }
    }
    </script>


    </div>
    </div>
</body>

</html>