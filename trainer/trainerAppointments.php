<?php
include '../connect.php';
include 'script/config.php';


if (!$_SESSION['username']) {
    header('location: http://localhost/hulkzone/');
}

$userID = $_SESSION['userID'];

//to get the employeeID
$query1 = "SELECT * FROM employee WHERE userID = $userID";
$result1 = mysqli_query($conn, $query1);

if (mysqli_num_rows($result1) == 1) {
    $row1 = mysqli_fetch_assoc($result1);
    $employeeID = $row1['employeeID'];
} else {
    echo '<script> window.alert("Error of retrieving employee details!");</script>';
}

// to get appointment details
$query2 = "SELECT * FROM trainerappointment WHERE employeeID = $employeeID AND NOT memberID = '0' AND endTime >= NOW() AND status = 1";
$result2 = mysqli_query($conn, $query2);

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
        <div class="top-search-bar">
            <span class="material-symbols-outlined">
                search
            </span>
            <input type="text" name="search" placeholder="Search...">
        </div>

        <div class="topbar-right">
            <div class="topbar-notification">
            <span class="material-symbols-outlined">
                    <?php include "notifications.php" ?>
                </span>
            </div>
            <a href="settings.php"><img id="profile-photo-style" src="<?php echo $_SESSION['profilePhoto']; ?>" alt="profile-icon"></a>
        </div>

    </section>

    <section class="main-content-container">
        <div class="members-list-container">
            <div class="member-list-top">
                <h1>Appointments</h1>
            </div>
            <button onclick="window.location.href='timeSlots.php'" class="addBtn">
                Add Time Slots
            </button>

            <div class="member-list-table">
                <table>
                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>TIME</th>
                            <th>PROFILE</th>
                            <th>MEMBER</th>
                            <th>CONTACT NUMBER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row2 = mysqli_fetch_assoc($result2)) {

                                $memberID = $row2['memberID'];

                                $query3 = "SELECT * FROM user JOIN member ON user.userID = member.userID WHERE member.memberID = $memberID";
                                $result3 = mysqli_query($conn, $query3);
                                $row3 = mysqli_fetch_assoc($result3);

                                $startTime = date('h:i A', strtotime($row2['startTime']));
                                $endTime = date('h:i A', strtotime($row2['endTime']));

                                echo "
                                <tr>
                                    <td>" . $row2['date'] . "</td>
                                    <td>" . $startTime . " - " . $endTime . "</td>
                                    <td><img src=" . $row3['profilePhoto'] . " alt='member's DP'></td>
                                    <td>" . $row3['fName'] . " " . $row3['lName'] . "</td>
                                    <td>" . $row3['contactNumber'] . "</td>
                                </tr>
                                
                                ";
                            }
                        } else {
                            echo "
                        <tr>
                            <td colspan='5'>
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


    </section>
</body>

</html>