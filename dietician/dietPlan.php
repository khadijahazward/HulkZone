<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$query1 = "SELECT * FROM employee WHERE userID = $userID";
$result1 = mysqli_query($conn, $query1);

if (mysqli_num_rows($result1) == 1) {
    $row1 = mysqli_fetch_assoc($result1);
    $employeeID = $row1['employeeID'];
} else {
    echo '<script> window.alert("Error of receiving employee details!");</script>';
}



?>

<!DOCTYPE html>
<html>

<head>
    <title>Diet Plan</title>
    <meta charset="utf-8">
    <meta name="Viewport" content="width=device-width, initial-scale= 1.0">
    <link href="Style/dietPlan.css" rel="StyleSheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class="container">
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
                            <th>DIET PLAN</th>
                            <th>
                                Supplement&nbsp;&nbsp;&nbsp;
                                <a href="newSupplement.php"><button class="addSupplementBtn"><i
                                            class="fa fa-plus-square"></i></button></a>
                            </th>
                        </tr>
                    </thead>
                    <?php

                    $query2 = "SELECT * FROM serviceCharge WHERE employeeID = $employeeID AND endDate >= NOW()";
                    $result2 = mysqli_query($conn, $query2);

                    if (mysqli_num_rows($result2) > 0) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $memberID = $row2['memberID'];

                            $query3 = "SELECT * FROM member WHERE memberID = $memberID";
                            $result3 = mysqli_query($conn, $query3);

                            if ($result3) {
                                $row3 = mysqli_fetch_assoc($result3);
                                $memberUserID = $row3['userID'];

                                $query4 = "SELECT * FROM user JOIN member ON user.userID = member.userID WHERE user.userID = $memberUserID";
                                $result4 = mysqli_query($conn, $query4);

                                if (mysqli_num_rows($result4) > 0) {
                                    while ($row4 = mysqli_fetch_assoc($result4)) {

                                        $memberFName = $row4['fName'];
                                        $memberLName = $row4['lName'];
                                        $memberProfilePic = $row4['profilePhoto'];

                                        if ($row['statuses'] == '1') {
                                            $memberStatus = "Active";
                                        } else {
                                            $memberStatus = "Not Active";
                                        }

                                        echo "
                                        <tbody>
                                                <tr>
                                                <td>" . $memberID . "</td>
                                                <td><img src=" . $memberProfilePic . " alt='member DP'></td>
                                                <td>" . $memberFName . " " . $memberLName . "</td>
                                                <td>" . $memberStatus . "</td>";

                                                
                                        $query7 = "SELECT * FROM dietplan JOIN servicecharge ON dietplan.memberID = servicecharge.memberID WHERE servicecharge.memberID = $memberID AND servicecharge.employeeID = $employeeID AND dietplan.day = 1 AND servicecharge.endDate >= NOW()";
                                        $result7 = mysqli_query($conn, $query7);
                                        $row7 = mysqli_fetch_assoc($result7);

                                        if (mysqli_num_rows($result7) == 0) {
                                            
                                            echo "<td>
                                                    <a href='createDietPlanMonday.php?new=" . $memberID . "'><button>New</button></a>
                                                </td>";
                                                
                                        } elseif (mysqli_num_rows($result7) == 1) 
                                        {                                                
                                                echo    "<td>
                                                        <a href='viewDietPlan.php?view=" . $memberID . "'><button>View</button></a>
                                                        <a href='updateDietPlan.php?update=" . $memberID . "'><button>Update</button></a>
                                                    </td>";
                                            
                                        }else{
                                                echo    "<td>
                                                            <p>There is an error with retrieving dietpla data</p>
                                                        </td>";
                                        }

                                        $query6 = "SELECT * FROM supplement WHERE memberID = $memberID AND employeeID = employeeID";
                                        $result6 = mysqli_query($conn, $query6);

                                        if (mysqli_num_rows($result6) == 0) {
                                            echo "<td>
                                                <a href='addSupplements.php?new=" . $memberID . "'><button>New</button></a>
                                            </td>";
                                        } elseif(mysqli_num_rows($result6) == 1) {
                                                echo    "<td>
                                                            <a href='viewSupplements.php?new=" . $memberID . "'><button>View</button></a>
                                                            <a href='updateSupplements.php?update=" . $memberID . "'><button>Update</button></a>
                                                        </td>";
                                            
                                        }else{
                                            echo "<td>
                                                <p>There is an error with retrieving supplement data</p>
                                            </td>";
                                        }
                                        echo "</tr>
                                        </tbody>";
                                    }
                                }
                            }
                        }
                    }else{
                        echo "
                        <tr>
                            <td colspan='6'>Still you don't have members</td>
                        </tr>
                    ";
                    }


                    ?>
                </table>
            </div>
        </div>
    </div>

</body>

</html>