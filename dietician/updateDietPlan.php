<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);


if (isset($_GET['update'])) {
    $memberID = $_GET['update'];
}

$mondayBreakfastErr = $mondayLunchErr = $mondayDinnerErr = $tuesdayBreakfastErr = $tuesdayLunchErr = $tuesdayDinnerErr = $wednesdayBreakfastErr = $wednesdayLunchErr = $wednesdayDinnerErr = $thursdayBreakfastErr = $thursdayLunchErr = $thursdayDinnerErr = $fridayBreakfastErr = $fridayLunchErr = $fridayDinnerErr = $saturdayBreakfastErr = $saturdayLunchErr = $saturdayDinnerErr = $sundayBreakfastErr = $sundayLunchErr = $sundayDinnerErr = "";


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


if(isset($_POST['update'])){
    
    $monday_Breakfast_Meal = $_POST['mondayBreakfastMeal'];
    $monday_Breakfast_Quantity = $_POST['mondayBreakfastQuantity'];
    $monday_Breakfast_Calorie = $_POST['mondayBreakfastCalorie'];

    if(!is_numeric($monday_Breakfast_Calorie)){
        $mondayBreakfastErr = "Breakfast calorie should be a number";
    }
     
    if(empty($monday_Breakfast_Meal) || empty($monday_Breakfast_Quantity) || empty($monday_Breakfast_Calorie)){
        $mondayBreakfastErr = "Fill required fields";
    }

    $monday_Lunch_Meal = $_POST['mondayLunchMeal'];
    $monday_Lunch_Quantity = $_POST['mondayLunchQuantity'];
    $monday_Lunch_Calorie = $_POST['mondayLunchCalorie'];

    if(!is_numeric($monday_Lunch_Calorie)){
        $mondayLunchErr = "Lunch calorie should be a number";
    }
     
    if(empty($monday_Lunch_Meal) || empty($monday_Lunch_Quantity) || empty($monday_Lunch_Calorie)){
        $mondayLunchErr = "Fill required fields";
    }

    $monday_Dinner_Meal = $_POST['mondayDinnerMeal'];
    $monday_Dinner_Quantity = $_POST['mondayDinnerQuantity'];
    $monday_Dinner_Calorie = $_POST['mondayDinnerCalorie'];

    if(!is_numeric($monday_Dinner_Calorie)){
        $mondayDinnerErr = "Dinner calorie should be a number";
    }
     
    if(empty($monday_Dinner_Meal) || empty($monday_Dinner_Quantity) || empty($monday_Dinner_Calorie)){
        $mondayDinnerErr = "Fill required fields";
    }
    
    if(empty($mondayBreakfastErr) && empty($mondayLunchErr) && empty($mondayDinnerErr)){
        
        $query11 = "UPDATE dietplan SET 
        breakfastMeal = '$monday_Breakfast_Meal',
        breakfastQty = '$monday_Breakfast_Quantity',
        breakfastCal = '$monday_Breakfast_Calorie',
        lunchMeal = '$monday_Lunch_Meal',
        lunchQty = '$monday_Lunch_Quantity',
        lunchCal = '$monday_Lunch_Calorie',
        dinnerMeal = '$monday_Dinner_Meal',
        dinnerQty = '$monday_Dinner_Quantity', 
        dinnerCal = '$monday_Dinner_Calorie'
        WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 1";

        $result11 = mysqli_query($conn, $query11);
            
        if(!$result11){
            echo '<script> window.alert("Error of updating monday diet plan!");</script>';
        }    
    }



    $tuesday_Breakfast_Meal = $_POST['tuesdayBreakfastMeal'];
    $tuesday_Breakfast_Quantity = $_POST['tuesdayBreakfastQuantity'];
    $tuesday_Breakfast_Calorie = $_POST['tuesdayBreakfastCalorie'];
    
    if(!is_numeric($tuesday_Breakfast_Calorie)){
        $tuesdayBreakfastErr = "Breakfast calorie should be a number";
    }
     
    if(empty($tuesday_Breakfast_Meal) || empty($tuesday_Breakfast_Quantity) || empty($tuesday_Breakfast_Calorie)){
        $tuesdayBreakfastErr = "Fill required fields";
    }

    $tuesday_Lunch_Meal = $_POST['tuesdayLunchMeal'];
    $tuesday_Lunch_Quantity = $_POST['tuesdayLunchQuantity'];
    $tuesday_Lunch_Calorie = $_POST['tuesdayLunchCalorie'];
    
    if(!is_numeric($tuesday_Lunch_Calorie)){
        $tuesdayLunchErr = "Lunch calorie should be a number";
    }
     
    if(empty($tuesday_Lunch_Meal) || empty($tuesday_Lunch_Quantity) || empty($tuesday_Lunch_Calorie)){
        $tuesdayLunchErr = "Fill required fields";
    }

    $tuesday_Dinner_Meal = $_POST['tuesdayDinnerMeal'];
    $tuesday_Dinner_Quantity = $_POST['tuesdayDinnerQuantity'];
    $tuesday_Dinner_Calorie = $_POST['tuesdayDinnerCalorie'];
    
    if(!is_numeric($tuesday_Dinner_Calorie)){
        $tuesdayDinnerErr = "Dinner calorie should be a number";
    }
     
    if(empty($tuesday_Dinner_Meal) || empty($tuesday_Dinner_Quantity) || empty($tuesday_Dinner_Calorie)){
        $tuesdayDinnerErr = "Fill required fields";
    }

    if(empty($tuesdayBreakfastErr) && empty($tuesdayLunchErr) && empty($tuesdayDinnertErr)){
        
        $query12 = "UPDATE dietplan SET 
        breakfastMeal = '$tuesday_Breakfast_Meal',
        breakfastQty = '$tuesday_Breakfast_Quantity',
        breakfastCal = '$tuesday_Breakfast_Calorie',
        lunchMeal = '$tuesday_Lunch_Meal',
        lunchQty = '$tuesday_Lunch_Quantity',
        lunchCal = '$tuesday_Lunch_Calorie',
        dinnerMeal = '$tuesday_Dinner_Meal',
        dinnerQty = '$tuesday_Dinner_Quantity', 
        dinnerCal = '$tuesday_Dinner_Calorie'
        WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 2";

        $result12 = mysqli_query($conn, $query12);
            
        if(!$result12){
            echo '<script> window.alert("Error of updating tuesday diet plan!");</script>';
        }
    }



    $wednesday_Breakfast_Meal = $_POST['wednesdayBreakfastMeal'];
    $wednesday_Breakfast_Quantity = $_POST['wednesdayBreakfastQuantity'];
    $wednesday_Breakfast_Calorie = $_POST['wednesdayBreakfastCalorie'];

    if(!is_numeric($wednesday_Breakfast_Calorie)){
        $wednesdayBreakfastErr = "Breakfast calorie should be a number";
    }
     
    if(empty($wednesday_Breakfast_Meal) || empty($wednesday_Breakfast_Quantity) || empty($wednesday_Breakfast_Calorie)){
        $wednesdayBreakfastErr = "Fill required fields";
    }
    
    $wednesday_Lunch_Meal = $_POST['wednesdayLunchMeal'];
    $wednesday_Lunch_Quantity = $_POST['wednesdayLunchQuantity'];
    $wednesday_Lunch_Calorie = $_POST['wednesdayLunchCalorie'];

    if(!is_numeric($wednesday_Lunch_Calorie)){
        $wednesdayLunchErr = "Lunch calorie should be a number";
    }
     
    if(empty($wednesday_Lunch_Meal) || empty($wednesday_Lunch_Quantity) || empty($wednesday_Lunch_Calorie)){
        $wednesdayLunchErr = "Fill required fields";
    }
    
    $wednesday_Dinner_Meal = $_POST['wednesdayDinnerMeal'];
    $wednesday_Dinner_Quantity = $_POST['wednesdayDinnerQuantity'];
    $wednesday_Dinner_Calorie = $_POST['wednesdayDinnerCalorie'];

    if(!is_numeric($wednesday_Dinner_Calorie)){
        $wednesdayDinnerErr = "Dinner calorie should be a number";
    }
     
    if(empty($wednesday_Dinner_Meal) || empty($wednesday_Dinner_Quantity) || empty($wednesday_Dinner_Calorie)){
        $wednesdayDinnerErr = "Fill required fields";
    }
    
    if(empty($wednesdayBreakfastErr) && empty($wednesdayLunchErr) && empty($wednesdayDinnerErr)){
        
        $query13 = "UPDATE dietplan SET 
        breakfastMeal = '$wednesday_Breakfast_Meal',
        breakfastQty = '$wednesday_Breakfast_Quantity',
        breakfastCal = '$wednesday_Breakfast_Calorie',
        lunchMeal = '$wednesday_Lunch_Meal',
        lunchQty = '$wednesday_Lunch_Quantity',
        lunchCal = '$wednesday_Lunch_Calorie',
        dinnerMeal = '$wednesday_Dinner_Meal',
        dinnerQty = '$wednesday_Dinner_Quantity', 
        dinnerCal = '$wednesday_Dinner_Calorie'
        WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 3";

        $result13 = mysqli_query($conn, $query13);
            
        if(!$result13){
            echo '<script> window.alert("Error of updating wednesday diet plan!");</script>';
        } 
    }



    $thursday_Breakfast_Meal = $_POST['thursdayBreakfastMeal'];
    $thursday_Breakfast_Quantity = $_POST['thursdayBreakfastQuantity'];
    $thursday_Breakfast_Calorie = $_POST['thursdayBreakfastCalorie'];
    
    if(!is_numeric($thursday_Breakfast_Calorie)){
        $thursdayBreakfastErr = "Breakfast calorie should be a number";
    }
     
    if(empty($thursday_Breakfast_Meal) || empty($thursday_Breakfast_Quantity) || empty($thursday_Breakfast_Calorie)){
        $thursdayBreakfastErr = "Fill required fields";
    }

    $thursday_Lunch_Meal = $_POST['thursdayLunchMeal'];
    $thursday_Lunch_Quantity= $_POST['thursdayLunchQuantity'];    
    $thursday_Lunch_Calorie = $_POST['thursdayLunchCalorie'];

    if(!is_numeric($thursday_Lunch_Calorie)){
        $thursdayLunchErr = "Lunch calorie should be a number";
    }
     
    if(empty($thursday_Lunch_Meal) || empty($thursday_Lunch_Quantity) || empty($thursday_Lunch_Calorie)){
        $thursdayLunchErr = "Fill required fields";
    }

    $thursday_Dinner_Meal = $_POST['thursdayDinnerMeal'];
    $thursday_Dinner_Quantity= $_POST['thursdayDinnerQuantity'];
    $thursday_Dinner_Calorie = $_POST['thursdayDinnerCalorie'];

    if(!is_numeric($thursday_Dinner_Calorie)){
        $thursdayDinnerErr = "Dinner calorie should be a number";
    }
     
    if(empty($thursday_Dinner_Meal) || empty($thursday_Dinner_Quantity) || empty($thursday_Dinner_Calorie)){
        $thursdayDinnerErr = "Fill required fields";
    }

    if(empty($thursdayBreakfastErr) && empty($thursdayLunchErr) && empty($thursdayDinnerErr)){
        
        $query14 = "UPDATE dietplan SET 
        breakfastMeal = '$thursday_Breakfast_Meal',
        breakfastQty = '$thursday_Breakfast_Quantity',
        breakfastCal = '$thursday_Breakfast_Calorie',
        lunchMeal = '$thursday_Lunch_Meal',
        lunchQty = '$thursday_Lunch_Quantity',
        lunchCal = '$thursday_Lunch_Calorie',
        dinnerMeal = '$thursday_Dinner_Meal',
        dinnerQty = '$thursday_Dinner_Quantity', 
        dinnerCal = '$thursday_Dinner_Calorie'
        WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 4";

        $result14 = mysqli_query($conn, $query14);
            
        if(!$result14){
            echo '<script> window.alert("Error of updating thursday diet plan!");</script>';
        }
    }

    
    
    $friday_Breakfast_Meal = $_POST['fridayBreakfastMeal'];
    $friday_Breakfast_Quantity = $_POST['fridayBreakfastQuantity'];
    $friday_Breakfast_Calorie = $_POST['fridayBreakfastCalorie'];

    if(!is_numeric($friday_Breakfast_Calorie)){
        $fridayBreakfastErr = "Breakfast calorie should be a number";
    }
     
    if(empty($friday_Breakfast_Meal) || empty($friday_Breakfast_Quantity) || empty($friday_Breakfast_Calorie)){
        $fridayBreakfastErr = "Fill required fields";
    }

    $friday_Lunch_Meal = $_POST['fridayLunchMeal'];
    $friday_Lunch_Quantity= $_POST['fridayLunchQuantity'];
    $friday_Lunch_Calorie = $_POST['fridayLunchCalorie'];

    if(!is_numeric($friday_Lunch_Calorie)){
        $fridayLunchErr = "Lunch calorie should be a number";
    }
     
    if(empty($friday_Lunch_Meal) || empty($friday_Lunch_Quantity) || empty($friday_Lunch_Calorie)){
        $fridayLunchErr = "Fill required fields";
    }

    $friday_Dinner_Meal = $_POST['fridayDinnerMeal'];
    $friday_Dinner_Quantity= $_POST['fridayDinnerQuantity'];
    $friday_Dinner_Calorie = $_POST['fridayDinnerCalorie'];

    if(!is_numeric($friday_Dinner_Calorie)){
        $fridayDinnerErr = "Dinner calorie should be a number";
    }
     
    if(empty($friday_Dinner_Meal) || empty($friday_Dinner_Quantity) || empty($friday_Dinner_Calorie)){
        $fridayDinnerErr = "Fill required fields";
    }

    if(empty($fridayBreakfastErr) && empty($fridayLunchErr) && empty($fridayDinnerErr)){
        
        $query15 = "UPDATE dietplan SET 
        breakfastMeal = '$friday_Breakfast_Meal',
        breakfastQty = '$friday_Breakfast_Quantity',
        breakfastCal = '$friday_Breakfast_Calorie',
        lunchMeal = '$friday_Lunch_Meal',
        lunchQty = '$friday_Lunch_Quantity',
        lunchCal = '$friday_Lunch_Calorie',
        dinnerMeal = '$friday_Dinner_Meal',
        dinnerQty = '$friday_Dinner_Quantity', 
        dinnerCal = '$friday_Dinner_Calorie'
        WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 5";

        $result15 = mysqli_query($conn, $query15);
            
        if(!$result15){
            echo '<script> window.alert("Error of updating friday diet plan!");</script>';
        }
    }


    
    $saturday_Breakfast_Meal = $_POST['saturdayBreakfastMeal'];
    $saturday_Breakfast_Quantity = $_POST['saturdayBreakfastQuantity'];
    $saturday_Breakfast_Calorie = $_POST['saturdayBreakfastCalorie'];

    if(!is_numeric($saturday_Breakfast_Calorie)){
        $saturdayBreakfastErr = "Breakfast calorie should be a number";
    }
     
    if(empty($saturday_Breakfast_Meal) || empty($saturday_Breakfast_Quantity) || empty($saturday_Breakfast_Calorie)){
        $saturdayBreakfastErr = "Fill required fields";
    }

    $saturday_Lunch_Meal = $_POST['saturdayLunchMeal'];
    $saturday_Lunch_Quantity= $_POST['saturdayLunchQuantity'];
    $saturday_Lunch_Calorie = $_POST['saturdayLunchCalorie'];

    if(!is_numeric($saturday_Lunch_Calorie)){
        $saturdayLunchErr = "Lunch calorie should be a number";
    }
     
    if(empty($saturday_Lunch_Meal) || empty($saturday_Lunch_Quantity) || empty($saturday_Lunch_Calorie)){
        $saturdayLunchErr = "Fill required fields";
    }

    $saturday_Dinner_Meal = $_POST['saturdayDinnerMeal'];
    $saturday_Dinner_Quantity= $_POST['saturdayDinnerQuantity'];
    $saturday_Dinner_Calorie = $_POST['saturdayDinnerCalorie'];

    if(!is_numeric($saturday_Dinner_Calorie)){
        $saturdayDinnerErr = "Dinner calorie should be a number";
    }
     
    if(empty($saturday_Dinner_Meal) || empty($saturday_Dinner_Quantity) || empty($saturday_Dinner_Calorie)){
        $saturdayDinnerErr = "Fill required fields";
    }

    if(empty($saturdayBreakfastErr) && empty($saturdayLunchErr) && empty($saturdayDinnerErr)){
        
        $query16 = "UPDATE dietplan SET 
        breakfastMeal = '$saturday_Breakfast_Meal',
        breakfastQty = '$saturday_Breakfast_Quantity',
        breakfastCal = '$saturday_Breakfast_Calorie',
        lunchMeal = '$saturday_Lunch_Meal',
        lunchQty = '$saturday_Lunch_Quantity',
        lunchCal = '$saturday_Lunch_Calorie',
        dinnerMeal = '$saturday_Dinner_Meal',
        dinnerQty = '$saturday_Dinner_Quantity', 
        dinnerCal = '$saturday_Dinner_Calorie'
        WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 6";

        $result16 = mysqli_query($conn, $query16);
            
        if(!$result16){
            echo '<script> window.alert("Error of updating saturday diet plan!");</script>';
        } 
    }



    $sunday_Breakfast_Meal = $_POST['sundayBreakfastMeal'];
    $sunday_Breakfast_Quantity = $_POST['sundayBreakfastQuantity'];
    $sunday_Breakfast_Calorie = $_POST['sundayBreakfastCalorie'];

    if(!is_numeric($sunday_Breakfast_Calorie)){
        $sundayBreakfastErr = "Breakfast calorie should be a number";
    }
     
    if(empty($sunday_Breakfast_Meal) || empty($sunday_Breakfast_Quantity) || empty($sunday_Breakfast_Calorie)){
        $sundayBreakfastErr = "Fill required fields";
    } 

    $sunday_Lunch_Meal = $_POST['sundayLunchMeal'];
    $sunday_Lunch_Quantity= $_POST['sundayLunchQuantity'];
    $sunday_Lunch_Calorie = $_POST['sundayLunchCalorie'];

    if(!is_numeric($sunday_Lunch_Calorie)){
        $sundayLunchErr = "Lunch calorie should be a number";
    }
     
    if(empty($sunday_Lunch_Meal) || empty($sunday_Lunch_Quantity) || empty($sunday_Lunch_Calorie)){
        $sundayLunchErr = "Fill required fields";
    }

    $sunday_Dinner_Meal = $_POST['sundayDinnerMeal'];
    $sunday_Dinner_Quantity= $_POST['sundayDinnerQuantity'];
    $sunday_Dinner_Calorie = $_POST['sundayDinnerCalorie'];

    if(!is_numeric($sunday_Dinner_Calorie)){
        $sundayDinnerErr = "Dinner calorie should be a number";
    }
     
    if(empty($sunday_Dinner_Meal) || empty($sunday_Dinner_Quantity) || empty($sunday_Dinner_Calorie)){
        $sundayDinnerErr = "Fill required fields";
    }
    
    if(empty($sundayBreakfastErr) && empty($sundayLunchErr) && empty($sundayDinnerErr)){
        
        $query17 = "UPDATE dietplan SET 
        breakfastMeal = '$sunday_Breakfast_Meal',
        breakfastQty = '$sunday_Breakfast_Quantity',
        breakfastCal = '$sunday_Breakfast_Calorie',
        lunchMeal = '$sunday_Lunch_Meal',
        lunchQty = '$sunday_Lunch_Quantity',
        lunchCal = '$sunday_Lunch_Calorie',
        dinnerMeal = '$sunday_Dinner_Meal',
        dinnerQty = '$sunday_Dinner_Quantity', 
        dinnerCal = '$sunday_Dinner_Calorie'
        WHERE memberID = $memberID AND employeeID = $employeeID AND startDate = '$startDateTime' AND day = 7";

        $result17 = mysqli_query($conn, $query17);
            
        if(!$result17){
            echo '<script> window.alert("Error of updating sunday diet plan!");</script>';
        } 

        if($mondayBreakfastErr && $mondayLunchErr && $mondayDinnerErr && 
        $tuesdayBreakfastErr && $tuesdayLunchErr && $tuesdayDinnerErr && 
        $wednesdayBreakfastErr && $wednesdayLunchErr && $wednesdayDinnerErr && 
        $thursdayBreakfastErr && $thursdayLunchErr && $thursdayDinnerErr && 
        $fridayBreakfastErr && $fridayLunchErr && $fridayDinnerErr && 
        $saturdayBreakfastErr && $saturdayLunchErr && $saturdayDinnerErr && 
        $sundayBreakfastErr && $sundayLunchErr && $sundayDinnerErr){
            echo '<script> window.alert("Updating Process is successfull!");</script>';

            $message = "Your dietician has updated your diet plan";
            $currentDate = date('Y-m-d H:i:s');

            $query18 = "INSERT INTO notifications
                        (message, created_at, type) VALUES
                        ('$message', '$currentDate', 2)";

            $result18 = mysqli_query($conn, $query18);

            $query20 = "SELECT * FROM notifications WHERE message = '$message' AND created_at = '$currentDate' AND type = 2";
            $result20 = mysqli_query($conn, $query20);
            $row20 = mysqli_fetch_assoc($result20);
            $notificationID = $row20['notificationsID'];

            $memberUserID = $member['userID'];
            
            $query19 = "INSERT INTO usernotifications
                        (userID, notificationsID, status) VALUES 
                        ('$memberUserID', '$notificationID', 1)";

            $result19 = mysqli_query($conn, $query19);

            header("Location: dietPlan.php");
            exit;
            
        }
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
                Update Diet Plan - '.$member['fName'].' '.$member['lName'].'
            </p>
            ';
            ?>
        </div>
        <div class="gridContainer">
            <form method="post">
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
                                <span class="error">
                                    <?php echo "*" . $mondayBreakfastErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="mondayBreakfastMeal" class="meal"
                                                value="<?php echo $mondayBreakfastMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayBreakfastQuantity" class="quantity"
                                                value="<?php echo $mondayBreakfastQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayBreakfastCalorie" class="calorie"
                                                value="<?php echo $mondayBreakfastCalorie ?>">
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
                                            <input type="text" name="mondayLunchMeal" class="meal"
                                                value="<?php echo $mondayLunchMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayLunchQuantity" class="quantity"
                                                value="<?php echo $mondayLunchQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayLunchCalorie" class="calorie"
                                                value="<?php echo $mondayLunchCalorie ?>">
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
                                            <input type="text" name="mondayDinnerMeal" class="meal"
                                                value="<?php echo $mondayDinnerMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayDinnerQuantity" class="quantity"
                                                value="<?php echo $mondayDinnerQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="mondayDinnerCalorie" class="calorie"
                                                value="<?php echo $mondayDinnerCalorie ?>">
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
                                            <input type="text" name="tuesdayBreakfastMeal" class="meal"
                                                value="<?php echo $tuesdayBreakfastMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastQuantity" class="quantity"
                                                value="<?php echo $tuesdayBreakfastQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayBreakfastCalorie" class="calorie"
                                                value="<?php echo $tuesdayBreakfastCalorie ?>">
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
                                            <input type="text" name="tuesdayLunchMeal" class="meal"
                                                value="<?php echo $tuesdayLunchMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayLunchQuantity" class="quantity"
                                                value="<?php echo $tuesdayLunchQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayLunchCalorie" class="calorie"
                                                value="<?php echo $tuesdayLunchCalorie ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="error">
                                    <?php echo "*" . $tuesdayDinnerErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="tuesdayDinnerMeal" class="meal"
                                                value="<?php echo $tuesdayDinnerMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayDinnerQuantity" class="quantity"
                                                value="<?php echo $tuesdayDinnerQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="tuesdayDinnerCalorie" class="calorie"
                                                value="<?php echo $tuesdayDinnerCalorie ?>">
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
                                            <input type="text" name="wednesdayBreakfastMeal" class="meal"
                                                value="<?php echo $wednesdayBreakfastMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastQuantity" class="quantity"
                                                value="<?php echo $wednesdayBreakfastQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayBreakfastCalorie" class="calorie"
                                                value="<?php echo $wednesdayBreakfastCalorie ?>">
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
                                            <input type="text" name="wednesdayLunchMeal" class="meal"
                                                value="<?php echo $wednesdayLunchMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayLunchQuantity" class="quantity"
                                                value="<?php echo $wednesdayLunchQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayLunchCalorie" class="calorie"
                                                value="<?php echo $wednesdayLunchCalorie ?>">
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
                                            <input type="text" name="wednesdayDinnerMeal" class="meal"
                                                value="<?php echo $wednesdayDinnerMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayDinnerQuantity" class="quantity"
                                                value="<?php echo $wednesdayDinnerQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="wednesdayDinnerCalorie" class="calorie"
                                                value="<?php echo $wednesdayDinnerCalorie ?>">
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
                                            <input type="text" name="thursdayBreakfastMeal" class="meal"
                                                value="<?php echo $thursdayBreakfastMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayBreakfastQuantity" class="quantity"
                                                value="<?php echo $thursdayBreakfastQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayBreakfastCalorie" class="calorie"
                                                value="<?php echo $thursdayBreakfastCalorie ?>">
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
                                            <input type="text" name="thursdayLunchMeal" class="meal"
                                                value="<?php echo $thursdayLunchMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayLunchQuantity" class="quantity"
                                                value="<?php echo $thursdayLunchQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayLunchCalorie" class="calorie"
                                                value="<?php echo $thursdayLunchCalorie ?>">
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
                                            <input type="text" name="thursdayDinnerMeal" class="meal"
                                                value="<?php echo $thursdayDinnerMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayDinnerQuantity" class="quantity"
                                                value="<?php echo $thursdayDinnerQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="thursdayDinnerCalorie" class="calorie"
                                                value="<?php echo $thursdayDinnerCalorie ?>">
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
                                            <input type="text" name="fridayBreakfastMeal" class="meal"
                                                value="<?php echo $fridayBreakfastMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayBreakfastQuantity" class="quantity"
                                                value="<?php echo $fridayBreakfastQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayBreakfastCalorie" class="calorie"
                                                value="<?php echo $fridayBreakfastCalorie ?>">
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
                                            <input type="text" name="fridayLunchMeal" class="meal"
                                                value="<?php echo $fridayLunchMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayLunchQuantity" class="quantity"
                                                value="<?php echo $fridayLunchQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayLunchCalorie" class="calorie"
                                                value="<?php echo $fridayLunchCalorie ?>">
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
                                            <input type="text" name="fridayDinnerMeal" class="meal"
                                                value="<?php echo $fridayDinnerMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayDinnerQuantity" class="quantity"
                                                value="<?php echo $fridayDinnerQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="fridayDinnerCalorie" class="calorie"
                                                value="<?php echo $fridayDinnerCalorie ?>">
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
                                <span class="error">
                                    <?php echo "*" . $saturdayBreakfastErr ?>
                                </span>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" name="saturdayBreakfastMeal" class="meal"
                                                value="<?php echo $saturdayBreakfastMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayBreakfastQuantity" class="quantity"
                                                value="<?php echo $saturdayBreakfastQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayBreakfastCalorie" class="calorie"
                                                value="<?php echo $saturdayBreakfastCalorie ?>">
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
                                            <input type="text" name="saturdayLunchMeal" class="meal"
                                                value="<?php echo $saturdayLunchMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayLunchQuantity" class="quantity"
                                                value="<?php echo $saturdayLunchQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayLunchCalorie" class="calorie"
                                                value="<?php echo $saturdayLunchCalorie ?>">
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
                                            <input type="text" name="saturdayDinnerMeal" class="meal"
                                                value="<?php echo $saturdayDinnerMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayDinnerQuantity" class="quantity"
                                                value="<?php echo $saturdayDinnerQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="saturdayDinnerCalorie" class="calorie"
                                                value="<?php echo $saturdayDinnerCalorie ?>">
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
                                            <input type="text" name="sundayBreakfastMeal" class="meal"
                                                value="<?php echo $sundayBreakfastMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayBreakfastQuantity" class="quantity"
                                                value="<?php echo $sundayBreakfastQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayBreakfastCalorie" class="calorie"
                                                value="<?php echo $sundayBreakfastCalorie ?>">
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
                                            <input type="text" name="sundayLunchMeal" class="meal"
                                                value="<?php echo $sundayLunchMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayLunchQuantity" class="quantity"
                                                value="<?php echo $sundayLunchQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayLunchCalorie" class="calorie"
                                                value="<?php echo $sundayLunchCalorie ?>">
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
                                            <input type="text" name="sundayDinnerMeal" class="meal"
                                                value="<?php echo $sundayDinnerMeal ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayDinnerQuantity" class="quantity"
                                                value="<?php echo $sundayDinnerQuantity ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sundayDinnerCalorie" class="calorie"
                                                value="<?php echo $sundayDinnerCalorie ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
                <br><br>
                <button name="update" class="saveButton">Update</button>
            </form>
            <button class="backButton" onclick="window.location.href = 'dietplan.php'">Back</button>
        </div>
    </div>
</body>

</html>