<?php

include 'connect.php';

if(isset($_POST['next'])){
    $breakfastMeal = $_POST['breakfastMeal'];
    $breakfastQuantity = $_POST['breakfastQuantity'];
    $lunchMeal = $_POST['lunchMeal'];
    $lunchQuantity = $_POST['lunchQuantity'];
    $dinnerMeal = $_POST['dinnerMeal'];
    $dinnerQuantity = $_POST['dinnerQuantity'];

    $sql = "insert into dietplan (breakfast, breakfastQty, lunch, lunchQty, dinner, dinnerQty, day) values('$breakfastMeal', '$breakfastQuantity', '$lunchMeal', '$lunchQuantity', '$dinnerMeal', '$dinnerQuantity', 'Monday')";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "Data inserted successfully";
    }else{
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Diet Plan - Monday</title>
    <link href="createDietPlanMonday.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <img src="images/healthy food.png" alt="healthy food" class="backgroundImage">
        <div class="topBar">
            <div class="gymLogo"><img src="images/gymLogo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <img src="images/my profile.png" alt="my profile" class="myProfile">
            </div>
        </div>
        <div class="topic">
            <p>Create Diet Plan</p>
        </div>
        <div class="dateBar">
            <div class="selector"></div>
            <div class="dateRow">
                <a style="color: rgba(0, 104, 55, 1);">Monday</a>
                <a>Tuesday</a>
                <a>Wednesday</a>
                <a>Thursday</a>
                <a>Friday</a>
                <a>Saturday</a>
                <a>Sunday</a>
            </div>
        </div>
        <form method="POST">
            <div class="gridContainer">
                <div class="gridTopic"></div>
                <div class="gridTopic">Meal</div>
                <div class="gridTopic">Quantity per day</div>
                <div class="gridTopic">Breakfast</div>
                <div class="gridText"><input type="text" name="breakfastMeal" placeholder="Meal"></div>
                <div class="gridText"><input type="text" name="breakfastQuantity" placeholder="Quantity"></div>
                <div class="gridTopic">Lunch</div>
                <div class="gridText"><input type="text" name="lunchMeal" placeholder="Meal"></div>
                <div class="gridText"><input type="text" name="lunchQuantity" placeholder="Quantity"></div>
                <div class="gridTopic">Dinner</div>
                <div class="gridText"><input type="text" name="dinnerMeal" placeholder="Meal"></div>
                <div class="gridText"><input type="text" name="dinnerQuantity" placeholder="Quantity"></div>
            </div>
            <button type="submit" name="next" class="saveButton">Next</button>
        </form>
    </div>
</body>

</html>