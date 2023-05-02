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
                    notifications
                </span>
            </div>
            <img src="img/profile-icon.png" alt="profile-icon">
        </div>

    </section>

    <section class="main-content-container">
        <div class="members-list-container">
            <div class="member-list-top">
                <h1>Members List</h1>
            </div>

            <div class="member-list-table">
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>GENDER</th>
                            <th>CONTACT NUMBER</th>
                            <th>PLAN</th>
                            <th>START DATE</th>
                            <th>END DATE</th>
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

                        $sql = 'SELECT u.fName, u.lName, s.serviceName, u.contactNumber, u.gender,ms.endDate,ms.startDate,m.memberID
                        FROM user u
                        JOIN member m ON m.userID = u.userID
                        JOIN servicecharge ms ON ms.memberID = m.memberID
                        JOIN service s ON ms.serviceID = s.serviceID
                        WHERE ms.employeeID ='.$employeeID.' AND NOW() < ms.endDate ' ;

                        $res = mysqli_query($conn, $sql);

                        if ($res == TRUE) {
                            $count = mysqli_num_rows($res);

                            if ($count > 0) {


                                while ($rows = mysqli_fetch_assoc($res)) {
                                    $fName = $rows['fName'];
                                    $lName = $rows['lName'];
                                    $gender = $rows['gender'];
                                    $contact = $rows['contactNumber'];
                                    $plan = $rows['serviceName'];
                                    $startDate = $rows['startDate'];
                                    $endDate = $rows['endDate'];
                                    $memberID = $rows['memberID'];


                        ?>
                                    <tr>
                                        <td><?php echo $memberID; ?> </td>
                                        <td><?php echo $fName; ?> </td>
                                        <td><?php echo $lName; ?></td>
                                        <td><?php echo $gender; ?></td>
                                        <td><?php echo $contact; ?></td>
                                        <td><?php echo $plan; ?></td>
                                        <td><?php echo $startDate; ?></td>
                                        <td><?php echo $endDate; ?></td>
                                    </tr>
                        <?php

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