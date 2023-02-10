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

<?php
    $eId = $_GET['userID'];

    $sql = "SELECT * FROM user WHERE userID = '$eId'";
    $result = mysqli_query($conn, $sql);

    $sql2 = "SELECT * FROM employee WHERE userID = '$eId'";
    $result2 = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) > 0 && mysqli_num_rows($result2) > 0) {

        $row = mysqli_fetch_assoc($result);
        $row2 = mysqli_fetch_assoc($result2);

        
        $fullName = $row["fName"] . " " . $row["lName"];
        $phone = $row['contactNumber'];
        if(isset($row['profilePhoto']) && $row['profilePhoto'] != NULL){
            //dp link from db
            $profilePicture= $row['profilePhoto'];
        }else{
            $profilePicture = '../member/profileImages/default.png';
        }

        $phone = (isset($row["contactNumber"])) ? $row["contactNumber"] : '';
        $role = (isset($row["roles"])) ? $row["roles"] : '';
        if($role == 2){
            $role = "Trainer";
        }else{
            $role = "Dietician"; 
        }
        $description = (isset($row2["description"])) ? $row2["description"] : '';
        $experience = (isset($row2["noOfYearsOfExperience"])) ? $row2["noOfYearsOfExperience"] : '';
        $rating = (isset($row2["avgRating"])) ? $row2["avgRating"] : '';
        $qualification = (isset($row2["qualification"])) ? $row2["qualification"] : '';
        $lang = (isset($row2["language"])) ? $row2["language"] : '';
        
        
        
        $empID = $row2['employeeID'];

        $sql3 = "SELECT * from employeeservice where employeeID = " . $empID;
        $result3 = mysqli_query($conn, $sql3);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Profile | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/team.css">
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
                    <?php echo $fullName . " " . "-" . " " . $role;?>
                </div>
                <div class="right">
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">
                <div class="top-r">
                        <div style= "width:20%; text-align:center; margin:20px;"><img src = "<?php echo $profilePicture; ?>" height = '175px' weight = '175px' style="border-radius:10px;"></div>
                        <div class ="top-r-div">
                            <div style="font-size:30px;"><?php echo $fullName;?></div>
                            <div style="font-size:15px; margin-top:10px;">Number of Years of Experience: <?php echo $experience;?> </div>
                            <div style="font-size:15px; margin-top:10px;">Fluent Languages: <?php echo  $lang?> </div>
                            <div style="font-size:15px; margin-top:10px;">Phone Number: <?php echo $phone;?> </div>
                            <div style="font-size:15px; margin-top:10px;">Qualification: <?php echo $qualification;?> </div>
                        </div>
                </div>
                <div class="middle-r">
                    BIO
                    <p><?php echo $description; ?></p>
                </div>

                <div class="middle-r">
                    SERVICES OFFERED
                    <?php
                        echo '<table> ';

                        if (mysqli_num_rows($result3) > 0) {
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                $field1name = $row3["serviceID"];
                                if($field1name == 1){
                                    $service = "CrossFit Training";
                            } else if ($field1name == 2) {
                                $service = "BodyBuilding Training";
                            }else if ($field1name == 3) {
                                $service = "Diet Service";
                            }else if($field1name == 4){
                                $service = "Strength Training";
                            }else{
                                $service = "Result Unknown";  
                            }

                                echo '<tr> 
                                <ul>   
                                    <td><li>'.$service.'</li></td> 
                                </tr>';
                            }
                        }
                        echo '</table>';
                                
                    ?>
                </div>

                <div class="middle-r">
                    AVERAGE RATINGS: 
                    <?php echo $rating; ?>
                </div>
                
            </div>
        </div>

    </div>
</body>

</html>

