<?php 
include 'authorization.php';
include '../connect.php';
?>

<?php
    include("setProfilePic.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/dashboard.css">
</head>
<body>
    <div class="container">
        <div class = "nav-bar">
            <?php
                include("navBar.php");
            ?>
        </div>
        <div class="body">
            <div class = "header">
                <div class="left"> 
                    Hello, 
                    <?php
                        echo $_SESSION["firstName"];
                    ?>  
                    <br>
                    Welcome and Let's Do Some Workout Today!
                </div>
                <div class="right">
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">
                <div class="row">
                        <p>Membership Information</p>
                        <div class="row-2">
                            <div class="sub-content">
                                <p>Total Payable</p>
                                <!--retreive-->
                                <div>Rs. X</div>
                                <button>Pay Bill</button>
                            </div>
                            <div class="sub-content">
                                <p>Last Payment</p>
                                <!--retreive-->
                                <div>X</div>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <p>Today’s Meal Plan</p>
                    <div class="row-2">
                        <div class="sub-content">
                            <p>Breakfast</p>
                            <!--retreive-->
                            <div>X</div>
                        </div>
                        <div class="sub-content">
                            <p>Lunch</p>
                            <!--retreive-->
                            <div>X</div>
                        </div>
                        <div class="sub-content">
                            <p>Dinner</p>
                            <!--retreive-->
                            <div>X</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <p>Upcoming Exercises</p>
                    <div class="row" style = "border: 0px; margin-top:0;">
                        <?php
                            //edit this query - wrong
                            $sql3 = "select * from workoutplan where memberID = " . $row1['memberID'];

                            echo '<table> 
                            <tr  style = "background-color: #006837;"> 
                                <th> Exercise </th> 
                                <th> Duration </th> 
                                <th> Rest Time </th> 
                                <th> Status </th> 
                            </tr>';
                            $result3 = mysqli_query($conn, $sql3);
                            if (mysqli_num_rows($result3) > 0) {
                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                    
                                    //retrieving exercise name from the exercise table using exercise ID
                                    $exerciseID = $row3["exerciseID"];

                                    $sql4 = "select exerciseName from exercise where exerciseID =  " . $exerciseID;
                                    $result4 = mysqli_query($conn, $sql4);
                                    $row4 = mysqli_fetch_assoc($result4);
                                    $field1name = $row4["exerciseName"];

                                    $field2name = $row3["duration"];
                                    $field3name = $row3["restTime"];
                                    $field4name = $row3["status"];

                                    echo '<tr> 
                                        <td>'.$field1name.'</td> 
                                        <td>'.$field2name.'</td> 
                                        <td>'.$field3name.'</td> 
                                        <td><input type="checkbox" name="status[]" value="'.$row3["status"].'" '.($field4name == 1 ? 'checked' : '').'></td> 
                                    </tr>';
                                }
                            }else{
                                echo '<tr>
                                    <td colspan="4" style="border-radius: 10px 10px 10px 10px;"> You have not Selected a Service Yet. </td> 

                                </tr>'; 
                            }
                            echo '</table>';
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>