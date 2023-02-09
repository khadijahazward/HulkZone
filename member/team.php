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
    <title>TEAM | HulkZone</title>
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
                    TEAM
                </div>
                <div class="right">
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <form action="search.php" method="post">
                        <input type="text" placeholder="Search" name="search">
                        <button type="submit">Submit</button>
                    </form>
                </div>

                <div class="row"><br>
                    Team Members
                </div>

                <div class="row">
                    <?php 
                        $sql = "SELECT userID, fName, lName, roles, profilePhoto  FROM `user` where roles IN (2,3)";
                        $result = mysqli_query($conn, $sql);
                        
                        $count = 0;
                        
                        echo '<table>';

                        if (mysqli_num_rows($result) > 0) {
                            echo "<tr>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                $count++;
                                if(isset($row['profilePhoto']) && $row['profilePhoto'] != NULL){
                                    //dp link from db
                                    $profilePictureLink = $row['profilePhoto'];
                                }else{
                                    $profilePictureLink = '../member/profileImages/default.png';
                                }

                                $fullName = $row["fName"] . " " . $row["lName"];
                                if($row["roles"] == 2){
                                    $role = "Trainer";
                                }else{
                                    $role = "Dietician";
                                }

                                echo "
                                <td>
                                    <div class = 'test'>
                                        <div><img src='$profilePictureLink'></div>
                                        <div>$fullName</div>
                                        <div>$role</div>
                                        <div><a href='employeeProfile.php?userID=$row[userID]'><button>View Profile</button></a></div>
                                    </div>
                                </td> 
                                ";


                                //3 cols per row
                                if ($count % 3 == 0) {
                                    echo "</tr><tr>";
                                }
                            }
                            echo "</tr>";
                        }
                        
                        echo '</table>';
                    
                        
                    ?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>