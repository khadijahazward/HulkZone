<!DOCTYPE html>
<head></head>
<body>
    <button class="bell-icon" onclick="toggleNotificationPopup()">
        <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
    </button>
    <div class="notification-popup" id="notificationPopup">
        <?php 
            $userID = $_SESSION['userID'];
            $sql13 = "SELECT n.message, n.created_at, un.usernotificationsID FROM notifications n JOIN usernotifications un ON n.notificationsID=un.notificationsID WHERE un.userID = $userID AND un.status = 0";
            $result13= mysqli_query($conn, $sql13);
            $notifications = '';

            if (mysqli_num_rows($result13) > 0) {
                while ($row13 = mysqli_fetch_assoc($result13)) {
                    echo '<div class="noti">
                            <div class="noti-message">' . $row13['message'] . '</div>
                            <div class="noti-date">' . $row13['created_at'] . '</div>
                            <a href="mark-read.php?id=' . $row13['usernotificationsID'] . '" class="mark-read">Mark as read</a>
                        </div>';
                }
            } else {
                echo '<div class="noti">No Notifications</div>';
            }

        ?>
    </div>
    <script>
        function toggleNotificationPopup() {
            var notificationPopup = document.getElementById("notificationPopup");
            //if button is clicked then it displays notification and then when clicked again, the show class will be removed. 
            notificationPopup.classList.toggle("show");
        }
    </script>
</body>
</html>