<?php
$conn = mysqli_connect("localhost", "root", "", "hulkzone");
// Check connection
if(!$conn){
    die(mysqli_error($conn));
}
?>