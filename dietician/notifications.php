<?php

include 'connect.php';

global $userID;

$sqlQuery1 = "SELECT * FROM notifications JOIN usernotifications ON notifications.notificationsID = usernotifications.notificationsID WHERE usernotifications.userID = '$userID' AND usernotifications.status = '0'";
$sqlQueryresult1 = mysqli_query($conn, $sqlQuery1);


if (isset($_GET['action']) && $_GET['action'] == 'markAsRead') {
    $usernotID = mysqli_real_escape_string($conn, $_GET['usernotID']);

    $sqlQuery2 = "UPDATE usernotifications SET status = 1 WHERE usernotificationsID = $usernotID";
    $sqlQueryresult2 = mysqli_query($conn, $sqlQuery2);

    if ($sqlQueryresult2) {
        // Reload the page to reflect the updated notification status
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error updating notification status: " . mysqli_error($conn);
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Style/notifications.css" rel="StyleSheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <?php
    if (mysqli_num_rows($sqlQueryresult1) > 0) {
        echo "
        <button onclick=\"document.getElementById('noti').style.display='block'\" class='notificationBtn'>
        <i class='fas fa-bell'></i>
        </button>
        
        ";
    } else {

        echo "
        <button onclick=\"document.getElementById('noti').style.display='block'\" class='notificationBtn'>
        <i class='far fa-bell'></i>
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
                                        <a href='notifications.php?action=markAsRead&usernotID=" . $sqlQueryresultrow1['usernotificationsID'] . "'>Mark as read</a>
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