<?php

include "../connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $pw = $_POST['password'];

    $sql = "select * from user where email = '$username'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    $uname = $row['userID'];

    //getting employee id from table
    $sql1 = "select * from employee where userID = '$uname' ";

    $result1 = mysqli_query($conn, $sql1);

    $row1 = mysqli_fetch_array($result1);

    //fetching hashed password from db
    $hashed_pw = $row['pw'];

    //verifying if both pw are same
    $verify = password_verify($pw, $hashed_pw);

    //checking if username exists in db
    $count = mysqli_num_rows($result);

    //login successful
    if ($verify == true && $count == 1 && $row['roles'] == 3) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['firstName'] = $row['fName'];
        $_SESSION['userID'] = $uname;
        $_SESSION['role'] = $row['roles'];
        $_SESSION['employeeID'] = $row1['employeeID'];
        header("location: dieticianDashboard.php");
    } else {
        header("location:login.php?msg=failed");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../dietician/style/Login.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="leftSide">
            <div class="login">
                <div class="signIn">
                    <p>Sign In</p>
                </div>
                <div class="content">
                    <form action="../dietician/Login.php" method="post" onsubmit="return validation()" id="loginForm">
                        <table>
                            <tr>
                                <td colspan="2"><label for="userName">User Name</label></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" id="username" name="username"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><br></td>
                            </tr>
                            <tr>
                                <td colspan="2"><label for="password">Password</label></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="password" id="password" name="password"></td>
                            </tr>
                            <tr>

                                <?php
                                    if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                                        echo ("<div class='msg'>Incorrect Username or password </div>");
                                    }  
                                ?>
                            </tr>
                            <tr>
                                <td colspan="2"><br></td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" name="login" id="login">Login</button>
                                </td>
                                <td>
                                    <a href="#"><button>Create New Account</button></a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><br></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="text-align: right; color: rgba(0, 158, 247, 1);">Forget password ?</td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="rightSide">
            <img src="../dietician/image/bg.png" alt="Making Salad" class="backgroundImage">
            <div class="welcome">
                <p>Welcome to HULKZONE</p>
                <hr style="border: 1px solid rgba(255, 255, 255, 1); width: 449px;">
            </div>
            <div class="welcomeParagraph">
                <p>Food is not just calories, it is information. It talks to DNA and tells to
                    it what to do. The most
                    powerful tool to change the health, environment and entire world is the folk.</p>
            </div>
        </div>
    </div>
</body>
</html>
<script>
        function validation(){
            var username = document.forms["loginForm"]["username"].value;
            var pw = document.forms["loginForm"]["pass"].value;
            if(username == "" && pw == "" ){
                alert("Username and password must be filled out");
                return false;
            }else{
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