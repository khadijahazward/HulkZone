<?php

include '../../connect.php'

?>



<!DOCTYPE html>
<html>

<head>
    <title>Diet Plan</title>
    <meta charset="utf-8">
    <meta name="Viewport" content="width=device-width, initial-scale= 1.0">
    <link href="dietPlan.css" rel="StyleSheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="topBar">
            <div class="gymLogo"><img src="../../Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <img src="../../Images/Profile.png" alt="my profile" class="myProfile">
            </div>
        </div>
        <div class="leftBar">
            <div class="leftBarContent">
                <hr>
                <a href="../../Home/home.php"><i class="fa fa-home"></i>Home</a>
                <hr>
                <a href="../../Members/members.php"><i class="fa fa-group"></i>Members</a>
                <hr>
                <a href="../../Appointments/Appointments/appointments.php"><i
                        class="fa fa-calendar"></i>Appointments</a>
                <hr>
                <a href="../../Schedule/schedule.php"><i class="fa fa-clock-o"></i>Schedule</a>
                <hr>
                <a href="dietPlan.php" class="active"><i class="fa fa-heartbeat"></i>Diet Plans</a>
                <hr>
                <a href="../../ChatBox/chatBox.html"><i class="fa fa-comments"></i>Chat Box</a>
                <hr>
                <a href="../../Settings/Profile/View Profile/profile.php"><i class="fa fa-cog"></i>Settings</a>
                <hr>
                <a href="../../../home/logout.php"><i class="fa fa-sign-out"></i>Log out</a>
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
                            <th>STATUS</th>
                            <th>DIET PLAN</th>
                            <th style="width: 350px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td><img src="../../Images/Member.png" alt="member's DP"><span>Lina Johnson</span></td>
                            <td>Active</td>
                            <td>Scheduled</td>
                            <td>
                                <button
                                    onclick="window.location.href='../View Diet Plan/viewDietPlan.html';">View</button>
                                <button
                                    onclick="window.location.href='../Create Diet Plan/Create Diet Plan - Monday/createDietPlanMonday.html';">New</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>