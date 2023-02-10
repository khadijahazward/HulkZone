<?php

include '../connect.php';

?>



<!DOCTYPE html>
<html>

<head>
    <title>Schedule</title>
    <meta charset="utf-8">
    <meta name="Viewport" content="width=device-width, initial-scale= 1.0">
    <link href="schedule.css" rel="StyleSheet">
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
                <hr>
                <a href="../Home/home.php"><i class="fa fa-home"></i>Home</a>
                <hr>
                <a href="../Members/members.php"><i class="fa fa-group"></i>Members</a>
                <hr>
                <a href="../Appointments/Appointments/appointments.php"><i class="fa fa-calendar"></i>Appointments</a>
                <hr>
                <a href="schedule.php" class="active"><i class="fa fa-clock-o"></i>Schedule</a>
                <hr>
                <a href="../Diet Plan/DietPlan/dietPlan.php"><i class="fa fa-heartbeat"></i>Diet Plans</a>
                <hr>
                <a href="../ChatBox/chatBox.html"><i class="fa fa-comments"></i>Chat Box</a>
                <hr>
                <a href="../Settings/Profile/View Profile/profile.php"><i class="fa fa-cog"></i>Settings</a>
                <hr>
                <a href="../../home/logout.php"><i class="fa fa-sign-out"></i>Log out</a>
                <hr>
            </div>
        </div>
        <div class="main">
            <img src="../Images/add appointment.png">
            <div class="topic">
                <p>Time Slots</p>
            </div>
            <div class="chooseDate">
                <label for="month">Choose month : </label>
                <input type="month" name="month" id="month">
            </div>
            <div class="gridContainer">
                <table class="selected">
                    <thead>
                        <tr>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Saturday</th>
                            <th>Sunday</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="08:00-09:00" />
                                    <span class="checkbox-button-label">08:00 - 09:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="08:00-09:00" />
                                    <span class="checkbox-button-label">08:00 - 09:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="08:00-09:00" />
                                    <span class="checkbox-button-label">08:00 - 09:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="08:00-09:00" />
                                    <span class="checkbox-button-label">08:00 - 09:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="08:00-09:00" />
                                    <span class="checkbox-button-label">08:00 - 09:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="08:00-09:00" />
                                    <span class="checkbox-button-label">08:00 - 09:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="08:00-09:00" />
                                    <span class="checkbox-button-label">08:00 - 09:00</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="09:00-10:00" />
                                    <span class="checkbox-button-label">09:00 - 10:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="09:00-10:00" />
                                    <span class="checkbox-button-label">09:00 - 10:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="09:00-10:00" />
                                    <span class="checkbox-button-label">09:00 - 10:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="09:00-10:00" />
                                    <span class="checkbox-button-label">09:00 - 10:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="09:00-10:00" />
                                    <span class="checkbox-button-label">09:00 - 10:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="09:00-10:00" />
                                    <span class="checkbox-button-label">09:00 - 10:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="09:00-10:00" />
                                    <span class="checkbox-button-label">09:00 - 10:00</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="10:00-11:00" />
                                    <span class="checkbox-button-label">10:00 - 11:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="10:00-11:00" />
                                    <span class="checkbox-button-label">10:00 - 11:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="10:00-11:00" />
                                    <span class="checkbox-button-label">10:00 - 11:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="10:00-11:00" />
                                    <span class="checkbox-button-label">10:00 - 11:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="10:00-11:00" />
                                    <span class="checkbox-button-label">10:00 - 11:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="10:00-11:00" />
                                    <span class="checkbox-button-label">10:00 - 11:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="10:00-11:00" />
                                    <span class="checkbox-button-label">10:00 - 11:00</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="11:00-12:00" />
                                    <span class="checkbox-button-label">11:00 - 12:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="11:00-12:00" />
                                    <span class="checkbox-button-label">11:00 - 12:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="11:00-12:00" />
                                    <span class="checkbox-button-label">11:00 - 12:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="11:00-12:00" />
                                    <span class="checkbox-button-label">11:00 - 12:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="11:00-12:00" />
                                    <span class="checkbox-button-label">11:00 - 12:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="11:00-12:00" />
                                    <span class="checkbox-button-label">11:00 - 12:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="11:00-12:00" />
                                    <span class="checkbox-button-label">11:00 - 12:00</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="12:00-13:00" />
                                    <span class="checkbox-button-label">12:00 - 13:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="12:00-13:00" />
                                    <span class="checkbox-button-label">12:00 - 13:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="12:00-13:00" />
                                    <span class="checkbox-button-label">12:00 - 13:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="12:00-13:00" />
                                    <span class="checkbox-button-label">12:00 - 13:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="12:00-13:00" />
                                    <span class="checkbox-button-label">12:00 - 13:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="12:00-13:00" />
                                    <span class="checkbox-button-label">12:00 - 13:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="12:00-13:00" />
                                    <span class="checkbox-button-label">12:00 - 13:00</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="13:00-14:00" />
                                    <span class="checkbox-button-label">13:00 - 14:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="13:00-14:00" />
                                    <span class="checkbox-button-label">13:00 - 14:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="13:00-14:00" />
                                    <span class="checkbox-button-label">13:00 - 14:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="13:00-14:00" />
                                    <span class="checkbox-button-label">13:00 - 14:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="13:00-14:00" />
                                    <span class="checkbox-button-label">13:00 - 14:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="13:00-14:00" />
                                    <span class="checkbox-button-label">13:00 - 14:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="13:00-14:00" />
                                    <span class="checkbox-button-label">13:00 - 14:00</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="14:00-15:00" />
                                    <span class="checkbox-button-label">14:00 - 15:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="14:00-15:00" />
                                    <span class="checkbox-button-label">14:00 - 15:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="14:00-15:00" />
                                    <span class="checkbox-button-label">14:00 - 15:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="14:00-15:00" />
                                    <span class="checkbox-button-label">14:00 - 15:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="14:00-15:00" />
                                    <span class="checkbox-button-label">14:00 - 15:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="14:00-15:00" />
                                    <span class="checkbox-button-label">14:00 - 15:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="14:00-15:00" />
                                    <span class="checkbox-button-label">14:00 - 15:00</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="15:00-16:00" />
                                    <span class="checkbox-button-label">15:00 - 16:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="15:00-16:00" />
                                    <span class="checkbox-button-label">15:00 - 16:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="15:00-16:00" />
                                    <span class="checkbox-button-label">15:00 - 16:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="15:00-16:00" />
                                    <span class="checkbox-button-label">15:00 - 16:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="15:00-16:00" />
                                    <span class="checkbox-button-label">15:00 - 16:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="15:00-16:00" />
                                    <span class="checkbox-button-label">15:00 - 16:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="15:00-16:00" />
                                    <span class="checkbox-button-label">15:00 - 16:00</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="16:00-017:00" />
                                    <span class="checkbox-button-label">16:00 - 17:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="16:00-017:00" />
                                    <span class="checkbox-button-label">16:00 - 17:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="16:00-017:00" />
                                    <span class="checkbox-button-label">16:00 - 17:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="16:00-017:00" />
                                    <span class="checkbox-button-label">16:00 - 17:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="16:00-017:00" />
                                    <span class="checkbox-button-label">16:00 - 17:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="16:00-017:00" />
                                    <span class="checkbox-button-label">16:00 - 17:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="16:00-017:00" />
                                    <span class="checkbox-button-label">16:00 - 17:00</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="17:00-18:00" />
                                    <span class="checkbox-button-label">17:00 - 18:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="17:00-18:00" />
                                    <span class="checkbox-button-label">17:00 - 18:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="17:00-18:00" />
                                    <span class="checkbox-button-label">17:00 - 18:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="17:00-18:00" />
                                    <span class="checkbox-button-label">17:00 - 18:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="17:00-18:00" />
                                    <span class="checkbox-button-label">17:00 - 18:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="17:00-18:00" />
                                    <span class="checkbox-button-label">17:00 - 18:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="17:00-18:00" />
                                    <span class="checkbox-button-label">17:00 - 18:00</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="18:00-19:00" />
                                    <span class="checkbox-button-label">18:00 - 19:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="18:00-19:00" />
                                    <span class="checkbox-button-label">18:00 - 19:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="18:00-19:00" />
                                    <span class="checkbox-button-label">18:00 - 19:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="18:00-19:00" />
                                    <span class="checkbox-button-label">18:00 - 19:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="18:00-19:00" />
                                    <span class="checkbox-button-label">18:00 - 19:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="18:00-19:00" />
                                    <span class="checkbox-button-label">18:00 - 19:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="18:00-19:00" />
                                    <span class="checkbox-button-label">18:00 - 19:00</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="19:00-20:00" />
                                    <span class="checkbox-button-label">19:00 - 20:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="19:00-20:00" />
                                    <span class="checkbox-button-label">19:00 - 20:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="19:00-20:00" />
                                    <span class="checkbox-button-label">19:00 - 20:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="19:00-20:00" />
                                    <span class="checkbox-button-label">19:00 - 20:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="19:00-20:00" />
                                    <span class="checkbox-button-label">19:00 - 20:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="19:00-20:00" />
                                    <span class="checkbox-button-label">19:00 - 20:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="19:00-20:00" />
                                    <span class="checkbox-button-label">19:00 - 20:00</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="20:00-21:00" />
                                    <span class="checkbox-button-label">20:00 - 21:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="20:00-21:00" />
                                    <span class="checkbox-button-label">20:00 - 21:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="20:00-21:00" />
                                    <span class="checkbox-button-label">20:00 - 21:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="20:00-21:00" />
                                    <span class="checkbox-button-label">20:00 - 21:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="20:00-21:00" />
                                    <span class="checkbox-button-label">20:00 - 21:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="20:00-21:00" />
                                    <span class="checkbox-button-label">20:00 - 21:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="20:00-21:00" />
                                    <span class="checkbox-button-label">20:00 - 21:00</span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="21:00-22:00" />
                                    <span class="checkbox-button-label">21:00 - 22:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="21:00-22:00" />
                                    <span class="checkbox-button-label">21:00 - 22:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="21:00-22:00" />
                                    <span class="checkbox-button-label">21:00 - 22:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="21:00-22:00" />
                                    <span class="checkbox-button-label">21:00 - 22:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="21:00-22:00" />
                                    <span class="checkbox-button-label">21:00 - 22:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="21:00-22:00" />
                                    <span class="checkbox-button-label">21:00 - 22:00</span>
                                </label>
                            </td>
                            <td>
                                <label class="checkbox-button">
                                    <input type="checkbox" name="time-slot[]" value="21:00-22:00" />
                                    <span class="checkbox-button-label">21:00 - 22:00</span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button onclick="document.getElementById('popUp').style.display='block';" class="saveBtn">Save</button>
        </div>
    </div>

    <div id="popUp" class="popUpContent">
        <div class="popUpContainer">
            <span class="close">&times;</span>
            <img src="../Images/Ok.png" alt="Done" style="width: 50px; height: 60px; top: 40px;">
            <p>Your TimeSlots Placed Succesfully!</p>
            <button class="acceptBtn" onclick="window.location.href='../Schedule/schedule.php';">OK</button>
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


    </div>
    </div>
</body>

</html>