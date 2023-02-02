<?php

include 'authorization.php';
include '../connect.php';


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $relation = $_POST['relation'];
        $number = $_POST['num'];
        $st = $_POST['st'];
        $aline1 =  $_POST['aline1'];
        $aline2 = $_POST['aline2'];
        $city = $_POST['city'];

        if (empty($name) || empty($relation) || empty($number)) {
            echo "<script>alert('Please fill out all the required fields. Please try again!');
            window.location.href = 'emergencyContact.php';
            </script>";
        } else if (strlen($number) != 10 && !is_numeric($number)) {
            echo "<script>alert('Phone number should be of length 10. Please try again!');
            window.location.href = 'emergencyContact.php';
            </script>";
        }else{
            $query = "SELECT * from member where userID = " . $_SESSION['userID'];

            $result = mysqli_query($conn, $query);

            $row = mysqli_fetch_assoc($result);

            $query2 = "SELECT * from emergencyContact where memberID = " . $row['memberID'];

            $result2 = mysqli_query($conn, $query2);


            if (mysqli_num_rows($result2) == 1) {

                $row1 = mysqli_fetch_assoc($result2);
                
                $query1 = "UPDATE emergencyContact SET contactName = '$name', telephone='$number', relationship ='$relation', streetNumber='$st', addressLine1='$aline1', addressLine2='$aline2', city='$city' WHERE memberID=" . $row['memberID'];
                    
                mysqli_query($conn, $query1);
                  
                echo "<script>window.onload = function() { alert('Updated successfully.'); window.location.href = 'emergencyContact.php'; };</script>";
            } else {
                
                $query1 = "INSERT INTO emergencyContact(memberID, contactName, telephone, relationship, streetNumber, addressLine1, addressLine2, city) VALUES(" . $row['memberID'] . ", '$name', '$number', '$relation', '$st', '$aline1', '$aline2', '$city')";
                    
                mysqli_query($conn, $query1);
                    
                echo "<script>window.onload = function() { alert('Added successfully.'); window.location.href = 'emergencyContact.php'; };</script>";
            }
        }

        

    }
?>

