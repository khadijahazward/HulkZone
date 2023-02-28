<?php
require '../connect.php';
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

    <?php
    $id = $_GET['id'];

    $sql = "SELECT * FROM workoutplan WHERE workoutID=$id";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);
    $rows = mysqli_fetch_assoc($res);
    $memberName = $rows['memberName'];
    $date = $rows['date'];
    $restPeriod = $rows['restPeriod'];
    $duration = $rows['duration'];
    $contact = $rows['contact'];
    $day1 = $rows['day1'];
    $day2 = $rows['day2'];
    $day3 = $rows['day3'];
    $day4 = $rows['day4'];
    $day5 = $rows['day5'];
    $day6 = $rows['day6'];

    //Remove BR tags
    $breaks = array("<br />");
    $day1 = str_ireplace($breaks, "&#013;", $day1);
    $day2 = str_ireplace($breaks, "&#013;", $day2);
    $day3 = str_ireplace($breaks, "&#013;", $day3);
    $day4 = str_ireplace($breaks, "&#013;", $day4);
    $day5 = str_ireplace($breaks, "&#013;", $day5);
    $day6 = str_ireplace($breaks, "&#013;", $day6);

    ?>
    <section class="main-content-container">
        <div class="add-members-container">

            <div id="form-delete-btn">
                <h1>ADD PLAN</h1>
                <a href="http://localhost/hulkzone/trainer/script/delete-workout.php?id=<?php echo $id; ?>"> Delete Plan</a>
            </div>
            <form action="http://localhost/hulkzone/trainer/script/update-workout.php?id=<?php echo $id; ?>" method="POST">
                <ul>
                    <li id="workout-form-top">
                        <div>
                            <label for="memberName">MEMBER NAME</label>
                            <input type="text" name="memberName" id="name" value="<?php echo $memberName; ?>" required>
                        </div>
                        <div>
                            <label for="date">DATE</label>
                            <input type="date" name="date" id="date" value="<?php echo $date; ?>" required>
                        </div>


                    </li>
                    <li id="workout-form-top">
                        <div id="periods-box">
                            <label for="planPeriod">REST DAYS</label>
                            <div class="member-plan">
                                <input type="number" name="planPeriod" id="plan" value="<?php echo $restPeriod; ?>" required>
                                
                            </div>
                        </div>
                        <div id="periods-box">
                            <label for="duration">PLAN DURATION</label>
                            <div class="member-plan">
                                <input type="number" name="duration" id="duration" value="<?php echo $duration; ?>" required>
                                Months
                            </div>
                        </div>
                        <div >
                            <label for="memberContact">CONTACT</label>
                            <div class="member-plan">
                                <input type="number" name="memberContact" id="memberContact" value="<?php echo $contact; ?>" required>
                            </div>
                        </div>

                    </li>
                    <li class="details-box">
                        <div>
                            <label for="day1">DAY 1</label>
                            <textarea name="day1" id="details" cols="30" rows="10"><?php echo $day1; ?></textarea>
                        </div>
                        <div>
                            <label for="day2">DAY 2</label>
                            <textarea name="day2" id="details" cols="30" rows="10"><?php echo $day2; ?></textarea>
                        </div>                    </li>
                    <li class="details-box">
                        <div>
                            <label for="day3">DAY 3</label>
                            <textarea name="day3" id="details" cols="30" rows="10"><?php echo $day3; ?></textarea>
                        </div>
                        <div>
                            <label for="day4">DAY 4</label>
                            <textarea name="day4" id="details" cols="30" rows="10"><?php echo $day4; ?></textarea>
                        </div>
                    </li>
                    <li class="details-box">
                        <div>
                            <label for="day5">DAY 5</label>
                            <textarea name="day5" id="details" cols="30" rows="10"><?php echo $day5; ?></textarea>
                        </div>
                        <div>
                            <label for="day6">DAY 6</label>
                            <textarea name="day6" id="details" cols="30" rows="10"><?php echo $day6; ?></textarea>
                        </div>
                    </li>
                    <li>


                    </li>
                    <li>
                        <button id="form-submit-btn" type="submit" name="submit"> Update </button>

                    </li>
                </ul>

            </form>

        </div>

    </section>
</body>

</html>