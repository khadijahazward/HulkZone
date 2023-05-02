<?php

include 'authorization.php';
include 'connect.php';
include "setProfilePic.php";

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);
$check = "";

$subjectErr = $descriptionErr = $desiredOutcomeErr = "";

    

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $desiredOutcome = mysqli_real_escape_string($conn, $_POST['desiredOutcome']);
    $status = "Pending";

    if(!empty($subject) && !empty($description) && !empty($desiredOutcome)){
        
        $query1 = "INSERT INTO complaint(subject, description, desiredOutcome, status, dateReported, userID) VALUES ('$subject' , '$description' , '$desiredOutcome' , '$status' , current_timestamp() , '$userID')";
        $result1 = mysqli_query($conn, $query1);

        if($result1 == TRUE){
            echo "<script> alert('Complaint Recorded Succesfully'); </script>";
            $check = 0;
        }else{
            echo "<script> alert('Error'); </script>";
        }
        
    }elseif(empty($_POST['subject'])){
        $subjectErr = "Subject is reqired";
        
    }elseif(empty($_POST['description'])){
        $descriptionErr = "Description is required";
        
    }elseif(empty($_POST['desiredOutcome'])){
        $desiredOutcomeErr = "Desired outcome is required";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints</title>
    <link href="Style/complaint.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class="container">
        <div class="topBar">
            <div class="gymLogo"><img src="Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <div class="notification">
                    <?php
                        include 'notifications.php'; 
                    ?>
                </div>
                <img src="<?php echo $profilePic; ?>" alt="my profile" class="myProfile">
            </div>
        </div>
        <div class="leftBar">
            <div class="leftBarContent">
                <hr>
                <a href="home.php"><i class="fa fa-home"></i>Home</a>
                <hr>
                <a href="members.php"><i class="fa fa-group"></i>Members</a>
                <hr>
                <a href="appointments.php"><i class="fa fa-calendar"></i>Appointments</a>
                <hr>
                <a href="schedule.php"><i class=" fa fa-clock-o"></i>Schedule</a>
                <hr>
                <a href="dietPlan.php"><i class="fa fa-heartbeat"></i>Diet Plans</a>
                <hr>
                <a href="chatBox.php"><i class="fa fa-comments"></i>Chat Box</a>
                <hr>
                <a href="profile.php"><i class="fa fa-user"></i>My Profile</a>
                <hr>
                <a href="complaint.php" class="active"><i class="fa fa-cog"></i>Complaints</a>
                <hr>
                <a href="../home/logout.php"><i class="fa fa-sign-out"></i>Log out</a>
                <hr>
            </div>
        </div>
        <div class="main">
            <div class="topic">
                <p>Complaints</p>
            </div>
            <button class="complaintBtn" onclick="window.location.href='createComplaint.php'"> Create a
                complaint</button>
            <div class=" gridContainer">
                <table>
                    <thead>
                        <tr>
                            <th>Complaint ID</th>
                            <th>Date Reported</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Action Taken</th>
                        </tr>
                    </thead>

                    <?php
                        $query2 = "SELECT complaintID, subject, dateReported, status, actionTaken  FROM `complaint` where userID ='$userID' ";
                        $result2 = mysqli_query($conn, $query2);

                    ?>

                    <tbody>
                        <?php

                        if(mysqli_num_rows($result2) > 0){
                            while($row = mysqli_fetch_assoc($result2)){
                                echo"<tr>
                                        <td>".$row["complaintID"]."</td>
                                        <td>".$row["dateReported"]."</td>
                                        <td>".$row["subject"]."</td>
                                        <td>".$row["status"]."</td>
                                        <td>".$row["actionTaken"]."</td>
                                    </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>