<?php
    session_start();
?>

<!--checking for empty fields-->
<?php
$check = "";

//employee id
$userid = $_SESSION["userID"];
$dayErr = $mealTypeErr = $mealErr = $qtyErr ="";
include "../connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["day"])) {
        $dayErr = "Day is required";
    }

    if (empty($_POST["mealType"])) {
        $mealTypeErr = "Meal Type is required";
    }

    if (empty($_POST["Meal"])) {
        $mealErr = "Meal is required";
    }

    if (empty($_POST["Quantity"])) {
        $qtyErr = "Quantity is required";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../dietician/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../dietician/style/createDietPlan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class = "nav-bar">
            <div class="line-heading">
                <div class="images"><img src="..\asset\images\gymLogo.png" alt="Gym Logo" class="gymLogo"></div>
                <div class="option">HULK ZONE</div>
            </div>
            
            <hr>

            <div class="line">
                <div class="nav-font"><a href="#">Home</a></div>
            </div>

            <hr>

            <div class="line">
                <div class="nav-font"><a href="">Members</a></div>
            </div>

            <hr>

            <div class="line">
                <div class="nav-font"><a href="">Appointments</a></div>
            </div>
            
            <hr>

            <div class="line">
                <div class="nav-font"><a href="../dietician/dietplan.php">Diet Plans</a></div>
            </div>

            <hr>

            <div class="line">
                <div class="nav-font"><a href="">Chat Box</a></div>
            </div>

            <hr>

            <div class="line">
                <div class="nav-font"><a href="">Settings</a></div>
            </div>

            <hr>

            <div class="line">
                <div class="nav-font"><a href="../dietician/logout.php">Logout</a></div>
            </div>

            <hr>
        </div>
        
        <div class="body">
            <div class = "header">
                <div class="left">
                    DIET PLAN
                </div>
                <div class="right">
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="..\asset\images\dp.png" alt="dp" width="50px" height="50px">
                </div>
            </div>
            <div class="content">
                <div class="row" style="margin-right:10px;margin-top:20px;">ADD MEAL</div>
                <div class="row" style="background-color:#DEF9D7; margin-right:10px; border-radius:15px;">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="dietForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Select Day:<span class="error"> 
                                    <span class=" error">*
                                        <?php echo $dayErr; ?>
                                    </span>
                                </label>
                                <select name="day" id="day">
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                            </div>

                        
                            <div class="form-group">
                                <label>Meal Type:
                                <span class="error"> 
                                    <span class=" error">*
                                        <?php echo $mealTypeErr; ?>
                                    </span>
                                </label>
                                <select name="mealType" id="mealType">
                                    <option value="Breakfast">Breakfast</option>
                                    <option value="Lunch">Lunch</option>
                                    <option value="Dinner">Dinner</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group">
                                <label>Meal
                                    <span class=" error">*
                                        <?php echo $mealErr; ?>
                                    </span>
                                </label>
                                <input id="Meal" name="Meal" type="text">
                            </div>

                            <div class="form-group">
                                <label>Quantity
                                    <span class=" error">*
                                        <?php echo $qtyErr; ?>
                                    </span>
                                </label>
                                <input id="Quantity" name="Quantity" type="text">
                            </div>
                            
                        </div>
                        

                        <div class="form-row">
                            <div class="center">
                                <button type="submit" class="submit-Btn" onclick="return Alertfunction()">Submit</button>
                            </div>
                        </div>

                    </form>
                
                </div>
                <br>
                <div class="row" style="margin-right:10px;margin-top:20px;">DIET PLAN</div>
                <div class="row"style="margin-top:10px;  margin-right:10px;">
                    <?php
                        include "../connect.php";
                        $sql = "SELECT mealType, Qty, day, meal  FROM `dietplan`";
                        $result = mysqli_query($conn, $sql);
                    echo '<table> 
                    <tr> 
                        <th> Day </th> 
                        <th> Meal Type </th> 
                        <th> Meal </th> 
                        <th> Quantity </th> 
                    </tr>';
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $field1name = $row["day"];
                            $field2name = $row["mealType"];
                            $field3name = $row["meal"];
                            $field4name = $row["Qty"];

                            echo '<tr> 
                                <td>'.$field1name.'</td> 
                                <td>'.$field2name.'</td> 
                                <td>'.$field3name.'</td> 
                                <td>'.$field4name.'</td> 
                            </tr>';
                        }
                    }
                    ?>
                    
                </div>
            </div>
        </div>

    </div>
</body>
</html>

<!--inserting into table-->
<?php
$check = 1;
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $day = $mealType = $meal = $qty = "";
        $day = test_input($_POST["day"]);
        $mealType = test_input($_POST["mealType"]);
        $meal = test_input($_POST["Meal"]);
        $qty = test_input($_POST["Quantity"]);
        $empID = $_SESSION['employeeID'];

        $sql = "insert into dietplan (employeeID, dietplanDate, mealType, Qty, day, meal) values ('$empID', current_timestamp(), '$mealType', '$qty', '$day', '$meal')";

        if (!empty($day) && !empty($mealType) && !empty($meal) && !empty($qty)) {
            $result = mysqli_query($conn, $sql);
            if($result == 1){
                $check = 0;
            }else{
            echo "error".$sql.  mysqli_error($conn);
            }
        }
    }
?>