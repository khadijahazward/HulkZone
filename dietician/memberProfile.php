<?php

    include 'connect.php';
    
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member's Profile</title>
    <link href="Style/memberProfile.css" rel="stylesheet">
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

        <div class="main">
            <div class="profileCard">
                <img src="Images/Member.png" alt="Member's Profile Picture" class="profileCardPic">
                <div class="intro">
                    <p style="font-weight: 700; font-size: 20px;">Kaveesha Gunawardana</p>
                    <p style="font-weight: 400; font-size: 15px;">Member</p>
                </div>
                <div class="details">
                    <p style="font-weight: 500; font-size: 17px;">Status - Active</p>
                    <p style="font-weight: 500; font-size: 17px;">Joined Date - 02/12/2022</p>
                    <p style="font-weight: 500; font-size: 17px;">Member ID - 14</p>
                </div>
            </div>
            <div class="content">
                <div class="dateBar">
                    <div class="selector"></div>
                    <div class="dateRow">
                        <a href="memberProfile.html" style="color: rgba(0, 104, 55, 1);">Profile</a>
                        <a href="medicalForm.php">Medical Form</a>
                    </div>
                </div>
                <div class="formArea">
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
                                <td colspan="2">
                                    <label for="paymentPlan">Payment Plan</label><br>
                                    <select name="gender" id="gender" style="width: 86%;">
                                        <option value="One Month">Month Package</option>
                                        <option value="Three Month">Three Month Package</option>
                                        <option value="Six Month">Six Month Package</option>
                                        <option value="Twelve Month">Twelve Month Package</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="height">Height (in Inches)</label><br>
                                    <input type="number" id="height" name="height" class="textBox" step="0.01">
                                </td>
                                <td>
                                    <label for="weight">Weight (in Kilograms)</label><br>
                                    <input type="number" id="weight" name="weight" class="textBox" step="0.001">
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
                        </table>
                    </form>
                    <button type="button" onclick="window.location.href='../Edit Profile/editProfile.php';"
                        class="backBtn">Back</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>