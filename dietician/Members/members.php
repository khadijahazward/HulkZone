<?php

$conn = mysqli_connect("localhost","root","","hulkZOne");

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Members</title>
    <meta charset="utf-8">
    <meta name="Viewport" content="width=device-width, initial-scale= 1.0">
    <link href="members.css" rel="StyleSheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="topBar">
            <div class="gymLogo"><img src="../Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <img src="../Images/Profile.png" alt="my profile" class="myProfile">
            </div>
        </div>
        <div class="leftBar">
            <div class="leftBarContent">
                <a href="../Home/home.html"><i class="fa fa-home"></i>Home</a>
                <a href="members.php" class="active"><i class="fa fa-group"></i>Members</a>
                <a href="../Appointments/Appointments/appointments.html"><i class="fa fa-calendar"></i>Appointments</a>
                <a href="../Diet Plan/DietPlan/dietPlan.html"><i class="fa fa-heartbeat"></i>Diet Plans</a>
                <a href="../ChatBox/chatBox.html"><i class="fa fa-comments"></i>Chat Box</a>
                <a href="../Settings/Profile/View Profile/viewProfile.html"><i class="fa fa-cog"></i>Settings</a>
                <a><i class="fa fa-sign-out"></i>Log out</a>
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
                            <th>GENDER</th>
                            <th>CONTACT NUMBER</th>
                            <th>PLAN</th>
                        </tr>
                    </thead>

                    <?php
                        $sql = "SELECT member.memberID, user.profilePhoto, user.fName, user.lName, user.gender, user.contactNumber, member.planType
                                FROM member
                                INNER JOIN user
                                ON member.userID = user.userID";

                        $result = mysqli_query($conn, $sql);

                    ?>

                    <tbody>
                        <?php

                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo"<tr>
                                        <td>".$row["memberID"]."</td>
                                        <td><img src=".$row["profilePhoto"]." alt='member's DP'></td>
                                        <td>".$row["fName"]." ".$row["lName"]."</td>
                                        <td>".$row["gender"]."</td>
                                        <td>".$row["contactNumber"]."</td>
                                        <td>".$row["planType"]."</td>
                                    </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>