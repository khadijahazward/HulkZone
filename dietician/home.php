<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

?>


<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="Viewport" content="width=device-width, initial-scale= 1.0">
    <link href="Style/home.css" rel="StyleSheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
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
                <a href="home.php" class="active"><i class="fa fa-home"></i>Home</a>
                <hr>
                <a href="members.php"><i class="fa fa-group"></i>Members</a>
                <hr>
                <a href="appointments.php"><i class="fa fa-calendar"></i>Appointments</a>
                <hr>
                <a href="schedule.php"><i class="fa fa-clock-o"></i>Schedule</a>
                <hr>
                <a href="dietPlan.php"><i class="fa fa-heartbeat"></i>Diet Plans</a>
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
                <p>Welcome, Dr. Vindinu</p>
            </div>
            <div class="subTopic">
                <p>Have a nice day at great work</p>
            </div>
            <div class="countArea">
                <table>
                    <tr>
                        <td>
                            <a href="members.php">
                                <div class="memberCountCard">
                                    <div class="left">
                                        <p class="count">100</p>
                                        <p class="cardTopic">Members</p>
                                    </div>
                                    <div class="right">
                                        <i class="material-icons">
                                            groups
                                        </i>
                                    </div>
                                </div>
                            </a>
                        </td>
                        <td>
                            <a href="appointments.php">
                                <div class="appointmentCountCard">
                                    <div class="left">
                                        <p class="count">100</p>
                                        <p class="cardTopic">Appointments</p>
                                    </div>
                                    <div class="right">
                                        <i class="material-icons">
                                            edit_calendar
                                        </i>
                                    </div>
                                </div>
                            </a>
                        </td>
                        <td>
                            <a href="profile.php">
                                <div class="ratesCountCard">
                                    <div class="left">
                                        <p class="count">4.9</p>
                                        <p class="cardTopic">Ratings</p>
                                    </div>
                                    <div class="right">
                                        <i class="material-icons">
                                            star
                                        </i>
                                    </div>
                                </div>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="ratingArea">
                <table class="graph">
                    <caption>
                        <p>Rating</p>
                    </caption>
                    <thead>
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Percent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="height:85%">
                            <th scope="row">5</th>
                            <td><span>85%</span></td>
                        </tr>
                        <tr style="height:23%">
                            <th scope="row">4</th>
                            <td><span>23%</span></td>
                        </tr>
                        <tr style="height:7%">
                            <th scope="row">3</th>
                            <td><span>7%</span></td>
                        </tr>
                        <tr style="height:38%">
                            <th scope="row">2</th>
                            <td><span>38%</span></td>
                        </tr>
                        <tr style="height:35%">
                            <th scope="row">1</th>
                            <td><span>35%</span></td>
                        </tr>
                        <tr style="height:30%">
                            <th scope="row">0</th>
                            <td><span>30%</span></td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="appointmentArea">
                <p class="topic">Recent Appointments</p>
                <a href="appointments.php">
                    <p class="seeMore">View All <i class="fa fa-angle-right"></i></p>
                </a>
                <div class="appointmentGridContainer">
                    <table>
                        <tr>
                            <td><img src="Images/Member.png"></td>
                            <td class="name">
                                <p>Venenatis montes</p>
                            </td>
                            <td class="time">
                                <p>Ongoing</p>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="Images/Member.png"></td>
                            <td class="name">
                                <p>Venenatis montes</p>
                            </td>
                            <td class="time">
                                <p>11:00</p>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="Images/Member.png"></td>
                            <td class="name">
                                <p>Venenatis montes</p>
                            </td>
                            <td class="time">
                                <p>11:00</p>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="Images/Member.png"></td>
                            <td class="name">
                                <p>Venenatis montes</p>
                            </td>
                            <td class="time">
                                <p>11:00</p>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="Images/Member.png"></td>
                            <td class="name">
                                <p>Venenatis montes</p>
                            </td>
                            <td class="time">
                                <p>11:00</p>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="Images/Member.png"></td>
                            <td class="name">
                                <p>Venenatis montes</p>
                            </td>
                            <td class="time">
                                <p>11:00</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!--<div class="memberArea">
                <p class="topic">Members</p>
                <select id="yearPicker" class="yearPicker">
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                </select>
                <div class="content">
                    <table>
                        <tr>
                            <td style="width: 100px;">
                                <i class="material-icons"
                                    style="color: rgba(239, 91, 3, 1); border: 1px solid rgba(239, 91, 3, 1); background-color: rgba(239, 91, 3, 0.3);">groups</i>
                            </td>
                            <td>
                                <p class="count">100</p>
                                <p class="countName">New Members</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="material-icons"
                                    style="color: rgba(0, 56, 101, 1); border: 1px solid rgba(0, 56, 101, 1); background-color: rgba(0, 56, 101, 0.3);">groups</i>
                            </td>
                            <td>
                                <p class="count">1000</p>
                                <p class="countName">All Members</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="genderArea">
                <p class="topic">Gender</p>
                <select id="yearPicker" class="yearPicker">
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                </select>
                <figure class="pie-chart">
                    <figcaption>
                        Coal 38<span style="color:#003865"></span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Natural Gas 23<span style="color:#EF5B03"></span>
                    </figcaption>
                </figure>
            </div>
            <div class="recentMemberArea">
                <p class="topic">Recent Members</p>
                <a href="../Members/members.html">
                    <p class="seeMore">View All <i class="fa fa-angle-right"></i></p>
                </a>
                <div class="gridContainer">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>PROFILE</th>
                                <th>NAME</th>
                                <th>GENDER</th>
                                <th>CONTACT NUMBER</th>
                                <th>PLAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td><img src="../Images/Member.png" alt="member's DP"></td>
                                <td>Lina Johnson</td>
                                <td>Female</td>
                                <td>0710870961</td>
                                <td>3 months</td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td><img src="../Images/Member.png" alt="member's DP"></td>
                                <td>Lina Johnson</td>
                                <td>Female</td>
                                <td>0710870961</td>
                                <td>3 months</td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td><img src="../Images/Member.png" alt="member's DP"></td>
                                <td>Lina Johnson</td>
                                <td>Female</td>
                                <td>0710870961</td>
                                <td>3 months</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>-->
        </div>
    </div>

</body>

</html>