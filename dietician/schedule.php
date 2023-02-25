<?php

include '../connect.php';

?>



<!DOCTYPE html>
<html>

<head>
    <title>Schedule</title>
    <meta charset="utf-8">
    <meta name="Viewport" content="width=device-width, initial-scale= 1.0">
    <link href="Style/schedule.css" rel="StyleSheet">
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
                <a href="schedule.php" class="active"><i class="fa fa-clock-o"></i>Schedule</a>
                <hr>
                <a href="Diet Plan/DietPlan/dietPlan.php"><i class="fa fa-heartbeat"></i>Diet Plans</a>
                <hr>
                <a href="chatBox.php"><i class="fa fa-comments"></i>Chat Box</a>
                <hr>
                <a href="profile.php"><i class="fa fa-cog"></i>My Profile</a>
                <hr>
                <a href="complaint.php">Complaints</a>
                <a href="../home/logout.php"><i class="fa fa-sign-out"></i>Log out</a>
                <hr>
            </div>
        </div>
        <div class="main">
            <div class="topic">
                <p>Time Slots</p>
            </div>
            <div class="chooseDate">
                <label for="week">Choose Week : </label>
                <input type="week" name="week" id="week">
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
                                <?php
                                    $start_time = new DateTime('08:00:00');
                                    $end_time = new DateTime('22:00:00');
                                    $interval = new DateInterval('PT1H');

                                    $html = '';

                                    while ($start_time < $end_time) {
                                    $html .= 
                                        '<label class="checkbox-button">
                                        <input type="checkbox" name="time-slot[]" value="21:00-22:00" />
                                        <span class="checkbox-button-label">' . $start_time->format('H:i') . ' - ';
                            
                                        $start_time->add($interval);
                                        $html .= $start_time->format('H:i') . 
                                        '</span>
                                        </label>';
                                    }

                                    echo 
                                    '<table>
                                        <tr>
                                            <td>
                                                '. $html .'
                                            </td>
                                        </tr>
                                    </table>' ;
                                ?>
                            </td>
                            <td>
                                <?php
                        $start_time = new DateTime('08:00:00');
                        $end_time = new DateTime('22:00:00');
                        $interval = new DateInterval('PT1H');

                        $html = '';

                        while ($start_time < $end_time) {
                            $html .= 
                            '<label class="checkbox-button">
                                <input type="checkbox" name="time-slot[]" value="21:00-22:00" />
                                <span class="checkbox-button-label">' . $start_time->format('H:i') . ' - ';
                            
                            $start_time->add($interval);
                            $html .= $start_time->format('H:i') . 
                            '</span>
                            </label>';
                        }

                        echo 
                        '<table>
                            <tr>
                                <td>
                                    '. $html .'
                                </td>
                            </tr>
                        </table>' ;
                    ?>
                            </td>
                            <td>
                                <?php
                        $start_time = new DateTime('08:00:00');
                        $end_time = new DateTime('22:00:00');
                        $interval = new DateInterval('PT1H');

                        $html = '';

                        while ($start_time < $end_time) {
                            $html .= 
                            '<label class="checkbox-button">
                                <input type="checkbox" name="time-slot[]" value="21:00-22:00" />
                                <span class="checkbox-button-label">' . $start_time->format('H:i') . ' - ';
                            
                            $start_time->add($interval);
                            $html .= $start_time->format('H:i') . 
                            '</span>
                            </label>';
                        }

                        echo 
                        '<table>
                            <tr>
                                <td>
                                    '. $html .'
                                </td>
                            </tr>
                        </table>' ;
                    ?>
                            </td>
                            <td>
                                <?php
                        $start_time = new DateTime('08:00:00');
                        $end_time = new DateTime('22:00:00');
                        $interval = new DateInterval('PT1H');

                        $html = '';

                        while ($start_time < $end_time) {
                            $html .= 
                            '<label class="checkbox-button">
                                <input type="checkbox" name="time-slot[]" value="21:00-22:00" />
                                <span class="checkbox-button-label">' . $start_time->format('H:i') . ' - ';
                            
                            $start_time->add($interval);
                            $html .= $start_time->format('H:i') . 
                            '</span>
                            </label>';
                        }

                        echo 
                        '<table>
                            <tr>
                                <td>
                                    '. $html .'
                                </td>
                            </tr>
                        </table>' ;
                    ?>
                            </td>
                            <td>
                                <?php
                        $start_time = new DateTime('08:00:00');
                        $end_time = new DateTime('22:00:00');
                        $interval = new DateInterval('PT1H');

                        $html = '';

                        while ($start_time < $end_time) {
                            $html .= 
                            '<label class="checkbox-button">
                                <input type="checkbox" name="time-slot[]" value="21:00-22:00" />
                                <span class="checkbox-button-label">' . $start_time->format('H:i') . ' - ';
                            
                            $start_time->add($interval);
                            $html .= $start_time->format('H:i') . 
                            '</span>
                            </label>';
                        }

                        echo 
                        '<table>
                            <tr>
                                <td>
                                    '. $html .'
                                </td>
                            </tr>
                        </table>' ;
                    ?>
                            </td>
                            <td>
                                <?php
                        $start_time = new DateTime('08:00:00');
                        $end_time = new DateTime('22:00:00');
                        $interval = new DateInterval('PT1H');

                        $html = '';

                        while ($start_time < $end_time) {
                            $html .= 
                            '<label class="checkbox-button">
                                <input type="checkbox" name="time-slot[]" value="21:00-22:00" />
                                <span class="checkbox-button-label">' . $start_time->format('H:i') . ' - ';
                            
                            $start_time->add($interval);
                            $html .= $start_time->format('H:i') . 
                            '</span>
                            </label>';
                        }

                        echo 
                        '<table>
                            <tr>
                                <td>
                                    '. $html .'
                                </td>
                            </tr>
                        </table>' ;
                    ?>
                            </td>
                            <td>
                                <?php
                        $start_time = new DateTime('08:00:00');
                        $end_time = new DateTime('22:00:00');
                        $interval = new DateInterval('PT1H');

                        $html = '';

                        while ($start_time < $end_time) {
                            $html .= 
                            '<label class="checkbox-button">
                                <input type="checkbox" name="time-slot[]" value="21:00-22:00" />
                                <span class="checkbox-button-label">' . $start_time->format('H:i') . ' - ';
                            
                            $start_time->add($interval);
                            $html .= $start_time->format('H:i') . 
                            '</span>
                            </label>';
                        }

                        echo 
                        '<table>
                            <tr>
                                <td>
                                    '. $html .'
                                </td>
                            </tr>
                        </table>' ;
                    ?>
                            </td>
                        </tr>
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