<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$query = "SELECT * FROM user WHERE userID = $userID";
$result = mysqli_query($conn, $query);
if($result){
    $row = mysqli_fetch_assoc($result);
}else{
    echo '<script> window.alert("Error receiving employee details!");</script>';
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if(!empty($oldPassword) || !empty($newPassword) || !empty($confirmPassword)){

        $databasePW = $row['pw'];
        
        if(password_verify($oldPassword, $databasePW)){
            
            if(preg_match('@[0-9]@', $newPassword) && preg_match('@[^\w]@', $newPassword) && strlen($newPassword) >= 8 && preg_match('@[A-Za-z]@', $newPassword)){
                
                if($newPassword == $confirmPassword){
                    $hashedPW = password_hash($newPassword, PASSWORD_DEFAULT);
                    
                    $sql = "UPDATE user set pw = '$hashedPW' WHERE userID = '$userID'";
                    $sqlResult = mysqli_query($conn, $sql);

                    if($sqlResult){
                        echo '<script> window.alert("You has been changed your password successfully!");</script>';
                    }else{
                        echo '<script> window.alert("Error!");</script>';
                    }
                }
                
            }else{
                echo '<script> window.alert("Password must contain at least one number, one special character, one letter and should be at least 8 characters long!");</script>';
            }
            
        }else{
            echo '<script> window.alert("Incorrect old password!");</script>';
        }
        
    }else{
        echo '<script> window.alert("Fill required fields!");</script>';
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="Style/changePassword.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class="container">
        <div class="topBar">
            <div class="gymLogo"><img src="Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <div class="notification">
                    <?php
                        include 'notifications.php'; 
                    ?>
                </div>
                <img src="<?php echo $profilePic ?>" alt="my profile" class="myProfile">
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
                <a href="schedule.php"><i class=" fa fa-clock-o"></i>Schedule</a>
                <hr>
                <a href="dietPlan.php"><i class="fa fa-heartbeat"></i>Diet Plans</a>
                <hr>
                <a href="chatBox.php"><i class="fa fa-comments"></i>Chat Box</a>
                <hr>
                <a href="changePassword.php" class="active"><i class="fa fa-user"></i>My Profile</a>
                <hr>
                <a href="complaint.php"><i class="fa fa-cog"></i>Complaints</a>
                <hr>
                <a href="../home/logout.php"><i class="fa fa-sign-out"></i>Log out</a>
                <hr>
            </div>
        </div>
        <div class="content">
            <div class="dateBar">
                <div class="selector"></div>
                <div class="dateRow">
                    <a href="profile.php">Profile</a>
                    <a href="changePassword.php" style="color: rgba(0, 104, 55, 1);">Change Password</a>
                </div>
            </div>
            <div class="topic">
                <p>Change Password</p>
            </div>
            <form method="POST">
                <table border="0px">
                    <tr>
                        <td><label for="oldPassword">Enter Old Password</label></td>
                        <td><input type="password" id="oldPassword" name="oldPassword"
                                placeholder="At least 8 characters" class="textBox"></td>
                    </tr>
                    <tr>
                        <td><label for="newPassword">Enter New Password</label></td>
                        <td><input type="password" id="newPassword" name="newPassword"
                                placeholder="At least 8 characters" class="textBox"></td>
                    </tr>
                    <tr>
                        <td><label for="confirmPassword">Confirm Password</label></td>
                        <td><input type="password" name="confirmPassword" id="confirmPassword" placeholder="********"
                                class="textBox">
                        </td>
                    </tr>
                </table>
                <button name="save" class="saveButton">Save</button>
            </form>
        </div>
    </div>

</body>

</html>