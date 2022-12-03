<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "hulkzone";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {

    die("Failed to connect to the database!");
}
