<?php 
include 'authorization.php';
include '../connect.php';
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['existing_conditions'])) {
        $existing_conditions = $_POST['existing_conditions'];
        $existing_conditions = implode(",", $existing_conditions);
    } else {
        $existing_conditions = "";
    }
    
    if (isset($_POST['allergies'])) {
        $allergies = $_POST['allergies'];
        $allergies = implode(",", $allergies);
    } else {
        $allergies = "";
    }

    if(isset($_POST['isFatigue'])){
        $isFatigue = $_POST['isFatigue'];
    }else{
        $isFatigue = "";
    }

    if(isset($_POST['isInjury'])){
        $isInjury = $_POST['isInjury'];
    }else{
        $isInjury = "";
    }

    if(isset($_POST['isSmoke'])){
        $isSmoke = $_POST['isSmoke'];
    }else{
        $isSmoke = "";
    }

    $query = "SELECT * from member where userID = " . $_SESSION['userID'];

    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);

    $query2 = "SELECT * from medicalform where memberID = " . $row['memberID'];

    $result2 = mysqli_query($conn, $query2);



    if (mysqli_num_rows($result2) == 1) {

        $row2 = mysqli_fetch_assoc($result2);
        
        $sql = "UPDATE medicalform SET existing_conditions = '$existing_conditions', allergies='$allergies', isInjury ='$isInjury', isSmoke='$isSmoke', isFatigue='$isFatigue'  WHERE memberID=" . $row['memberID'];
            
        mysqli_query($conn, $sql);
          
        echo "<script>window.onload = function() { alert('Updated successfully.'); window.location.href = 'medicalForm.php'; };</script>";
    } else {
        $member = $row['memberID'];
        $sql = "INSERT INTO medicalform (memberID, existing_conditions, allergies, isInjury, isSmoke, isFatigue) VALUES ('$member', '$existing_conditions', '$allergies', '$isInjury', '$isSmoke',  '$isFatigue')";

        mysqli_query($conn, $sql);
            
        echo "<script>window.onload = function() { alert('Added successfully.'); window.location.href = 'medicalForm.php'; };</script>";
    }


    
}

?>