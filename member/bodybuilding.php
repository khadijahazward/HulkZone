<?php 
include 'authorization.php';
include '../connect.php';
?>

<?php
$query = "SELECT * from user where userID = " . $_SESSION['userID'];
    $result = mysqli_query($conn, $query);
    $query1 = "SELECT * from member where userID = " . $_SESSION['userID'];
    $result1 = mysqli_query($conn, $query1);
    if (mysqli_num_rows($result) == 1 && mysqli_num_rows($result1) == 1) {
        $row = mysqli_fetch_assoc($result);
        $row1 = mysqli_fetch_assoc($result1);
    } else {
        echo '<script> window.alert("Error receiving data!");</script>';
    }

    if(isset($row['profilePhoto']) && $row['profilePhoto'] != NULL){
        //dp link from db
        $profilePictureLink = $row['profilePhoto'];
    }else{
        $profilePictureLink = '../member/profileImages/default.png';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BodyBuilding Training | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/servicepage.css">
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
            <a href="../member/dashboard.php"><div class="nav-font">Dashboard</div></a>
            </div>

            <hr>

            <div class="line">
            <a href="../member/profile.php"><div class="nav-font">My Profile</div></a>
            </div>

            <hr>

            <div class="line">
                <a href="../member/services.php"><div class="nav-font">Services</div></a>
            </div>
            
            <hr>

            <div class="line">
                <a href="../member/team.php"><div class="nav-font">Team</div></a>
            </div>

            <hr>

            <div class="line">
                <a href="../member/workout.php"><div class="nav-font">Work Out Plan</div></a>
            </div>

            <hr>

            <div class="line">
                <a href="../member/dietplan.php"><div class="nav-font">Diet Plan</div></a>
            </div>

            <hr>

            <div class="line">
                <a href="../member/chat.php"><div class="nav-font">Chat</div></a>
            </div>

            <hr>
            
            <div class="line">
                <a href="../member/payment.php"><div class="nav-font">Payments</div></a>
            </div>

            <hr>

            <div class="line">
                <a href="../member/appointment.php"><div class="nav-font">Appointments</div></a>
            </div>

            <hr>

            <div class="line">
                <a href="../member/complaint.php"><div class="nav-font">Complaints</div></a>
            </div>
            
            <hr>
            
            <div class="line">
                <a href="../home/logout.php"><div class="nav-font">Log Out</div></a>
            </div>

            <hr>
        </div>
        <div class="body">
            <div class = "header">
                <div class="left"> 
                    BODYBUILDING TRAINING
                </div>
                <div class="right">
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>

            <div class="content">
                <div class="row">
                        <div class="topic">
                        Take your strength and physique to new heights with bodybuilding training. Whether you're a seasoned pro or a fitness beginner,<br> this powerful training style will help you build muscle, boost confidence, and reach your full potential.
                        </div>
                        <img src="../member/images/bodybuildingpage.png" width= "100%" height="100%">
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
                    <div class="row-two" style="font-size:20px;">Bodybuilding Training - Service History</div>
                <hr class="hr-heading">

                <div class="row-two" style="margin-left: 10px; margin-right: 10px;">
                        <?php
                            //add the history in db
                            $sql = "SELECT employeeID FROM `memberservice` where memberID = ". $row1['memberID'] . " AND serviceID = 1";
                            $result2 = mysqli_query($conn, $sql);
                            
                            if ($result2 && mysqli_num_rows($result2) > 0) {
                                echo '<table>';
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    $field1name = $row2["employeeID"];
                            
                                    echo '<tr> 
                                        <td>'.$field1name.'</td> 
                                    </tr>';
                                }
                                echo '</table>';
                            } else {
                                echo '<table>
                                    <tr> 
                                        <td> No Service History </td> 
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
                            $sql = "SELECT employeeID FROM `memberservice` where memberID = ". $row1['memberID'] . " AND serviceID = 1";
                            $result2 = mysqli_query($conn, $sql);
                            
                            if ($result2 && mysqli_num_rows($result2) > 0) {
                                echo '<table>';
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    $field1name = $row2["employeeID"];
                            
                                    echo '<tr> 
                                        <td>'.$field1name.'</td> 
                                    </tr>';
                                }
                                echo '</table>';
                            } else {
                                echo '<table>
                                    <tr> 
                                        <td> Trainers Unavailable at the Moment </td> 
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