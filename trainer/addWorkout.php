<?php
require '../connect.php';
require 'script/config.php';
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

        <div class="topbar-right">
            <div class="topbar-notification">
                <span class="material-symbols-outlined">
                    notifications
                </span>
            </div>
            <img id="profile-photo-style" class="profilePic" src="<?php echo $_SESSION['profilePhoto']; ?>" alt="profile-icon">
        </div>

    </section>
    <section class="main-content-container">
        <div class="add-members-container">
            <h1>ADD WORKOUT PLAN</h1>
            <form action="http://localhost/hulkzone/trainer/script/add-workout.php" method="POST">

                <ul>
                    <li id="workout-form-top">
                        <div id="add-workout-top-div">

                            <label for="memberName">MEMBER NAME</label>
                            <select name="memberName" id="memberID">
                                <?php
                                // Get EmployeeID
                                

                                // 1 workout plan per person
                                $sql = 'SELECT u.fName, u.lName, s.serviceName, u.contactNumber, u.gender,ms.endDate,ms.startDate,m.memberID
                                FROM user u
                                JOIN member m ON m.userID = u.userID
                                JOIN servicecharge ms ON ms.memberID = m.memberID
                                JOIN service s ON ms.serviceID = s.serviceID
                                WHERE ms.employeeID =' . $employeeID . ' AND NOW() < ms.endDate 
                                AND NOT EXISTS (
                                    SELECT 1 FROM workoutplan wp WHERE wp.memberID = m.memberID
                                )';

                                $result = mysqli_query($conn, $sql); // assign the result set to a variable
                                $num_rows = mysqli_num_rows($result);

                                if ($num_rows == 0) {
                                    echo "<option> No Members to show</option>";

                                } else {
                                    $firstRow = mysqli_fetch_assoc($result); // get the first row of the result set
                                    $memberID = $firstRow['memberID'];
                                    $startDate = $firstRow['startDate'];

                                    // output the first member option with the start date attribute
                                    echo "<option value=\"$memberID\" data-start-date=\"$startDate\">$memberID - {$firstRow['fName']} {$firstRow['lName']}</option>";


                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $memberID = $row['memberID'];

                                        echo "<option value=\"{$row['memberID']}\" data-start-date=\"{$row['startDate']}\">{$row['memberID']} - {$row['fName']} {$row['lName']}</option>";
                                    }
                                }

                                ?>
                            </select>
                            <p>
                                Start Date: <input id="startDate" name="startDate" readonly value="<?php echo $startDate; ?>">
                            </p>
                            <!-- <input type="text" name="memberName" id="name" required> -->
                        </div>

                    </li>
                    <li class="details-box" id="day1-box">
                        <h3 class="day-header">
                            Day 1 - Monday
                            <input type="hidden" value="1" name="day1">
                        </h3>
                        <div class="exercise-left-side">
                            <div class="exercise_set">
                                <input type="text" name="day1_exerciseName" id="day1_exerciseName" placeholder="Exercise Name">
                                <input type="number" name="day1_reps" id="day1_reps" placeholder="Reps">
                                <input type="number" name="day1_sets" id="day1_restTime" placeholder="Number of sets">
                            </div>
                            <span class="add-btn" id="day1_add-exercise-btn">Add Exercise</span>
                        </div>
                        <div class="exercise-right-side">
                            <textarea name="day1_execise_list" id="day1_execise_list" cols="30" rows="10" readonly></textarea>
                            <span class="add-btn remove-exercise-btn" id="day1_remove-exercise-btn">Remove Last Exercise</span>
                        </div>

                    </li>
                    <li class="details-box" id="day2-box">
                        <h3 class="day-header">
                            Day 2 - Tuesday
                            <input type="hidden" value="2" name="day2">
                        </h3>
                        <div class="exercise-left-side">
                            <div class="exercise_set">
                                <input type="text" name="day2_exerciseName" id="day2_exerciseName" placeholder="Exercise Name">
                                <input type="number" name="day2_reps" id="day2_reps" placeholder="Reps">
                                <input type="number" name="day1_sets" id="day2_restTime" placeholder="Number of sets">
                            </div>
                            <span class="add-btn" id="day2_add-exercise-btn">Add Exercise</span>
                        </div>
                        <div class="exercise-right-side">
                            <textarea name="day2_execise_list" id="day2_execise_list" cols="30" rows="10" readonly></textarea>
                            <span class="add-btn remove-exercise-btn" id="day2_remove-exercise-btn">Remove Last Exercise</span>
                        </div>

                    </li>
                    <li class="details-box" id="day3-box">
                        <h3 class="day-header">
                            Day 3 - Wednesday
                            <input type="hidden" value="3" name="day3">
                        </h3>
                        <div class="exercise-left-side">
                            <div class="exercise_set">
                                <input type="text" name="day3_exerciseName" id="day3_exerciseName" placeholder="Exercise Name">
                                <input type="number" name="day3_reps" id="day3_reps" placeholder="Reps">
                                <input type="number" name="day3_sets" id="day3_restTime" placeholder="Number of sets">
                            </div>
                            <span class="add-btn" id="day3_add-exercise-btn">Add Exercise</span>
                        </div>
                        <div class="exercise-right-side">
                            <textarea name="day3_execise_list" id="day3_execise_list" cols="30" rows="10" readonly></textarea>
                            <span class="add-btn remove-exercise-btn" id="day3_remove-exercise-btn">Remove Last Exercise</span>
                        </div>

                    </li>
                    <li class="details-box" id="day4-box">
                        <h3 class="day-header">
                            Day 4 - Thursday
                            <input type="hidden" value="4" name="day4">
                        </h3>
                        <div class="exercise-left-side">
                            <div class="exercise_set">
                                <input type="text" name="day4_exerciseName" id="day4_exerciseName" placeholder="Exercise Name">
                                <input type="number" name="day4_reps" id="day4_reps" placeholder="Reps">
                                <input type="number" name="day4_sets" id="day4_restTime" placeholder="Number of sets">
                            </div>
                            <span class="add-btn" id="day4_add-exercise-btn">Add Exercise</span>
                        </div>
                        <div class="exercise-right-side">
                            <textarea name="day4_execise_list" id="day4_execise_list" cols="30" rows="10" readonly></textarea>
                            <span class="add-btn remove-exercise-btn" id="day4_remove-exercise-btn">Remove Last Exercise</span>
                        </div>

                    </li>
                    <li class="details-box" id="day5-box">
                        <h3 class="day-header">
                            Day 5 - Friday
                            <input type="hidden" value="5" name="day5">
                        </h3>
                        <div class="exercise-left-side">
                            <div class="exercise_set">
                                <input type="text" name="day5_exerciseName" id="day5_exerciseName" placeholder="Exercise Name">
                                <input type="number" name="day5_reps" id="day5_reps" placeholder="Reps">
                                <input type="number" name="day5_sets" id="day5_restTime" placeholder="Number of sets">
                            </div>
                            <span class="add-btn" id="day5_add-exercise-btn">Add Exercise</span>
                        </div>
                        <div class="exercise-right-side">
                            <textarea name="day5_execise_list" id="day5_execise_list" cols="30" rows="10" readonly></textarea>
                            <span class="add-btn remove-exercise-btn" id="day5_remove-exercise-btn">Remove Last Exercise</span>
                        </div>

                    </li>
                    <li class="details-box" id="day6-box">
                        <h3 class="day-header">
                            Day 6 - Saturday
                            <input type="hidden" value="6" name="day6">
                        </h3>
                        <div class="exercise-left-side">
                            <div class="exercise_set">
                                <input type="text" name="day6_exerciseName" id="day6_exerciseName" placeholder="Exercise Name">
                                <input type="number" name="day6_reps" id="day6_reps" placeholder="Reps">
                                <input type="number" name="day6_sets" id="day6_restTime" placeholder="Number of sets">
                            </div>
                            <span class="add-btn" id="day6_add-exercise-btn">Add Exercise</span>
                        </div>
                        <div class="exercise-right-side">
                            <textarea name="day6_execise_list" id="day6_execise_list" cols="30" rows="10" readonly></textarea>
                            <span class="add-btn remove-exercise-btn" id="day6_remove-exercise-btn">Remove Last Exercise</span>
                        </div>

                    </li>
                    <li class="details-box" id="day7-box">
                        <h3 class="day-header">
                            Day 7 - Sunday
                            <input type="hidden" value="7" name="day7">
                        </h3>
                        <div class="exercise-left-side">
                            <div class="exercise_set">
                                <input type="text" name="day7_exerciseName" id="day7_exerciseName" placeholder="Exercise Name">
                                <input type="number" name="day7_reps" id="day7_reps" placeholder="Reps">
                                <input type="number" name="day7_sets" id="day7_restTime" placeholder="Number of sets">
                            </div>
                            <span class="add-btn" id="day7_add-exercise-btn">Add Exercise</span>
                        </div>
                        <div class="exercise-right-side">
                            <textarea name="day7_execise_list" id="day7_execise_list" cols="30" rows="10" readonly></textarea>
                            <span class="add-btn remove-exercise-btn" id="day7_remove-exercise-btn">Remove Last Exercise</span>
                        </div>

                    </li>

                    <li>
                        <button id="form-submit-btn" type="submit" name="submit">Submit</button>
                    </li>
                </ul>

            </form>

        </div>

    </section>

    <script>
        // Get references to the HTML elements
        const memberSelect = document.getElementById('memberID');
        const startDateSpan = document.getElementById('startDate');

        // Add an event listener to the member select dropdown
        memberSelect.addEventListener('change', function() {
            // Get the selected member's start date value
            const selectedOption = memberSelect.options[memberSelect.selectedIndex];
            const startDateValue = selectedOption.getAttribute('data-start-date');

            // Update the Start Date span element with the new value
            startDateSpan.value = startDateValue;
        });
    </script>
</body>

</html>