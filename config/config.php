<?php
    session_start();                            

    define('LOCALHOST','localhost');            
    define('DB_USERNAME', 'root');
    define('DB_PWD', '');
    define('DB_NAME','hulkzone');


    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PWD) or die(mysqli_error($conn)); 
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); 

?>