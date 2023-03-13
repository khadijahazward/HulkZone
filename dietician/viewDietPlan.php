<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

if (isset($_GET['view'])) {
    $memberID = $_GET['view'];
}

$sql = "SELECT * FROM member JOIN user ON member.userID = user.userID WHERE memberID = $memberID";
$sqlResult = mysqli_query($conn, $sql);
if (mysqli_num_rows($sqlResult) == 1) {
    $member = mysqli_fetch_assoc($sqlResult);
} else {
    echo '<script> window.alert("Error of receiving member details");</script>';
}

$query = "SELECT * FROM employee INNER JOIN user ON employee.userID = user.userID WHERE user.userID = '$userID'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $employeeID = $row['employeeID'];
} else {
    echo '<script> window.alert("Error of receiving employee ID!");</script>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Diet Plan</title>
    <link href="Style/viewDietPlan.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <img src="Images/DietPlan BG Image.png" alt="healthy food" class="backgroundImage">
        <div class="topBar">
            <div class="gymLogo"><img src="Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <img src="<?php echo $profilePic ?>" alt="my profile" class="myProfile">
            </div>
        </div>
        <?php
        echo "
        <div class='topic'>
            <p>DietPlan - " . $member['fName'] . " " . $member['lName'] . "</p>
        </div>
        "; ?>
        <form method="POST" onsubmit="">
            <div class="gridContainer">
                <div class="gridTopic"></div>
                <div class="gridTopic">Breakfast</div>
                <div class="gridTopic">Lunch</div>
                <div class="gridTopic">Dinner</div>
                <div class="gridTopic">Monday</div>

                <?php

                $query1 = "SELECT * FROM dietplan WHERE day = 'Monday' AND employeeID = $employeeID AND memberID = $memberID";
                $result1 = mysqli_query($conn, $query1);
                if (mysqli_num_rows($result1) > 0) {
                    $row1 = mysqli_fetch_assoc($result1);
                } else {
                    echo '<script> window.alert("Error of receiving Monday diet plan!");</script>';
                }

                ?>
                <div class="gridText">
                    <input type="text" name="mondayBreakfastMeal" class="meal"
                        value="<?php echo $row1['breakfastMeal'] ?>">
                    <input type="text" name="mondayBreakfastQuantity" class="quantity"
                        value="<?php echo $row1['breakfastQty'] ?>">
                    <input type="text" name="mondayBreakfastCalorie" class="calorie"
                        value="<?php echo $row1['breakfastCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="mondayLunchMeal" class="meal" value="<?php echo $row1['lunchMeal'] ?>">
                    <input type="text" name="mondayLunchQuantity" class="quantity"
                        value="<?php echo $row1['lunchQty'] ?>">
                    <input type="text" name="mondayLunchCalorie" class="calorie"
                        value="<?php echo $row1['lunchCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="mondayDinnerMeal" class="meal" value="<?php echo $row1['dinnerMeal'] ?>">
                    <input type="text" name="mondayDinnerQuantity" class="quantity"
                        value="<?php echo $row1['dinnerQty'] ?>">
                    <input type="text" name="mondayDinnerCalorie" class="calorie"
                        value="<?php echo $row1['dinnerCal'] ?>">
                </div>


                <div class="gridTopic">Tuesday</div>

                <?php

                $query2 = "SELECT * FROM dietplan WHERE day = 'Tuesday' AND employeeID = $employeeID AND memberID = $memberID";
                $result2 = mysqli_query($conn, $query2);
                if (mysqli_num_rows($result2) > 0) {
                    $row2 = mysqli_fetch_assoc($result2);
                } else {
                    echo '<script> window.alert("Error of receiving Tuesday diet plan!");</script>';
                }

                ?>

                <div class="gridText">
                    <input type="text" name="tuesdayBreakfastMeal" class="meal"
                        value="<?php echo $row2['breakfastMeal'] ?>">
                    <input type="text" name="tuesdayBreakfastQuantity" class="quantity"
                        value="<?php echo $row2['breakfastQty'] ?>">
                    <input type="text" name="tuesdayBreakfastCalorie" class="calorie"
                        value="<?php echo $row2['breakfastCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="tusedayLunchMeal" class="meal" value="<?php echo $row2['lunchMeal'] ?>">
                    <input type="text" name="tusedayLunchQuantity" class="quantity"
                        value="<?php echo $row2['lunchQty'] ?>">
                    <input type="text" name="tusedayLunchCalorie" class="calorie"
                        value="<?php echo $row2['lunchCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="tusedayDinnerMeal" class="meal" value="<?php echo $row2['dinnerMeal'] ?>">
                    <input type="text" name="tusedayDinnerQuantity" class="quantity"
                        value="<?php echo $row2['dinnerQty'] ?>">
                    <input type="text" name="tusedayDinnerCalorie" class="calorie"
                        value="<?php echo $row2['dinnerCal'] ?>">
                </div>


                <div class="gridTopic">Wednesday</div>

                <?php

                $query3 = "SELECT * FROM dietplan WHERE day = 'Wednesday' AND employeeID = $employeeID AND memberID = $memberID";
                $result3 = mysqli_query($conn, $query3);
                if (mysqli_num_rows($result3) > 0) {
                    $row3 = mysqli_fetch_assoc($result3);
                } else {
                    echo '<script> window.alert("Error of receiving Wednesday diet plan!");</script>';
                }

                ?>

                <div class="gridText">
                    <input type="text" name="wednesdayBreakfastMeal" class="meal"
                        value="<?php echo $row3['breakfastMeal'] ?>">
                    <input type="text" name="wednesdayBreakfastQuantity" class="quantity"
                        value="<?php echo $row3['breakfastQty'] ?>">
                    <input type="text" name="wednesdayBreakfastCalorie" class="calorie"
                        value="<?php echo $row3['breakfastCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="wednesdayLunchMeal" class="meal" value="<?php echo $row3['lunchMeal'] ?>">
                    <input type="text" name="wednesdayLunchQuantity" class="quantity"
                        value="<?php echo $row3['lunchQty'] ?>">
                    <input type="text" name="wednesdayLunchCalorie" class="calorie"
                        value="<?php echo $row3['lunchCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="wednesdayDinnerMeal" class="meal"
                        value="<?php echo $row3['dinnerMeal'] ?>">
                    <input type="text" name="wednesdayDinnerQuantity" class="quantity"
                        value="<?php echo $row3['dinnerQty'] ?>">
                    <input type="text" name="wednesdayDinnerCalorie" class="calorie"
                        value="<?php echo $row3['dinnerCal'] ?>">
                </div>


                <div class="gridTopic">Thursday</div>

                <?php

                $query4 = "SELECT * FROM dietplan WHERE day = 'Thursday' AND employeeID = $employeeID AND memberID = $memberID";
                $result4 = mysqli_query($conn, $query4);
                if (mysqli_num_rows($result4) > 0) {
                    $row4 = mysqli_fetch_assoc($result4);
                } else {
                    echo '<script> window.alert("Error of receiving Thursday diet plan!");</script>';
                }

                ?>

                <div class="gridText">
                    <input type="text" name="thursdayBreakfastMeal" class="meal"
                        value="<?php echo $row4['breakfastMeal'] ?>">
                    <input type="text" name="thursdayBreakfastQuantity" class="quantity"
                        value="<?php echo $row4['breakfastQty'] ?>">
                    <input type="text" name="thursdayBreakfastCalorie" class="calorie"
                        value="<?php echo $row4['breakfastCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="thursdayLunchMeal" class="meal" value="<?php echo $row4['lunchMeal'] ?>">
                    <input type="text" name="thursdayLunchQuantity" class="quantity"
                        value="<?php echo $row4['lunchQty'] ?>">
                    <input type="text" name="thursdayLunchCalorie" class="calorie"
                        value="<?php echo $row4['lunchCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="thursdayDinnerMeal" class="meal" value="<?php echo $row4['dinnerMeal'] ?>">
                    <input type="text" name="thursdayDinnerQuantity" class="quantity"
                        value="<?php echo $row4['dinnerQty'] ?>">
                    <input type="text" name="thursdayDinnerCalorie" class="calorie"
                        value="<?php echo $row4['dinnerCal'] ?>">
                </div>


                <div class="gridTopic">Friday</div>

                <?php

                $query5 = "SELECT * FROM dietplan WHERE day = 'Friday' AND employeeID = $employeeID AND memberID = $memberID";
                $result5 = mysqli_query($conn, $query5);
                if (mysqli_num_rows($result5) > 0) {
                    $row5 = mysqli_fetch_assoc($result5);
                } else {
                    echo '<script> window.alert("Error of receiving Friday diet plan!");</script>';
                }

                ?>
                <div class="gridText">
                    <input type="text" name="fridayBreakfastMeal" class="meal"
                        value="<?php echo $row5['breakfastMeal'] ?>">
                    <input type="text" name="fridayBreakfastQuantity" class="quantity"
                        value="<?php echo $row5['breakfastQty'] ?>">
                    <input type="text" name="fridayBreakfastCalorie" class="calorie"
                        value="<?php echo $row5['breakfastCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="fridayLunchMeal" class="meal" value="<?php echo $row5['lunchMeal'] ?>">
                    <input type="text" name="fridayLunchQuantity" class="quantity"
                        value="<?php echo $row5['lunchQty'] ?>">
                    <input type="text" name="fridayLunchCalorie" class="calorie"
                        value="<?php echo $row5['lunchCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="fridayDinnerMeal" class="meal" value="<?php echo $row5['dinnerMeal'] ?>">
                    <input type="text" name="fridayDinnerQuantity" class="quantity"
                        value="<?php echo $row5['dinnerQty'] ?>">
                    <input type="text" name="fridayDinnerCalorie" class="calorie"
                        value="<?php echo $row5['dinnerCal'] ?>">
                </div>


                <div class="gridTopic">Saturday</div>

                <?php

                $query6 = "SELECT * FROM dietplan WHERE day = 'Saturday' AND employeeID = $employeeID AND memberID = $memberID";
                $result6 = mysqli_query($conn, $query6);
                if (mysqli_num_rows($result6) > 0) {
                    $row6 = mysqli_fetch_assoc($result6);
                } else {
                    echo '<script> window.alert("Error of receiving Saturday diet plan!");</script>';
                }

                ?>

                <div class="gridText">
                    <input type="text" name="saturdayBreakfastMeal" class="meal"
                        value="<?php echo $row6['breakfastMeal'] ?>">
                    <input type="text" name="saturdayBreakfastQuantity" class="quantity"
                        value="<?php echo $row6['breakfastQty'] ?>">
                    <input type="text" name="saturdayBreakfastCalorie" class="calorie"
                        value="<?php echo $row6['breakfastCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="saturdayLunchMeal" class="meal" value="<?php echo $row6['lunchMeal'] ?>">
                    <input type="text" name="saturdayLunchQuantity" class="quantity"
                        value="<?php echo $row6['lunchQty'] ?>">
                    <input type="text" name="saturdayLunchCalorie" class="calorie"
                        value="<?php echo $row6['lunchCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="saturdayDinnerMeal" class="meal" value="<?php echo $row6['dinnerMeal'] ?>">
                    <input type="text" name="saturdayDinnerQuantity" class="quantity"
                        value="<?php echo $row6['dinnerQty'] ?>">
                    <input type="text" name="saturdayDinnerCalorie" class="calorie"
                        value="<?php echo $row6['dinnerCal'] ?>">
                </div>


                <div class="gridTopic">Sunday</div>

                <?php

                $query7 = "SELECT * FROM dietplan WHERE day = 'Sunday' AND employeeID = $employeeID AND memberID = $memberID";
                $result7 = mysqli_query($conn, $query7);
                if (mysqli_num_rows($result7) > 0) {
                    $row7 = mysqli_fetch_assoc($result7);
                } else {
                    echo '<script> window.alert("Error of receiving Sunday diet plan!");</script>';
                }

                ?>

                <div class="gridText">
                    <input type="text" name="sundayBreakfastMeal" class="meal"
                        value="<?php echo $row7['breakfastMeal'] ?>">
                    <input type="text" name="sundayBreakfastQuantity" class="quantity"
                        value="<?php echo $row7['breakfastQty'] ?>">
                    <input type="text" name="sundayBreakfastCalorie" class="calorie"
                        value="<?php echo $row7['breakfastCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="sundayLunchMeal" class="meal" value="<?php echo $row7['lunchMeal'] ?>">
                    <input type="text" name="sundayLunchQuantity" class="quantity"
                        value="<?php echo $row7['lunchQty'] ?>">
                    <input type="text" name="sundayLunchCalorie" class="calorie"
                        value="<?php echo $row7['lunchCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="sundayDinnerMeal" class="meal" value="<?php echo $row7['dinnerMeal'] ?>">
                    <input type="text" name="sundayDinnerQuantity" class="quantity"
                        value="<?php echo $row7['dinnerQty'] ?>">
                    <input type="text" name="sundayDinnerCalorie" class="calorie"
                        value="<?php echo $row7['dinnerCal'] ?>">
                </div>

                <!-- <div class="progress">
            <p>Progress</p>
        </div>
        <div class="progressPrecentage">
            <p> 23% Completed</p>
        </div>
        <div class="progressBar">
            <div class="progressMarker">
            </div>
        </div> -->
                <?php echo "
                    <button type='button' onclick=\"window.location.href='updateDietPlan.php?update=".$memberID."';\" class='saveButton'>Update</button>";
                ?>

            </div>
        </form>
    </div>
</body>

</html>