<?php

include 'authorization.php';
include 'connect.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

if(isset($_GET['next'])){
    $memberID = $_GET['next'];
}

$query1 = "SELECT * FROM employee INNER JOIN user ON employee.userID = user.userID WHERE user.userID = '$userID'";
$result1 = mysqli_query($conn, $query1);
if(mysqli_num_rows($result1) == 1){
    $row = mysqli_fetch_assoc($result1);
    $employeeID = $row['employeeID'];
}else{
    echo '<script> window.alert("Error receiving employee ID!");</script>';
}

$breakfastMeal = $breakfastQuantity = $lunchMeal = $lunchQuantity = $dinnerMeal = $dinnerQuantity = "";
$breakfastMealErr = $breakfastQuantityErr = $lunchMealErr = $lunchQuantityErr = $dinnerMealErr = $dinnerQuantityErr = "";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST['breakfastMeal'])){
        $breakfastMealErr = "Breakfast meal is required";
    }
    
    if(empty($_POST['breakfastQuantity'])){
        $breakfastQuantityErr = "Quantity of breakfast meal is required";
    }
    
    if(empty($_POST['lunchMeal'])){
        $lunchMealErr = "Lunch meal is required";
    }
    
    if(empty($_POST['lunchQuantity'])){
        $lunchQuantityErr = "Quantity of lunch meal is required";
    }
    
    if(empty($_POST['dinnerMeal'])){
        $dinnerMealErr = "Dinner meal is required";
    }
    
    if(empty($_POST['dinnerQuantity'])){
        $dinnerQuantityErr = "Quantity of dinner meal is required";
    }

}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $breakfastMeal = mysqli_real_escape_string($conn, $_POST['breakfastMeal']);
    $breakfastQuantity = mysqli_real_escape_string($conn, $_POST['breakfastQuantity']);
    $lunchMeal = mysqli_real_escape_string($conn, $_POST['lunchMeal']);
    $lunchQuantity = mysqli_real_escape_string($conn, $_POST['lunchQuantity']);
    $dinnerMeal = mysqli_real_escape_string($conn, $_POST['dinnerMeal']);
    $dinnerQuantity = mysqli_real_escape_string($conn, $_POST['dinnerQuantity']);

    $day = "Friday";

    $query2 = "SELECT * FROM dietplan WHERE memberID = '$memberID' AND day = 'Friday' ";
    $result2 = mysqli_query($conn, $query2);

    if(mysqli_num_rows($result2) == 0){
        
        $query3 = "INSERT INTO dietplan(employeeID, breakfastMeal, breakfastQty, lunchMeal, lunchQty, dinnerMeal, dinnerQty, day, memberID) VALUES ('$employeeID', '$breakfastMeal', '$breakfastQuantity', '$lunchMeal', '$lunchQuantity', '$dinnerMeal', '$dinnerQuantity', '$day', '$memberID')";

        if(!empty($breakfastMeal) && !empty($breakfastQuantity) && !empty($lunchMeal) && !empty($lunchQuantity) && !empty($dinnerMeal) && !empty($dinnerQuantity)){
            $result3 = mysqli_query($conn, $query3);
        }

        if($result3 == TRUE){
            echo "<script> window.location.href='createDietPlanSaturday.php?next=".$memberID."'; </script>";
        }else{
            echo "<script> alert('Please fill all required data!'); </script>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Diet Plan - Friday</title>
    <link href="Style/createDietPlanFriday.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <img src="Images/Create DietPlan BG Image.png" alt="healthy food" class="backgroundImage">
        <div class="topBar">
            <div class="gymLogo"><img src="Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <img src="Images/Profile.png" alt="my profile" class="myProfile">
            </div>
        </div>
        <div class="topic">
            <p>Create Diet Plan</p>
        </div>
        <div class="dateBar">
            <div class="selector"></div>
            <div class="dateRow">
                <a>Monday</a>
                <a>Tuesday</a>
                <a>Wednesday</a>
                <a>Thursday</a>
                <a style="color: rgba(0, 104, 55, 1);">Friday</a>
                <a>Saturday</a>
                <a>Sunday</a>
            </div>
        </div>
        <div class="gridContainer">
            <form method="post">
                <table>
                    <tr>
                        <td>
                            <div class="gridTopic"></div>
                        </td>
                        <td>
                            <div class="gridTopic">Meal</div>
                        </td>
                        <td>
                            <div class="gridTopic">Quantity per day</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="gridTopic">Breakfast</div>
                        </td>
                        <td>
                            <div class="gridText"><input type="text" name="breakfastMeal" placeholder="Meal" ]
                                    value="<?php echo $breakfastMeal ?>">
                            </div>
                        </td>
                        <td>
                            <div class="gridText"><input type="text" name="breakfastQuantity" placeholder="Quantity"
                                    value="<?php echo $breakfastQuantity ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="gridTopic">Lunch</div>
                        </td>
                        <td>
                            <div class="gridText"><input type="text" name="lunchMeal" placeholder="Meal"
                                    value="<?php echo $lunchMeal ?>">
                            </div>
                        </td>
                        <td>
                            <div class=" gridText"><input type="text" name="lunchQuantity" placeholder="Quantity"
                                    value="<?php echo $lunchQuantity ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class=" gridTopic">Dinner</div>
                        </td>
                        <td>
                            <div class="gridText">
                                <input type="text" name="dinnerMeal" placeholder="Meal"
                                    value="<?php echo $dinnerMeal ?>">
                            </div>
                        </td>
                        <td>
                            <div class=" gridText"><input type="text" name="dinnerQuantity" placeholder="Quantity"
                                    value="<?php echo $dinnerQuantity ?>">
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
            <button class="saveButton" name="next" type="submit">Next</button>
        </div>
    </div>
</body>

</html>