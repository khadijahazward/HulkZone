<?php
include '../connect.php';

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
            
    
            //redirecting to dashboard
            if($_SESSION['role'] == 0){
                header("location: ..\admin\dashboard.php");
            }else if($_SESSION['role'] == 1){
                header("location: ..\member\dashboard.php");
            }else if($_SESSION['role'] == 2){
                header("location: ..\\trainer\dashboard.php");
            }else if($_SESSION['role'] == 3){
                header("location: ..\dietician\home.php");
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
    <!--code the content here-->
    <div class="content">

        <div class="loginbox">
            <img src="../asset/images/gymLogo.png" alt="GymLogo" class="GymLogo">
            <h1>Login</h1>
            <form action="login.php" method="post" onsubmit="return validation()" id="loginForm">

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