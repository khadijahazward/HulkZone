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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Hulkzone</title>
</head>

<body>
    <?php
    if (!$_SESSION['username']) {
        header('location: http://localhost/hulkzone/');
    }
    ?>

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
                <h1>Workout Plans List</h1>
                <a href="addWorkout.php">Add Plan</a>
            </div>
            <div class="member-list-table">
                <table>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>TOTAL EXERCISES</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        // Get EmployeeID
                        $userID = $_SESSION['userID'];
                        $sql = 'SELECT employee.employeeID FROM employee WHERE employee.userID= ' . $userID;
                        $res = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($res);
                        $employeeID = $row['employeeID'];


                        $sql = 'SELECT u.fName, u.lName, w.memberID, COUNT(*) AS total_exercises
                        FROM user u
                        JOIN member m ON m.userID = u.userID
                        JOIN workoutplan w ON w.memberID = m.memberID
                        WHERE w.employeeID = ' . $employeeID . ' GROUP BY w.memberID';                        

                        $res = mysqli_query($conn, $sql);
                        $num = 1;
                        if ($res == TRUE) {
                            $count = mysqli_num_rows($res);

                            if ($count > 0) {

                                while ($rows = mysqli_fetch_assoc($res)) {
                                    $memberID = $rows['memberID'];
                                    $fName = $rows['fName'];
                                    $lName = $rows['lName'];
                                    $totalExercises = $rows['total_exercises'];

                        ?>
                                    <tr>
                                        <td><?php echo $num; ?> </td>
                                        <td><?php echo $fName; ?></td>
                                        <td><?php echo $lName; ?></td>
                                        <td><?php echo $totalExercises; ?></td>
                                        <td><a id="workout-view-btn" href="http://localhost/hulkzone/trainer/viewWorkout.php?memberID=<?php echo $memberID; ?>">View</a></td>
                                    </tr>
                        <?php
                                    $num++;
                                }
                            } else {
                            }
                        }
                        ?>
                    </tbody>


                </table>
            </div>

        </div>


    </section>
</body>

</html>