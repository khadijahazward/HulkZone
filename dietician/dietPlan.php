<?php

include 'authorization.php';
include 'connect.php'

?>


<!DOCTYPE html>
<html>

<head>
    <title>Diet Plan</title>
    <meta charset="utf-8">
    <meta name="Viewport" content="width=device-width, initial-scale= 1.0">
    <link href="Style/dietPlan.css" rel="StyleSheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="topBar">
            <div class="gymLogo"><img src="Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <img src="Images/Profile.png" alt="my profile" class="myProfile">
            </div>
        </div>
        <div class="leftBar">
            <div class="leftBarContent">
                <hr>
                <a href="home.php"><i class="fa fa-home"></i>Home</a>
                <hr>
                <a href="members.php"><i class="fa fa-group"></i>Members</a>
                <hr>
                <a href="appointments.php"><i class="fa fa-calendar"></i>Appointments</a>
                <hr>
                <a href="schedule.php"><i class="fa fa-clock-o"></i>Schedule</a>
                <hr>
                <a href="dietPlan.php" class="active"><i class="fa fa-heartbeat"></i>Diet Plans</a>
                <hr>
                <a href="chatBox.php"><i class="fa fa-comments"></i>Chat Box</a>
                <hr>
                <a href="profile.php"><i class="fa fa-user"></i>My Profile</a>
                <hr>
                <a href="complaint.php"><i class="fa fa-cog"></i>Complaints</a>
                <hr>
                <a href="../home/logout.php"><i class="fa fa-sign-out"></i>Log out</a>
                <hr>
            </div>
        </div>
        <div class="main">
            <div class="topic">
                <p>Diet Plans</p>
            </div>
            <div class="gridContainer">
                <table>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>PROFILE</th>
                            <th>NAME</th>
                            <th>STATUS</th>
                            <th style="width: 350px;"></th>
                            <th>Supplement</th>
                        </tr>
                    </thead>

                    <?php

                    $query =    "SELECT member.memberID, user.profilePhoto, user.fName, user.lName, user.statuses 
                                FROM member 
                                INNER JOIN user 
                                ON member.userID = user.userID";
    
                    $result = mysqli_query($conn, $query);
    
                    if(mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)) {
                            $selectedMemberID = $row['memberID'];
                            $_SESSION['selectedMemberID'] = $selectedMemberID;
            
                            echo "<tbody>
                                <tr>
                                    <td>". $selectedMemberID ."</td>
                                    <td><img src=".$row['profilePhoto']." alt='member DP'></td>
                                    <td>". $row["fName"] ." ". $row["lName"] ."</td>
                                    <td>";
                                        if($row['statuses'] == '1'){
                                            echo "Active";
                                        }else{
                                            echo "Not Active";
                                        }
                          
                                    echo "</td>";
            
                            
                            $query1 = "SELECT * FROM dietplan WHERE day='monday' AND memberID= $selectedMemberID";
                            $result1 = mysqli_query($conn, $query1);

                            if(mysqli_num_rows($result1) == 0){
                                echo "<td>
                                    <a href='createDietPlanMonday.php?new=".$row['memberID']."'><button>New</button></a>
                                </td>";
                            }else{
                                echo "<td>
                                    <a href='viewDietPlan.php?view=".$row['memberID']."'><button>View</button></a>
                                    <a href='updateDietPlan.php?update=".$row['memberID']."'><button>Update</button></a>
                                    </td>";
                            }

                            $query2 = "SELECT * FROM supplement WHERE memberID = $selectedMemberID";
                            echo    
                            "<td>
                                <a href='supplements.php?add=".$row['memberID']."'><button>View</button></a>
                            </td>
                            </tr>
                        </tbody>";
                        }
                    }
                ?>

                </table>
            </div>
        </div>
    </div>
</body>

</html>