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

$query2 = "SELECT * FROM serviceCharge WHERE employeeID = $employeeID AND endDate >= date('Y-m-d H:i:s')";
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
                }
            }
        }
    }
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
</head>

<body>
    <div class="container">
        <div class="topBar">
            <div class="gymLogo"><img src="Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
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
                            <th style="width: 350px;">Diet Plan</th>
                            <th>Supplement</th>
                        </tr>
                    </thead>
                    <?php echo ";
                    <tbody>
                        <tr>
                            <td>" . $memberID . "</td>
                            <td><img src=" . $memberProfilePic . " alt='member DP'></td>
                            <td>" . $memberFName . " " . $memberLName . "</td>
                            <td>" . $memberStatus . "</td>";



                    $query5 = "SELECT * FROM dietplan WHERE day='monday' AND memberID= $memberID";
                    $result5 = mysqli_query($conn, $query5);

                    if (mysqli_num_rows($result5) == 0) {
                        echo "<td>
                                    <a href='createDietPlanMonday.php?new=" . $memberID . "'><button>New</button></a>
                                </td>";
                    } else {

                        $query7 = "SELECT * FROM servicecharge WHERE memberID = $memberID";
                        $result7 = mysqli_query($conn, $query7);

                        $row7 = mysqli_fetch_assoc($result7);
                        
                        if($row7['endDate'] >= date('Y-m-d H:i:s')){
                            echo    "<td>
                                        <a href='viewDietPlan.php?view=" . $memberID . "'><button>View</button></a>
                                    </td>";
                        }else{
                            echo    "<td>
                                        <a href='createDietPlanMonday.php?new=" . $memberID . "'><button>New</button></a>
                                    </td>";
                        }
                    }

                    $query6 = "SELECT * FROM supplement WHERE memberID = $memberID AND employeeID = employeeID";
                    $result6 = mysqli_query($conn, $query6);

                    if (mysqli_num_rows($result6) == 0) {
                        echo "<td>
                                    <a href='addSupplements.php?new=" . $memberID . "'><button>New</button></a>
                                </td>";
                    } else {
                        if($row7['endDate'] >= date('Y-m-d H:i:s')){
                            echo    "<td>
                                        <a href='viewSupplements.php?new=" . $memberID . "'><button>View</button></a>
                                    </td>";
                        }else{
                            echo    "<td>
                                        <a href='addSupplements.php?new=" . $memberID . "'><button>New</button></a>
                                    </td>";
                        }
                    }
                    echo "</tr>
                    </tbody>";
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>