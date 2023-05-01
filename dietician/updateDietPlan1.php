<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

if (isset($_GET['update'])) {
    $memberID = $_GET['update'];
}


$query1 = "SELECT * FROM member JOIN user ON member.userID = user.userID WHERE member.memberID = $memberID";
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

$query3 = "SELECT * FROM servicecharge WHERE memberID = $memberID AND employeeID = $employeeID AND serviceID = 3 AND endDate >= NOW()" ;
$result3 = mysqli_query($conn, $query3);
$row3 = mysqli_fetch_assoc($result3);

$startDateTime = $row3['startDate']; 

$query4 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 1";
$result4 = mysqli_query($conn, $query4);

if(mysqli_num_rows($result4) == 1){
    $row4 = mysqli_fetch_assoc($result4);

    $mondayBreakfastMealShow = explode("," , $row4['breakfastMeal']);
    $mondayBreakfastQuantityShow = explode("," , $row4['breakfastQty']);
    $mondayBreakfastCalorieShow = explode("," , $row4['breakfastCal']);

    $mondayLunchMealShow = explode("," , $row4['lunchMeal']);
    $mondayLunchQuantityShow = explode("," , $row4['lunchQty']);
    $mondayLunchCalorieShow = explode("," , $row4['lunchCal']);

    $mondayDinnerMealShow = explode("," , $row4['dinnerMeal']);
    $mondayDinnerQuantityShow = explode("," , $row4['dinnerQty']);
    $mondayDinnerCalorieShow = explode("," , $row4['dinnerCal']);
    
}else{
    echo '<script> window.alert("Error of retieving monday dietplan data!");</script>';
}

$query5 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 2";
$result5 = mysqli_query($conn, $query5);
if(mysqli_num_rows($result5) == 1){
    $row5 = mysqli_fetch_assoc($result5);

    $tuesdayBreakfastMealShow = explode("," , $row5['breakfastMeal']);
    $tuesdayBreakfastQuantityShow = explode("," , $row5['breakfastQty']);
    $tuesdayBreakfastCalorieShow = explode("," , $row5['breakfastCal']);

    $tuesdayLunchMealShow = explode("," , $row5['lunchMeal']);
    $tuesdayLunchQuantityShow = explode("," , $row5['lunchQty']);
    $tuesdayLunchCalorieShow = explode("," , $row5['lunchCal']);

    $tuesdayDinnerMealShow = explode("," , $row5['dinnerMeal']);
    $tuesdayDinnerQuantityShow = explode("," , $row5['dinnerQty']);
    $tuesdayDinnerCalorieShow = explode("," , $row5['dinnerCal']);
    
}else{
    echo '<script> window.alert("Error of retieving tuesday dietplan data!");</script>';
}

$query6 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 3";
$result6 = mysqli_query($conn, $query6);
if(mysqli_num_rows($result6) == 1){
    $row6 = mysqli_fetch_assoc($result6);

    $wednesdayBreakfastMealShow = explode("," , $row6['breakfastMeal']);
    $wednesdayBreakfastQuantityShow = explode("," , $row6['breakfastQty']);
    $wednesdayBreakfastCalorieShow = explode("," , $row6['breakfastCal']);

    $wednesdayLunchMealShow = explode("," , $row6['lunchMeal']);
    $wednesdayLunchQuantityShow = explode("," , $row6['lunchQty']);
    $wednesdayLunchCalorieShow = explode("," , $row6['lunchCal']);

    $wednesdayDinnerMealShow = explode("," , $row6['dinnerMeal']);
    $wednesdayDinnerQuantityShow = explode("," , $row6['dinnerQty']);
    $wednesdayDinnerCalorieShow = explode("," , $row6['dinnerCal']);
    
}else{
    echo '<script> window.alert("Error of retieving wednesday dietplan data!");</script>';
}

$query7 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 4";
$result7 = mysqli_query($conn, $query7);
if(mysqli_num_rows($result7) == 1){
    $row7 = mysqli_fetch_assoc($result7);

    $thursdayBreakfastMealShow = explode("," , $row7['breakfastMeal']);
    $thursdayBreakfastQuantityShow = explode("," , $row7['breakfastQty']);
    $thursdayBreakfastCalorieShow = explode("," , $row7['breakfastCal']);

    $thursdayLunchMealShow = explode("," , $row7['lunchMeal']);
    $thursdayLunchQuantityShow= explode("," , $row7['lunchQty']);
    $thursdayLunchCalorieShow = explode("," , $row7['lunchCal']);

    $thursdayDinnerMealShow = explode("," , $row7['dinnerMeal']);
    $thursdayDinnerQuantityShow = explode("," , $row7['dinnerQty']);
    $thursdayDinnerCalorieShow = explode("," , $row7['dinnerCal']);
    
}else{
    echo '<script> window.alert("Error of retieving thursday dietplan data!");</script>';
}

$query8 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 5";
$result8 = mysqli_query($conn, $query8);
if(mysqli_num_rows($result8) == 1){
    $row8 = mysqli_fetch_assoc($result8);

    $fridayBreakfastMealShow = explode("," , $row8['breakfastMeal']);
    $fridayBreakfastQuantityShow = explode("," , $row8['breakfastQty']);
    $fridayBreakfastCalorieShow = explode("," , $row8['breakfastCal']);

    $fridayLunchMealShow = explode("," , $row8['lunchMeal']);
    $fridayLunchQuantityShow = explode("," , $row8['lunchQty']);
    $fridayLunchCalorieShow = explode("," , $row8['lunchCal']);

    $fridayDinnerMealShow = explode("," , $row8['dinnerMeal']);
    $fridayDinnerQuantityShow = explode("," , $row8['dinnerQty']);
    $fridayDinnerCalorieShow = explode("," , $row8['dinnerCal']);
    
}else{
    echo '<script> window.alert("Error of retieving friday dietplan data!");</script>';
}

$query9 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 6";
$result9 = mysqli_query($conn, $query9);
if(mysqli_num_rows($result9) == 1){
    $row9 = mysqli_fetch_assoc($result9);

    $saturdayBreakfastMealShow = explode("," , $row9['breakfastMeal']);
    $saturdayBreakfastQuantityShow = explode("," , $row9['breakfastQty']);
    $saturdayBreakfastCalorieShow = explode("," , $row9['breakfastCal']);

    $saturdayLunchMealShow = explode("," , $row9['lunchMeal']);
    $saturdayLunchQuantityShow = explode("," , $row9['lunchQty']);
    $saturdayLunchCalorieShow = explode("," , $row9['lunchCal']);

    $saturdayDinnerMealShow = explode("," , $row9['dinnerMeal']);
    $saturdayDinnerQuantityShow = explode("," , $row9['dinnerQty']);
    $saturdayDinnerCalorieShow = explode("," , $row9['dinnerCal']);
    
}else{
    echo '<script> window.alert("Error of retieving saturday dietplan data!");</script>';
}

$query10 = "SELECT * from dietplan WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 7";
$result10 = mysqli_query($conn, $query10);
if(mysqli_num_rows($result10) == 1){
    $row10 = mysqli_fetch_assoc($result10);

    $sundayBreakfastMealShow = explode("," , $row10['breakfastMeal']);
    $sundayBreakfastQuantityShow = explode("," , $row10['breakfastQty']);
    $sundayBreakfastCalorieShow = explode("," , $row10['breakfastCal']);

    $sundayLunchMealShow = explode("," , $row10['lunchMeal']);
    $sundayLunchQuantityShow = explode("," , $row10['lunchQty']);
    $sundayLunchCalorieShow = explode("," , $row10['lunchCal']);

    $sundayDinnerMealShow = explode("," , $row10['dinnerMeal']);
    $sundayDinnerQuantityShow = explode("," , $row10['dinnerQty']);
    $sundayDinnerCalorieShow = explode("," , $row10['dinnerCal']);
    
}else{
    echo '<script> window.alert("Error of retieving sunday dietplan data!");</script>';
}

$mondayBreakfastErr = $mondayLunchErr = $mondayDinnerErr = $tuesdayBreakfastErr = $tuesdayLunchErr = $tuesdayDinnertErr = $wednesdayBreakfastErr = $wednesdayLunchErr = $wednesdayDinnerErr = $thursdayBreakfastErr = $thursdayLunchErr = $thursdayDinnerErr = $fridayBreakfastErr = $fridayLunchErr = $fridayDinnerErr = $saturdayBreakfastErr = $saturdayLunchErr = $saturdayDinnerErr = $sundayBreakfastErr = $sundayLunchErr = $sundayDinnerErr = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $monday_Breakfast_Meal = $_POST['mondayBreakfastMeal'];
    $mondayBreakfastMeal = implode(",", $monday_Breakfast_Meal);

    $monday_Breakfast_Quantity = $_POST['mondayBreakfastQuantity'];
    $mondayBreakfastQuantity = implode(",", $monday_Breakfast_Quantity);

    $monday_Breakfast_Calorie = $_POST['mondayBreakfastCalorie'];
    $mondayBreakfastCalorie = implode(",", $monday_Breakfast_Calorie);
    
    if (count(array_filter($monday_Breakfast_Meal)) == 0 || count(array_filter($monday_Breakfast_Quantity)) == 0 || count(array_filter($monday_Breakfast_Calorie)) == 0) {
        $mondayBreakfastErr = "Fill required fields";
    } 


    $monday_Lunch_Meal = $_POST['mondayLunchMeal'];
    $mondayLunchMeal = implode(",", $monday_Lunch_Meal);

    $monday_Lunch_Quantity= $_POST['mondayLunchQuantity'];
    $mondayLunchQuantity = implode(",", $monday_Lunch_Quantity);
    
    $monday_Lunch_Calorie = $_POST['mondayLunchCalorie'];
    $mondayLunchCalorie = implode(",", $monday_Lunch_Calorie);
    
    if (count(array_filter($monday_Lunch_Meal)) == 0 || count(array_filter($monday_Lunch_Quantity)) == 0 || count(array_filter($monday_Lunch_Calorie)) == 0) {
        $mondayLunchErr = "Fill required fields";
    }
    
    
    $monday_Dinner_Meal = $_POST['mondayDinnerMeal'];
    $mondayDinnerMeal = implode(",", $monday_Dinner_Meal);

    $monday_Dinner_Quantity= $_POST['mondayDinnerQuantity'];
    $mondayDinnerQuantity = implode(",", $monday_Dinner_Quantity);
    
    $monday_Dinner_Calorie = $_POST['mondayDinnerCalorie'];
    $mondayDinnerCalorie = implode(",", $monday_Dinner_Calorie);
    
    if (count(array_filter($monday_Dinner_Meal)) == 0 || count(array_filter($monday_Dinner_Quantity)) == 0 || count(array_filter($monday_Dinner_Calorie)) == 0) {
        $mondayDinnerErr = "Fill required fields";
    }

    
    $tuesday_Breakfast_Meal = $_POST['tuesdayBreakfastMeal'];
    $tuesdayBreakfastMeal = implode(",", $tuesday_Breakfast_Meal);

    $tuesday_Breakfast_Quantity = $_POST['tuesdayBreakfastQuantity'];
    $tuesdayBreakfastQuantity = implode(",", $tuesday_Breakfast_Quantity);

    $tuesday_Breakfast_Calorie = $_POST['tuesdayBreakfastCalorie'];
    $tuesdayBreakfastCalorie = implode(",", $tuesday_Breakfast_Calorie);
    
    if (count(array_filter($tuesday_Breakfast_Meal)) == 0 || count(array_filter($tuesday_Breakfast_Quantity)) == 0 || count(array_filter($tuesday_Breakfast_Calorie)) == 0) {
        $tuesdayBreakfastErr = "Fill required fields";
    }


    $tuesday_Lunch_Meal = $_POST['tuesdayLunchMeal'];
    $tuesdayLunchMeal = implode(",", $tuesday_Lunch_Meal);

    $tuesday_Lunch_Quantity = $_POST['tuesdayLunchQuantity'];
    $tuesdayLunchQuantity = implode(",", $tuesday_Lunch_Quantity);

    $tuesday_Lunch_Calorie = $_POST['tuesdayLunchCalorie'];
    $tuesdayLunchCalorie = implode(",", $tuesday_Lunch_Calorie);
    
    if (count(array_filter($tuesday_Lunch_Meal)) == 0 || count(array_filter($tuesday_Lunch_Quantity)) == 0 || count(array_filter($tuesday_Lunch_Calorie)) == 0) {
        $tuesdayLunchErr = "Fill required fields";
    }

    
    $tuesday_Dinner_Meal = $_POST['tuesdayDinnerMeal'];
    $tuesdayDinnerMeal = implode(",", $tuesday_Dinner_Meal);

    $tuesday_Dinner_Quantity = $_POST['tuesdayDinnerQuantity'];
    $tuesdayDinnerQuantity = implode(",", $tuesday_Dinner_Quantity);

    $tuesday_Dinner_Calorie = $_POST['tuesdayDinnerCalorie'];
    $tuesdayDinnerCalorie = implode(",", $tuesday_Dinner_Calorie);
    
    if (count(array_filter($tuesday_Dinner_Meal)) == 0 || count(array_filter($tuesday_Dinner_Quantity)) == 0 || count(array_filter($tuesday_Dinner_Calorie)) == 0) {
        $tuesdayDinnertErr = "Fill required fields";
    }


    $wednesday_Breakfast_Meal = $_POST['wednesdayBreakfastMeal'];
    $wednesdayBreakfastMeal = implode(",", $wednesday_Breakfast_Meal);

    $wednesday_Breakfast_Quantity = $_POST['wednesdayBreakfastQuantity'];
    $wednesdayBreakfastQuantity = implode(",", $wednesday_Breakfast_Quantity);

    $wednesday_Breakfast_Calorie = $_POST['wednesdayBreakfastCalorie'];
    $wednesdayBreakfastCalorie = implode(",", $wednesday_Breakfast_Calorie);
    
    if (count(array_filter($wednesday_Breakfast_Meal)) == 0 || count(array_filter($wednesday_Breakfast_Quantity)) == 0 || count(array_filter($wednesday_Breakfast_Calorie)) == 0) {
        $wednesdayBreakfastErr = "Fill required fields";
    }


    $wednesday_Lunch_Meal = $_POST['wednesdayLunchMeal'];
    $wednesdayLunchMeal = implode(",", $wednesday_Lunch_Meal);

    $wednesday_Lunch_Quantity = $_POST['wednesdayLunchQuantity'];
    $wednesdayLunchQuantity = implode(",", $wednesday_Lunch_Quantity);

    $wednesday_Lunch_Calorie = $_POST['wednesdayLunchCalorie'];
    $wednesdayLunchCalorie = implode(",", $wednesday_Lunch_Calorie);
    
    if (count(array_filter($wednesday_Lunch_Meal)) == 0 || count(array_filter($wednesday_Lunch_Quantity)) == 0 || count(array_filter($wednesday_Lunch_Calorie)) == 0) {
        $wednesdayLunchErr = "Fill required fields";
    }


    $wednesday_Dinner_Meal = $_POST['wednesdayDinnerMeal'];
    $wednesdayDinnerMeal = implode(",", $wednesday_Dinner_Meal);

    $wednesday_Dinner_Quantity = $_POST['wednesdayDinnerQuantity'];
    $wednesdayDinnerQuantity = implode(",", $wednesday_Dinner_Quantity);

    $wednesday_Dinner_Calorie = $_POST['wednesdayDinnerCalorie'];
    $wednesdayDinnerCalorie = implode(",", $wednesday_Dinner_Calorie);
    
    if (count(array_filter($wednesday_Dinner_Meal)) == 0 || count(array_filter($wednesday_Dinner_Quantity)) == 0 || count(array_filter($wednesday_Dinner_Calorie)) == 0) {
        $wednesdayDinnerErr = "Fill required fields";
    }
    

    $thursday_Breakfast_Meal = $_POST['thursdayBreakfastMeal'];
    $thursdayBreakfastMeal = implode(",", $thursday_Breakfast_Meal);

    $thursday_Breakfast_Quantity = $_POST['thursdayBreakfastQuantity'];
    $thursdayBreakfastQuantity = implode(",", $thursday_Breakfast_Quantity);

    $thursday_Breakfast_Calorie = $_POST['thursdayBreakfastCalorie'];
    $thursdayBreakfastCalorie = implode(",", $thursday_Breakfast_Calorie);
    
    if (count(array_filter($thursday_Breakfast_Meal)) == 0 || count(array_filter($thursday_Breakfast_Quantity)) == 0 || count(array_filter($thursday_Breakfast_Calorie)) == 0) {
        $thursdayBreakfastErr = "Fill required fields";
    }


    $thursday_Lunch_Meal = $_POST['thursdayLunchMeal'];
    $thursdayLunchMeal = implode(",", $thursday_Lunch_Meal);

    $thursday_Lunch_Quantity= $_POST['thursdayLunchQuantity'];
    $thursdayLunchQuantity = implode(",", $thursday_Lunch_Quantity);
    
    $thursday_Lunch_Calorie = $_POST['thursdayLunchCalorie'];
    $thursdayLunchCalorie = implode(",", $thursday_Lunch_Calorie);
    
    if (count(array_filter($thursday_Lunch_Meal)) == 0 || count(array_filter($thursday_Lunch_Quantity)) == 0 || count(array_filter($thursday_Lunch_Calorie)) == 0) {
        $thursdayLunchErr = "Fill required fields";
    }


    $thursday_Dinner_Meal = $_POST['thursdayDinnerMeal'];
    $thursdayDinnerMeal = implode(",", $thursday_Dinner_Meal);

    $thursday_Dinner_Quantity= $_POST['thursdayDinnerQuantity'];
    $thursdayDinnerQuantity = implode(",", $thursday_Dinner_Quantity);
    
    $thursday_Dinner_Calorie = $_POST['thursdayDinnerCalorie'];
    $thursdayDinnerCalorie = implode(",", $thursday_Dinner_Calorie);
    
    if (count(array_filter($thursday_Dinner_Meal)) == 0 || count(array_filter($thursday_Dinner_Quantity)) == 0 || count(array_filter($thursday_Dinner_Calorie)) == 0) {
        $thursdayDinnerErr = "Fill required fields";
    }


    $friday_Breakfast_Meal = $_POST['fridayBreakfastMeal'];
    $fridayBreakfastMeal = implode(",", $friday_Breakfast_Meal);

    $friday_Breakfast_Quantity = $_POST['fridayBreakfastQuantity'];
    $fridayBreakfastQuantity = implode(",", $friday_Breakfast_Quantity);

    $friday_Breakfast_Calorie = $_POST['fridayBreakfastCalorie'];
    $fridayBreakfastCalorie = implode(",", $friday_Breakfast_Calorie);
    
    if (count(array_filter($friday_Breakfast_Meal)) == 0 || count(array_filter($friday_Breakfast_Quantity)) == 0 || count(array_filter($friday_Breakfast_Calorie)) == 0) {
        $fridayBreakfastErr = "Fill required fields";
    } 


    $friday_Lunch_Meal = $_POST['fridayLunchMeal'];
    $fridayLunchMeal = implode(",", $friday_Lunch_Meal);

    $friday_Lunch_Quantity= $_POST['fridayLunchQuantity'];
    $fridayLunchQuantity = implode(",", $friday_Lunch_Quantity);
    
    $friday_Lunch_Calorie = $_POST['fridayLunchCalorie'];
    $fridayLunchCalorie = implode(",", $friday_Lunch_Calorie);
    
    if (count(array_filter($friday_Lunch_Meal)) == 0 || count(array_filter($friday_Lunch_Quantity)) == 0 || count(array_filter($friday_Lunch_Calorie)) == 0) {
        $fridayLunchErr = "Fill required fields";
    }


    $friday_Dinner_Meal = $_POST['fridayDinnerMeal'];
    $fridayDinnerMeal = implode(",", $friday_Dinner_Meal);

    $friday_Dinner_Quantity= $_POST['fridayDinnerQuantity'];
    $fridayDinnerQuantity = implode(",", $friday_Dinner_Quantity);
    
    $friday_Dinner_Calorie = $_POST['fridayDinnerCalorie'];
    $fridayDinnerCalorie = implode(",", $friday_Dinner_Calorie);
    
    if (count(array_filter($friday_Dinner_Meal)) == 0 || count(array_filter($friday_Dinner_Quantity)) == 0 || count(array_filter($friday_Dinner_Calorie)) == 0) {
        $fridayDinnerErr = "Fill required fields";
    }


    $saturday_Breakfast_Meal = $_POST['saturdayBreakfastMeal'];
    $saturdayBreakfastMeal = implode(",", $saturday_Breakfast_Meal);

    $saturday_Breakfast_Quantity = $_POST['saturdayBreakfastQuantity'];
    $saturdayBreakfastQuantity = implode(",", $saturday_Breakfast_Quantity);

    $saturday_Breakfast_Calorie = $_POST['saturdayBreakfastCalorie'];
    $saturdayBreakfastCalorie = implode(",", $saturday_Breakfast_Calorie);
    
    if (count(array_filter($saturday_Breakfast_Meal)) == 0 || count(array_filter($saturday_Breakfast_Quantity)) == 0 || count(array_filter($saturday_Breakfast_Calorie)) == 0) {
        $saturdayBreakfastErr = "Fill required fields";
    }


    $saturday_Lunch_Meal = $_POST['saturdayLunchMeal'];
    $saturdayLunchMeal = implode(",", $saturday_Lunch_Meal);

    $saturday_Lunch_Quantity= $_POST['saturdayLunchQuantity'];
    $saturdayLunchQuantity = implode(",", $saturday_Lunch_Quantity);
    
    $saturday_Lunch_Calorie = $_POST['saturdayLunchCalorie'];
    $saturdayLunchCalorie = implode(",", $saturday_Lunch_Calorie);
    
    if (count(array_filter($saturday_Lunch_Meal)) == 0 || count(array_filter($saturday_Lunch_Quantity)) == 0 || count(array_filter($saturday_Lunch_Calorie)) == 0) {
        $saturdayLunchErr = "Fill required fields";
    }


    $saturday_Dinner_Meal = $_POST['saturdayDinnerMeal'];
    $saturdayDinnerMeal = implode(",", $saturday_Dinner_Meal);

    $saturday_Dinner_Quantity= $_POST['saturdayDinnerQuantity'];
    $saturdayDinnerQuantity = implode(",", $saturday_Dinner_Quantity);
    
    $saturday_Dinner_Calorie = $_POST['saturdayDinnerCalorie'];
    $saturdayDinnerCalorie = implode(",", $saturday_Dinner_Calorie);
    
    if (count(array_filter($saturday_Dinner_Meal)) == 0 || count(array_filter($saturday_Dinner_Quantity)) == 0 || count(array_filter($saturday_Dinner_Calorie)) == 0) {
        $saturdayDinnerErr = "Fill required fields";
    }

    $sunday_Breakfast_Meal = $_POST['sundayBreakfastMeal'];
    $sundayBreakfastMeal = implode(",", $sunday_Breakfast_Meal);

    $sunday_Breakfast_Quantity = $_POST['sundayBreakfastQuantity'];
    $sundayBreakfastQuantity = implode(",", $sunday_Breakfast_Quantity);

    $sunday_Breakfast_Calorie = $_POST['sundayBreakfastCalorie'];
    $sundayBreakfastCalorie = implode(",", $sunday_Breakfast_Calorie);
    
    if (count(array_filter($sunday_Breakfast_Meal)) == 0 || count(array_filter($sunday_Breakfast_Quantity)) == 0 || count(array_filter($sunday_Breakfast_Calorie)) == 0) {
        $sundayBreakfastErr = "Fill required fields";
    } 


    $sunday_Lunch_Meal = $_POST['sundayLunchMeal'];
    $sundayLunchMeal = implode(",", $sunday_Lunch_Meal);

    $sunday_Lunch_Quantity= $_POST['sundayLunchQuantity'];
    $sundayLunchQuantity = implode(",", $sunday_Lunch_Quantity);
    
    $sunday_Lunch_Calorie = $_POST['sundayLunchCalorie'];
    $sundayLunchCalorie = implode(",", $sunday_Lunch_Calorie);
    
    if (count(array_filter($sunday_Lunch_Meal)) == 0 || count(array_filter($sunday_Lunch_Quantity)) == 0 || count(array_filter($sunday_Lunch_Calorie)) == 0) {
        $sundayLunchErr = "Fill required fields";
    }
    

    $sunday_Dinner_Meal = $_POST['sundayDinnerMeal'];
    $sundayDinnerMeal = implode(",", $sunday_Dinner_Meal);

    $sunday_Dinner_Quantity= $_POST['sundayDinnerQuantity'];
    $sundayDinnerQuantity = implode(",", $sunday_Dinner_Quantity);
    
    $sunday_Dinner_Calorie = $_POST['sundayDinnerCalorie'];
    $sundayDinnerCalorie = implode(",", $sunday_Dinner_Calorie);
    
    if (count(array_filter($sunday_Dinner_Meal)) == 0 || count(array_filter($sunday_Dinner_Quantity)) == 0 || count(array_filter($sunday_Dinner_Calorie)) == 0) {
        $sundayDinnerErr = "Fill required fields";
    }


    if(empty($mondayBreakfastErr) && empty($mondayLunchErr) && empty($mondayDinnerErr)){
        
        $query11 = "UPDATE dietplan SET 
        breakfastMeal = '$mondayBreakfastMeal',
        breakfastQty = '$mondayBreakfastQuantity',
        breakfastCal = '$mondayBreakfastCalorie',
        lunchMeal = '$mondayLunchMeal',
        lunchQty = '$mondayLunchQuantity',
        lunchCal = '$mondayLunchCalorie',
        dinnerMeal = '$mondayDinnerMeal',
        dinnerQty = '$mondayDinnerQuantity', 
        dinnerCal = '$mondayDinnerCalorie'
        WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 1";

        $result11 = mysqli_query($conn, $query11);
            
        if(!$result11){
            echo '<script> window.alert("Error of updating monday diet plan!");</script>';
        }    
    }
            


    if(empty($tuesdayBreakfastErr) && empty($tuesdayLunchErr) && empty($tuesdayDinnertErr)){
        
        $query12 = "UPDATE dietplan SET 
        breakfastMeal = '$tuesdayBreakfastMeal',
        breakfastQty = '$tuesdayBreakfastQuantity',
        breakfastCal = '$tuesdayBreakfastCalorie',
        lunchMeal = '$tuesdayLunchMeal',
        lunchQty = '$tuesdayLunchQuantity',
        lunchCal = '$tuesdayLunchCalorie',
        dinnerMeal = '$tuesdayDinnerMeal',
        dinnerQty = '$tuesdayDinnerQuantity', 
        dinnerCal = '$tuesdayDinnerCalorie'
        WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 2";

        $result12 = mysqli_query($conn, $query12);
            
        if(!$result12){
            echo '<script> window.alert("Error of updating tuesday diet plan!");</script>';
        }
    }

    if(empty($wednesdayBreakfastErr) && empty($wednesdayLunchErr) && empty($wednesdayDinnerErr)){
        
        $query13 = "UPDATE dietplan SET 
        breakfastMeal = '$wednesdayBreakfastMeal',
        breakfastQty = '$wednesdayBreakfastQuantity',
        breakfastCal = '$wednesdayBreakfastCalorie',
        lunchMeal = '$wednesdayLunchMeal',
        lunchQty = '$wednesdayLunchQuantity',
        lunchCal = '$wednesdayLunchCalorie',
        dinnerMeal = '$wednesdayDinnerMeal',
        dinnerQty = '$wednesdayDinnerQuantity', 
        dinnerCal = '$wednesdayDinnerCalorie'
        WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 3";

        $result13 = mysqli_query($conn, $query13);
            
        if(!$result13){
            echo '<script> window.alert("Error of updating wednesday diet plan!");</script>';
        } 
    }
    
    if(empty($thursdayBreakfastErr) && empty($thursdayLunchErr) && empty($thursdayDinnerErr)){
        
        $query14 = "UPDATE dietplan SET 
        breakfastMeal = '$thursdayBreakfastMeal',
        breakfastQty = '$thursdayBreakfastQuantity',
        breakfastCal = '$thursdayBreakfastCalorie',
        lunchMeal = '$thursdayLunchMeal',
        lunchQty = '$thursdayLunchQuantity',
        lunchCal = '$thursdayLunchCalorie',
        dinnerMeal = '$thursdayDinnerMeal',
        dinnerQty = '$thursdayDinnerQuantity', 
        dinnerCal = '$thursdayDinnerCalorie'
        WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 4";

        $result14 = mysqli_query($conn, $query14);
            
        if(!$result14){
            echo '<script> window.alert("Error of updating thursday diet plan!");</script>';
        }
    }

    if(empty($fridayBreakfastErr) && empty($fridayLunchErr) && empty($fridayDinnerErr)){
        
        $query15 = "UPDATE dietplan SET 
        breakfastMeal = '$fridayBreakfastMeal',
        breakfastQty = '$fridayBreakfastQuantity',
        breakfastCal = '$fridayBreakfastCalorie',
        lunchMeal = '$fridayLunchMeal',
        lunchQty = '$fridayLunchQuantity',
        lunchCal = '$fridayLunchCalorie',
        dinnerMeal = '$fridayDinnerMeal',
        dinnerQty = '$fridayDinnerQuantity', 
        dinnerCal = '$fridayDinnerCalorie'
        WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 5";

        $result15 = mysqli_query($conn, $query15);
            
        if(!$result15){
            echo '<script> window.alert("Error of updating friday diet plan!");</script>';
        }
    }

    if(empty($saturdayBreakfastErr) && empty($saturdayLunchErr) && empty($saturdayDinnerErr)){
        
        $query16 = "UPDATE dietplan SET 
        breakfastMeal = '$saturdayBreakfastMeal',
        breakfastQty = '$saturdayBreakfastQuantity',
        breakfastCal = '$saturdayBreakfastCalorie',
        lunchMeal = '$saturdayLunchMeal',
        lunchQty = '$saturdayLunchQuantity',
        lunchCal = '$saturdayLunchCalorie',
        dinnerMeal = '$saturdayDinnerMeal',
        dinnerQty = '$saturdayDinnerQuantity', 
        dinnerCal = '$saturdayDinnerCalorie'
        WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 6";

        $result16 = mysqli_query($conn, $query16);
            
        if(!$result16){
            echo '<script> window.alert("Error of updating saturday diet plan!");</script>';
        } 
    }

    if(empty($sundayBreakfastErr) && empty($sundayLunchErr) && empty($sundayDinnerErr)){
        
        $query17 = "UPDATE dietplan SET 
        breakfastMeal = '$sundayBreakfastMeal',
        breakfastQty = '$sundayBreakfastQuantity',
        breakfastCal = '$sundayBreakfastCalorie',
        lunchMeal = '$sundayLunchMeal',
        lunchQty = '$sundayLunchQuantity',
        lunchCal = '$sundayLunchCalorie',
        dinnerMeal = '$sundayDinnerMeal',
        dinnerQty = '$sundayDinnerQuantity', 
        dinnerCal = '$sundayDinnerCalorie'
        WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 7";

        $result17 = mysqli_query($conn, $query17);
            
        if(!$result17){
            echo '<script> window.alert("Error of updating saturday diet plan!");</script>';
        } 
    }

    // echo '<script> window.alert("You have bean updated dietplan successfully!");</script>';
    // echo '<script> window.location.href="dietPlan.php"</script>';

    
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Diet Plan</title>
    <link href="Style/updateDietPlan1.css" rel="stylesheet">
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
            <form method="post">
                <table>
                    <tr>
                        <td class="gridTopic"></td>
                        <td class="gridTopic">Breafastk</td>
                        <td class="gridTopic">Lunch</td>
                        <td class="gridTopic">Dinner</td>
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
                        <td colspan="4">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td class="gridTopic">Monday</td>
                        <td>
                            <div>
                                <span class="error">
                                    <?php echo "*" . $mondayBreakfastErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayBreakfastMeal[]" class="meal"
                                                value="<?php echo $mondayBreakfastMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $mondayBreakfastQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $mondayBreakfastCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type=" text" name="mondayBreakfastMeal[]" class="meal"
                                                value="<?php echo $mondayBreakfastMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $mondayBreakfastQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $mondayBreakfastCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayBreakfastMeal[]" class="meal"
                                                value="<?php echo $mondayBreakfastMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $mondayBreakfastQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $mondayBreakfastCalorieShow[2] ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="error">
                                    <?php echo "*" . $mondayLunchErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayLunchMeal[]" class="meal"
                                                value="<?php echo $mondayLunchMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayLunchQuantity[]" class="quantity"
                                                value="<?php echo $mondayLunchQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayLunchCalorie[]" class="calorie"
                                                value="<?php echo $mondayLunchCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayLunchMeal[]" class="meal"
                                                value="<?php echo $mondayLunchMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayLunchQuantity[]" class="quantity"
                                                value="<?php echo $mondayLunchQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayLunchCalorie[]" class="calorie"
                                                value="<?php echo $mondayLunchCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayLunchMeal[]" class="meal"
                                                value="<?php echo $mondayLunchMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayLunchQuantity[]" class="quantity"
                                                value="<?php echo $mondayLunchQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayLunchCalorie[]" class="calorie"
                                                value="<?php echo $mondayLunchCalorieShow[2] ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="error">
                                    <?php echo "*" . $mondayDinnerErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayDinnerMeal[]" class="meal"
                                                value="<?php echo $mondayDinnerMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $mondayDinnerQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $mondayDinnerCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayDinnerMeal[]" class="meal"
                                                value="<?php echo $mondayDinnerMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $mondayDinnerQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $mondayDinnerCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayDinnerMeal[]" class="meal"
                                                value="<?php echo $mondayDinnerMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $mondayDinnerQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $mondayDinnerCalorieShow[2] ?>">
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
                                <span class="error">
                                    <?php echo "*" . $tuesdayBreakfastErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $tuesdayBreakfastMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayBreakfastQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayBreakfastCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $tuesdayBreakfastMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayBreakfastQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayBreakfastCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $tuesdayBreakfastMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayBreakfastQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayBreakfastCalorieShow[2] ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="error">
                                    <?php echo "*" . $tuesdayLunchErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayLunchMeal[]" class="meal"
                                                value="<?php echo $tuesdayLunchMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayLunchQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayLunchCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayLunchMeal[]" class="meal"
                                                value="<?php echo $tuesdayLunchMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayLunchQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayLunchCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayLunchMeal[]" class="meal"
                                                value="<?php echo $tuesdayLunchMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayLunchQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayLunchCalorieShow[2] ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="error">
                                    <?php echo "*" . $tuesdayDinnertErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayDinnerMeal[]" class="meal"
                                                value="<?php echo $tuesdayDinnerMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayDinnerQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayDinnerCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayDinnerMeal[]" class="meal"
                                                value="<?php echo $tuesdayDinnerMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayDinnerQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayDinnerCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayDinnerMeal[]" class="meal"
                                                value="<?php echo $tuesdayDinnerMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $tuesdayDinnerQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $tuesdayDinnerCalorieShow[2] ?>">
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
                                <span class="error">
                                    <?php echo "*" . $wednesdayBreakfastErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $wednesdayBreakfastMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayBreakfastQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayBreakfastCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $wednesdayBreakfastMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayBreakfastQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayBreakfastCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $wednesdayBreakfastMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayBreakfastQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayBreakfastCalorieShow[2] ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="error">
                                    <?php echo "*" . $wednesdayLunchErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayLunchMeal[]" class="meal"
                                                value="<?php echo $wednesdayLunchMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayLunchQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayLunchCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayLunchMeal[]" class="meal"
                                                value="<?php echo $wednesdayLunchMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayLunchQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayLunchCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayLunchMeal[]" class="meal"
                                                value="<?php echo $wednesdayLunchMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayLunchQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayLunchCalorieShow[2] ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="error">
                                    <?php echo "*" . $wednesdayDinnerErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayDinnerMeal[]" class="meal"
                                                value="<?php echo $wednesdayDinnerMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayDinnerQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayDinnerCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayDinnerMeal[]" class="meal"
                                                value="<?php echo $wednesdayDinnerMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayDinnerQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayDinnerCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="wednesdayDinnerMeal[]" class="meal"
                                                value="<?php echo $wednesdayDinnerMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $wednesdayDinnerQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $wednesdayDinnerCalorieShow[2] ?>">
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
                                <span class="error">
                                    <?php echo "*" . $thursdayBreakfastErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $thursdayBreakfastMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $thursdayBreakfastQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $thursdayBreakfastCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $thursdayBreakfastMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $thursdayBreakfastQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $thursdayBreakfastCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $thursdayBreakfastMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $thursdayBreakfastQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $thursdayBreakfastCalorieShow[2] ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="error">
                                    <?php echo "*" . $thursdayLunchErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayLunchMeal[]" class="meal"
                                                value="<?php echo $thursdayLunchMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $thursdayLunchQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $thursdayLunchCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayLunchMeal[]" class="meal"
                                                value="<?php echo $thursdayLunchMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $thursdayLunchQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $thursdayLunchCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayLunchMeal[]" class="meal"
                                                value="<?php echo $thursdayLunchMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $thursdayLunchQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $thursdayLunchCalorieShow[2] ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="error">
                                    <?php echo "*" . $thursdayDinnerErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayDinnerMeal[]" class="meal"
                                                value="<?php echo $thursdayDinnerMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $thursdayDinnerQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $thursdayDinnerCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayDinnerMeal[]" class="meal"
                                                value="<?php echo $thursdayDinnerMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $thursdayDinnerQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $thursdayDinnerCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="thursdayDinnerMeal[]" class="meal"
                                                value="<?php echo $thursdayDinnerMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $thursdayDinnerQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $thursdayDinnerCalorieShow[2] ?>">
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
                                <span class="error">
                                    <?php echo "*" . $fridayBreakfastErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayBreakfastMeal[]" class="meal"
                                                value="<?php echo $fridayBreakfastMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $fridayBreakfastQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $fridayBreakfastCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayBreakfastMeal[]" class="meal"
                                                value="<?php echo $fridayBreakfastMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $fridayBreakfastQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $fridayBreakfastCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayBreakfastMeal[]" class="meal"
                                                value="<?php echo $fridayBreakfastMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $fridayBreakfastQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $fridayBreakfastCalorieShow[2] ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="error">
                                    <?php echo "*" . $fridayLunchErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayLunchMeal[]" class="meal"
                                                value="<?php echo $fridayLunchMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayLunchQuantity[]" class="quantity"
                                                value="<?php echo $fridayLunchQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayLunchCalorie[]" class="calorie"
                                                value="<?php echo $fridayLunchCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayLunchMeal[]" class="meal"
                                                value="<?php echo $fridayLunchMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayLunchQuantity[]" class="quantity"
                                                value="<?php echo $fridayLunchQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayLunchCalorie[]" class="calorie"
                                                value="<?php echo $fridayLunchCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayLunchMeal[]" class="meal"
                                                value="<?php echo $fridayLunchMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayLunchQuantity[]" class="quantity"
                                                value="<?php echo $fridayLunchQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayLunchCalorie[]" class="calorie"
                                                value="<?php echo $fridayLunchCalorieShow[2] ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="error">
                                    <?php echo "*" . $fridayDinnerErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayDinnerMeal[]" class="meal"
                                                value="<?php echo $fridayDinnerMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $fridayDinnerQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $fridayDinnerCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayDinnerMeal[]" class="meal"
                                                value="<?php echo $fridayDinnerMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $fridayDinnerQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $fridayDinnerCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="fridayDinnerMeal[]" class="meal"
                                                value="<?php echo $fridayDinnerMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $fridayDinnerQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $fridayDinnerCalorieShow[2] ?>">
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
                                <span class="error">
                                    <?php echo "*" . $saturdayBreakfastErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $saturdayBreakfastMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $saturdayBreakfastQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $saturdayBreakfastCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $saturdayBreakfastMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $saturdayBreakfastQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $saturdayBreakfastCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayBreakfastMeal[]" class="meal"
                                                value="<?php echo $saturdayBreakfastMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $saturdayBreakfastQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $saturdayBreakfastCalorieShow[2] ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="error">
                                    <?php echo "*" . $saturdayLunchErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayLunchMeal[]" class="meal"
                                                value="<?php echo $saturdayLunchMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $saturdayLunchQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $saturdayLunchCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayLunchMeal[]" class="meal"
                                                value="<?php echo $saturdayLunchMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $saturdayLunchQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $saturdayLunchCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayLunchMeal[]" class="meal"
                                                value="<?php echo $saturdayLunchMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayLunchQuantity[]" class="quantity"
                                                value="<?php echo $saturdayLunchQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayLunchCalorie[]" class="calorie"
                                                value="<?php echo $saturdayLunchCalorieShow[2] ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="error">
                                    <?php echo "*" . $saturdayDinnerErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayDinnerMeal[]" class="meal"
                                                value="<?php echo $saturdayDinnerMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $saturdayDinnerQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $saturdayDinnerCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayDinnerMeal[]" class="meal"
                                                value="<?php echo $saturdayDinnerMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $saturdayDinnerQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $saturdayDinnerCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayDinnerMeal[]" class="meal"
                                                value="<?php echo $saturdayDinnerMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $saturdayDinnerQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $saturdayDinnerCalorieShow[2] ?>">
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
                                <span class="error">
                                    <?php echo "*" . $sundayBreakfastErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayBreakfastMeal[]" class="meal"
                                                value="<?php echo $sundayBreakfastMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $sundayBreakfastQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $sundayBreakfastCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayBreakfastMeal[]" class="meal"
                                                value="<?php echo $sundayBreakfastMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $sundayBreakfastQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $sundayBreakfastCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayBreakfastMeal[]" class="meal"
                                                value="<?php echo $sundayBreakfastMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayBreakfastQuantity[]" class="quantity"
                                                value="<?php echo $sundayBreakfastQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayBreakfastCalorie[]" class="calorie"
                                                value="<?php echo $sundayBreakfastCalorieShow[2] ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="error">
                                    <?php echo "*" . $sundayLunchErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayLunchMeal[]" class="meal"
                                                value="<?php echo $sundayLunchMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayLunchQuantity[]" class="quantity"
                                                value="<?php echo $sundayLunchQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayLunchCalorie[]" class="calorie"
                                                value="<?php echo $sundayLunchCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayLunchMeal[]" class="meal"
                                                value="<?php echo $sundayLunchMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayLunchQuantity[]" class="quantity"
                                                value="<?php echo $sundayLunchQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayLunchCalorie[]" class="calorie"
                                                value="<?php echo $sundayLunchCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayLunchMeal[]" class="meal"
                                                value="<?php echo $sundayLunchMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayLunchQuantity[]" class="quantity"
                                                value="<?php echo $sundayLunchQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayLunchCalorie[]" class="calorie"
                                                value="<?php echo $sundayLunchCalorieShow[2] ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="error">
                                    <?php echo "*" . $sundayDinnerErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayDinnerMeal[]" class="meal"
                                                value="<?php echo $sundayDinnerMealShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $sundayDinnerQuantityShow[0] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $sundayDinnerCalorieShow[0] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayDinnerMeal[]" class="meal"
                                                value="<?php echo $sundayDinnerMealShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $sundayDinnerQuantityShow[1] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $sundayDinnerCalorieShow[1] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="sundayDinnerMeal[]" class="meal"
                                                value="<?php echo $sundayDinnerMealShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayDinnerQuantity[]" class="quantity"
                                                value="<?php echo $sundayDinnerQuantityShow[2] ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayDinnerCalorie[]" class="calorie"
                                                value="<?php echo $sundayDinnerCalorieShow[2] ?>">
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