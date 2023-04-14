<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

if (isset($_GET['update'])) {
    $memberID = $_GET['update'];
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

    $mondayBreakfastMeal = explode("," , $row4['breakfastMeal']);
    $mondayBreakfastQuantity = explode("," , $row4['breakfastQty']);
    $mondayBreakfastCalorie = explode("," , $row4['breakfastCal']);

    $mondayLunchMeal = explode("," , $row4['lunchMeal']);
    $mondayLunchQuantity = explode("," , $row4['lunchQty']);
    $mondayLunchCalorie = explode("," , $row4['lunchCal']);

    $mondayDinnerMeal = explode("," , $row4['dinnerMeal']);
    $mondayDinnerQuantity = explode("," , $row4['dinnerQty']);
    $mondayDinnerCalorie = explode("," , $row4['dinnerCal']);
    
}else{
    echo '<script> window.alert("Error of retieving monday dietplan data!");</script>';
}

$query5 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 2";
$result5 = mysqli_query($conn, $query5);
if(mysqli_num_rows($result5) == 1){
    $row5 = mysqli_fetch_assoc($result5);

    $tuesdayBreakfastMeal = explode("," , $row5['breakfastMeal']);
    $tuesdayBreakfastQuantity = explode("," , $row5['breakfastQty']);
    $tuesdayBreakfastCalorie = explode("," , $row5['breakfastCal']);

    $tuesdayLunchMeal = explode("," , $row5['lunchMeal']);
    $tuesdayLunchQuantity = explode("," , $row5['lunchQty']);
    $tuesdayLunchCalorie = explode("," , $row5['lunchCal']);

    $tuesdayDinnerMeal = explode("," , $row5['dinnerMeal']);
    $tuesdayDinnerQuantity = explode("," , $row5['dinnerQty']);
    $tuesdayDinnerCalorie = explode("," , $row5['dinnerCal']);
    
}else{
    echo '<script> window.alert("Error of retieving tuesday dietplan data!");</script>';
}

$query6 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 3";
$result6 = mysqli_query($conn, $query6);
if(mysqli_num_rows($result6) == 1){
    $row6 = mysqli_fetch_assoc($result6);

    $wednesdayBreakfastMeal = explode("," , $row6['breakfastMeal']);
    $wednesdayBreakfastQuantity = explode("," , $row6['breakfastQty']);
    $wednesdayBreakfastCalorie = explode("," , $row6['breakfastCal']);

    $wednesdayLunchMeal = explode("," , $row6['lunchMeal']);
    $wednesdayLunchQuantity = explode("," , $row6['lunchQty']);
    $wednesdayLunchCalorie = explode("," , $row6['lunchCal']);

    $wednesdayDinnerMeal = explode("," , $row6['dinnerMeal']);
    $wednesdayDinnerQuantity = explode("," , $row6['dinnerQty']);
    $wednesdayDinnerCalorie = explode("," , $row6['dinnerCal']);
    
}else{
    echo '<script> window.alert("Error of retieving wednesday dietplan data!");</script>';
}

$query7 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 4";
$result7 = mysqli_query($conn, $query7);
if(mysqli_num_rows($result7) == 1){
    $row7 = mysqli_fetch_assoc($result7);

    $thursdayBreakfastMeal = explode("," , $row7['breakfastMeal']);
    $thursdayBreakfastQuantity = explode("," , $row7['breakfastQty']);
    $thursdayBreakfastCalorie = explode("," , $row7['breakfastCal']);

    $thursdayLunchMeal = explode("," , $row7['lunchMeal']);
    $thursdayLunchQuantity = explode("," , $row7['lunchQty']);
    $thursdayLunchCalorie = explode("," , $row7['lunchCal']);

    $thursdayDinnerMeal = explode("," , $row7['dinnerMeal']);
    $thursdayDinnerQuantity = explode("," , $row7['dinnerQty']);
    $thursdayDinnerCalorie = explode("," , $row7['dinnerCal']);
    
}else{
    echo '<script> window.alert("Error of retieving thursday dietplan data!");</script>';
}

$query8 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 5";
$result8 = mysqli_query($conn, $query8);
if(mysqli_num_rows($result8) == 1){
    $row8 = mysqli_fetch_assoc($result8);

    $fridayBreakfastMeal = explode("," , $row8['breakfastMeal']);
    $fridayBreakfastQuantity = explode("," , $row8['breakfastQty']);
    $fridayBreakfastCalorie = explode("," , $row8['breakfastCal']);

    $fridayLunchMeal = explode("," , $row8['lunchMeal']);
    $fridayLunchQuantity = explode("," , $row8['lunchQty']);
    $fridayLunchCalorie = explode("," , $row8['lunchCal']);

    $fridayDinnerMeal = explode("," , $row8['dinnerMeal']);
    $fridayDinnerQuantity = explode("," , $row8['dinnerQty']);
    $fridayDinnerCalorie = explode("," , $row8['dinnerCal']);
    
}else{
    echo '<script> window.alert("Error of retieving friday dietplan data!");</script>';
}

$query9 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 6";
$result9 = mysqli_query($conn, $query9);
if(mysqli_num_rows($result9) == 1){
    $row9 = mysqli_fetch_assoc($result9);

    $saturdayBreakfastMeal = explode("," , $row9['breakfastMeal']);
    $saturdayBreakfastQuantity = explode("," , $row9['breakfastQty']);
    $saturdayBreakfastCalorie = explode("," , $row9['breakfastCal']);

    $saturdayLunchMeal = explode("," , $row9['lunchMeal']);
    $saturdayLunchQuantity = explode("," , $row9['lunchQty']);
    $saturdayLunchCalorie = explode("," , $row9['lunchCal']);

    $saturdayDinnerMeal = explode("," , $row9['dinnerMeal']);
    $saturdayDinnerQuantity = explode("," , $row9['dinnerQty']);
    $saturdayDinnerCalorie = explode("," , $row9['dinnerCal']);
    
}else{
    echo '<script> window.alert("Error of retieving saturday dietplan data!");</script>';
}

$query10 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 7";
$result10 = mysqli_query($conn, $query10);
if(mysqli_num_rows($result10) == 1){
    $row10 = mysqli_fetch_assoc($result10);

    $sundayBreakfastMeal = explode("," , $row10['breakfastMeal']);
    $sundayBreakfastQuantity = explode("," , $row10['breakfastQty']);
    $sundayBreakfastCalorie = explode("," , $row10['breakfastCal']);

    $sundayLunchMeal = explode("," , $row10['lunchMeal']);
    $sundayLunchQuantity = explode("," , $row10['lunchQty']);
    $sundayLunchCalorie = explode("," , $row10['lunchCal']);

    $sundayDinnerMeal = explode("," , $row10['dinnerMeal']);
    $sundayDinnerQuantity = explode("," , $row10['dinnerQty']);
    $sundayDinnerCalorie = explode("," , $row10['dinnerCal']);
    
}else{
    echo '<script> window.alert("Error of retieving sunday dietplan data!");</script>';
}

// if (isset($_POST['update'])) {

//     $mondayBreakfastMeal = $_POST['mondayBreakfastMeal'];
//     $mondayBreakfastQuntity = $_POST['mondayBreakfastQuntity'];
//     $mondayBreakfastCalorie = $_POST['mondayBreakfastCalorie'];
//     $mondayLunchMeal = $_POST['mondayLunchMeal'];
//     $mondayLunchQuntity = $_POST['mondayLunchQuntity'];
//     $mondayLunchCalorie = $_POST['mondayLunchCalorie'];
//     $mondayDinnerMeal = $_POST['mondayDinnerMeal'];
//     $mondayDinnerQuntity = $_POST['mondayDinnerQuntity'];
//     $mondayDinnerCalorie = $_POST['mondayDinnerCalorie'];

//     $tuesdayBreakfastMeal = $_POST['tuesdayBreakfastMeal'];
//     $tuesdayBreakfastQuntity = $_POST['tuesdayBreakfastQuntity'];
//     $tuesdayBreakfastCalorie = $_POST['tuesdayBreakfastCalorie'];
//     $tusedayLunchMeal = $_POST['tusedayLunchMeal'];
//     $tusedayLunchQuntity = $_POST['tusedayLunchQuntity'];
//     $tusedayLunchCalorie = $_POST['tusedayLunchCalorie'];
//     $tusedayDinnerMeal = $_POST['tusedayDinnerMeal'];
//     $tusedayDinnerQuntity = $_POST['tusedayDinnerQuntity'];
//     $tusedayDinnerCalorie = $_POST['tusedayDinnerCalorie'];

//     $wednesdayBreakfastMeal = $_POST['wednesdayBreakfastMeal'];
//     $wednesdayBreakfastQuntity = $_POST['wednesdayBreakfastQuntity'];
//     $wednesdayBreakfastCalorie = $_POST['wednesdayBreakfastCalorie'];
//     $wednesdayLunchMeal = $_POST['wednesdayLunchMeal'];
//     $wednesdayLunchQuntity = $_POST['wednesdayLunchQuntity'];
//     $wednesdayLunchCalorie = $_POST['wednesdayLunchCalorie'];
//     $wednesdayDinnerMeal = $_POST['wednesdayDinnerMeal'];
//     $wednesdayDinnerQuntity = $_POST['wednesdayDinnerQuntity'];
//     $wednesdayDinnerCalorie = $_POST['wednesdayDinnerCalorie'];

//     $thursdayBreakfastMeal = $_POST['thursdayBreakfastMeal'];
//     $thursdayBreakfastQuntity = $_POST['thursdayBreakfastQuntity'];
//     $thursdayBreakfastCalorie = $_POST['thursdayBreakfastCalorie'];
//     $thursdayLunchMeal = $_POST['thursdayLunchMeal'];
//     $thursdayLunchQuntity = $_POST['thursdayLunchQuntity'];
//     $thursdayLunchCalorie = $_POST['thursdayLunchCalorie'];
//     $thursdayDinnerMeal = $_POST['thursdayDinnerMeal'];
//     $thursdayDinnerQuntity = $_POST['thursdayDinnerQuntity'];
//     $thursdayDinnerCalorie = $_POST['thursdayDinnerCalorie'];

//     $fridayBreakfastMeal = $_POST['fridayBreakfastMeal'];
//     $fridayBreakfastQuntity = $_POST['fridayBreakfastQuntity'];
//     $fridayBreakfastCalorie = $_POST['fridayBreakfastCalorie'];
//     $fridayLunchMeal = $_POST['fridayLunchMeal'];
//     $fridayLunchQuntity = $_POST['fridayLunchQuntity'];
//     $fridayLunchCalorie = $_POST['fridayLunchCalorie'];
//     $fridayDinnerMeal = $_POST['fridayDinnerMeal'];
//     $fridayDinnerQuntity = $_POST['fridayDinnerQuntity'];
//     $fridayDinnerCalorie = $_POST['fridayDinnerCalorie'];

//     $saturdayBreakfastMeal = $_POST['saturdayBreakfastMeal'];
//     $saturdayBreakfastQuntity = $_POST['saturdayBreakfastQuntity'];
//     $saturdayBreakfastCalorie = $_POST['saturdayBreakfastCalorie'];
//     $saturdayLunchMeal = $_POST['saturdayLunchMeal'];
//     $saturdayLunchQuntity = $_POST['saturdayLunchQuntity'];
//     $saturdayLunchCalorie = $_POST['saturdayLunchCalorie'];
//     $saturdayDinnerMeal = $_POST['saturdayDinnerMeal'];
//     $saturdayDinnerQuntity = $_POST['saturdayDinnerQuntity'];
//     $saturdayDinnerCalorie = $_POST['saturdayDinnerCalorie'];

//     $sundayBreakfastMeal = $_POST['sundayBreakfastMeal'];
//     $sundayBreakfastQuntity = $_POST['sundayBreakfastQuntity'];
//     $sundayBreakfastCalorie = $_POST['sundayBreakfastCalorie'];
//     $sundayLunchMeal = $_POST['sundayLunchMeal'];
//     $sundayLunchQuntity = $_POST['sundayLunchQuntity'];
//     $sundayLunchCalorie = $_POST['sundayLunchCalorie'];
//     $sundayDinnerMeal = $_POST['sundayDinnerMeal'];
//     $sundayDinnerQuntity = $_POST['sundayDinnerQuntity'];
//     $sundayDinnerCalorie = $_POST['sundayDinnerCalorie'];

//     $sql1 = "UPDATE dietplan 
//             SET breakfastMeal = '$mondayBreakfastMeal',
//             breakfastQty = '$mondayBreakfastQuntity',
//             breakfastCal = '$mondayBreakfastCalorie',
//             lunchMeal = '$mondayLunchMeal',
//             lunchQty = '$mondayLunchQuntity', 
//             lunchCal = '$mondayLunchCalorie',
//             dinnerMeal = '$mondayDinnerMeal',
//             dinnerQty = '$mondayDinnerQuntity',
//             dinnerCal = '$mondayDinnerCalorie'
//             WHERE employeeID = $employeeID
//             AND day = 'Monday'
//             AND memberID = $memberID";

//     $dietPlan1 = mysqli_query($conn, $sql1);

//     if ($dietPlan1) {

//         $sql2 = "UPDATE dietplan 
//             SET breakfastMeal = '$tuesdayBreakfastMeal',
//             breakfastQty = '$tuesdayBreakfastQuntity',
//             breakfastCal = '$tuesdayBreakfastCalorie',
//             lunchMeal = '$tusedayLunchMeal',
//             lunchQty = '$tusedayLunchQuntity', 
//             lunchCal = '$tusedayLunchCalorie',
//             dinnerMeal = '$tusedayDinnerMeal',
//             dinnerQty = '$tusedayDinnerQuntity',
//             dinnerCal = '$tusedayDinnerCalorie'
//             WHERE employeeID = $employeeID
//             AND day = 'Tuesday'
//             AND memberID = $memberID";

//         $dietPlan2 = mysqli_query($conn, $sql2);

//         if ($dietPlan2) {

//             $sql3 = "UPDATE dietplan 
//             SET breakfastMeal = '$wednesdayBreakfastMeal',
//             breakfastQty = '$wednesdayBreakfastQuntity',
//             breakfastCal = '$wednesdayBreakfastCalorie',
//             lunchMeal = '$wednesdayLunchMeal',
//             lunchQty = '$wednesdayLunchQuntity',
//             lunchCal = '$wednesdayLunchCalorie',
//             dinnerMeal = '$wednesdayDinnerMeal',
//             dinnerQty = '$wednesdayDinnerQuntity',
//             dinnerCal = '$wednesdayDinnerCalorie'
//             WHERE employeeID = $employeeID
//             AND day = 'Wednesday'
//             AND memberID = $memberID";

//             $dietPlan3 = mysqli_query($conn, $sql3);

//             if ($dietPlan3) {

//                 $sql4 = "UPDATE dietplan 
//             SET breakfastMeal = '$thursdayBreakfastMeal',
//             breakfastQty = '$thursdayBreakfastQuntity',
//             breakfastCal = '$thursdayBreakfastCalorie',
//             lunchMeal = '$thursdayLunchMeal',
//             lunchQty = '$thursdayLunchQuntity', 
//             lunchCal = '$thursdayLunchCalorie',
//             dinnerMeal = '$thursdayDinnerMeal',
//             dinnerQty = '$thursdayDinnerQuntity',
//             dinnerCal = '$thursdayDinnerCalorie'
//             WHERE employeeID = $employeeID
//             AND day = 'Thursday'
//             AND memberID = $memberID";

//                 $dietPlan4 = mysqli_query($conn, $sql4);

//                 if ($dietPlan4) {
//                     $sql5 = "UPDATE dietplan 
//                 SET breakfastMeal = '$fridayBreakfastMeal',
//                 breakfastQty = '$fridayBreakfastQuntity',
//                 breakfastCal = '$fridayBreakfastCalorie',
//                 lunchMeal = '$fridayLunchMeal',
//                 lunchQty = '$fridayLunchQuntity',
//                 lunchCal = '$fridayLunchCalorie',
//                 dinnerMeal = '$fridayDinnerMeal',
//                 dinnerQty = '$fridayDinnerQuntity',
//                 dinnerCal = '$fridayDinnerCalorie'
//                 WHERE employeeID = $employeeID
//                 AND day = 'Friday'
//                 AND memberID = $memberID";

//                     $dietPlan5 = mysqli_query($conn, $sql5);

//                     if ($dietPlan5) {
//                         $sql6 = "UPDATE dietplan 
//                         SET breakfastMeal = '$saturdayBreakfastMeal',
//                         breakfastQty = '$saturdayBreakfastQuntity',
//                         breakfastCal = '$saturdayBreakfastCalorie',
//                         lunchMeal = '$saturdayLunchMeal',
//                         lunchQty = '$saturdayLunchQuntity', 
//                         lunchCal = '$saturdayLunchCalorie',
//                         dinnerMeal = '$saturdayDinnerMeal',
//                         dinnerQty = '$saturdayDinnerQuntity',
//                         dinnerCal = '$saturdayDinnerCalorie'
//                         WHERE employeeID = $employeeID
//                         AND day = 'Saturday'
//                         AND memberID = $memberID";

//                         $dietPlan6 = mysqli_query($conn, $sql6);

//                         if ($dietPlan6) {
//                             $sql7 = "UPDATE dietplan 
//                             SET breakfastMeal = '$sundayBreakfastMeal',
//                             breakfastQty = '$sundayBreakfastQuntity',
//                             breakfastCal = '$sundayBreakfastCalorie',
//                             lunchMeal = '$sundayLunchMeal',
//                             lunchQty = '$sundayLunchQuntity', 
//                             lunchCal = '$sundayLunchCalorie',
//                             dinnerMeal = '$sundayDinnerMeal',
//                             dinnerQty = '$sundayDinnerQuntity',
//                             dinnerCal = '$sundayDinnerCalorie'
//                             WHERE employeeID = $employeeID
//                             AND day = 'Sunday'
//                             AND memberID = $memberID";

//                             $dietPlan7 = mysqli_query($conn, $sql7);

//                             if ($dietPlan7) {
//                                 // echo "<script> alert('Updated Successfully!'); window.location='updateSupplements.php?update = ".$memberID."'; </script>";
//                                 echo "<script> alert('Updated Successfully!'); window.location='dietPlan.php'; </script>";
//                             } else {
//                                 echo "<script> alert('Error of updating sunday details');</script>";
//                             }
//                         } else {
//                             echo "<script> alert('Error of updating saturday details');</script>";
//                         }
//                     } else {
//                         echo "<script> alert('Error of updating friday details');</script>";
//                     }
//                 } else {
//                     echo "<script> alert('Error of updating thursday details');</script>";
//                 }
//             } else {
//                 echo "<script> alert('Error of updating wednesday details');</script>";
//             }
//         } else {
//             echo "<script> alert('Error of updating tuesday details');</script>";
//         }
//     } else {
//         echo "<script> alert('Error of updating monday details');</script>";
//     }
// }


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Diet Plan</title>
    <link href="Style/updateDietPlan.css" rel="stylesheet">
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
            <?php echo "
            <p>
                Update Diet Plan - ".$member['fName']." ".$member['lName']."
            </p>
            "; ?>
        </div>
        <div class="gridContainer">
            <form action="">
                <table>
                    <tr>
                        <td class="gridTopic"></td>
                        <td class="gridTopic">Breafastk</td>
                        <td class="gridTopic">Lunch</td>
                        <td class="gridTopic">Dinner</td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td class="gridTopic">Monday</td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayBreakfastMeal[]" class="meal"
                                                value="<?php echo $mondayBreakfastMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $mondayBreakfastQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $mondayBreakfastCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type=" text" name="mondayBreakfastMeal[]" class="meal"
                                                value="<?php echo $mondayBreakfastMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $mondayBreakfastQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $mondayBreakfastCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayBreakfastMeal[]" class="meal"
                                                value="<?php echo $mondayBreakfastMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $mondayBreakfastQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $mondayBreakfastCalorie[2] ?>">
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
                                            <input type="text" name="mondayLunchMeal[]" class="meal"
                                                value="<?php echo $mondayLunchMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayLunchQuantity[]" class="quantity"
                                                value="<?php echo $mondayLunchQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayLunchCalorie[]" class="calorie"
                                                value="<?php echo $mondayLunchCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayLunchMeal[]" class="meal"
                                                value="<?php echo $mondayLunchMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayLunchQuantity[]" class="quantity"
                                                value="<?php echo $mondayLunchQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayLunchCalorie[]" class="calorie"
                                                value="<?php echo $mondayLunchCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayLunchMeal[]" class="meal"
                                                value="<?php echo $mondayLunchMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayLunchQuantity[]" class="quantity"
                                                value="<?php echo $mondayLunchQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayLunchCalorie[]" class="calorie"
                                                value="<?php echo $mondayLunchCalorie[2] ?>">
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
                                            <input type="text" name="mondayDinnerMeal[]" class="meal"
                                                value="<?php echo $mondayDinnerMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $mondayDinnerQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $mondayDinnerCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayDinnerMeal[]" class="meal"
                                                value="<?php echo $mondayDinnerMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $mondayDinnerQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $mondayDinnerCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayDinnerMeal[]" class="meal"
                                                value="<?php echo $mondayDinnerMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $mondayDinnerQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $mondayDinnerCalorie[2] ?>">
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
                                            <input type="text" name="tuesdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $tuesdayBreakfastMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayBreakfastQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayBreakfastCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $tuesdayBreakfastMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayBreakfastQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayBreakfastCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $tuesdayBreakfastMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayBreakfastQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayBreakfastCalorie[2] ?>">
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
                                            <input type="text" name="tuesdayLunchMeal[]" class="meal"
                                                value="<?php echo $tuesdayLunchMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayLunchQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayLunchCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayLunchMeal[]" class="meal"
                                                value="<?php echo $tuesdayLunchMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayLunchQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayLunchCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayLunchMeal[]" class="meal"
                                                value="<?php echo $tuesdayLunchMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayLunchQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayLunchCalorie[2] ?>">
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
                                            <input type="text" name="tuesdayDinnerMeal[]" class="meal"
                                                value="<?php echo $tuesdayDinnerMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayDinnerQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayDinnerCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayDinnerMeal[]" class="meal"
                                                value="<?php echo $tuesdayDinnerMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayDinnerQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayDinnerCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayDinnerMeal[]" class="meal"
                                                value="<?php echo $tuesdayDinnerMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayDinnerQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayDinnerCalorie[2] ?>">
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
                                            <input type="text" name="wednesdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $wednesdayBreakfastMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayBreakfastQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayBreakfastCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $wednesdayBreakfastMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayBreakfastQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayBreakfastCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $wednesdayBreakfastMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayBreakfastQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayBreakfastCalorie[2] ?>">
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
                                            <input type="text" name="wednesdayLunchMeal[]" class="meal"
                                                value="<?php echo $wednesdayLunchMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayLunchQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayLunchCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayLunchMeal[]" class="meal"
                                                value="<?php echo $wednesdayLunchMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayLunchQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayLunchCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayLunchMeal[]" class="meal"
                                                value="<?php echo $wednesdayLunchMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayLunchQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayLunchCalorie[2] ?>">
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
                                            <input type="text" name="wednesdayDinnerMeal[]" class="meal"
                                                value="<?php echo $wednesdayDinnerMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayDinnerQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayDinnerCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayDinnerMeal[]" class="meal"
                                                value="<?php echo $wednesdayDinnerMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayDinnerQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayDinnerCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayDinnerMeal[]" class="meal"
                                                value="<?php echo $wednesdayDinnerMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayDinnerQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayDinnerCalorie[2] ?>">
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
                                            <input type="text" name="thursdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $thursdayBreakfastMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $thursdayBreakfastQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $thursdayBreakfastCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $thursdayBreakfastMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $thursdayBreakfastQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $thursdayBreakfastCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $thursdayBreakfastMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $thursdayBreakfastQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $thursdayBreakfastCalorie[2] ?>">
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
                                            <input type="text" name="thursdayLunchMeal[]" class="meal"
                                                value="<?php echo $thursdayLunchMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $thursdayLunchQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $thursdayLunchCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayLunchMeal[]" class="meal"
                                                value="<?php echo $thursdayLunchMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $thursdayLunchQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $thursdayLunchCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayLunchMeal[]" class="meal"
                                                value="<?php echo $thursdayLunchMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $thursdayLunchQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $thursdayLunchCalorie[2] ?>">
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
                                            <input type="text" name="thursdayDinnerMeal[]" class="meal"
                                                value="<?php echo $thursdayDinnerMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $thursdayDinnerQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $thursdayDinnerCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayDinnerMeal[]" class="meal"
                                                value="<?php echo $thursdayDinnerMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $thursdayDinnerQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $thursdayDinnerCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayDinnerMeal[]" class="meal"
                                                value="<?php echo $thursdayDinnerMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $thursdayDinnerQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $thursdayDinnerCalorie[2] ?>">
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
                                            <input type="text" name="fridayBreakfastMeal[]" class="meal"
                                                value="<?php echo $fridayBreakfastMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $fridayBreakfastQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $fridayBreakfastCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayBreakfastMeal[]" class="meal"
                                                value="<?php echo $fridayBreakfastMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $fridayBreakfastQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $fridayBreakfastCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayBreakfastMeal[]" class="meal"
                                                value="<?php echo $fridayBreakfastMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $fridayBreakfastQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $fridayBreakfastCalorie[2] ?>">
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
                                            <input type="text" name="fridayLunchMeal[]" class="meal"
                                                value="<?php echo $fridayLunchMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayLunchQuantity[]" class="quantity"
                                                value="<?php echo $fridayLunchQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayLunchCalorie[]" class="calorie"
                                                value="<?php echo $fridayLunchCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayLunchMeal[]" class="meal"
                                                value="<?php echo $fridayLunchMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayLunchQuantity[]" class="quantity"
                                                value="<?php echo $fridayLunchQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayLunchCalorie[]" class="calorie"
                                                value="<?php echo $fridayLunchCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayLunchMeal[]" class="meal"
                                                value="<?php echo $fridayLunchMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayLunchQuantity[]" class="quantity"
                                                value="<?php echo $fridayLunchQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayLunchCalorie[]" class="calorie"
                                                value="<?php echo $fridayLunchCalorie[2] ?>">
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
                                            <input type="text" name="fridayDinnerMeal[]" class="meal"
                                                value="<?php echo $fridayDinnerMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $fridayDinnerQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $fridayDinnerCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayDinnerMeal[]" class="meal"
                                                value="<?php echo $fridayDinnerMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $fridayDinnerQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $fridayDinnerCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayDinnerMeal[]" class="meal"
                                                value="<?php echo $fridayDinnerMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $fridayDinnerQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $fridayDinnerCalorie[2] ?>">
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
                        <td class="gridTopic">Staurday</td>
                        <td>
                            <div>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $saturdayBreakfastMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $saturdayBreakfastQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $saturdayBreakfastCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $saturdayBreakfastMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $saturdayBreakfastQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $saturdayBreakfastCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $saturdayBreakfastMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $saturdayBreakfastQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $saturdayBreakfastCalorie[2] ?>">
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
                                            <input type="text" name="saturdayLunchMeal[]" class="meal"
                                                value="<?php echo $saturdayLunchMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $saturdayLunchQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $saturdayLunchCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayLunchMeal[]" class="meal"
                                                value="<?php echo $saturdayLunchMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $saturdayLunchQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $saturdayLunchCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayLunchMeal[]" class="meal"
                                                value="<?php echo $saturdayLunchMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $saturdayLunchQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $saturdayLunchCalorie[2] ?>">
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
                                            <input type="text" name="saturdayDinnerMeal[]" class="meal"
                                                value="<?php echo $saturdayDinnerMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $saturdayDinnerQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $saturdayDinnerCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayDinnerMeal[]" class="meal"
                                                value="<?php echo $saturdayDinnerMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $saturdayDinnerQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $saturdayDinnerCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayDinnerMeal[]" class="meal"
                                                value="<?php echo $saturdayDinnerMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $saturdayDinnerQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $saturdayDinnerCalorie[2] ?>">
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
                                            <input type="text" name="sundayBreakfastMeal[]" class="meal"
                                                value="<?php echo $sundayBreakfastMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $sundayBreakfastQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $sundayBreakfastCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayBreakfastMeal[]" class="meal"
                                                value="<?php echo $sundayBreakfastMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $sundayBreakfastQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $sundayBreakfastCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayBreakfastMeal[]" class="meal"
                                                value="<?php echo $sundayBreakfastMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $sundayBreakfastQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $sundayBreakfastCalorie[2] ?>">
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
                                            <input type="text" name="sundayLunchMeal[]" class="meal"
                                                value="<?php echo $sundayLunchMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayLunchQuantity[]" class="quantity"
                                                value="<?php echo $sundayLunchQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayLunchCalorie[]" class="calorie"
                                                value="<?php echo $sundayLunchCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayLunchMeal[]" class="meal"
                                                value="<?php echo $sundayLunchMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayLunchQuantity[]" class="quantity"
                                                value="<?php echo $sundayLunchQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayLunchCalorie[]" class="calorie"
                                                value="<?php echo $sundayLunchCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayLunchMeal[]" class="meal"
                                                value="<?php echo $sundayLunchMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayLunchQuantity[]" class="quantity"
                                                value="<?php echo $sundayLunchQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayLunchCalorie[]" class="calorie"
                                                value="<?php echo $sundayLunchCalorie[2] ?>">
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
                                            <input type="text" name="sundayDinnerMeal[]" class="meal"
                                                value="<?php echo $sundayDinnerMeal[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $sundayDinnerQuantity[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $sundayDinnerCalorie[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayDinnerMeal[]" class="meal"
                                                value="<?php echo $sundayDinnerMeal[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $sundayDinnerQuantity[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $sundayDinnerCalorie[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayDinnerMeal[]" class="meal"
                                                value="<?php echo $sundayDinnerMeal[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $sundayDinnerQuantity[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $sundayDinnerCalorie[2] ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
                <button name="save" class="saveButton">Update</button>
            </form>
            <button class="backButton" onclick="window.location.href = 'dietplan.php'">Back</button>
        </div>
    </div>
</body>

</html>