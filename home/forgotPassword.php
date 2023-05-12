<?php 
date_default_timezone_set('Asia/Colombo');
include '../connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | HulkZone</title>
    <link rel="stylesheet" href="../style/general.css">
    <link rel="stylesheet" href="../style/verify_email.css">
    <link rel="icon" type="image/png" href="../asset/images/gymLogo.png"/>
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
            <div class="nav-text"><a href="../home/team.php">Team</a></div>
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
         <div class="row"><p style="margin-bottom:0;">To authenticate your status as a user of the <br> HulkZone system, kindly provide your email address.</p></div>
        <div class="row">
            <form action="" method = "post"  target="_self">
                <input type = "email" name ="email" placeholder="Enter Email Address" required >
                <button>Submit</button>
            </form>
            <?php
            if(isset($_POST['email'])) {
                $email = trim($_POST['email']);
                // echo "<script>alert('$email')</script>";

                $sql = "select * from user where email = '$email'";
                $result = mysqli_query($conn, $sql);

                //email typed exists in the db
                if($result && mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
        
                    //starting the session
                    session_start();
        
                    $_SESSION["logged_in"] = true;
                    
                    $_SESSION['username'] = $email;
                    $_SESSION['firstName'] = $row['fName'];
                    $_SESSION['lastName'] = $row['lName'];
                    $_SESSION['userID'] = $row['userID'];
                    $_SESSION['role'] = $row['roles'];

                    $sql2 = "select * from verify_email where userID = " . $_SESSION['userID'];
                    $result2 = mysqli_query($conn, $sql2);

                    //if there is a row already in the db 
                    if($result2 && mysqli_num_rows($result2) == 1){
                        //we fetch the row and update the new otp and time
                        $row2 = mysqli_fetch_assoc($result2);
                    }else{
                        //we create a new row and then fetch the row
                        $sql3 = "insert into verify_email (userID, verify_status, token) values(". $_SESSION['userID']. ", 1, 0)";
                        $result3 = mysqli_query($conn, $sql3); //true

                        //mysqli_num_rows() is used for SELECT queries, whereas mysqli_affected_rows() is used for INSERT, UPDATE, and DELETE queries to check the number of affected rows  
                        if($result3 && mysqli_affected_rows($conn) == 1){ 
                            $sql2 = "select * from verify_email where userID = " . $_SESSION['userID'];
                            $result2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                        }else {
                            echo "<script>alert('Database Issue. Please Try Again.');</script>";
                            echo "<script>window.location.href = 'forgotPassword.php';</script>";
                        }
                    }

                    $userID = $row2['userID'];

                    // Generate a random number
                    $token_num = rand(100000, 999999);

                    // Convert the number to a string of length 6
                    $token = str_pad($token_num, 6, "0", STR_PAD_LEFT);

                    //updating with new otp
                    $sql4 = "UPDATE verify_email SET token = '$token', timestamp = NOW() WHERE userID = '$userID'";
                    $result4 = mysqli_query($conn, $sql4);

                    if ($result4) {
                        $username = $_SESSION['username'];
                        $otp = $token;
                        $fname = $_SESSION['firstName'];
                        
                        // send email verification OTP
                        require 'pw_verification.php';
                        header("location: verify_pw.php");
                    } else {
                        echo '<script>';
                        echo 'window.alert("An error occurred while generating OTP. Please try again.");';
                        echo '</script>';

                        session_destroy();
                        unset($_SESSION['username']);
                        unset($_SESSION['firstName']);
                        unset($_SESSION['userID']);
                        unset($_SESSION['lastName']);
                        unset($_SESSION['role']);
                        unset($_SESSION["logged_in"]);

                        echo '<script>window.location.href = "login.php"</script>';
                    }
                }else{
                    echo "<script>alert('The email address provided is not registered in our system. Please Try Again.');</script>";
                }
            }
            ?>
        </div>
    </div>

    <!--Footer-->
    <div class = footer>  © 2022 HulkZone. All rights reserved. </div>

</body>

</html>