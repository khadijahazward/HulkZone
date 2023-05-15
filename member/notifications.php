<!DOCTYPE html>
<head>
    <style>
        .bell-icon {
            position: relative;
            padding: 0;
            margin: 0;
            background-color: transparent;
            border: none;
            box-shadow: none;
        }
        .notification-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            font-size: 12px;
            width: 15px;
            height: 15px;
            text-align: center;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <?php
        $userID = $_SESSION['userID'];

        //for displaying number of notifications
        $sql14 = "SELECT COUNT(*) AS unread_count FROM usernotifications WHERE userID = $userID AND status = 0";
        $result14 = mysqli_query($conn, $sql14);
        if ($result14) {
            $row14 = mysqli_fetch_assoc($result14);
            $unread_count = $row14['unread_count'];
        } else {
            $unread_count = 0;
        }
    ?>
    <button class="bell-icon" onclick="toggleNotificationPopup()">
        <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
        <?php
            if($unread_count > 0){
                echo "<span class='notification-count'>" . $unread_count . "</span>";
            }
        ?>
    </button>
    <div class="notification-popup" id="notificationPopup">
        <?php 
           
            $sql13 = "SELECT n.message, n.created_at, un.usernotificationsID FROM notifications n JOIN usernotifications un ON n.notificationsID=un.notificationsID WHERE un.userID = $userID AND un.status = 0";
            $result13= mysqli_query($conn, $sql13);
            $notifications = '';

            if (mysqli_num_rows($result13) > 0) {
                while ($row13 = mysqli_fetch_assoc($result13)) {
                    echo '<div class="noti">
                            <div class="noti-message">' . $row13['message'] . '</div>
                            <div class="noti-date">' . $row13['created_at'] . '</div>
                            <a href="mark-read.php?id=' . $row13['usernotificationsID'] . '" class="mark-read">Mark as read</a>
                        </div>
                        
                        <hr style="margin-top:30px;">';
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