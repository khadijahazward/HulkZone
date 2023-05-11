<?php
include '../connect.php';
include 'script/config.php';

if (!$_SESSION['username']) {
    header('location: http://localhost/hulkzone/');
}

$userID = $_SESSION['userID'];

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

$query2 = "SELECT * FROM trainerappointment WHERE employeeID = $employeeID AND date = '$monday'";
$result2 = mysqli_query($conn, $query2);

$query3 = "SELECT * FROM trainerappointment WHERE employeeID = $employeeID AND date = '$tuesday'";
$result3 = mysqli_query($conn, $query3);

$query4 = "SELECT * FROM trainerappointment WHERE employeeID = $employeeID AND date = '$wednesday'";
$result4 = mysqli_query($conn, $query4);

$query5 = "SELECT * FROM trainerappointment WHERE employeeID = $employeeID AND date = '$thursday'";
$result5 = mysqli_query($conn, $query5);

$query6 = "SELECT * FROM trainerappointment WHERE employeeID = $employeeID AND date = '$friday'";
$result6 = mysqli_query($conn, $query6);

$query7 = "SELECT * FROM trainerappointment WHERE employeeID = $employeeID AND date = '$saturday'";
$result7 = mysqli_query($conn, $query7);

$query8 = "SELECT * FROM trainerappointment WHERE employeeID = $employeeID AND date = '$sunday'";
$result8 = mysqli_query($conn, $query8);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/trainerAppointments.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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
        <div class="top-search-bar">
            <span class="material-symbols-outlined">
                search
            </span>
            <input type="text" name="search" placeholder="Search...">
        </div>

        <div class="topbar-right">
            <div class="topbar-notification">
                <span class="material-symbols-outlined">
                    notifications
                </span>
            </div>
            <img src="img/profile-icon.png" alt="profile-icon">
        </div>

    </section>

    <section class="main-content-container">
        <div class="members-list-container">
            <form method="post">
                <div class="member-list-top">
                    <h1>Add Time Slots</h1>
                </div>
                <div class="chooseDate">
                    <label for="date"> 1st date of the Week: </label>
                    <input type="text" name="date" id="date" value="<?php echo $monday ?>" require>
                </div>
                <br>
                <br>
                <div class="member-list-table">
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
                                                <input type="text" name="tuesdayTime-slot[]" value="' . $startTime . ' - ' . $endTime . '">
        
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
                                                <input type="text" name="wednesdayTime-slot[]" value="' . $startTime . ' - ' . $endTime . '">
        
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
                                                <input type="text" name="thursdayTime-slot[]" value="' . $startTime . ' - ' . $endTime . '">

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
                                                <input type="text" name="fridayTime-slot[]" value="' . $startTime . ' - ' . $endTime . '">

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
                                                <input type="text" name="saturdayTime-slot[]" value="' . $startTime . ' - ' . $endTime . '">

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
                                                <input type="text" name="sundayTime-slot[]" value="' . $startTime . ' - ' . $endTime . '">

                                            ';
                                        }
                                    }

                                    ?>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
            <button onclick="window.location.href='trainerAppointments.php'" class=" saveBtn">Back</button>
        </div>
    </section>
</body>

</html>