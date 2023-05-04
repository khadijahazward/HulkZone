<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

if (isset($_GET['view'])) {
    $memberID = $_GET['view'];
}

$query1 = "SELECT * FROM member JOIN user ON member.userID = user.userID WHERE memberID = '$memberID'";
$result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($result1) == 1) {
    $member = mysqli_fetch_assoc($result1);
} else {
    echo '<script> window.alert("Error of receiving member details");</script>';
}

$query2 = "SELECT * FROM employee INNER JOIN user ON employee.userID = user.userID WHERE user.userID = '$userID'";
$result2 = mysqli_query($conn, $query2);
if (mysqli_num_rows($result2) == 1) {
    $row2 = mysqli_fetch_assoc($result2);
    $employeeID = $row2['employeeID'];
} else {
    echo '<script> window.alert("Error of receiving employee ID!");</script>';
}

$query3 = "SELECT * FROM servicecharge WHERE memberID = $memberID AND employeeID = $employeeID ORDER BY startDate DESC LIMIT 1;" ;
$result3 = mysqli_query($conn, $query3);
$row3 = mysqli_fetch_assoc($result3);

$startDateTime = $row3['startDate']; 

$query4 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 1";
$result4 = mysqli_query($conn, $query4);
if(mysqli_num_rows($result4) == 1){
    $row4 = mysqli_fetch_assoc($result4);

    $mondayBreakfastMeal = $row4['breakfastMeal'];
    $mondayBreakfastQuantity = $row4['breakfastQty'];
    $mondayBreakfastCalorie = $row4['breakfastCal'];

    $mondayLunchMeal = $row4['lunchMeal'];
    $mondayLunchQuantity = $row4['lunchQty'];
    $mondayLunchCalorie = $row4['lunchCal'];

    $mondayDinnerMeal = $row4['dinnerMeal'];
    $mondayDinnerQuantity = $row4['dinnerQty'];
    $mondayDinnerCalorie = $row4['dinnerCal'];
    
}else{
    echo '<script> window.alert("Error of retieving monday dietplan data!");</script>';
}

$query5 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 2";
$result5 = mysqli_query($conn, $query5);
if(mysqli_num_rows($result5) == 1){
    $row5 = mysqli_fetch_assoc($result5);

    $tuesdayBreakfastMeal = $row5['breakfastMeal'];
    $tuesdayBreakfastQuantity = $row5['breakfastQty'];
    $tuesdayBreakfastCalorie = $row5['breakfastCal'];

    $tuesdayLunchMeal = $row5['lunchMeal'];
    $tuesdayLunchQuantity = $row5['lunchQty'];
    $tuesdayLunchCalorie = $row5['lunchCal'];

    $tuesdayDinnerMeal = $row5['dinnerMeal'];
    $tuesdayDinnerQuantity = $row5['dinnerQty'];
    $tuesdayDinnerCalorie = $row5['dinnerCal'];
    
}else{
    echo '<script> window.alert("Error of retieving tuesday dietplan data!");</script>';
}

$query6 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 3";
$result6 = mysqli_query($conn, $query6);
if(mysqli_num_rows($result6) == 1){
    $row6 = mysqli_fetch_assoc($result6);

    $wednesdayBreakfastMeal = $row6['breakfastMeal'];
    $wednesdayBreakfastQuantity = $row6['breakfastQty'];
    $wednesdayBreakfastCalorie = $row6['breakfastCal'];

    $wednesdayLunchMeal = $row6['lunchMeal'];
    $wednesdayLunchQuantity = $row6['lunchQty'];
    $wednesdayLunchCalorie = $row6['lunchCal'];

    $wednesdayDinnerMeal = $row6['dinnerMeal'];
    $wednesdayDinnerQuantity = $row6['dinnerQty'];
    $wednesdayDinnerCalorie = $row6['dinnerCal'];
    
}else{
    echo '<script> window.alert("Error of retieving wednesday dietplan data!");</script>';
}

$query7 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 4";
$result7 = mysqli_query($conn, $query7);
if(mysqli_num_rows($result7) == 1){
    $row7 = mysqli_fetch_assoc($result7);

    $thursdayBreakfastMeal = $row7['breakfastMeal'];
    $thursdayBreakfastQuantity = $row7['breakfastQty'];
    $thursdayBreakfastCalorie = $row7['breakfastCal'];

    $thursdayLunchMeal = $row7['lunchMeal'];
    $thursdayLunchQuantity = $row7['lunchQty'];
    $thursdayLunchCalorie = $row7['lunchCal'];

    $thursdayDinnerMeal = $row7['dinnerMeal'];
    $thursdayDinnerQuantity = $row7['dinnerQty'];
    $thursdayDinnerCalorie = $row7['dinnerCal'];
    
}else{
    echo '<script> window.alert("Error of retieving thursday dietplan data!");</script>';
}

$query8 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 5";
$result8 = mysqli_query($conn, $query8);
if(mysqli_num_rows($result8) == 1){
    $row8 = mysqli_fetch_assoc($result8);

    $fridayBreakfastMeal = $row8['breakfastMeal'];
    $fridayBreakfastQuantity = $row8['breakfastQty'];
    $fridayBreakfastCalorie = $row8['breakfastCal'];

    $fridayLunchMeal = $row8['lunchMeal'];
    $fridayLunchQuantity = $row8['lunchQty'];
    $fridayLunchCalorie = $row8['lunchCal'];

    $fridayDinnerMeal = $row8['dinnerMeal'];
    $fridayDinnerQuantity = $row8['dinnerQty'];
    $fridayDinnerCalorie = $row8['dinnerCal'];
    
}else{
    echo '<script> window.alert("Error of retieving friday dietplan data!");</script>';
}

$query9 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 6";
$result9 = mysqli_query($conn, $query9);
if(mysqli_num_rows($result9) == 1){
    $row9 = mysqli_fetch_assoc($result9);

    $saturdayBreakfastMeal = $row9['breakfastMeal'];
    $saturdayBreakfastQuantity = $row9['breakfastQty'];
    $saturdayBreakfastCalorie = $row9['breakfastCal'];

    $saturdayLunchMeal = $row9['lunchMeal'];
    $saturdayLunchQuantity = $row9['lunchQty'];
    $saturdayLunchCalorie = $row9['lunchCal'];

    $saturdayDinnerMeal = $row9['dinnerMeal'];
    $saturdayDinnerQuantity = $row9['dinnerQty'];
    $saturdayDinnerCalorie = $row9['dinnerCal'];
    
}else{
    echo '<script> window.alert("Error of retieving saturday dietplan data!");</script>';
}

$query10 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 7";
$result10 = mysqli_query($conn, $query10);
if(mysqli_num_rows($result10) == 1){
    $row10 = mysqli_fetch_assoc($result10);

    $sundayBreakfastMeal = $row10['breakfastMeal'];
    $sundayBreakfastQuantity = $row10['breakfastQty'];
    $sundayBreakfastCalorie = $row10['breakfastCal'];

    $sundayLunchMeal = $row10['lunchMeal'];
    $sundayLunchQuantity = $row10['lunchQty'];
    $sundayLunchCalorie = $row10['lunchCal'];

    $sundayDinnerMeal = $row10['dinnerMeal'];
    $sundayDinnerQuantity = $row10['dinnerQty'];
    $sundayDinnerCalorie = $row10['dinnerCal'];
    
}else{
    echo '<script> window.alert("Error of retieving sunday dietplan data!");</script>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Diet Plan</title>
    <link href="Style/viewDietPlan.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
                <div class="notification">
                    <?php
                        include 'notifications.php'; 
                    ?>
                </div>
                <img src="<?php echo $profilePic ?>" alt="my profile" class="myProfile">
            </div>
        </div>
        <div class='topic'>
            <?php 
            echo '
            <p>
                View Diet Plan - '.$member['fName'].' '.$member['lName'].'
            </p>
            ';
            ?>
        </div>
        <div class="gridContainer">
            <form action="">
                <table>
                    <tr>
                        <td class="gridTopic"></td>
                        <td class="gridTopic">Breafast</td>
                        <td class="gridTopic">Lunch</td>
                        <td class="gridTopic">Dinner</td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td class="gridTopic"></td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td class="gridTopic">
                                            <p>Meal</p>
                                        </td>
                                        <td class="gridTopic">
                                            <p>Quantity</p>
                                        </td>
                                        <td class="gridTopic">
                                            <p>Calorie</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td class="gridTopic">
                                            <p>Meal</p>
                                        </td>
                                        <td class="gridTopic">
                                            <p>Quantity</p>
                                        </td>
                                        <td class="gridTopic">
                                            <p>Calorie</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td class="gridTopic">
                                            <p>Meal</p>
                                        </td>
                                        <td class="gridTopic">
                                            <p>Quantity</p>
                                        </td>
                                        <td class="gridTopic">
                                            <p>Calorie</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="gridTopic">Monday</td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayBreakfastMeal" class="meal"
                                                value="<?php echo $mondayBreakfastMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="mondayBreakfastQuantity" class="quantity"
                                                value="<?php echo $mondayBreakfastQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="mondayBreakfastCalorie" class="calorie"
                                                value="<?php echo $mondayBreakfastCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayLunchMeal" class="meal"
                                                value="<?php echo $mondayLunchMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="mondayLunchQuantity" class="quantity"
                                                value="<?php echo $mondayLunchQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="mondayLunchCalorie" class="calorie"
                                                value="<?php echo $mondayLunchCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayDinnerMeal" class="meal"
                                                value="<?php echo $mondayDinnerMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="mondayDinnerQuantity" class="quantity"
                                                value="<?php echo $mondayDinnerQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="mondayDinnerCalorie" class="calorie"
                                                value="<?php echo $mondayDinnerCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td class="gridTopic">Tuesday</td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastMeal" class="meal"
                                                value="<?php echo $tuesdayBreakfastMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastQuantity" class="quantity"
                                                value="<?php echo $tuesdayBreakfastQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastCalorie" class="calorie"
                                                value="<?php echo $tuesdayBreakfastCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayLunchMeal" class="meal"
                                                value="<?php echo $tuesdayLunchMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayLunchQuantity" class="quantity"
                                                value="<?php echo $tuesdayLunchQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayLunchCalorie" class="calorie"
                                                value="<?php echo $tuesdayLunchCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayDinnerMeal" class="meal"
                                                value="<?php echo $tuesdayDinnerMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayDinnerQuantity" class="quantity"
                                                value="<?php echo $tuesdayDinnerQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayDinnerCalorie" class="calorie"
                                                value="<?php echo $tuesdayDinnerCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td class="gridTopic">Wednesday</td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastMeal" class="meal"
                                                value="<?php echo $wednesdayBreakfastMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastQuantity" class="quantity"
                                                value="<?php echo $wednesdayBreakfastQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastCalorie" class="calorie"
                                                value="<?php echo $wednesdayBreakfastCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayLunchMeal" class="meal"
                                                value="<?php echo $wednesdayLunchMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayLunchQuantity" class="quantity"
                                                value="<?php echo $wednesdayLunchQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayLunchCalorie" class="calorie"
                                                value="<?php echo $wednesdayLunchCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayDinnerMeal" class="meal"
                                                value="<?php echo $wednesdayDinnerMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayDinnerQuantity" class="quantity"
                                                value="<?php echo $wednesdayDinnerQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayDinnerCalorie" class="calorie"
                                                value="<?php echo $wednesdayDinnerCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td class="gridTopic">Thursday</td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayBreakfastMeal" class="meal"
                                                value="<?php echo $thursdayBreakfastMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayBreakfastQuantity" class="quantity"
                                                value="<?php echo $thursdayBreakfastQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayBreakfastCalorie" class="calorie"
                                                value="<?php echo $thursdayBreakfastCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayLunchMeal" class="meal"
                                                value="<?php echo $thursdayLunchMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayLunchQuantity" class="quantity"
                                                value="<?php echo $thursdayLunchQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayLunchCalorie" class="calorie"
                                                value="<?php echo $thursdayLunchCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayDinnerMeal" class="meal"
                                                value="<?php echo $thursdayDinnerMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayDinnerQuantity" class="quantity"
                                                value="<?php echo $thursdayDinnerQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayDinnerCalorie" class="calorie"
                                                value="<?php echo $thursdayDinnerCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td class="gridTopic">Friday</td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayBreakfastMeal" class="meal"
                                                value="<?php echo $fridayBreakfastMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="fridayBreakfastQuantity" class="quantity"
                                                value="<?php echo $fridayBreakfastQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="fridayBreakfastCalorie" class="calorie"
                                                value="<?php echo $fridayBreakfastCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayLunchMeal" class="meal"
                                                value="<?php echo $fridayLunchMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="fridayLunchQuantity" class="quantity"
                                                value="<?php echo $fridayLunchQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="fridayLunchCalorie" class="calorie"
                                                value="<?php echo $fridayLunchCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayDinnerMeal" class="meal"
                                                value="<?php echo $fridayDinnerMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="fridayDinnerQuantity" class="quantity"
                                                value="<?php echo $fridayDinnerQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="fridayDinnerCalorie" class="calorie"
                                                value="<?php echo $fridayDinnerCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td class="gridTopic">Saturday</td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayBreakfastMeal" class="meal"
                                                value="<?php echo $saturdayBreakfastMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayBreakfastQuantity" class="quantity"
                                                value="<?php echo $saturdayBreakfastQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayBreakfastCalorie" class="calorie"
                                                value="<?php echo $saturdayBreakfastCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayLunchMeal" class="meal"
                                                value="<?php echo $saturdayLunchMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayLunchQuantity" class="quantity"
                                                value="<?php echo $saturdayLunchQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayLunchCalorie" class="calorie"
                                                value="<?php echo $saturdayLunchCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayDinnerMeal" class="meal"
                                                value="<?php echo $saturdayDinnerMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayDinnerQuantity" class="quantity"
                                                value="<?php echo $saturdayDinnerQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayDinnerCalorie" class="calorie"
                                                value="<?php echo $saturdayDinnerCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td class="gridTopic">Sunday</td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayBreakfastMeal" class="meal"
                                                value="<?php echo $sundayBreakfastMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="sundayBreakfastQuantity" class="quantity"
                                                value="<?php echo $sundayBreakfastQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="sundayBreakfastCalorie" class="calorie"
                                                value="<?php echo $sundayBreakfastCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayLunchMeal" class="meal"
                                                value="<?php echo $sundayLunchMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="sundayLunchQuantity" class="quantity"
                                                value="<?php echo $sundayLunchQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="sundayLunchCalorie" class="calorie"
                                                value="<?php echo $sundayLunchCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayDinnerMeal" class="meal"
                                                value="<?php echo $sundayDinnerMeal ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="sundayDinnerQuantity" class="quantity"
                                                value="<?php echo $sundayDinnerQuantity ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="sundayDinnerCalorie" class="calorie"
                                                value="<?php echo $sundayDinnerCalorie ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
                <br><br>
            </form>
            <a href="dietPlan.php"><button class="saveButton">Back</button></a>
        </div>
    </div>
</body>

</html>