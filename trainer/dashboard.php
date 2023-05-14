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

        <div class="bottom-container">
            <h2>Upcoming Classes</h2>
            <div class="bottom-cards">
                <div class="bottom-card-row">
                    <div class="card-box">
                        <img src="img/james.webp" alt="">
                        <div>
                            <p>James - Class #1</p>
                            <p>10.30AM - 11.30 AM</p>
                            <p>By Daniel Dyon
                                <span>3.5</span>
                            </p>
                        </div>

                    </div>

                    <div class="card-box">
                        <img src="img/james.webp" alt="">
                        <div>
                            <p>James - Class #1</p>
                            <p>10.30AM - 11.30 AM</p>
                            <p>By Daniel Dyon
                                <span>3.5</span>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="bottom-card-row">
                <div class="card-box">
                    <img src="img/james.webp" alt="">
                    <div>
                        <p>James - Class #1</p>
                        <p>10.30AM - 11.30 AM</p>
                        <p>By Daniel Dyon
                            <span>3.5</span>
                        </p>
                    </div>

                </div>

                <div class="card-box">
                    <img src="img/james.webp" alt="">
                    <div>
                        <p>James - Class #1</p>
                        <p>10.30AM - 11.30 AM</p>
                        <p>By Daniel Dyon
                            <span>3.5</span>
                        </p>
                    </div>

                </div>
            </div>
            <div class="bottom-card-row">
                <div class="card-box">
                    <img src="img/james.webp" alt="">
                    <div>
                        <p>James - Class #1</p>
                        <p>10.30AM - 11.30 AM</p>
                        <p>By Daniel Dyon
                            <span>3.5</span>
                        </p>
                    </div>

                </div>

                <div class="card-box">
                    <img src="img/james.webp" alt="">
                    <div>
                        <p>James - Class #1</p>
                        <p>10.30AM - 11.30 AM</p>
                        <p>By Daniel Dyon
                            <span>3.5</span>
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </section>
</body>

</html>