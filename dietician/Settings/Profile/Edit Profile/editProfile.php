<!--<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Profile</title>
    <link href="editProfile.css" rel="stylesheet">
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
        </div>
        <img src="../../../Images/Profile.png" alt="Profile Picture" class="profile">
        <button onclick="document.getElementById('profile').style.display='block';" class="editButton">Change Profile
            Picture</button>
        <div class="firstContent">
            <form>
                <table border="0px">
                    <tr>
                        <td colspan="3">Name</td>
                    </tr>
                    <tr>
                        <td style="left: 50px; position:relative;"><label for="fname">First Name</label></td>
                        <td style="width: 50px;"></td>
                        <td colspan="2"><input type="text" id="fname" name="fname" class="textBox"></td>
                    </tr>
                    <tr>
                        <td style="left: 50px; position:relative;"><label for="lname">Last Name</label></td>
                        <td style="width: 50px;"></td>
                        <td colspan="2"><input type="text" id="lname" name="lname" class="textBox"></td>
                    </tr>
                    <tr>
                        <td><label for="nic">NIC</label></td>
                        <td style="width: 50px;"></td>
                        <td colspan="2"><input type="text" id="nic" name="nic" class="textBox"></td>
                    </tr>
                    <tr>
                        <td><label for="DOB">Date of Birth</label></td>
                        <td style="width: 50px;"></td>
                        <td colspan="2"><input type="date" id="DOB" name="DOB" class="textBox"></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Phone</label></td>
                        <td style="width: 50px;"></td>
                        <td colspan="2"><input type="text" id="phone" name="phone" class="textBox"></td>
                    </tr>
                    <tr>
                        <td><label for="email"></label>Email</td>
                        <td style="width: 50px;"></td>
                        <td colspan="2"><input type="email" id="email" name="email" class="textBox"></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="secondContent">
            <form>
                <table>
                    <tr>
                        <td colspan="3">Address</td>
                    </tr>
                    <tr>
                        <td style="left: 50px; position:absolute;"><label for="streetNum">Street Number</label>
                        </td>
                        <td colspan="2"><input type="text" id="streetNum" name="streetNum" class="textBox"></td>
                    </tr>
                    <tr>
                        <td style="left: 50px; position:absolute;"><label for="addressLineOne">Address Line
                                1</label></td>
                        <td colspan="2"><input type="text" id="addressLineOne" name="addressLineOne" class="textBox">
                        </td>
                    </tr>
                    <tr>
                        <td style="left: 50px; position:absolute;"><label for="addressLineTwo">Address Line
                                2</label></td>
                        <td colspan="2"><input type="text" id="addressLineTwo" name="addressLineTwo" class="textBox">
                        </td>
                    </tr>
                    <tr>
                        <td style="left: 50px; position:absolute;"><label for="city">City</label></td>
                        <td colspan="2"><input type="text" id="city" name="city" class="textBox"></td>
                    </tr>
                    <tr>
                        <td><label for="gender">Gender</label></td>
                        <td style="text-align: center;"><input type="radio" id="female" name="gender"
                                value="female">Female</td>
                        <td><input type="radio" id="male" name="gender" value="male">Male</td>
                    </tr>
                    <tr>
                        <td><label for="country">Country</label></td>
                        <td colspan="2"><input type="text" id="country" name="country" class="textBox"></td>
                    </tr>
                    <tr>
                        <td><label for="experiancedYears">Number of years of Experiance</label></td>
                        <td colspan="2"><input type="number" id="experiancedYears" name="experiancedYears"
                                class="textBox"></td>
                    </tr>
                    <tr>
                        <td><label for="qualification">Qualification</label></td>
                        <td colspan="2"><input type="text" id="qualification" name="qualification" class="textBox">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <label for="bio">Bio</label><br>
                            <textarea name="bio" id="bio" cols="80" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td colspan="3">
                            <label for="offers">What Vindinu Gunawardana Offers</label><br>
                            <table class="subtable" style="margin-top: -50px;">
                                <tr>
                                    <td><input type="text" id="offers" name="offers" class="subTextBox"></td>
                                    <td><input type="text" id="offers" name="offers" class="subTextBox"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" id="offers" name="offers" class="subTextBox"></td>
                                    <td><input type="text" id="offers" name="offers" class="subTextBox"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" id="offers" name="offers" class="subTextBox"></td>
                                    <td><input type="text" id="offers" name="offers" class="subTextBox"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <button onclick="document.getElementById('popUp').style.display='block';" class="saveBtn">Save</button>
    </div>


    Change Profile Pic
    <div id="profile" class="popUpContent">
        <div class="popUpContainer">
            <span class="close">&times;</span>
            <p>Change Profile Photo</p>
            <form>
                <label for="profilePic">
                    <input type="file" name="profilePic" id="profilePic">
                </label>
            </form>
            <br>
            <button class="acceptBtn" onclick="document.getElementById('profile').style.display='none';">UPDATE</button>
        </div>
    </div>


    <script>
        var popUpContent = document.getElementById('profile');
        var span = document.getElementsByClassName("close")[0];

        span.onclick = function () {
            popUpContent.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == popUpContent) {
                popUpContent.style.display = "none";
            }
        }
    </script>




    <div id="popUp" class="popUpContent">
        <div class="popUpContainer">
            <span class="close">&times;</span>
            <img src="../../../Images/Ok.png" alt="Done" style="width: 50px; height: 60px; top: 40px;">
            <p>Your Profile has been Updated Successfully!</p>
            <button class="acceptBtn" onclick="window.location.href='../View Profile/viewProfile.html';">OK</button>
        </div>
    </div>


    <script>
        var popUpContent = document.getElementById('popUp');
        var span = document.getElementsByClassName('close')[0];

        span.onclick = function () {
            popUpContent.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == popUpContent) {
                popUpContent.style.display = "none";
            }
        }
    </script>
</body>

</html>-->

<?php

    include '../../../connect.php';
    
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link href="../View Profile/profile.css" rel="stylesheet">
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
                    <a href="../../../Home/home.html"><i class="fa fa-home"></i>Home</a>
                    <hr>
                    <a href="../../../Members/members.php"><i class="fa fa-group"></i>Members</a>
                    <hr>
                    <a href="appointments.html"><i class="fa fa-calendar"></i>Appointments</a>
                    <hr>
                    <a href=".../../../Schedule/schedule.php""><i class=" fa fa-clock-o"></i>Schedule</a>
                    <hr>
                    <a href="../../../Diet Plan/DietPlan/dietPlan.html"><i class="fa fa-heartbeat"></i>Diet Plans</a>
                    <hr>
                    <a href="../../../ChatBox/chatBox.html"><i class="fa fa-comments"></i>Chat Box</a>
                    <hr>
                    <a href="viewProfile.html" class="active"><i class="fa fa-cog"></i>Settings</a>
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
                <button><i class="fa fa-pencil"></i>Change Profile</button>
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
                        <a href="../View Profile/profile.php" style="color: rgba(0, 104, 55, 1);">Profile</a>
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
        <button type="button" class="updateBtn"
            onclick="document.getElementById('popUp').style.display='block'">Update</button>
    </div>

    <div id="popUp" class="popUpContent">
        <div class="popUpContainer">
            <span class="close">&times;</span>
            <img src="../../Images/Ok.png" alt="Done" style="width: 50px; height: 60px; top: 40px;">
            <p>Your Profile has been Updated Successfully!</p>
            <button class="acceptBtn" oonclick="window.location.href='../View Profile/profile.php';">OK</button>
        </div>
    </div>

    <script>
    var popUpContent = document.getElementById('popUp');
    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        popUpContent.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == popUpContent) {
            popUpContent.style.display = "none";
        }
    }
    </script>

</body>

</html>