<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "hulkzone";

$conn = mysqli_connect ($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn) {
    die("Error". mysqli_connect_error()); 
}