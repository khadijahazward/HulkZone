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
    $userID = $_SESSION['userID'];

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
        require 'pw_verification.php';
        echo "<script>window.location.href = 'verify_pw.php';</script>";
    } else {
        echo '<script>';
        echo 'window.alert("An error occurred while generating OTP. Please try again.");';
        echo '</script>';
        
        echo "<script>window.location.href = 'verify_pw.php';</script>";
    }
?>