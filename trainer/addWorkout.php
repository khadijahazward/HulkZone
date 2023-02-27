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
    <script src="js/main.js" defer></script>
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
        <div class="add-members-container">
            <h1>ADD PLAN</h1>
            <form action="http://localhost/hulkzone/trainer/script/add-workout.php" method="POST">

                <ul>
                    <li id="workout-form-top">
                        <div>
                            <label for="memberName">MEMBER NAME</label>
                            <input type="text" name="memberName" id="name" required>
                        </div>
                        <div>
                            <label for="date">DATE</label>
                            <input type="date" name="date" id="date" required>
                        </div>


                    </li>
                    <li id="workout-form-top">
                        <div id="periods-box">
                            <label for="planPeriod">REST DAYS</label>
                            <div class="member-plan">
                                <input type="number" name="planPeriod" id="plan" required>
                                
                            </div>
                        </div>
                        <div id="periods-box">
                            <label for="duration">PLAN DURATION</label>
                            <div class="member-plan">
                                <input type="number" name="duration" id="duration" required>
                                Months
                            </div>
                        </div>
                        <div>
                            <label for="memberContact">CONTACT</label>
                            <div class="member-plan">
                                <input type="number" name="memberContact" id="memberContact" value="<?php echo $duration; ?>" required>
                            </div>
                        </div>

                    </li>
                    <li class="details-box">
                        <div>
                            <label for="day1">DAY 1</label>
                            <textarea name="day1" id="details" cols="30" rows="10"></textarea>
                        </div>
                        <div>
                            <label for="day2">DAY 2</label>
                            <textarea name="day2" id="details" cols="30" rows="10"></textarea>
                        </div>
                        <span class="add-btn" id="add-day-btn1">Add<br>Days</span>
                    </li>
                    <li class="details-box" style="display: none;" id="hiddenDaysBox1">
                        <div>
                            <label for="day3">DAY 3</label>
                            <textarea name="day3" id="details" cols="30" rows="10"></textarea>
                        </div>
                        <div>
                            <label for="day4">DAY 4</label>
                            <textarea name="day4" id="details" cols="30" rows="10"></textarea>
                        </div>
                        <span class="add-btn" id="add-day-btn2">Add<br>Days</span>
                    </li>
                    <li class="details-box" style="display: none;" id="hiddenDaysBox2">
                        <div>
                            <label for="day5">DAY 5</label>
                            <textarea name="day5" id="details" cols="30" rows="10"></textarea>
                        </div>
                        <div>
                            <label for="day6">DAY 6</label>
                            <textarea name="day6" id="details" cols="30" rows="10"></textarea>
                        </div>
                    </li>
                    <li>


                    </li>
                    <li>
                        <button id="form-submit-btn" type="submit" name="submit">Submit</button>
                    </li>
                </ul>

            </form>

        </div>

    </section>
</body>

</html>