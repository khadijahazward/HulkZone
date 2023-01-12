<?php
include '../config/config.php';


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user_table WHERE email='$email' AND password='$password'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);
    if ($count == 1) {
        
        $_SESSION['loggedInUser'] = $email;
        header('location: http://localhost/hulkzone/members.php');
    } else {
        header('location: http://localhost/hulkzone/');
    }
}
