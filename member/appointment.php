<?php 
include 'authorization.php';
include '../connect.php';
?>

<?php
    include("setProfilePic.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/appointment.css">
    <link rel="icon" type="image/png" href="../asset/images/gymLogo.png"/>
</head>
<body>
    <div class="container">
        <div class = "nav-bar">
            <?php
                include("navBar.php");
            ?>
        </div>
        <div class="body">
            <div class = "header">
                <div class="left"> 
                    APPOINTMENTS
                </div>
                <div class="right">
                    <div class="notification-bell">
                        <?php include("notifications.php"); ?>
                    </div>
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="topic">
                        <p style="margin-top:0;">Schedule Appointment To Use Gym</p>
                        <button onclick="window.location.href='../member/gymUse.php'">Book Now</button>
                    </div>
                    <img src="../member/images/appointment1.png" width= "99%" height="96%" style="margin-top:5px; border-radius:10px;">
                </div>
                <div class="row">
                    <div class="topic">
                        <p style="margin-top:0;">Schedule Appointment With Your Dietician</p>
                        <button onclick="window.location.href='../member/dietUse.php'">Book Now</button>
                    </div>
                    <img src="../member/images/appointment2.png" width= "99%" height="96%" style="margin-top:5px; border-radius:10px;">
                </div>
            </div>
        </div>

    </div>
</body>

</html>