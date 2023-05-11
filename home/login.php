<?php
date_default_timezone_set('Asia/Colombo');
include '../connect.php';
$form_action = "login.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $pw = $_POST['password'];
    $_SESSION["logged_in"] = false;

    $sql = "SELECT * from user where email = '$username'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    //fetching hashed password from db
    $hashed_pw = $row['pw'];

    //verifying if both pw are same
    $verify = password_verify($pw, $hashed_pw);

    //checking if username exists in db
    $count = mysqli_num_rows($result);

    //login successful
    if ($verify == true && $count == 1) {
        if($row['statuses'] == 1){
            session_start();
        
            $_SESSION["logged_in"] = true;
            
            $_SESSION['username'] = $username;
            $_SESSION['firstName'] = $row['fName'];
            $_SESSION['lastName'] = $row['lName'];
            $_SESSION['userID'] = $row['userID'];
            $_SESSION['role'] = $row['roles'];
            
    
            //redirecting to dashboard - admin = 0, member = 1, trainer = 2, dietician = 3
            if($_SESSION['role'] == 0){
                header("location: ..\admin\dashboard.php");
            }else if($_SESSION['role'] == 1){ 

                $userID = $_SESSION['userID'];
                $sql1 = "SELECT verify_status FROM verify_email WHERE userID = $userID"; //for verifying email of member
                $result1 = mysqli_query($conn, $sql1);

                if ($result1 && $row1 = mysqli_fetch_array($result1)) {
                    if ($row1['verify_status'] == 1) {
                        header("location: ..\member\dashboard.php");
                    } else {
                        
                        // Generate a random number
                        $token_num = rand(100000, 999999);
                        // Convert the number to a string of length 6
                        $token = str_pad($token_num, 6, "0", STR_PAD_LEFT);
                        $sql2 = "UPDATE verify_email SET token = '$token', timestamp = NOW() WHERE userID = '$userID'";
                        $result2 = mysqli_query($conn, $sql2);

                        if ($result2) {
                            $username = $_SESSION['username'];
                            $otp = $token;
                            $fname = $_SESSION['firstName'];
                            // send email verification OTP
                            require 'email_verification.php';
                            header("location: ../member/verify_email.php");
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
                        }
                    }
                }

            }else if($_SESSION['role'] == 2){
                header("location: http://localhost/hulkzone/trainer/dashboard.php");
            }else if($_SESSION['role'] == 3){
                header("location: ..\dietician\home.php");
            }  

        //for member - account is disabled. 
        }else if($row['statuses'] == 0 && $row['roles'] == 1){
            
            $sql2 = "select memberID from member where userID = " . $row['userID'];
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_array($result2);

            $memberID = $row2['memberID'];

            $sql3 = "select * from paymentplan where memberID = $memberID ORDER BY expiryDate DESC LIMIT 1"; //get the lastest expiry date
            $result3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_array($result3);

            $expiryDate = 0;
            if($result3 && mysqli_num_rows($result3)){
                $expiryDate = strtotime(date($row3['expiryDate']));
            }

           //echo "<script>alert('expiry: " . date('Y-m-d', $expiryDate) . "')</script>";

           $currentDate = strtotime(DATE("Y-m-d"));

           //when the membership has expired
           if($expiryDate != 0 && $currentDate > $expiryDate){ //expiry date has passed
                session_start();
                
                $_SESSION["logged_in"] = true;
                
                $_SESSION['username'] = $username;
                $_SESSION['firstName'] = $row['fName'];
                $_SESSION['lastName'] = $row['lName'];
                $_SESSION['userID'] = $row['userID'];
                $_SESSION['role'] = $row['roles'];
                        
                // Get the user's plan type from the member table
                $sql1 = "SELECT planType, memberID FROM member WHERE userID = {$row['userID']}";
                $result1 = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_array($result1);
                $memberID = $row1['memberID'];
                $paymentAmount = 0;
                // Determine the payment amount based on the plan type
                if ($row1['planType'] == "oneMonth") {
                    $paymentAmount = 1000;
                } elseif ($row1['planType'] == "threeMonth") {
                    $paymentAmount = 2900;
                } elseif ($row1['planType'] == "sixMonth") {
                    $paymentAmount = 5600;
                } elseif ($row1['planType'] == "twelveMonth") {
                    $paymentAmount = 11000;
                }
                
                // header("Location: ../member/stripe/checkout.php?type=0&amount=" . urlencode($paymentAmount));
            
                echo "<script>alert('Your Account has been Disabled. Since your Membership has Expired.'); 
                window.location.href='../member/stripe/checkout.php?type=0&amount=" . urlencode($paymentAmount) . "';</script>";
            }else{
                //disabled for some other reason by admin
                echo "<script>alert('Your Account has been Disabled. Please Contact Hulkzone for Further Assistance')</script>";
            }
            

        }else{
            echo "<script>alert('Your Account has been Disabled.')</script>";
        }
        
    } else {
        header("location:login.php?msg=failed");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | HulkZone</title>
    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" type="text/css" href="../style/login.css">
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
            <div class="nav-text"><a href="service.html">Services</a></div>
            <div class="nav-text"><a href="team.php">Team</a></div>
            <div class="nav-text"><a href="aboutUs.html">About Us</a></div>
            <div class="nav-text"><a href="contactus.html">Contact Us</a></div>
        </div>

        <div class="right">
            <div><a href="login.php"><input type="button" value="LOGIN" style="background-color: black;;"></a></div>
            <div><a href="register.php"><input type="button" value="REGISTER"></a></div>
        </div>
    </div>

    <!--content-->
    <!--code the content here-->
    <div class="content">

        <div class="loginbox">
        
        <img src="../asset/images/gymLogo.png" alt="GymLogo" class="GymLogo">
        <h1>Login</h1>
        <form action="<?php echo $form_action; ?>" method="post" onsubmit="return validation()" id="loginForm">

            <?php
                if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                    echo ("<div class='msg'>Incorrect Username or password </div>");
                }  
            ?>

            <p>Username</p>
            <input type="text" name="username" id="username" placeholder="Enter Username">

            <p>Password</p>
            <input type="password" name="password" id="pass" placeholder="Enter Password">

            <input type="submit" name="" value="Login"><br>
            <a href="#">Forgot your password?</a><br>

        </form>
        </div>
    </div>

    </div>




    <!--Footer-->
    <div class=footer> © 2022 HulkZone. All rights reserved. </div>

    <!--js code to check if user input are empty-->
    <script>
    function validation() {
        var username = document.forms["loginForm"]["username"].value;
        var pw = document.forms["loginForm"]["pass"].value;
        if (username == "" && pw == "") {
            alert("Username and password must be filled out");
            return false;
        } else {
            if (username == "") {
                alert("Username must be filled out");
                return false;
            }


            if (pw == "") {
                alert("Password must be filled out");
                return false;
            }
        }
    }
    </script>
</body>

</html>