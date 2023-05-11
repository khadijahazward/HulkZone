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
            <img id="profile-photo-style" src="<?php echo $_SESSION['profilePhoto']; ?>" alt="profile-icon">
        </div>

    </section>
    <section class="main-content-container">
        <div class="add-members-container">
            <h1>ADD PLAN</h1>
            <form action="http://localhost/hulkzone/trainer/script/update-workout.php" method="POST">
                <?php
                $memberID = $_GET['memberID'];

                //Get member first name and last name
                $sql2 = 'SELECT m.memberID, u.fName, u.lName
                FROM member AS m
                JOIN user AS u ON m.userId = u.userId
                WHERE m.memberID =' . $memberID;
                $res2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($res2);
                $fName = $row2['fName'];
                $lName = $row2['lName'];



                // Create arrays for each day
                $exerciseList1 = array();
                $exerciseList2 = array();
                $exerciseList3 = array();
                $exerciseList4 = array();
                $exerciseList5 = array();
                $exerciseList6 = array();
                $exerciseList7 = array();
                // Get EmployeeID
                $userID = $_SESSION['userID'];
                $sql = 'SELECT employee.employeeID FROM employee WHERE employee.userID= ' . $userID;
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($res);
                $employeeID = $row['employeeID'];
                $exerciseList = '';

                $sql = 'SELECT * FROM workoutplan WHERE employeeID = ' . $employeeID . ' AND memberID =' . $memberID;
                $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                // Loop through the results
                // Loop through the results
                while ($row = mysqli_fetch_assoc($res)) {
                    $day = $row['day'];
                    $startDate =  $row['startDate'];
                    $exercise = array(
                        'exerciseName' => $row['exerciseName'],
                        'reps' => $row['reps'],
                        'sets' => $row['sets']
                    );
                    // Add exercise to the appropriate day's array
                    switch ($day) {
                        case 1:
                            $exerciseList1[] = $exercise;
                            break;
                        case 2:
                            $exerciseList2[] = $exercise;
                            break;
                        case 3:
                            $exerciseList3[] = $exercise;
                            break;
                        case 4:
                            $exerciseList4[] = $exercise;
                            break;
                        case 5:
                            $exerciseList5[] = $exercise;
                            break;
                        case 6:
                            $exerciseList6[] = $exercise;
                            break;
                        case 7:
                            $exerciseList7[] = $exercise;
                            break;
                        default:
                            // Handle unexpected day value here
                            break;
                    }
                }
                ?>
                <ul>
                    <li id="workout-form-top">
                        <div>
                            <label for="memberName">MEMBER NAME</label>
                            <input type="text" name="memberFullName" id="memberFullName" readonly value="<?php echo $fName . ' ' . $lName; ?>">
                            <input type="hidden" name="memberName" id="memberName" readonly value="<?php echo $memberID ?>">
                            <p style="margin-top: 15px;">
                                Start Date: <input id="viewStartDate" name="startDate" readonly value="<?php echo $startDate; ?>">
                            </p>
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
                                <input type="number" name="day1_sets" id="day1_restTime" placeholder="Number of Sets">
                            </div>
                            <span class="add-btn" id="day1_add-exercise-btn">Add Exercise</span>
                        </div>
                        <div class="exercise-right-side">

                            <textarea name="day1_execise_list" id="day1_execise_list" cols="30" rows="10" readonly><?php
                                                                                                                    $exerciseListString = '';

                                                                                                                    foreach ($exerciseList1 as $exercise) {
                                                                                                                        $exerciseListString .= $exercise['exerciseName'] . ', ' . $exercise['reps'] . ', ' . $exercise['sets'] ."\n";
                                                                                                                    }

                                                                                                                    echo $exerciseListString;
                                                                                                                    ?></textarea>
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
                                <input type="number" name="day1_sets" id="day2_restTime" placeholder="Number of Sets">
                            </div>
                            <span class="add-btn" id="day2_add-exercise-btn">Add Exercise</span>
                        </div>
                        <div class="exercise-right-side">
                            <textarea name="day2_execise_list" id="day2_execise_list" cols="30" rows="10" readonly><?php
                                                                                                                    $exerciseListString2 = '';

                                                                                                                    foreach ($exerciseList2 as $exercise) {
                                                                                                                        $exerciseListString2 .= $exercise['exerciseName'] . ', ' . $exercise['reps'] . ', ' . $exercise['sets'] ."\n";
                                                                                                                    }

                                                                                                                    echo $exerciseListString2;
                                                                                                                    ?></textarea>
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
                                <input type="number" name="day3_sets" id="day3_restTime" placeholder="Number of Sets">

                            </div>
                            <span class="add-btn" id="day3_add-exercise-btn">Add Exercise</span>
                        </div>
                        <div class="exercise-right-side">
                            <textarea name="day3_execise_list" id="day3_execise_list" cols="30" rows="10" readonly><?php
                                                                                                                    $exerciseListString3 = '';

                                                                                                                    foreach ($exerciseList3 as $exercise) {
                                                                                                                        $exerciseListString3 .= $exercise['exerciseName'] . ', ' . $exercise['reps'] . ', ' . $exercise['sets'] ."\n";
                                                                                                                    }

                                                                                                                    echo $exerciseListString3;
                                                                                                                    ?></textarea>
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
                                <input type="number" name="day4_sets" id="day4_restTime" placeholder="Number of Sets">
                            </div>
                            <span class="add-btn" id="day4_add-exercise-btn">Add Exercise</span>
                        </div>
                        <div class="exercise-right-side">
                            <textarea name="day4_execise_list" id="day4_execise_list" cols="30" rows="10" readonly><?php
                                                                                                                    $exerciseListString4 = '';

                                                                                                                    foreach ($exerciseList4 as $exercise) {
                                                                                                                        $exerciseListString4 .= $exercise['exerciseName'] . ', ' . $exercise['reps'] . ', ' . $exercise['sets'] ."\n";
                                                                                                                    }

                                                                                                                    echo $exerciseListString4;
                                                                                                                    ?></textarea>
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
                                <input type="number" name="day5_sets" id="day5_restTime" placeholder="Number of Sets">

                            </div>
                            <span class="add-btn" id="day5_add-exercise-btn">Add Exercise</span>
                        </div>
                        <div class="exercise-right-side">
                            <textarea name="day5_execise_list" id="day5_execise_list" cols="30" rows="10" readonly><?php
                                                                                                                    $exerciseListString5 = '';

                                                                                                                    foreach ($exerciseList5 as $exercise) {
                                                                                                                        $exerciseListString5 .= $exercise['exerciseName'] . ', ' . $exercise['reps'] . ', ' . $exercise['sets'] ."\n";
                                                                                                                    }

                                                                                                                    echo $exerciseListString5;
                                                                                                                    ?></textarea>
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
                                <input type="number" name="day6_sets" id="day6_restTime" placeholder="Number of Sets">

                            </div>
                            <span class="add-btn" id="day6_add-exercise-btn">Add Exercise</span>
                        </div>
                        <div class="exercise-right-side">
                            <textarea name="day6_execise_list" id="day6_execise_list" cols="30" rows="10" readonly><?php
                                                                                                                    $exerciseListString6 = '';

                                                                                                                    foreach ($exerciseList6 as $exercise) {
                                                                                                                        $exerciseListString6 .= $exercise['exerciseName'] . ', ' . $exercise['reps'] . ', ' . $exercise['sets'] . "\n";
                                                                                                                    }

                                                                                                                    echo $exerciseListString6;
                                                                                                                    ?></textarea>
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
                                <input type="number" name="day7_sets" id="day7_restTime" placeholder="Number of Sets">

                            </div>
                            <span class="add-btn" id="day7_add-exercise-btn">Add Exercise</span>
                        </div>
                        <div class="exercise-right-side">
                            <textarea name="day7_execise_list" id="day7_execise_list" cols="30" rows="10" readonly><?php
                                                                                                                    $exerciseListString7 = '';

                                                                                                                    foreach ($exerciseList7 as $exercise) {
                                                                                                                        $exerciseListString7 .= $exercise['exerciseName'] . ', ' . $exercise['reps'] . ', ' . $exercise['sets'] . "\n";
                                                                                                                    }

                                                                                                                    echo $exerciseListString7;
                                                                                                                    ?></textarea>
                            <span class="add-btn remove-exercise-btn" id="day7_remove-exercise-btn">Remove Last Exercise</span>
                        </div>

                    </li>

                    <li>
                        <button id="form-submit-btn" type="submit" name="submit">Update Plan</button>
                        <div class="workoutplan-delete-btn">
                            <a href="http://localhost/hulkzone/trainer/script/delete-workout.php?memberID=<?php echo $memberID; ?>" >Delete Plan</a>
                        </div>
                    </li>
                </ul>

            </form>

        </div>

    </section>
</body>

</html>