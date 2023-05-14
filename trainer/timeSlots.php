<?php
include '../connect.php';
include 'script/config.php';

if (!$_SESSION['username']) {
    header('location: http://localhost/hulkzone/');
}

$userID = $_SESSION['userID'];

$query1 = "SELECT employeeID FROM employee INNER JOIN user ON employee.userID = user.userID WHERE user.userID = '$userID'";
$result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($result1) == 1) {
    $row = mysqli_fetch_assoc($result1);
    $employeeID = $row['employeeID'];
} else {
    echo '<script> window.alert("Error receiving employee ID!");</script>';
}

$query9 = "SELECT MAX(date) AS lastAppointmentDate FROM trainerappointment";
$result9 = mysqli_query($conn, $query9);
$row9 = mysqli_fetch_assoc($result9);

$lastAppointmentDate = $row9['lastAppointmentDate'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $monday = $_POST['date'];    

    $isValid = true;

    if (empty($monday)) {
        $isValid = false;
    } else {
        if ($monday <= $lastAppointmentDate) {
            $isValid = false;
        }

        $today = new DateTime();
        $currentWeekMonday = $today->modify('this week')->format('Y-m-d');

        if ($monday < $currentWeekMonday) {
            $isValid = false;
        }
    }

    
    if ($isValid) {
        // $is_monday = date('N', strtotime($monday)) == 1; // 1 represents Monday in the 'N' format
        
        if (date('N', strtotime($monday)) == 1) {
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

                    $mondayStartTime = new DateTime("$monday $mondayStartTimeString");
                    $mondayStartTimeString = $mondayStartTime->format('Y-m-d H:i:s');

                    $mondayEndTime = new DateTime("$monday $mondayEndTimeString");
                    $mondayEndTimeString = $mondayEndTime->format('Y-m-d H:i:s');

                    $query2 = "INSERT INTO trainerappointment 
                            (employeeID, date, startTime, endTime, status) VALUES
                            ('$employeeID', '$monday', '$mondayStartTimeString', '$mondayEndTimeString', 0)";

                    $result2 = mysqli_query($conn, $query2);

                    if (!$result2) {
                        echo '<script> window.alert("Error of entering monday time slots!");</script>';
                    }
                }
            }


            if (isset($_POST['tuesdayTime-slot'])) {
                $tuesdayTimeSlots = $_POST['tuesdayTime-slot'];

                foreach ($tuesdayTimeSlots as $tuesdayTimeSlot) {
                    $tuesdayTimes = explode("-", $tuesdayTimeSlot);
                    $tuesdayStartTimeString = $tuesdayTimes[0];
                    $tuesdayEndTimeString = $tuesdayTimes[1];

                    $tuesdayStartTime = new DateTime("$tuesday $tuesdayStartTimeString");
                    $tuesdayStartTimeString = $tuesdayStartTime->format('Y-m-d H:i:s');

                    $tuesdayEndTime = new DateTime("$tuesday $tuesdayEndTimeString");
                    $tuesdayEndTimeString = $tuesdayEndTime->format('Y-m-d H:i:s');

                    $query3 = "INSERT INTO trainerappointment 
                            (employeeID, date, startTime, endTime, status) VALUES
                            ('$employeeID', '$tuesday', '$tuesdayStartTimeString', '$tuesdayEndTimeString', 0)";

                    $result3 = mysqli_query($conn, $query3);

                    if (!$result3) {
                        echo '<script> window.alert("Error of entering tuesday time slots!");</script>';
                    }
                }
            }


            if (isset($_POST['wednesdayTime-slot'])) {
                $wednesdayTimeSlots = $_POST['wednesdayTime-slot'];

                foreach ($wednesdayTimeSlots as $wednesdayTimeSlot) {
                    $wednesdayTimes = explode("-", $wednesdayTimeSlot);
                    $wednesdayStartTimeString = $wednesdayTimes[0];
                    $wednesdayEndTimeString = $wednesdayTimes[1];

                    $wednesdayStartTime = new DateTime("$wednesday $wednesdayStartTimeString");
                    $wednesdayStartTimeString = $wednesdayStartTime->format('Y-m-d H:i:s');

                    $wednesdayEndTime = new DateTime("$wednesday $wednesdayEndTimeString");
                    $wednesdayEndTimeString = $wednesdayEndTime->format('Y-m-d H:i:s');

                    $query4 = "INSERT INTO trainerappointment 
                            (employeeID, date, startTime, endTime, status) VALUES
                            ('$employeeID', '$wednesday', '$wednesdayStartTimeString', '$wednesdayEndTimeString', 0)";

                    $result4 = mysqli_query($conn, $query4);

                    if (!$result4) {
                        echo '<script> window.alert("Error of entering wednesday time slots!");</script>';
                    }
                }
            }


            if (isset($_POST['thursdayTime-slot'])) {
                $thursdayTimeSlots = $_POST['thursdayTime-slot'];

                foreach ($thursdayTimeSlots as $thursdayTimeSlot) {
                    $thursdayTimes = explode("-", $thursdayTimeSlot);
                    $thursdayStartTimeString = $thursdayTimes[0];
                    $thursdayEndTimeString = $thursdayTimes[1];

                    $thursdayStartTime = new DateTime("$thursday $thursdayStartTimeString");
                    $thursdayStartTimeString = $thursdayStartTime->format('Y-m-d H:i:s');

                    $thursdayEndTime = new DateTime("$thursday $thursdayEndTimeString");
                    $thursdayEndTimeString = $thursdayEndTime->format('Y-m-d H:i:s');

                    $query5 = "INSERT INTO trainerappointment 
                            (employeeID, date, startTime, endTime, status) VALUES
                            ('$employeeID', '$thursday', '$thursdayStartTimeString', '$thursdayEndTimeString', 0)";

                    $result5 = mysqli_query($conn, $query5);

                    if (!$result5) {
                        echo '<script> window.alert("Error of entering thursday time slots!");</script>';
                    }
                }
            }



            if (isset($_POST['fridayTime-slot'])) {
                $fridayTimeSlots = $_POST['fridayTime-slot'];

                foreach ($fridayTimeSlots as $fridayTimeSlot) {
                    $fridayTimes = explode("-", $fridayTimeSlot);
                    $fridayStartTimeString = $fridayTimes[0];
                    $fridayEndTimeString = $fridayTimes[1];

                    $fridayStartTime = new DateTime("$friday $fridayStartTimeString");
                    $fridayStartTimeString = $fridayStartTime->format('Y-m-d H:i:s');

                    $fridayEndTime = new DateTime("$friday $fridayEndTimeString");
                    $fridayEndTimeString = $fridayEndTime->format('Y-m-d H:i:s');

                    $query6 = "INSERT INTO trainerappointment 
                            (employeeID, date, startTime, endTime, status) VALUES
                            ('$employeeID', '$friday', '$fridayStartTimeString', '$fridayEndTimeString', 0)";

                    $result6 = mysqli_query($conn, $query6);

                    if (!$result6) {
                        echo '<script> window.alert("Error of entering friday time slots!");</script>';
                    }
                }
            }


            if (isset($_POST['saturdayTime-slot'])) {
                $saturdayTimeSlots = $_POST['saturdayTime-slot'];

                foreach ($saturdayTimeSlots as $saturdayTimeSlot) {
                    $saturdayTimes = explode("-", $saturdayTimeSlot);
                    $saturdayStartTimeString = $saturdayTimes[0];
                    $saturdayEndTimeString = $saturdayTimes[1];

                    $saturdayStartTime = new DateTime("$saturday $saturdayStartTimeString");
                    $saturdayStartTimeString = $saturdayStartTime->format('Y-m-d H:i:s');

                    $saturdayEndTime = new DateTime("$saturday $saturdayEndTimeString");
                    $saturdayEndTimeString = $saturdayEndTime->format('Y-m-d H:i:s');

                    $query7 = "INSERT INTO trainerappointment 
                            (employeeID, date, startTime, endTime, status) VALUES
                            ('$employeeID', '$saturday', '$saturdayStartTimeString', '$saturdayEndTimeString', 0)";

                    $result7 = mysqli_query($conn, $query7);

                    if (!$result7) {
                        echo '<script> window.alert("Error of entering saturday time slots!");</script>';
                    }
                }
            }



            if (isset($_POST['sundayTime-slot'])) {
                $sundayTimeSlots = $_POST['sundayTime-slot'];

                foreach ($sundayTimeSlots as $sundayTimeSlot) {
                    $sundayTimes = explode("-", $sundayTimeSlot);
                    $sundayStartTimeString = $sundayTimes[0];
                    $sundayEndTimeString = $sundayTimes[1];

                    $sundayStartTime = new DateTime("$sunday $sundayStartTimeString");
                    $sundayStartTimeString = $sundayStartTime->format('Y-m-d H:i:s');

                    $sundayEndTime = new DateTime("$sunday $sundayEndTimeString");
                    $sundayEndTimeString = $sundayEndTime->format('Y-m-d H:i:s');

                    $query8 = "INSERT INTO trainerappointment 
                            (employeeID, date, startTime, endTime, status) VALUES
                            ('$employeeID', '$sunday', '$sundayStartTimeString', '$sundayEndTimeString', 0)";

                    $result8 = mysqli_query($conn, $query8);

                    if (!$result8) {
                        echo '<script> window.alert("Error of entering sunday time slots!");</script>';
                    }
                }
            }

            echo '<script> window.alert("Time slots for trainer appointments have been successfully added!");</script>';
            echo '<script> window.location.href = "viewTimeSlots.php?date= ' . $monday . '"</script>';
        } else {
            echo '<script> window.alert("Please enter monday date!");</script>';
        }
    } else {
        echo '<script> window.alert("Enter a valid date!");</script>';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/trainerAppointments.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Hulkzone</title>
</head>

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
            <a href="Settings.php"> <img src="<?php echo $_SESSION['profilePhoto']; ?>" class="profilePic" id="profile-photo-style" alt="profile-icon"> </a>
        </div>

    </section>

    <section class="main-content-container">
        <div class="members-list-container">
            <form method="post">
                <div class="member-list-top">
                    <h1>Add Time Slots</h1>
                </div>
                <div class="chooseDate">
                    <label for="date">Choose the 1st date of the Week: </label>
                    <input type="date" name="date" id="date" value="<?php echo $monday ?>" require>
                </div>
                <br>
                <br>
                <div class="member-list-table">
                    <table>
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
                                    $interval = new DateInterval('PT2H');

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
                                    $interval = new DateInterval('PT2H');

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
                                    $interval = new DateInterval('PT2H');

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
                                    $interval = new DateInterval('PT2H');

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
                                    $interval = new DateInterval('PT2H');

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
                                    $interval = new DateInterval('PT2H');

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
                                    $interval = new DateInterval('PT2H');

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
                        </tbody>
                    </table>
                </div>
                <button type="submit" name="save" class="saveBtn">Save</button>
            </form>
        </div>
    </section>
</body>

</html>