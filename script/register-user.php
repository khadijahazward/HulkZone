<?php
include '../config/config.php';



if(isset($_POST['submit'])) 
{
    $fullname = $_POST['fullname']; 
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);     

    $sql = "INSERT INTO user_table SET
    fullname = '$fullname',
    contact = '$contact',
    password = '$password',
    email= '$email'
";

$res = mysqli_query($conn, $sql) or die(mysqli_error($conn)); //execute query

if($res==TRUE)
    {

        header('location: http://localhost/hulkzone/');
        
    }
else
    {
        
        header('location: http://localhost/hulkzone/registration.php');
       

    } 

}
