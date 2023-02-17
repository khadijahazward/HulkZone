<?php 
include 'authorization.php';
include '../connect.php';
?>

<?php
$query = "SELECT * from user where userID = " . $_SESSION['userID'];
    $result = mysqli_query($conn, $query);
    $query1 = "SELECT * from member where userID = " . $_SESSION['userID'];
    $result1 = mysqli_query($conn, $query1);
    if (mysqli_num_rows($result) == 1 && mysqli_num_rows($result1) == 1) {
        $row = mysqli_fetch_assoc($result);
        $row1 = mysqli_fetch_assoc($result1);
    } else {
        echo '<script> window.alert("Error receiving data!");</script>';
    }

    if(isset($row['profilePhoto']) && $row['profilePhoto'] != NULL){
        //dp link from db
        $profilePictureLink = $row['profilePhoto'];
    }else{
        $profilePictureLink = '../member/profileImages/default.png';
    }
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
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
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