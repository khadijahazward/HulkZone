<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

if (isset($_GET['update'])) {
    $memberID = $_GET['update'];
}

$sql = "SELECT * FROM member JOIN user ON member.userID = user.userID WHERE member.memberID = $memberID";
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


$query1 = "SELECT * FROM dietplan WHERE day = 'Monday' AND employeeID = $employeeID AND memberID = $memberID";
$result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($result1) > 0) {
    $row1 = mysqli_fetch_assoc($result1);
} else {
    echo '<script> window.alert("Error of receiving Monday diet plan!");</script>';
}

$query2 = "SELECT * FROM dietplan WHERE day = 'Tuesday' AND employeeID = $employeeID AND memberID = $memberID";
$result2 = mysqli_query($conn, $query2);
if (mysqli_num_rows($result2) > 0) {
    $row2 = mysqli_fetch_assoc($result2);
} else {
    echo '<script> window.alert("Error of receiving Tuesday diet plan!");</script>';
}

$query3 = "SELECT * FROM dietplan WHERE day = 'Wednesday' AND employeeID = $employeeID AND memberID = $memberID";
$result3 = mysqli_query($conn, $query3);
if (mysqli_num_rows($result3) > 0) {
    $row3 = mysqli_fetch_assoc($result3);
} else {
    echo '<script> window.alert("Error of receiving Wednesday diet plan!");</script>';
}

$query4 = "SELECT * FROM dietplan WHERE day = 'Thursday' AND employeeID = $employeeID AND memberID = $memberID";
$result4 = mysqli_query($conn, $query4);
if (mysqli_num_rows($result4) > 0) {
    $row4 = mysqli_fetch_assoc($result4);
} else {
    echo '<script> window.alert("Error of receiving Thursday diet plan!");</script>';
}

$query5 = "SELECT * FROM dietplan WHERE day = 'Friday' AND employeeID = $employeeID AND memberID = $memberID";
$result5 = mysqli_query($conn, $query5);
if (mysqli_num_rows($result5) > 0) {
    $row5 = mysqli_fetch_assoc($result5);
} else {
    echo '<script> window.alert("Error of receiving Friday diet plan!");</script>';
}

$query6 = "SELECT * FROM dietplan WHERE day = 'Saturday' AND employeeID = $employeeID AND memberID = $memberID";
$result6 = mysqli_query($conn, $query6);
if (mysqli_num_rows($result6) > 0) {
    $row6 = mysqli_fetch_assoc($result6);
} else {
    echo '<script> window.alert("Error of receiving Saturday diet plan!");</script>';
}

$query7 = "SELECT * FROM dietplan WHERE day = 'Sunday' AND employeeID = $employeeID AND memberID = $memberID";
$result7 = mysqli_query($conn, $query7);
if (mysqli_num_rows($result7) > 0) {
    $row7 = mysqli_fetch_assoc($result7);
} else {
    echo '<script> window.alert("Error of receiving Sunday diet plan!");</script>';
}

if (isset($_POST['update'])) {

    $mondayBreakfastMeal = $_POST['mondayBreakfastMeal'];
    $mondayBreakfastQuntity = $_POST['mondayBreakfastQuntity'];
    $mondayBreakfastCalorie = $_POST['mondayBreakfastCalorie'];
    $mondayLunchMeal = $_POST['mondayLunchMeal'];
    $mondayLunchQuntity = $_POST['mondayLunchQuntity'];
    $mondayLunchCalorie = $_POST['mondayLunchCalorie'];
    $mondayDinnerMeal = $_POST['mondayDinnerMeal'];
    $mondayDinnerQuntity = $_POST['mondayDinnerQuntity'];
    $mondayDinnerCalorie = $_POST['mondayDinnerCalorie'];

    $tuesdayBreakfastMeal = $_POST['tuesdayBreakfastMeal'];
    $tuesdayBreakfastQuntity = $_POST['tuesdayBreakfastQuntity'];
    $tuesdayBreakfastCalorie = $_POST['tuesdayBreakfastCalorie'];
    $tusedayLunchMeal = $_POST['tusedayLunchMeal'];
    $tusedayLunchQuntity = $_POST['tusedayLunchQuntity'];
    $tusedayLunchCalorie = $_POST['tusedayLunchCalorie'];
    $tusedayDinnerMeal = $_POST['tusedayDinnerMeal'];
    $tusedayDinnerQuntity = $_POST['tusedayDinnerQuntity'];
    $tusedayDinnerCalorie = $_POST['tusedayDinnerCalorie'];

    $wednesdayBreakfastMeal = $_POST['wednesdayBreakfastMeal'];
    $wednesdayBreakfastQuntity = $_POST['wednesdayBreakfastQuntity'];
    $wednesdayBreakfastCalorie = $_POST['wednesdayBreakfastCalorie'];
    $wednesdayLunchMeal = $_POST['wednesdayLunchMeal'];
    $wednesdayLunchQuntity = $_POST['wednesdayLunchQuntity'];
    $wednesdayLunchCalorie = $_POST['wednesdayLunchCalorie'];
    $wednesdayDinnerMeal = $_POST['wednesdayDinnerMeal'];
    $wednesdayDinnerQuntity = $_POST['wednesdayDinnerQuntity'];
    $wednesdayDinnerCalorie = $_POST['wednesdayDinnerCalorie'];

    $thursdayBreakfastMeal = $_POST['thursdayBreakfastMeal'];
    $thursdayBreakfastQuntity = $_POST['thursdayBreakfastQuntity'];
    $thursdayBreakfastCalorie = $_POST['thursdayBreakfastCalorie'];
    $thursdayLunchMeal = $_POST['thursdayLunchMeal'];
    $thursdayLunchQuntity = $_POST['thursdayLunchQuntity'];
    $thursdayLunchCalorie = $_POST['thursdayLunchCalorie'];
    $thursdayDinnerMeal = $_POST['thursdayDinnerMeal'];
    $thursdayDinnerQuntity = $_POST['thursdayDinnerQuntity'];
    $thursdayDinnerCalorie = $_POST['thursdayDinnerCalorie'];

    $fridayBreakfastMeal = $_POST['fridayBreakfastMeal'];
    $fridayBreakfastQuntity = $_POST['fridayBreakfastQuntity'];
    $fridayBreakfastCalorie = $_POST['fridayBreakfastCalorie'];
    $fridayLunchMeal = $_POST['fridayLunchMeal'];
    $fridayLunchQuntity = $_POST['fridayLunchQuntity'];
    $fridayLunchCalorie = $_POST['fridayLunchCalorie'];
    $fridayDinnerMeal = $_POST['fridayDinnerMeal'];
    $fridayDinnerQuntity = $_POST['fridayDinnerQuntity'];
    $fridayDinnerCalorie = $_POST['fridayDinnerCalorie'];

    $saturdayBreakfastMeal = $_POST['saturdayBreakfastMeal'];
    $saturdayBreakfastQuntity = $_POST['saturdayBreakfastQuntity'];
    $saturdayBreakfastCalorie = $_POST['saturdayBreakfastCalorie'];
    $saturdayLunchMeal = $_POST['saturdayLunchMeal'];
    $saturdayLunchQuntity = $_POST['saturdayLunchQuntity'];
    $saturdayLunchCalorie = $_POST['saturdayLunchCalorie'];
    $saturdayDinnerMeal = $_POST['saturdayDinnerMeal'];
    $saturdayDinnerQuntity = $_POST['saturdayDinnerQuntity'];
    $saturdayDinnerCalorie = $_POST['saturdayDinnerCalorie'];

    $sundayBreakfastMeal = $_POST['sundayBreakfastMeal'];
    $sundayBreakfastQuntity = $_POST['sundayBreakfastQuntity'];
    $sundayBreakfastCalorie = $_POST['sundayBreakfastCalorie'];
    $sundayLunchMeal = $_POST['sundayLunchMeal'];
    $sundayLunchQuntity = $_POST['sundayLunchQuntity'];
    $sundayLunchCalorie = $_POST['sundayLunchCalorie'];
    $sundayDinnerMeal = $_POST['sundayDinnerMeal'];
    $sundayDinnerQuntity = $_POST['sundayDinnerQuntity'];
    $sundayDinnerCalorie = $_POST['sundayDinnerCalorie'];

    $sql1 = "UPDATE dietplan 
            SET breakfastMeal = '$mondayBreakfastMeal',
            breakfastQty = '$mondayBreakfastQuntity',
            breakfastCal = '$mondayBreakfastCalorie',
            lunchMeal = '$mondayLunchMeal',
            lunchQty = '$mondayLunchQuntity', 
            lunchCal = '$mondayLunchCalorie',
            dinnerMeal = '$mondayDinnerMeal',
            dinnerQty = '$mondayDinnerQuntity',
            dinnerCal = '$mondayDinnerCalorie'
            WHERE employeeID = $employeeID
            AND day = 'Monday'
            AND memberID = $memberID";

    $dietPlan1 = mysqli_query($conn, $sql1);

    if ($dietPlan1) {

        $sql2 = "UPDATE dietplan 
            SET breakfastMeal = '$tuesdayBreakfastMeal',
            breakfastQty = '$tuesdayBreakfastQuntity',
            breakfastCal = '$tuesdayBreakfastCalorie',
            lunchMeal = '$tusedayLunchMeal',
            lunchQty = '$tusedayLunchQuntity', 
            lunchCal = '$tusedayLunchCalorie',
            dinnerMeal = '$tusedayDinnerMeal',
            dinnerQty = '$tusedayDinnerQuntity',
            dinnerCal = '$tusedayDinnerCalorie'
            WHERE employeeID = $employeeID
            AND day = 'Tuesday'
            AND memberID = $memberID";

        $dietPlan2 = mysqli_query($conn, $sql2);

        if ($dietPlan2) {

            $sql3 = "UPDATE dietplan 
            SET breakfastMeal = '$wednesdayBreakfastMeal',
            breakfastQty = '$wednesdayBreakfastQuntity',
            breakfastCal = '$wednesdayBreakfastCalorie',
            lunchMeal = '$wednesdayLunchMeal',
            lunchQty = '$wednesdayLunchQuntity',
            lunchCal = '$wednesdayLunchCalorie',
            dinnerMeal = '$wednesdayDinnerMeal',
            dinnerQty = '$wednesdayDinnerQuntity',
            dinnerCal = '$wednesdayDinnerCalorie'
            WHERE employeeID = $employeeID
            AND day = 'Wednesday'
            AND memberID = $memberID";

            $dietPlan3 = mysqli_query($conn, $sql3);

            if ($dietPlan3) {

                $sql4 = "UPDATE dietplan 
            SET breakfastMeal = '$thursdayBreakfastMeal',
            breakfastQty = '$thursdayBreakfastQuntity',
            breakfastCal = '$thursdayBreakfastCalorie',
            lunchMeal = '$thursdayLunchMeal',
            lunchQty = '$thursdayLunchQuntity', 
            lunchCal = '$thursdayLunchCalorie',
            dinnerMeal = '$thursdayDinnerMeal',
            dinnerQty = '$thursdayDinnerQuntity',
            dinnerCal = '$thursdayDinnerCalorie'
            WHERE employeeID = $employeeID
            AND day = 'Thursday'
            AND memberID = $memberID";

                $dietPlan4 = mysqli_query($conn, $sql4);

                if ($dietPlan4) {
                    $sql5 = "UPDATE dietplan 
                SET breakfastMeal = '$fridayBreakfastMeal',
                breakfastQty = '$fridayBreakfastQuntity',
                breakfastCal = '$fridayBreakfastCalorie',
                lunchMeal = '$fridayLunchMeal',
                lunchQty = '$fridayLunchQuntity',
                lunchCal = '$fridayLunchCalorie',
                dinnerMeal = '$fridayDinnerMeal',
                dinnerQty = '$fridayDinnerQuntity',
                dinnerCal = '$fridayDinnerCalorie'
                WHERE employeeID = $employeeID
                AND day = 'Friday'
                AND memberID = $memberID";

                    $dietPlan5 = mysqli_query($conn, $sql5);

                    if ($dietPlan5) {
                        $sql6 = "UPDATE dietplan 
                        SET breakfastMeal = '$saturdayBreakfastMeal',
                        breakfastQty = '$saturdayBreakfastQuntity',
                        breakfastCal = '$saturdayBreakfastCalorie',
                        lunchMeal = '$saturdayLunchMeal',
                        lunchQty = '$saturdayLunchQuntity', 
                        lunchCal = '$saturdayLunchCalorie',
                        dinnerMeal = '$saturdayDinnerMeal',
                        dinnerQty = '$saturdayDinnerQuntity',
                        dinnerCal = '$saturdayDinnerCalorie'
                        WHERE employeeID = $employeeID
                        AND day = 'Saturday'
                        AND memberID = $memberID";

                        $dietPlan6 = mysqli_query($conn, $sql6);

                        if ($dietPlan6) {
                            $sql7 = "UPDATE dietplan 
                            SET breakfastMeal = '$sundayBreakfastMeal',
                            breakfastQty = '$sundayBreakfastQuntity',
                            breakfastCal = '$sundayBreakfastCalorie',
                            lunchMeal = '$sundayLunchMeal',
                            lunchQty = '$sundayLunchQuntity', 
                            lunchCal = '$sundayLunchCalorie',
                            dinnerMeal = '$sundayDinnerMeal',
                            dinnerQty = '$sundayDinnerQuntity',
                            dinnerCal = '$sundayDinnerCalorie'
                            WHERE employeeID = $employeeID
                            AND day = 'Sunday'
                            AND memberID = $memberID";

                            $dietPlan7 = mysqli_query($conn, $sql7);

                            if ($dietPlan7) {
                                // echo "<script> alert('Updated Successfully!'); window.location='updateSupplements.php?update = ".$memberID."'; </script>";
                                echo "<script> alert('Updated Successfully!'); window.location='dietPlan.php'; </script>";
                            } else {
                                echo "<script> alert('Error of updating sunday details');</script>";
                            }
                        } else {
                            echo "<script> alert('Error of updating saturday details');</script>";
                        }
                    } else {
                        echo "<script> alert('Error of updating friday details');</script>";
                    }
                } else {
                    echo "<script> alert('Error of updating thursday details');</script>";
                }
            } else {
                echo "<script> alert('Error of updating wednesday details');</script>";
            }
        } else {
            echo "<script> alert('Error of updating tuesday details');</script>";
        }
    } else {
        echo "<script> alert('Error of updating monday details');</script>";
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Diet Plan</title>
    <link href="Style/updateDietPlan.css" rel="stylesheet">
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
        <div class="topic">
            <p>DietPlan - Lina Johnson</p>
        </div>
        <form method="POST" onsubmit="">
            <div class="gridContainer">
                <div class="gridTopic"></div>
                <div class="gridTopic">Breakfast</div>
                <div class="gridTopic">Lunch</div>
                <div class="gridTopic">Dinner</div>
                <div class="gridTopic">Monday</div>


                <div class="gridText">
                    <input type="text" name="mondayBreakfastMeal" class="meal"
                        value="<?php echo $row1['breakfastMeal'] ?>">
                    <input type="text" name="mondayBreakfastQuntity" class="quntity"
                        value="<?php echo $row1['breakfastQty'] ?>">
                    <input type="text" name="mondayBreakfastCalorie" class="calorie"
                        value="<?php echo $row1['breakfastCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="mondayLunchMeal" class="meal" value="<?php echo $row1['lunchMeal'] ?>">
                    <input type="text" name="mondayLunchQuntity" class="quntity"
                        value="<?php echo $row1['lunchQty'] ?>">
                    <input type="text" name="mondayLunchCalorie" class="calorie"
                        value="<?php echo $row1['lunchCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="mondayDinnerMeal" class="meal" value="<?php echo $row1['dinnerMeal'] ?>">
                    <input type="text" name="mondayDinnerQuntity" class="quntity"
                        value="<?php echo $row1['dinnerQty'] ?>">
                    <input type="text" name="mondayDinnerCalorie" class="calorie"
                        value="<?php echo $row1['dinnerCal'] ?>">
                </div>


                <div class="gridTopic">Tuesday</div>

                <div class="gridText">
                    <input type="text" name="tuesdayBreakfastMeal" class="meal"
                        value="<?php echo $row2['breakfastMeal'] ?>">
                    <input type="text" name="tuesdayBreakfastQuntity" class="quntity"
                        value="<?php echo $row2['breakfastQty'] ?>">
                    <input type="text" name="tuesdayBreakfastCalorie" class="calorie"
                        value="<?php echo $row2['breakfastCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="tusedayLunchMeal" class="meal" value="<?php echo $row2['lunchMeal'] ?>">
                    <input type="text" name="tusedayLunchQuntity" class="quntity"
                        value="<?php echo $row2['lunchQty'] ?>">
                    <input type="text" name="tusedayLunchCalorie" class="calorie"
                        value="<?php echo $row2['lunchCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="tusedayDinnerMeal" class="meal" value="<?php echo $row2['dinnerMeal'] ?>">
                    <input type="text" name="tusedayDinnerQuntity" class="quntity"
                        value="<?php echo $row2['dinnerQty'] ?>">
                    <input type="text" name="tusedayDinnerCalorie" class="calorie"
                        value="<?php echo $row2['dinnerCal'] ?>">
                </div>


                <div class="gridTopic">Wednesday</div>

                <div class="gridText">
                    <input type="text" name="wednesdayBreakfastMeal" class="meal"
                        value="<?php echo $row3['breakfastMeal'] ?>">
                    <input type="text" name="wednesdayBreakfastQuntity" class="quntity"
                        value="<?php echo $row3['breakfastQty'] ?>">
                    <input type="text" name="wednesdayBreakfastCalorie" class="calorie"
                        value="<?php echo $row3['breakfastCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="wednesdayLunchMeal" class="meal" value="<?php echo $row3['lunchMeal'] ?>">
                    <input type="text" name="wednesdayLunchQuntity" class="quntity"
                        value="<?php echo $row3['lunchQty'] ?>">
                    <input type="text" name="wednesdayLunchCalorie" class="calorie"
                        value="<?php echo $row3['lunchCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="wednesdayDinnerMeal" class="meal"
                        value="<?php echo $row3['dinnerMeal'] ?>">
                    <input type="text" name="wednesdayDinnerQuntity" class="quntity"
                        value="<?php echo $row3['dinnerQty'] ?>">
                    <input type="text" name="wednesdayDinnerCalorie" class="calorie"
                        value="<?php echo $row3['dinnerCal'] ?>">
                </div>


                <div class="gridTopic">Thursday</div>

                <div class="gridText">
                    <input type="text" name="thursdayBreakfastMeal" class="meal"
                        value="<?php echo $row4['breakfastMeal'] ?>">
                    <input type="text" name="thursdayBreakfastQuntity" class="quntity"
                        value="<?php echo $row4['breakfastQty'] ?>">
                    <input type="text" name="thursdayBreakfastCalorie" class="calorie"
                        value="<?php echo $row4['breakfastCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="thursdayLunchMeal" class="meal" value="<?php echo $row4['lunchMeal'] ?>">
                    <input type="text" name="thursdayLunchQuntity" class="quntity"
                        value="<?php echo $row4['lunchQty'] ?>">
                    <input type="text" name="thursdayLunchCalorie" class="calorie"
                        value="<?php echo $row4['lunchCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="thursdayDinnerMeal" class="meal" value="<?php echo $row4['dinnerMeal'] ?>">
                    <input type="text" name="thursdayDinnerQuntity" class="quntity"
                        value="<?php echo $row4['dinnerQty'] ?>">
                    <input type="text" name="thursdayDinnerCalorie" class="calorie"
                        value="<?php echo $row4['dinnerCal'] ?>">
                </div>


                <div class="gridTopic">Friday</div>

                <div class="gridText">
                    <input type="text" name="fridayBreakfastMeal" class="meal"
                        value="<?php echo $row5['breakfastMeal'] ?>">
                    <input type="text" name="fridayBreakfastQuntity" class="quntity"
                        value="<?php echo $row5['breakfastQty'] ?>">
                    <input type="text" name="fridayBreakfastCalorie" class="calorie"
                        value="<?php echo $row5['breakfastCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="fridayLunchMeal" class="meal" value="<?php echo $row5['lunchMeal'] ?>">
                    <input type="text" name="fridayLunchQuntity" class="quntity"
                        value="<?php echo $row5['lunchQty'] ?>">
                    <input type="text" name="fridayLunchCalorie" class="calorie"
                        value="<?php echo $row5['lunchCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="fridayDinnerMeal" class="meal" value="<?php echo $row5['dinnerMeal'] ?>">
                    <input type="text" name="fridayDinnerQuntity" class="quntity"
                        value="<?php echo $row5['dinnerQty'] ?>">
                    <input type="text" name="fridayDinnerCalorie" class="calorie"
                        value="<?php echo $row5['dinnerCal'] ?>">
                </div>


                <div class="gridTopic">Saturday</div>

                <div class="gridText">
                    <input type="text" name="saturdayBreakfastMeal" class="meal"
                        value="<?php echo $row6['breakfastMeal'] ?>">
                    <input type="text" name="saturdayBreakfastQuntity" class="quntity"
                        value="<?php echo $row6['breakfastQty'] ?>">
                    <input type="text" name="saturdayBreakfastCalorie" class="calorie"
                        value="<?php echo $row6['breakfastCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="saturdayLunchMeal" class="meal" value="<?php echo $row6['lunchMeal'] ?>">
                    <input type="text" name="saturdayLunchQuntity" class="quntity"
                        value="<?php echo $row6['lunchQty'] ?>">
                    <input type="text" name="saturdayLunchCalorie" class="calorie"
                        value="<?php echo $row6['lunchCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="saturdayDinnerMeal" class="meal" value="<?php echo $row6['dinnerMeal'] ?>">
                    <input type="text" name="saturdayDinnerQuntity" class="quntity"
                        value="<?php echo $row6['dinnerQty'] ?>">
                    <input type="text" name="saturdayDinnerCalorie" class="calorie"
                        value="<?php echo $row6['dinnerCal'] ?>">
                </div>


                <div class="gridTopic">Sunday</div>

                <div class="gridText">
                    <input type="text" name="sundayBreakfastMeal" class="meal"
                        value="<?php echo $row7['breakfastMeal'] ?>">
                    <input type="text" name="sundayBreakfastQuntity" class="quntity"
                        value="<?php echo $row7['breakfastQty'] ?>">
                    <input type="text" name="sundayBreakfastCalorie" class="calorie"
                        value="<?php echo $row7['breakfastCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="sundayLunchMeal" class="meal" value="<?php echo $row7['lunchMeal'] ?>">
                    <input type="text" name="sundayLunchQuntity" class="quntity"
                        value="<?php echo $row7['lunchQty'] ?>">
                    <input type="text" name="sundayLunchCalorie" class="calorie"
                        value="<?php echo $row7['lunchCal'] ?>">
                </div>
                <div class="gridText">
                    <input type="text" name="sundayDinnerMeal" class="meal" value="<?php echo $row7['dinnerMeal'] ?>">
                    <input type="text" name="sundayDinnerQuntity" class="quntity"
                        value="<?php echo $row7['dinnerQty'] ?>">
                    <input type="text" name="sundayDinnerCalorie" class="calorie"
                        value="<?php echo $row7['dinnerCal'] ?>">
                </div>

                <button name="update" class="saveButton">Save</button>
            </div>
        </form>
    </div>

</body>

</html>