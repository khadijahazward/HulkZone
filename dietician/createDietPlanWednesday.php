<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

if (isset($_GET['next'])) {
    $memberID = $_GET['next'];
}

$query1 = "SELECT * FROM employee INNER JOIN user ON employee.userID = user.userID WHERE user.userID = '$userID'";
$result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($result1) == 1) {
    $row = mysqli_fetch_assoc($result1);
    $employeeID = $row['employeeID'];
} else {
    echo '<script> window.alert("Error receiving employee ID!");</script>';
}

$breakfastMeal = $breakfastQuantity = $breakfastCalorie = $lunchMeal = $lunchQuantity = $lunchCalorie = $dinnerMeal = $dinnerQuantity = $dinnerCalorie = "";
$breakfastMealErr = $breakfastQuantityErr = $breakfastCalorieErr = $lunchMealErr = $lunchQuantityErr = $lunchCalorieErr = $dinnerMealErr = $dinnerQuantityErr = $dinnerCalorieErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['breakfastMeal']) && !empty($_POST['breakfastMeal'])){
        $breakfastMeal = $_POST['breakfastMeal'];
    }else{
        $breakfastMealErr = "Breakfast meal is required";
    }

    if(isset($_POST['breakfastQuantity']) && !empty($_POST['breakfastQuantity'])){
        $breakfastQuantity = $_POST['breakfastQuantity'];
    }else{
        $breakfastQuantityErr = "Breakfast quantity is required";
    }

    if(isset($_POST['breakfastCalorie']) && !empty($_POST['breakfastCalorie'])){
        $breakfastCalorie = $_POST['breakfastCalorie'];
        if(is_numeric($_POST['breakfastCalorie'])){
            $breakfastCalorie = $_POST['breakfastCalorie'];
        }else{
            $breakfastCalorieErr = "Breakfast calorie should be a number";
        }
    }else{
        $breakfastCalorieErr = "Breakfast calorie is required";
    }

    if(isset($_POST['lunchMeal']) && !empty($_POST['lunchMeal'])){
        $lunchMeal = $_POST['lunchMeal'];
    }else{
        $lunchMealErr = "Lunch meal is required";
    }

    if(isset($_POST['lunchQuantity']) && !empty($_POST['lunchQuantity'])){
        $lunchQuantity = $_POST['lunchQuantity'];
    }else{
        $lunchQuantityErr = "Lunch quantity is required";
    }

    if(isset($_POST['lunchCalorie']) && !empty($_POST['lunchCalorie'])){
        $lunchCalorie = $_POST['lunchCalorie'];
        if(is_numeric($_POST['lunchCalorie'])){
            $lunchCalorie = $_POST['lunchCalorie'];
        }else{
            $lunchCalorieErr = "Lunch calorie should be a number";
        }
    }else{
        $lunchCalorieErr = "Lunch calorie is required";
    }

    if(isset($_POST['dinnerMeal']) && !empty($_POST['dinnerMeal'])){
        $dinnerMeal = $_POST['dinnerMeal'];
    }else{
        $dinnerMealErr = "Dinner meal is required";
    }

    if(isset($_POST['dinnerQuantity']) && !empty($_POST['dinnerQuantity'])){
        $dinnerQuantity = $_POST['dinnerQuantity'];
    }else{
        $dinnerQuantityErr = "Dinner quantity is required";
    }

    if(isset($_POST['dinnerCalorie']) && !empty($_POST['dinnerCalorie'])){
        $dinnerCalorie = $_POST['dinnerCalorie'];
        if(is_numeric($_POST['dinnerCalorie'])){
            $dinnerCalorie = $_POST['dinnerCalorie'];
        }else{
            $dinnerCalorieErr = "Dinner calorie should be a number";
        }
    }else{
        $dinnerCalorieErr = "Dinner calorie is required";
    }

    $query5 = "SELECT * FROM servicecharge WHERE memberID = $memberID AND employeeID = $employeeID AND serviceID = 3 AND endDate >= NOW()";
    $result5 = mysqli_query($conn, $query5);
    $row5 = mysqli_fetch_assoc($result5);

    $startDateTime = $row5['startDate'];

    if (isset($_POST['next'])) {

        $query2 = "SELECT * FROM servicecharge JOIN member ON servicecharge.memberID = member.memberID WHERE servicecharge.memberID = $memberID AND servicecharge.employeeID = $employeeID AND servicecharge.endDate >= NOW()";
        $result2 = mysqli_query($conn, $query2);

        if ($result2) {
            $row2 = mysqli_fetch_assoc($result2);
            $memberUserID = $row2['userID'];

            $query3 = "SELECT * FROM user WHERE userID = $memberUserID";
            $result3 = mysqli_query($conn, $query3);
            $row3 = mysqli_fetch_assoc($result3);
        } else {
            echo '<script> window.alert("Error of receiving member userID!");</script>';
        }

        if (empty($breakfastMealErr) && empty($breakfastQuantityErr) && empty($breakfastCalorieErr) && empty($lunchMealErr) && empty($lunchQuantityErr) && empty($lunchCalorieErr) && empty($dinnerMealErr) && empty($dinnerQuantityErr) && empty($dinnerCalorieErr)) {

            $query4 = "INSERT INTO dietplan 
                        (employeeID, memberID, startDate, breakfastMeal, breakfastQty, breakfastCal, lunchMeal, lunchQty, lunchCal, dinnerMeal, dinnerQty, dinnerCal, day) VALUES
                        ('$employeeID', '$memberID', '$startDateTime', '$breakfastMeal', '$breakfastQuantity', '$breakfastCalorie', '$lunchMeal', '$lunchQuantity', '$lunchCalorie', '$dinnerMeal', '$dinnerQuantity','$dinnerCalorie', 3)";
            $result4 = mysqli_query($conn, $query4);

            if ($result4) {
                echo "<script> window.location.href='createDietPlanThursday.php?next=" . $memberID . "'</script>";
            } else {
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
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
                <div class="notification">
                    <?php
                    include 'notifications.php';
                    ?>
                </div>
                <img src="<?php echo $profilePic ?>" alt="my profile" class="myProfile">
            </div>
        </div>
        <div class="topic">
            <p>Create Diet Plan - Wednesday</p>
        </div>
        <form method="post">
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
                        <td class="gridTextColumn">
                            <table>
                                <tr>
                                    <td>
                                        <span class="error">
                                            <?php echo $breakfastMealErr ?>
                                        </span>
                                        <div class="gridText"><input type="text" name="breakfastMeal" placeholder="Meal"
                                                value="<?php echo $breakfastMeal ?>">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="gridTextColumn">
                            <table>
                                <tr>
                                    <td>
                                        <span class="error">
                                            <?php echo $breakfastQuantityErr ?>
                                        </span>
                                        <div class="gridText">
                                            <input type="text" name="breakfastQuantity" placeholder="Quantity"
                                                value="<?php echo $breakfastQuantity ?>">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class=" gridTextColumn">
                            <table>
                                <tr>
                                    <td>
                                        <span class="error">
                                            <?php echo $breakfastCalorieErr ?>
                                        </span>
                                        <div class="gridText">
                                            <input type="text" name="breakfastCalorie" placeholder="Calorie"
                                                value="<?php echo $breakfastCalorie ?>">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="gridTopic">Lunch</div>
                        </td>
                        <td class="gridTextColumn">
                            <table>
                                <tr>
                                    <td>
                                        <span class="error">
                                            <?php echo $lunchMealErr ?>
                                        </span>
                                        <div class="gridText">
                                            <input type="text" name="lunchMeal" placeholder="Meal"
                                                value="<?php echo $lunchMeal ?>">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="gridTextColumn">
                            <table>
                                <tr>
                                    <td>
                                        <span class="error">
                                            <?php echo $lunchQuantityErr ?>
                                        </span>
                                        <div class=" gridText">
                                            <input type="text" name="lunchQuantity" placeholder="Quantity"
                                                value="<?php echo $lunchQuantity ?>">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="gridTextColumn">
                            <table>
                                <tr>
                                    <td>
                                        <span class="error">
                                            <?php echo $lunchCalorieErr ?>
                                        </span>
                                        <div class="gridText">
                                            <input type="text" name="lunchCalorie" placeholder="Calorie"
                                                value="<?php echo $lunchCalorie ?>">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class=" gridTopic">Dinner</div>
                        </td>
                        <td class="gridTextColumn">
                            <table>
                                <tr>
                                    <td>
                                        <span class="error">
                                            <?php echo $dinnerMealErr ?>
                                        </span>
                                        <div class="gridText">
                                            <input type="text" name="dinnerMeal" placeholder="Meal"
                                                value="<?php echo $dinnerMeal ?>">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="gridTextColumn">
                            <table>
                                <tr>
                                    <td>
                                        <span class="error">
                                            <?php echo $dinnerQuantityErr ?>
                                        </span>
                                        <div class=" gridText"><input type="text" name="dinnerQuantity"
                                                placeholder="Quantity" value="<?php echo $dinnerQuantity ?>">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="gridTextColumn">
                            <table>
                                <tr>
                                    <td>
                                        <span class="error">
                                            <?php echo $dinnerCalorieErr ?>
                                        </span>
                                        <div class="gridText">
                                            <input type="text" name="dinnerCalorie" placeholder="Calorie"
                                                value="<?php echo $dinnerCalorie ?>">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <button class="saveButton" name="next">Next</button>
            </div>
        </form>
    </div>
</body>

</html>