<?php

include 'connect.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$query1 = "SELECT * FROM notifications JOIN userNotifications ON notifications.notificationsID = userNotifications.notificationsID WHERE usernotifications.userID = $userID AND usernotifications.status = 0";
$result1 = mysqli_query($conn, $query1);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Style/notifications.css" rel="StyleSheet">
</head>

<body>

    <button onclick="document.getElementById('popUp').style.display='block'" class="notificationBtn">
        <i class='far fa-bell'></i>
    </button>

    <div id="popUp" class="popUpContent">
        <div class="popUpContainer">
            <div class="content">
                <hr>
                <?php
                    if(mysqli_num_rows($result1) > 0){
                        while($row1 = mysqli_fetch_assoc($result1)){
                            
                            $dateTime = $row1['created_at'];
                            $dateOnly = date('Y-m-d', strtotime($dateTime));
                    
                            if($dateOnly === date('Y-m-d')){
                                $timeOnly = date('h:i A', strtotime($dateTime));
                                $displayDateTime = $timeOnly;
                            }else{
                                $displayDateTime = $dateOnly;
                            }
                            
                            echo "
                            <table>
                                <tr>
                                    <td class='message'>
                                        <p>
                                            ".$row1['message']."
                                        </p>
                                    </td>
                                    <td class='time'>
                                    <p>
                                        ".$displayDateTime."
                                    </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='1' class='read'>
                                        <a href='markAsRead.php?usernotID = ".$row1['usernotificationsID']."'>Mark as read</a>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            ";
                        }
                    }
                ?>
                <!-- <table>
                    <tr>
                        <td class="message">
                            <p>
                                hgjhg
                            </p>
                        </td>
                        <td class="time">
                            <p>
                                gghvhvh
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1" class="read">
                            <a href="">Mark as read</a>
                        </td>
                    </tr>
                </table>
                <hr> -->
            </div>
        </div>
    </div>

    <script>
    var popUpContent = document.getElementById('popUp');

    window.onclick = function(event) {
        if (event.target == popUpContent) {
            popUpContent.style.display = "none";
        }
    }
    </script>
</body>

</html>