<?php 
date_default_timezone_set('Asia/Colombo');
include '../member/authorization.php';
include '../connect.php';
?>

<?php
    $query = "SELECT * from user where userID = " . $_SESSION['userID'];
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo '<script> window.alert("Error receiving data!");</script>';
    }
?>

<?php
$pw1Err = $pw2Err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['pw']) && isset($_POST['confirm_pw'])) {
        $pw = trim($_POST['pw']);
        $c_pw = trim($_POST['confirm_pw']);

        $numberCheck = preg_match('@[0-9]@', $pw); //atleast one number
        $specialCharsCheck = preg_match('@[^\w]@', $pw); //atleast one special character
        $letterCheck = preg_match('/[a-zA-Z]/', $pw); //atleast a letter
    
        if (empty($pw)) {
            $pw1Err = "Password is required";
        } else if (strlen($pw) < 8) {
            $pw1Err = "Password must be at least 8 characters long.";
        } else if (!$numberCheck) {
            $pw1Err = "Password must contain at least one number.";
        } else if (!$specialCharsCheck) {
            $pw1Err = "Password must contain at least one special character.";
        }else if(!$letterCheck){
            $pw1Err = "Password must contain at least one alphabet.";
        }
    
        if (empty($c_pw)) {
            $pw2Err = "Confirm Password is required";
        }
        
        if($c_pw != $pw){
            echo "<script>alert('Passwords Do Not Match.');</script>";
        }else if(empty($pw1Err) && empty($pw2Err)){
            //correct instance to change pw
            $hashedPw = password_hash($pw, PASSWORD_DEFAULT);
            $sql2 = "update user set pw  = '" . $hashedPw . "' where userID = " . $_SESSION['userID'] ;
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                echo "<script>alert('Password updated successfully.')</script>";
                echo "<script>window.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('Failed to update password. Please try again.')</script>";
            }
            
        }

    }else{
        echo "<script>alert('All fields are necessary to be filled.');</script>";
    }

}
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
        <div class="row"><p>Please enter a new password to reset your account</p></div>
        <div class="row">
            <form action="" method = "POST"  target="_self">
                <label> Password: <span style="color:red;"> * </span></label>
                <span class="error"> <?php echo $pw1Err; ?></span>
                <input type = "password" name ="pw" placeholder="Enter Password" required >

                <label> Confirm Password: <span style="color:red;"> * </span></label>
                <span class="error"><?php echo $pw2Err; ?></span>
                <input type = "password" name ="confirm_pw" placeholder="Enter Confirm Password" required>

                <button>Submit</button>
            </form>
        </div>
    </div>

    <!--Footer-->
    <div class = footer>  © 2022 HulkZone. All rights reserved. </div>

</body>

</html>
