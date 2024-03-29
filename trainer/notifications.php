<?php


include '../connect.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$sqlQuery1 = "SELECT * FROM notifications JOIN usernotifications ON notifications.notificationsID = usernotifications.notificationsID WHERE usernotifications.userID = $userID AND usernotifications.status = 0 AND (notifications.type = 3 OR notifications.type = 4 OR notifications.type = 0)";
$sqlQueryresult1 = mysqli_query($conn, $sqlQuery1);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/notifications.css" rel="styleSheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <?php
    if (mysqli_num_rows($sqlQueryresult1) > 0) {
        echo "
        <button onclick=\"document.getElementById('noti').style.display='block'\" class='notificationBtn'>
        <span class='material-symbols-outlined'>
                    notifications
        </span>
        <!--<img src='../asset/images/bell.png'>-->
        </button>
        
        ";
    } else {

        echo "
        <button onclick=\"document.getElementById('noti').style.display='block'\" class='notificationBtn'>
        <span class='material-symbols-outlined'>
                    notifications
                </span>
        <!--<img src='../asset/images/bell.png'>-->
        </button>
        ";
    }

    ?>

    <div id="noti" class="notiContent">
        <div class="notiContainer">
            <div class="notifiContent">
                <hr>
                <?php
                if (mysqli_num_rows($sqlQueryresult1) > 0) {
                    while ($sqlQueryresultrow1 = mysqli_fetch_assoc($sqlQueryresult1)) {

                        $dateTime = $sqlQueryresultrow1['created_at'];
                        $dateOnly = date('Y-m-d', strtotime($dateTime));

                        if ($dateOnly === date('Y-m-d')) {
                            $timeOnly = date('h:i A', strtotime($dateTime));
                            $displayDateTime = $timeOnly;
                        } else {
                            $displayDateTime = $dateOnly;
                        }

                        echo "
                            <table>
                                <tr>
                                    <td class='message'>
                                        <p>
                                            " . $sqlQueryresultrow1['message'] . "
                                        </p>
                                    </td>
                                    <td class='time'>
                                    <p>
                                        " . $displayDateTime . "
                                    </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='1' class='read'>
                                        <a href='markAsRead.php?usernotID=" . $sqlQueryresultrow1['usernotificationsID'] . "'>Mark as read</a>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            ";
                    }
                } else {
                    echo "
                        <table>
                            <tr>
                                <td colspan='1' class='noMessage'>
                                    <p>No Notifications</p>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        ";
                }
                ?>
            </div>
        </div>
    </div>

    <script>
    var notiContent = document.getElementById('noti');

    window.onclick = function(event) {
        if (event.target == notiContent) {
            notiContent.style.display = "none";
        }
    }
    </script>
</body>

</html>