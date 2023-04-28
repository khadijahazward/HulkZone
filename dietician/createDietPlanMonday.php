<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

if (isset($_GET['new'])) {
    $memberID = $_GET['new'];
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

    $breakfast_Meal = $_POST['breakfastMeal'];
    $breakfastMeal = implode(",", $breakfast_Meal);
    
    if (count(array_filter($breakfast_Meal)) == 0) {
        $breakfastMealErr = "Breakfast meal is required";
    } 

    $breakfast_Quantity = $_POST['breakfastQuantity'];
    $breakfastQuantity = implode(",", $breakfast_Quantity);
    
    if (count(array_filter($breakfast_Quantity)) == 0) {
        $breakfastQuantityErr = "Breakfast quantity is required";
    } 
    
    $breakfast_Calorie = $_POST['breakfastCalorie'];
    $breakfastCalorie = implode(",", $breakfast_Calorie);
    
    if (count(array_filter($breakfast_Calorie)) == 0) {
        $breakfastCalorieErr = "Breakfast calorie is required";
    } 

    $lunch_Meal = $_POST['lunchMeal'];
    $lunchMeal = implode(",", $lunch_Meal);
    
    if (count(array_filter($lunch_Meal)) == 0) {
        $lunchMealErr = "Lunch meal is required";
    }

    $lunch_Quantity = $_POST['lunchQuantity'];
    $lunchQuantity = implode(",", $lunch_Quantity);
    
    if (count(array_filter($lunch_Quantity)) == 0) {
        $lunchQuantityErr = "Lunch quantity is required";
    }

    $lunch_Calorie = $_POST['lunchCalorie'];
    $lunchCalorie = implode(",", $lunch_Calorie);
    
    if (count(array_filter($lunch_Calorie)) == 0) {
        $lunchCalorieErr = "Lunch Calorie is required";
    }

    $dinner_Meal = $_POST['dinnerMeal'];
    $dinnerMeal = implode(",", $dinner_Meal);
    
    if (count(array_filter($dinner_Meal)) == 0) {
        $dinnerMealErr = "Dinner meal is required";
    }

    $dinner_Quantity = $_POST['dinnerQuantity'];
    $dinnerQuantity = implode(",", $dinner_Quantity);
    
    if (count(array_filter($dinner_Quantity)) == 0) {
        $dinnerQuantityErr = "Dinner quantity is required";
    }
    
    $dinner_Calorie = $_POST['dinnerCalorie'];
    $dinnerCalorie = implode(",", $dinner_Calorie);
    
    if (count(array_filter($dinner_Calorie)) == 0) {
        $dinnerCalorieErr = "Dinner calorie is required";
    }

    $query5 = "SELECT * FROM servicecharge WHERE memberID = $memberID AND employeeID = $employeeID AND serviceID = 3 AND endDate >= NOW()";
    $result5 = mysqli_query($conn, $query5);
    $row5 = mysqli_fetch_assoc($result5);

    $startDateTime = $row5['startDate'];

    // $query6 = "SELECT * FROM weekdays WHERE weekDayID = 1";
    // $result6 = mysqli_query($conn, $query6);
    // $row6 = mysqli_fetch_assoc($result6);

    // $day = $row6['weekDayID'];

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

        if (empty($breakfastMealErr) && empty($breakfastQuntityErr) && empty($breakfastCalorieErr) && empty($lunchMealErr) && empty($lunchQuntityErr) && empty($lunchCalorieErr) && empty($dinnerMealErr) && empty($dinnerQuntityErr) && empty($dinnerQuntityErr)) {

            $query4 = "INSERT INTO dietplan 
                        (employeeID, memberID, startDate, breakfastMeal, breakfastQty, breakfastCal, lunchMeal, lunchQty, lunchCal, dinnerMeal, dinnerQty, dinnerCal, day) VALUES
                        ('$employeeID', '$memberID', '$startDateTime', '$breakfastMeal', '$breakfastQuantity', '$breakfastCalorie', '$lunchMeal', '$lunchQuantity', '$lunchCalorie', '$dinnerMeal', '$dinnerQuantity','$dinnerCalorie', 1)";
            $result4 = mysqli_query($conn, $query4);

            if ($result4) {
                echo "<script> window.location.href='createDietPlanTuesday.php?next=" . $memberID . "'</script>";
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
    <title>Create Diet Plan - Monday</title>
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
            <p>Create Diet Plan - Monday</p>
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
                                                placeholder="Meal">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText"><input type="text" name="breakfastMeal[]"
                                                placeholder="Meal">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class=" gridText"><input type="text" name="breakfastMeal[]"
                                                placeholder="Meal"></div>
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
                                            <input type="text" name="breakfastQuantity[]" placeholder="Quantity">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="breakfastQuantity[]" placeholder="Quantity">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="breakfastQuantity[]" placeholder="Quantity">
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
                                            <input type="text" name="breakfastCalorie[]" placeholder="Calorie">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="breakfastCalorie[]" placeholder="Calorie">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="breakfastCalorie[]" placeholder="Calorie">
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
                                        <div class="gridText">
                                            <input type="text" name="lunchMeal[]" placeholder="Meal">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="lunchMeal[]" placeholder="Meal">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="lunchMeal[]" placeholder="Meal">
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
                                            <input type="text" name="lunchQuantity[]" placeholder="Quantity">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class=" gridText">
                                            <input type="text" name="lunchQuantity[]" placeholder="Quantity">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class=" gridText">
                                            <input type="text" name="lunchQuantity[]" placeholder="Quantity">
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
                                            <input type="text" name="lunchCalorie[]" placeholder="Calorie">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="lunchCalorie[]" placeholder="Calorie">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="lunchCalorie[]" placeholder="Calorie">
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
                                            <input type="text" name="dinnerMeal[]" placeholder="Meal">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="dinnerMeal[]" placeholder="Meal">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="dinnerMeal[]" placeholder="Meal">
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
                                                placeholder="Quantity">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class=" gridText"><input type="text" name="dinnerQuantity[]"
                                                placeholder="Quantity">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class=" gridText"><input type="text" name="dinnerQuantity[]"
                                                placeholder="Quantity">
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
                                            <input type="text" name="dinnerCalorie[]" placeholder="Calorie">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="dinnerCalorie[]" placeholder="Calorie">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gridText">
                                            <input type="text" name="dinnerCalorie[]" placeholder="Calorie">
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