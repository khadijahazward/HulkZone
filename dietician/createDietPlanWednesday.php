<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

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

$breakfastMeal = $breakfastQuantity = $breakfastCalorie = $lunchMeal = $lunchQuantity = $lunchCalorie = $dinnerMeal = $dinnerQuantity = $dinnerCalorie = "";
$breakfastMealErr = $breakfastQuantityErr = $breakfastCalorieErr = $lunchMealErr = $lunchQuantityErr = $lunchCalorieErr = $dinnerMealErr = $dinnerQuantityErr = $dinnerCalorieErr = "";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST['breakfastMeal'])){
        $breakfastMealErr = "Breakfast meal is required";
    }
    
    if(empty($_POST['breakfastQuantity'])){
        $breakfastQuantityErr = "Quantity of breakfast meal is required";
    }

    if(empty($_POST['breakfastCalorie'])){
        $breakfastQuantityErr = "Calorie of breakfast meal is required";
    }
    
    if(empty($_POST['lunchMeal'])){
        $lunchMealErr = "Lunch meal is required";
    }
    
    if(empty($_POST['lunchQuantity'])){
        $lunchQuantityErr = "Quantity of lunch meal is required";
    }
    
    if(empty($_POST['lunchCalorie'])){
        $breakfastQuantityErr = "Calorie of lunch meal is required";
    }
    
    if(empty($_POST['dinnerMeal'])){
        $dinnerMealErr = "Dinner meal is required";
    }
    
    if(empty($_POST['dinnerQuantity'])){
        $dinnerQuantityErr = "Quantity of dinner meal is required";
    }
    
    if(empty($_POST['dinnerCalorie'])){
        $breakfastQuantityErr = "Calorie of dinner meal is required";
    }
    
    if(isset($_POST['next'])){

        $breakfastMeal = mysqli_real_escape_string($conn, $_POST['breakfastMeal']);
        $breakfastQuantity = mysqli_real_escape_string($conn, $_POST['breakfastQuantity']);
        $breakfastCalorie = mysqli_real_escape_string($conn, $_POST['breakfastCalorie']);
        $lunchMeal = mysqli_real_escape_string($conn, $_POST['lunchMeal']);
        $lunchQuantity = mysqli_real_escape_string($conn, $_POST['lunchQuantity']);
        $lunchCalorie = mysqli_real_escape_string($conn, $_POST['lunchCalorie']);
        $dinnerMeal = mysqli_real_escape_string($conn, $_POST['dinnerMeal']);
        $dinnerQuantity = mysqli_real_escape_string($conn, $_POST['dinnerQuantity']);
        $dinnerCalorie = mysqli_real_escape_string($conn, $_POST['dinnerCalorie']);

        $day = "Wednesday";

        $date = mysqli_real_escape_string($conn, $_POST['date']);

        $query2 = "SELECT * FROM member WHERE memberID = $memberID";
        $result2 = mysqli_query($conn, $query2);

        if($result2){
            $row2 = mysqli_fetch_assoc($result2);
            $memberUserID = $row2['userID'];
            
            $query3 = "SELECT * FROM user WHERE userID = $memberUserID";
            $result3 = mysqli_query($conn, $query3);

            if($result3){
                $row3 = mysqli_fetch_assoc($result3);
                $status = $row3['statuses'];
            }else{
                echo '<script> window.alert("Error of receiving member status!");</script>';
            }
            
        }else{
            echo '<script> window.alert("Error of receiving member userID!");</script>';
        }
          
        if(empty($breakfastMealErr) && empty($breakfastQuntityErr) && empty($breakfastCalorieErr) && empty($lunchMealErr) && empty($lunchQuntityErr) && empty($lunchCalorieErr) && empty($dinnerMealErr) && empty($dinnerQuntityErr) && empty($dinnerQuntityErr)){
          
            $query4 = "INSERT INTO dietplan 
                        (employeeID, dietPlanDate, breakfastQty, breakfastMeal, breakfastCal, lunchQty, lunchMeal, lunchCal, dinnerQty, dinnerMeal, dinnerCal, day, status, memberID) VALUES
                        ('$employeeID', '$date', '$breakfastQuantity', '$breakfastMeal', '$breakfastCalorie', '$lunchQuantity', '$lunchMeal', '$lunchCalorie', '$dinnerQuantity', '$dinnerMeal', '$dinnerCalorie', '$day', '$status', '$memberID')";
            $result4 = mysqli_query($conn, $query4);
            
            if($result4){
                echo "<script> window.location.href='createDietPlanThursday.php?next=".$memberID."'</script>";
            }else{
                echo '<script> window.alert("Error of inserting data");</script>';
            }
        }
        
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Diet Plan - Wednesday</title>
    <link href="Style/createDietPlan.css" rel="stylesheet">
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
                <img src="<?php echo $profilePic ?>" alt="my profile" class="myProfile">
            </div>
        </div>
        <div class="topic">
            <p>Create Diet Plan - Wednesday</p>
        </div>
        <form method="post">
            <div class="chooseDate">
                <label for="date">Choose Date : </label>
                <input type="date" name="date" id="date" value="<?php echo $date ?>">
            </div>
            <div class="gridContainer">
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
                        <td>
                            <div class="gridTopic">Calories</div>
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
                        <td>
                            <div class="gridText">
                                <input type="text" name="breakfastCalorie" placeholder="Calorie"
                                    value="<?php echo $breakfastCalorie ?>">
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
                        <td>
                            <div class="gridText">
                                <input type="text" name="lunchCalorie" placeholder="Calorie"
                                    value="<?php echo $lunchCalorie ?>">
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
                            <div class=" gridText">
                                <input type="text" name="dinnerQuantity" placeholder="Quantity"
                                    value="<?php echo $dinnerQuantity ?>">
                            </div>
                        </td>
                        <td>
                            <div class="gridText">
                                <input type="text" name="dinnerCalorie" placeholder="Calorie"
                                    value="<?php echo $dinnerCalorie ?>">
                            </div>
                        </td>
                    </tr>
                </table>
                <button class="saveButton" name="next" type="submit">Next</button>
            </div>
        </form>
    </div>
</body>

</html>