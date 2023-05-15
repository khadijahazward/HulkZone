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


        <div class="topbar-right">
            <div class="topbar-notification">
                <span class="material-symbols-outlined">
                    <?php include "notifications.php" ?>
                </span>
            </div>
            <a href="settings.php"><img id="profile-photo-style" class="profilePic" src="<?php echo $_SESSION['profilePhoto']; ?>" alt="profile-icon"></a>
        </div>

    </section>

    <section class="main-content-container">
        <div class="members-list-container">
            <div class="member-list-top">
                <h1>Workout Plans List</h1>
                <a href="add-workout.php">Add Plan</a>
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
        //echo $employeeID;

        $sql1 = "SELECT * FROM employeeservice WHERE employeeID = " . $employeeID;
        $result1 = mysqli_query($conn, $sql1);
        $service = [];
        
        if ($result1 && mysqli_num_rows($result1) > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $serviceNum = $row1['serviceID'];
                $service[] = $serviceNum;
                
            }
        }
        
        // Display the values in the service array
        // foreach ($service as $value) {
        //     echo $value . "<br>";
        // }

        $sql2 = "SELECT * FROM servicecharge WHERE employeeID = '$employeeID' AND endDate >= NOW() AND serviceID IN (" . implode(",", $service) . ")";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2 && mysqli_num_rows($result2) > 0) {
            $num = 1; // Initialize the $num variable outside the while loop
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $endDate = $row2['endDate'];
                $startDate = $row2['startDate'];
                $memberID = $row2['memberID'];

                $sql3 = "SELECT * FROM member WHERE memberID = $memberID";
                $result3 = mysqli_query($conn, $sql3);
                $row3 = mysqli_fetch_assoc($result3);
                $userID = $row3['userID'];

                $sql4 = "SELECT fName, lName FROM user WHERE userID = $userID";
                $result4 = mysqli_query($conn, $sql4);
                $row4 = mysqli_fetch_assoc($result4);

                
                $fName = $row4['fName'];
                $lName = $row4['lName'];

                $sql5 = "SELECT COUNT(*) AS totalExercises FROM workoutplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDate'";
                $result5 = mysqli_query($conn, $sql5);
                if ($result5 && mysqli_num_rows($result5) > 0) {
                    $row5 = mysqli_fetch_assoc($result5);
                    $totalExercises = $row5['totalExercises'];
                    if($totalExercises > 0 ){
                        echo "<tr>
                        <td>" . $num . "</td>
                        <td>" . $fName . "</td>
                        <td>" . $lName . "</td>
                        <td>" . $totalExercises . "</td>
                        <td><a id='workout-view-btn' href='http://localhost/hulkzone/trainer/viewWorkout.php?memberID=" . $memberID . "'>View</a></td>
                      </tr>";
                        $num++; // Increment $num after each row is displayed
                    }
                }
            }
        } else {
           echo "<tr><td colspan = '5'>No Current Members</td></tr>";
        }
        ?>
    </tbody>
</table>

            </div>

        </div>


    </section>
</body>

</html>