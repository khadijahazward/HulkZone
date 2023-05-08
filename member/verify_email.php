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
            <div class="nav-text"><a href="../home/service.html">Services</a></div>
            <div class="nav-text"><a href="../home/team.html">Team</a></div>
            <div class="nav-text"><a href="../home/aboutUs.html">About Us</a></div>
            <div class="nav-text"><a href="../home/contactus.html">Contact Us</a></div>
        </div>

        <div class="right">
            <div><a href="../home/login.php"><input type="button" value="LOGIN" style="background-color: black;;"></a></div>
            <div><a href="../home/register.php"><input type="button" value="REGISTER"></a></div>
        </div>
    </div>

    <!--content-->
    <div class="content">
        <div class="row"><p>Please enter the OTP that has been sent to your <br>email address to verify your account.</p></div>
        <div class="row">
            <form action="" method = "post"  target="_self">
                <input type = "text" name ="otp" placeholder="Enter OTP" required style="margin-bottom:0;">
                <div style="display: inline-block; width: 100%; text-align:right; margin-bottom: 4%;">
                    <a href="send_OTP.php">Resend OTP</a>
                 </div>
                <button>Submit</button>
            </form>
            <?php
            if(isset($_POST['otp'])) {
                $otp_entered = $_POST['otp'];
                $sql = "SELECT token, timestamp FROM verify_email WHERE userID = $_SESSION[userID]";
                $result = mysqli_query($conn, $sql);
                if($result && mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    $token = $row['token'];

                    if ($otp_entered == $token) { // check if OTP entered by user matches the token in the database

                        $timestamp_time = strtotime($row['timestamp']); // convert timestamp string to UNIX timestamp
                        $current_time = time(); // get current UNIX timestamp
                        $time_diff = $current_time - $timestamp_time; // calculate time difference in seconds
                    
                        if ($time_diff <= 600) { // check if time difference is less than or equal to 600 seconds
                            // OTP and time are valid, update verification status in the database
                            $sql2 = "UPDATE verify_email SET verify_status = 1 WHERE userID = $_SESSION[userID]";
                            $result2 = mysqli_query($conn, $sql2);
                    
                            if ($result2) {
                                // show success message and redirect to dashboard
                                echo "<script>alert('Verification Successful!');</script>";
                                echo "<script>window.location.href = 'dashboard.php';</script>";
                            } else {
                                // show error message if database update failed
                                echo "<script>alert('Verification Failed. Please Try Again Later');</script>";
                            }
                        } else {
                            // time difference is more than 600 seconds, show "OTP expired" message to user
                            echo "<script>alert('OTP Expired. Please Try Again');</script>";
                        }
                    
                    } else {
                        // OTP did not match, show error message to user
                        echo "<script>alert('Wrong OTP. Please Try Again');</script>";
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

