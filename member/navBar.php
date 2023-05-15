<html>
    <head>
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">    
    </head>
</html>
<?php

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$sqlmessage1 = "SELECT * FROM member JOIN servicecharge ON member.memberID = servicecharge.memberID WHERE member.userID = $userID AND servicecharge.serviceID = 3 AND servicecharge.endDate >= NOW()";
$resultmessage1 = mysqli_query($conn, $sqlmessage1);

if (mysqli_num_rows($resultmessage1) == 0) {
    $unreadMsg = 0;
} else {
    $rowmessage1 = mysqli_fetch_assoc($resultmessage1);
    $memberID = $rowmessage1['memberID'];
    $dieticianID = $rowmessage1['employeeID'];

    $sqlmessage2 = "SELECT * FROM employee WHERE employeeID = $dieticianID";
    $resultmessage2 = mysqli_query($conn, $sqlmessage2);

    if ($resultmessage2) {
        $rowmessage2 = mysqli_fetch_assoc($resultmessage2);
        $dieticianUserID = $rowmessage2['userID'];
    }

    $sqlmessage3 = "SELECT COUNT(*) AS count FROM chat WHERE senderID = $dieticianUserID AND receiverID = $userID AND status = 1";
    $resultmessage3 = mysqli_query($conn, $sqlmessage3);
    $rowmessage3 = mysqli_fetch_assoc($resultmessage3);
    $unreadMsg = $rowmessage3['count'];
}

?>

<!DOCTYPE html>

<body>

    <div class="line-heading">
        <div class="images"><img src="..\asset\images\gymLogo.png" alt="Gym Logo" class="gymLogo"></div>
        <div class="option">HULK ZONE</div>
    </div>

    <hr>

    <div class="line">
        <a href="../member/dashboard.php">
            <div class="nav-font">
            <i class="fas fa-tachometer-alt" style= "margin-right:10px;"></i>Dashboard</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../member/profile.php">
            <div class="nav-font"><i class="fas fa-user" style= "margin-right:10px;"></i>My Profile</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../member/services.php">
            <div class="nav-font"><i class="fas fa-cogs" style= "margin-right:10px;"></i>Services</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../member/team.php">
            <div class="nav-font">
            <i class="fa fa-users" style = "margin-right:10px;"></i> Team</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../member/workout.php">
            <div class="nav-font"><i class="fas fa-dumbbell" style= "margin-right:10px;"></i>Work Out Plan</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../member/dietplan.php">
            <div class="nav-font"><i class="fas fa-carrot" style= "margin-right:10px;"></i>Diet Plan</div>
        </a>
    </div>

    <hr>
    <?php

    if ($unreadMsg != 0) {
        $unreadMsg = $rowmessage3['count'];

        echo '
        <div class="line">
            <a href="../member/chat.php">
                <div class="nav-font"><i class="fas fa-comments" style= "margin-right:10px;"></i>Chat</div>
            </a>
            <div class="unreadMsg">
                <p>
                     '.$unreadMsg .'
                </p>
            </div>
        </div>

        ';
    } else {

    echo '
    <div class="line">
        <a href="../member/chat.php">
            <div class="nav-font"><i class="fas fa-comments" style= "margin-right:10px;"></i>Chat</div>
        </a>
    </div>


    ';
    }

    ?>

    <hr>

    <div class="line">
        <a href="../member/payment.php">
            <div class="nav-font"><i class="fas fa-credit-card" style= "margin-right:10px;"></i>Payments</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../member/appointment.php">
            <div class="nav-font"><i class="far fa-calendar-alt" style= "margin-right:10px;"></i>Appointments</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../member/complaint.php">
            <div class="nav-font"><i class="fas fa-exclamation-circle" style= "margin-right:10px;"></i>Complaints</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../home/logout.php">
            <div class="nav-font"><i class="fas fa-sign-out-alt" style= "margin-right:10px;"></i>Log Out</div>
        </a>
    </div>

    <hr>

</body>

</html>