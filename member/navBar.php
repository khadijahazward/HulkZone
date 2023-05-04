<?php

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$sqlmessage1 = "SELECT * FROM member JOIN servicecharge ON member.memberID = servicecharge.memberID WHERE member.userID = $userID AND servicecharge.serviceID = 3 AND servicecharge.endDate >= NOW()";
$resultmessage1 = mysqli_query($conn, $sqlmessage1);

if(mysqli_num_rows($resultmessage1) == 0){
    $unreadMsg = 0;
}else{
    $rowmessage1 = mysqli_fetch_assoc($resultmessage1);
    $memberID = $rowmessage1['memberID'];
    $dieticianID = $rowmessage1['employeeID'];

    $sqlmessage2 = "SELECT * FROM employee WHERE employeeID = $dieticianID";
    $resultmessage2 = mysqli_query($conn, $sqlmessage2);

    if($resultmessage2){
        $rowmessage2 = mysqli_fetch_assoc($resultmessage2);
        $dieticianUserID = $rowmessage2['userID'];
    }

    $sqlmessage3 = "SELECT COUNT(*) AS count FROM chat WHERE senderID = $dieticianUserID AND receiverID = $userID AND status = 1";
    $resultmessage3 = mysqli_query($conn, $sqlmessage3);
    $rowmessage3 = mysqli_fetch_assoc($resultmessage3);
    $unreadMsg = $rowmessage3['count'];

    if($unreadMsg != 0){
        $unreadMsg = $rowmessage3['count'];
    }else{
        $unreadMsg = 0;
    }
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
            <div class="nav-font">Dashboard</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../member/profile.php">
            <div class="nav-font">My Profile</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../member/services.php">
            <div class="nav-font">Services</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../member/team.php">
            <div class="nav-font">Team</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../member/workout.php">
            <div class="nav-font">Work Out Plan</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../member/dietplan.php">
            <div class="nav-font">Diet Plan</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../member/chat.php">
            <div class="nav-font">Chat</div>
        </a>
        <div class='unreadMsg'>
            <p>
                <?php echo $unreadMsg ?>
            </p>
        </div>
    </div>

    <hr>

    <div class="line">
        <a href="../member/payment.php">
            <div class="nav-font">Payments</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../member/appointment.php">
            <div class="nav-font">Appointments</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../member/complaint.php">
            <div class="nav-font">Complaints</div>
        </a>
    </div>

    <hr>

    <div class="line">
        <a href="../home/logout.php">
            <div class="nav-font">Log Out</div>
        </a>
    </div>

    <hr>

</body>

</html>