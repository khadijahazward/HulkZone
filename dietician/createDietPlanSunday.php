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

    if (isset($_POST['breakfastMeal'])) {
        $breakfastMeal = $_POST['breakfastMeal'];
        $breakfastMeal = implode(",", $breakfastMeal);
    } else {
        $breakfastMealErr = "Breakfast meal is required";
    }

    if (isset($_POST['breakfastQuantity'])) {
        $breakfastQuantity = $_POST['breakfastQuantity'];
        $breakfastQuantity = implode(",", $breakfastQuantity);
    } else {
        $$breakfastQuantityErr = "Quantity of breakfast meal is required";
    }

    if (isset($_POST['breakfastCalorie'])) {
        $breakfastCalorie = $_POST['breakfastCalorie'];
        $breakfastCalorie = implode(",", $breakfastCalorie);
    } else {
        $breakfastCalorieErr = "Calorie of breakfast meal is required";
    }

    if (isset($_POST['lunchMeal'])) {
        $lunchMeal = $_POST['lunchMeal'];
        $lunchMeal = implode(",", $lunchMeal);
    } else {
        $lunchMealErr = "Lunch meal is required";
    }
   
    if (isset($_POST['lunchQuantity'])) {
        $lunchQuantity = $_POST['lunchQuantity'];
        $lunchQuantity = implode(",", $lunchQuantity);
    } else {
        $lunchQuantityErr = "Quantity of lunch meal is required";
    }
       
    if (isset($_POST['lunchCalorie'])) {
        $lunchCalorie = $_POST['lunchCalorie'];
        $lunchCalorie = implode(",", $lunchCalorie);
    } else {
        $lunchCalorieErr = "Calorie of lunch meal is required";
    }

    if (isset($_POST['dinnerMeal'])) {
        $dinnerMeal = $_POST['dinnerMeal'];
        $dinnerMeal = implode(",", $dinnerMeal);
    } else {
        $dinnerMealErr = "Dinner meal is required";
    }
    
    if (isset($_POST['dinnerQuantity'])) {
        $dinnerQuantity = $_POST['dinnerQuantity'];
        $dinnerQuantity = implode(",", $dinnerQuantity);
    } else {
        $dinnerQuantityErr = "Quantity of dinner meal is required";
    }
    
    if (isset($_POST['dinnerCalorie'])) {
        $dinnerCalorie = $_POST['dinnerCalorie'];
        $dinnerCalorie = implode(",", $dinnerCalorie);
    } else {
        $dinnerCalorieErr = "Calorie of dinner meal is required";
    }
    

    if (isset($_POST['next'])) {

        $day = "Sunday";

        $query2 = "SELECT * FROM member WHERE memberID = $memberID";
        $result2 = mysqli_query($conn, $query2);

        if ($result2) {
            $row2 = mysqli_fetch_assoc($result2);
            $memberUserID = $row2['userID'];

            $query3 = "SELECT * FROM user WHERE userID = $memberUserID";
            $result3 = mysqli_query($conn, $query3);

            if ($result3) {
                $row3 = mysqli_fetch_assoc($result3);
                $status = $row3['statuses'];
            } else {
                echo '<script> window.alert("Error of receiving member status!");</script>';
            }
        } else {
            echo '<script> window.alert("Error of receiving member userID!");</script>';
        }

        if (empty($breakfastMealErr) && empty($breakfastQuntityErr) && empty($breakfastCalorieErr) && empty($lunchMealErr) && empty($lunchQuntityErr) && empty($lunchCalorieErr) && empty($dinnerMealErr) && empty($dinnerQuntityErr) && empty($dinnerQuntityErr)) {

            $query4 = "INSERT INTO dietplan 
                        (employeeID, breakfastQty, breakfastMeal, breakfastCal, lunchQty, lunchMeal, lunchCal, dinnerQty, dinnerMeal, dinnerCal, day, status, memberID) VALUES
                        ('$employeeID', '$breakfastQuantity', '$breakfastMeal', '$breakfastCalorie', '$lunchQuantity', '$lunchMeal', '$lunchCalorie', '$dinnerQuantity', '$dinnerMeal', '$dinnerCalorie', '$day', '$status', '$memberID')";
            $result4 = mysqli_query($conn, $query4);

            if ($result4) {
                echo "<script> window.alert('You have been created diet plan successfully');</script>
                <script> window.location.href='dietPlan.php';</script>";
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
    <title>Create Diet Plan - Saturday</title>
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
            <p>Create Diet Plan - Saturday</p>
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
                                            <?php echo "*" . $breakfastMealErr ?>
                                        </span>
                                        <div class="gridText"><input type="text" name="breakfastMeal[]"
                                                placeholder="Meal" value="<?php echo $breakfastMeal ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText"><input type="text" name="breakfastMeal[]"
                                                placeholder="Meal" value="<?php echo $breakfastMeal ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText"><input type="text" name="breakfastMeal[]"
                                                placeholder="Meal" value="<?php echo $breakfastMeal ?>">
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
                                            <?php echo "*" . $breakfastQuantityErr ?>
                                        </span>
                                        <div class="gridText">
                                            <input type="text" name="breakfastQuantity[]" placeholder="Quantity"
                                                value="<?php echo $breakfastQuantity ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="breakfastQuantity[]" placeholder="Quantity"
                                                value="<?php echo $breakfastQuantity ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="breakfastQuantity[]" placeholder="Quantity"
                                                value="<?php echo $breakfastQuantity ?>">
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
                                            <?php echo "*" . $breakfastCalorieErr ?>
                                        </span>
                                        <div class="gridText">
                                            <input type="text" name="breakfastCalorie[]" placeholder="Calorie"
                                                value="<?php echo $breakfastCalorie ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="breakfastCalorie[]" placeholder="Calorie"
                                                value="<?php echo $breakfastCalorie ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="breakfastCalorie[]" placeholder="Calorie"
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
                                            <?php echo "*" . $lunchMealErr ?>
                                        </span>
                                        <div class="gridText"><input type="text" name="lunchMeal[]" placeholder="Meal"
                                                value="<?php echo $lunchMeal ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText"><input type="text" name="lunchMeal[]" placeholder="Meal"
                                                value="<?php echo $lunchMeal ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText"><input type="text" name="lunchMeal[]" placeholder="Meal"
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
                                            <?php echo "*" . $lunchQuantityErr ?>
                                        </span>
                                        <div class=" gridText">
                                            <input type="text" name="lunchQuantity[]" placeholder="Quantity"
                                                value="<?php echo $lunchQuantity ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class=" gridText">
                                            <input type="text" name="lunchQuantity[]" placeholder="Quantity"
                                                value="<?php echo $lunchQuantity ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class=" gridText">
                                            <input type="text" name="lunchQuantity[]" placeholder="Quantity"
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
                                            <?php echo "*" . $lunchCalorieErr ?>
                                        </span>
                                        <div class="gridText">
                                            <input type="text" name="lunchCalorie[]" placeholder="Calorie"
                                                value="<?php echo $lunchCalorie ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="lunchCalorie[]" placeholder="Calorie"
                                                value="<?php echo $lunchCalorie ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="lunchCalorie[]" placeholder="Calorie"
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
                                            <?php echo "*" . $dinnerMealErr ?>
                                        </span>
                                        <div class="gridText">
                                            <input type="text" name="dinnerMeal[]" placeholder="Meal"
                                                value="<?php echo $dinnerMeal ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="dinnerMeal[]" placeholder="Meal"
                                                value="<?php echo $dinnerMeal ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="dinnerMeal[]" placeholder="Meal"
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
                                            <?php echo "*" . $dinnerQuantityErr ?>
                                        </span>
                                        <div class=" gridText"><input type="text" name="dinnerQuantity[]"
                                                placeholder="Quantity" value="<?php echo $dinnerQuantity ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class=" gridText"><input type="text" name="dinnerQuantity[]"
                                                placeholder="Quantity" value="<?php echo $dinnerQuantity ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class=" gridText"><input type="text" name="dinnerQuantity[]"
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
                                            <?php echo "*" . $dinnerCalorieErr ?>
                                        </span>
                                        <div class="gridText">
                                            <input type="text" name="dinnerCalorie[]" placeholder="Calorie"
                                                value="<?php echo $dinnerCalorie ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="dinnerCalorie[]" placeholder="Calorie"
                                                value="<?php echo $dinnerCalorie ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="dinnerCalorie[]" placeholder="Calorie"
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