<?php

    include '../../../connect.php';
    
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link href="profile.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="topBar">
            <div class="gymLogo"><img src="../../../Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <img src="../../../Images/Profile.png" alt="my profile" class="myProfile">
            </div>
            <div class="leftBar">
                <div class="leftBarContent">
                    <hr>
                    <a href="../../../Home/home.php"><i class="fa fa-home"></i>Home</a>
                    <hr>
                    <a href="../../../Members/members.php"><i class="fa fa-group"></i>Members</a>
                    <hr>
                    <a href="../../../Appointments/Appointments/appointments.php"><i
                            class="fa fa-calendar"></i>Appointments</a>
                    <hr>
                    <a href="../../../Schedule/schedule.php"><i class="fa fa-clock-o"></i>Schedule</a>
                    <hr>
                    <a href="../../../Diet Plan/DietPlan/dietPlan.php"><i class="fa fa-heartbeat"></i>Diet Plans</a>
                    <hr>
                    <a href="../../../ChatBox/chatBox.html"><i class="fa fa-comments"></i>Chat Box</a>
                    <hr>
                    <a href="profile.php" class="active"><i class="fa fa-cog"></i>Settings</a>
                    <hr>
                    <a href="../../../../home/logout.php"><i class="fa fa-sign-out"></i>Log out</a>
                    <hr>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="profileCard">
                <img src="../../../Images/Profile.png" alt="Profile Picture" class="profileCardPic">
                <div class="intro">
                    <p style="font-weight: 700; font-size: 20px;">Dr Vindinu Gunawardana</p>
                    <p style="font-weight: 400; font-size: 15px;">Dietician</p>
                </div>
                <button onclick="window.location.href ='../Edit Profile/editProfile.html';"><i
                        class="fa fa-pencil"></i>Edit Profile</button>
                <div class="rates">
                    <p style="font-weight: 700; font-size: 15px;">100 Rates</p>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
            </div>
            <div class="content">
                <div class="dateBar">
                    <div class="selector"></div>
                    <div class="dateRow">
                        <a href="profile.php" style="color: rgba(0, 104, 55, 1);">Profile</a>
                        <a href="../../Change Password/changePassword.php">Change Password</a>
                        <a href="../../Complaint/complaint.php">Complaints</a>
                    </div>
                </div>
                <form>
                    <table>
                        <tr>
                            <td>
                                <label for="fname">First Name</label><br>
                                <input type="text" id="fname" name="fname" class="textBox">
                            </td>
                            <td>
                                <label for="lname">Last Name</label><br>
                                <input type="text" id="lname" name="lname" class="textBox">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="nic">NIC</label><br>
                                <input type="text" id="nic" name="nic" class="textBox">
                            </td>
                            <td>
                                <label for="DOB">Date of Birth</label><br>
                                <input type="date" id="DOB" name="DOB" class="textBox">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="phone">Phone</label><br>
                                <input type="text" id="phone" name="phone" class="textBox">
                            </td>
                            <td>
                                <label for="gender">Gender</label><br>
                                <select name="gender" id="gender">
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                    <option value="Other">Other</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="streetNum">Street Number</label><br>
                                <input type="text" id="streetNum" name="streetNum" class="textBox">
                            </td>
                            <td>
                                <label for="addressLineOne">Address Line 1</label><br>
                                <input type="text" id="addressLineOne" name="addressLineOne" class="textBox">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="addressLineTwo">Address Line 2</label><br>
                                <input type="text" id="addressLineTwo" name="addressLineTwo" class="textBox">
                            </td>
                            <td>
                                <label for="city">City</label><br>
                                <input type="text" id="city" name="city" class="textBox">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="experiancedYears">Number of years of Experiance</label><br>
                                <input type="number" id="experiancedYears" name="experiancedYears" class="textBox">
                            </td>
                            <td>
                                <label for="qualification">Qualification</label><br>
                                <input type="text" id="qualification" name="qualification" class="textBox">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label for="bio">Bio</label><br>
                                <textarea name="bio" id="bio" cols="75" rows="5" style="resize: none;"></textarea>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <button type="button" onclick="window.location.href='../Edit Profile/editProfile.php';" class="updateBtn">Update
            Profile</button>
    </div>
</body>

</html>