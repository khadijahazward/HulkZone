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
    <title>Strength Training | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/servicepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                    STRENGTH TRAINING
                </div>
                <div class="right">
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>

            <div class="content">
                <div class="row">
                        <div class="topic">Sculpt a leaner, stronger you with strength training! Ditch body fat, boost lean muscle,<br> and ignite calorie-burning efficiency for ultimate health and fitness!</div>
                        <img src="../member/images/strengthpage.png" width= "100%" height="100%">
                </div>
                <div class="row-two">
                    <div class="sub-topic">
                        <div class="row-two" style="margin-left:40px;">
                            <div class="col"><li>Customized Work out Plan</li></div>
                            <div class="col"><li>View Progress</li></div>
                            <div class="col"><li>Rs. 10, 000 For  06 Months</li></div>
                            <div class="col"><li>Personal Trainer</li></div>
                        </div>
                        
                    </div>
                </div>
                <hr class="hr-heading">
                    <div class="row-two" style="font-size:20px;">Strength Training - Service History</div>
                <hr class="hr-heading">

                <div class="row-two" style="margin-left: 10px; margin-right: 10px;">
                        <?php
                            //add the history in db
                            $sql6 = "SELECT * FROM `servicecharge` where memberID = ". $row1['memberID'] . " AND serviceID = 4";
                            $result6 = mysqli_query($conn, $sql6);
                            
                            if ($result6 && mysqli_num_rows($result6) > 0) {
                                echo '<table>';
                                while ($row6 = mysqli_fetch_assoc($result6)) {
                                    $employeeID = $row6["employeeID"];
                                    
                                    //getting user id from employee
                                    $sql7 = "select * from employee where employeeID = $employeeID";
                                    $result7 = mysqli_query($conn, $sql7);
                                    $row7 = mysqli_fetch_assoc($result7);

                                    $userID = $row7["userID"];
                                    
                                    //displaying average rating from the employee table
                                    $avgRating = $row7['avgRating'];

                                    $stars = '';
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= round($avgRating)) {
                                            $stars .= '<span class="fas fa-star" style="color: gold; font-size: 20px; display: inline-block;"></span>';
                                        } else {
                                            $stars .= '<span class="far fa-star" style="color: gold; font-size: 20px;display: inline-block;"></span>';
                                        }
                                    }

                                    //getting user detail from user
                                    $sql8 = "select * from user where userID = $userID";
                                    $result8 = mysqli_query($conn, $sql8);
                                    $row8 = mysqli_fetch_assoc($result8);

                                    //field names for table
                                    $field1name = $row8["fName"] . " " . $row8["lName"];
                                    $field2name = $stars;
                                    $field3name = "";
                            
                                    echo '<tr> 
                                        <td style="text-align:left; padding-left: 50px;">'.$field1name.'</td> 
                                        <td>'.$field2name.'</td> 
                                        <td>'.$field3name.'</td> 
                                    </tr>';
                                }
                                echo '</table>';
                            } else {
                                echo '<table>
                                    <tr> 
                                        <td style="width:100%;"> No Service History </td> 
                                    </tr>
                                </table>';
                            }
                            
                        ?>
                </div>

                <hr class="hr-heading">
                    <div class="row-two" style="font-size:20px;">Select Your Trainer</div>
                <hr class="hr-heading">

                <div class="row-two" style="margin-left: 10px; margin-right: 10px;">
                        <?php
                            //correct the query
                            $sql2 = "SELECT employeeID FROM `employeeservice` where serviceID = 4";
                            $result2 = mysqli_query($conn, $sql2);
                            
                            if ($result2 && mysqli_num_rows($result2) > 0) {
                                echo '<table>';
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    $employeeID = $row2["employeeID"];
                                    
                                    //getting user id from employee
                                    $sql3 = "select userID from employee where employeeID = $employeeID";
                                    $result3 = mysqli_query($conn, $sql3);
                                    $row3 = mysqli_fetch_assoc($result3);

                                    $userID = $row3["userID"];

                                    //getting user detail from user
                                    $sql4 = "select * from user where userID = $userID";
                                    $result4 = mysqli_query($conn, $sql4);
                                    $row4 = mysqli_fetch_assoc($result4);

                                    //field names for table
                                    $field1name = $row4["fName"] . " " . $row4["lName"];
                                    $field2name ="<div><a href='employeeProfile.php?userID=$row3[userID]' class = 'button'>View Profile</a></div>";
                                    
                                    //checking if member has ongoing service
                                    $sql5 = "SELECT * FROM servicecharge WHERE serviceID IN (1, 2, 4) AND endDate >= NOW()";
                                    $result5 = mysqli_query($conn, $sql5);
                                    $ongoingService = mysqli_num_rows($result5) > 0; //true when has gym service ongoing

                                    if ($ongoingService) {                                                     
                                        $payNow = 'javascript:void(0);';
                                        $onclick = 'onclick="alert(\'You already have an ongoing service and cannot obtain another one until it ends.\'); return false;"';                                    
                                    } else {
                                        $payNow = 'pay_now.php?employeeID='.$employeeID.'&serviceID=1';
                                    }

                                    $field3name = '<a href="'.$payNow.'" class = "button" '.$onclick.'>Pay Now</a>';
                            
                                    echo '<tr> 
                                        <td style="text-align:left; padding-left: 50px;">'.$field1name.'</td> 
                                        <td>'.$field2name.'</td> 
                                        <td>'.$field3name.'</td> 
                                    </tr>';
                                }
                                echo '</table>';
                            } else {
                                echo '<table>
                                    <tr> 
                                        <td style=:"width:100%;"> Trainers Unavailable at the Moment </td> 
                                    </tr>
                                </table>';
                            }
                            
                        ?>
                </div>
                
                
            </div>


        </div>

    </div>
</body>

</html>