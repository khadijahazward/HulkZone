<?php 
date_default_timezone_set('Asia/Colombo');
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
    <title>Verify | HulkZone</title>
    <link rel="stylesheet" href="../style/general.css">
    <link rel="stylesheet" href="../style/verify_email.css">
</head>
<body>
    <!--navigation bar-->
    <div class="nav-bar">
        <div class="left">
            <img src="../asset/images/gymLogo.png" class="logo-photo" alt="logo">
        </div>

        <div class="middle">
            <div class="nav-text"><a href="../index.html">Home</a></div>
            <div class="nav-text"><a href="service.html">Services</a></div>
            <div class="nav-text"><a href="team.html">Team</a></div>
            <div class="nav-text"><a href="aboutUs.html">About Us</a></div>
            <div class="nav-text"><a href="contactus.html">Contact Us</a></div>
        </div>

        <div class="right">
            <div><a href="login.php"><input type="button" value="LOGIN" style="background-color: black;;"></a></div>
            <div><a href="register.php"><input type="button" value="REGISTER"></a></div>
        </div>
    </div>

    <!--content-->
    <div class="content">
        <div class="row"><p>Please enter the OTP that has been sent to your email address to verify your account.</p></div>
        <div class="row">
            <form action="" method = "post"  target="_self">
                <input type = "text" name ="otp" placeholder="Enter OTP" required>
                <button>Submit</button>
            </form>
            <?php
            if(isset($_POST['otp'])) {
                $otp_entered = $_POST['otp'];
                $sql = "SELECT token FROM verify_email WHERE userID = $_SESSION[userID]";
                $result = mysqli_query($conn, $sql);
                if($result && mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    $token = $row['token'];
                    if($otp_entered == $token){
    
                        $sql2 = "update verify_email set verify_status = 1 where userID = $_SESSION[userID]";
                        $result2 = mysqli_query($conn, $sql2);

                        if($result2){
                            echo "<script>alert('verification Successful!');</script>";
                            echo "<script>window.location.href = 'dashboard.php';</script>";
                        }else{
                            echo "<script>alert('Verification failed. Please try again later');</script>";
                        }

                        
                    } else {
                        // OTP did not match, show error message to user
                        echo "<script>alert('OTP did not match. Please Try Again');</script>";
                    }
                } else {
                    // Error getting token from database, show error message to user
                    echo "<script>alert('Verification failed. Error getting token from database.');</script>";
                }
            }
            ?>
        </div>
    </div>

    <!--Footer-->
    <div class = footer>  © 2022 HulkZone. All rights reserved. </div>

</body>

</html>

