<?php

include 'authorization.php';
include 'connect.php';

$userID = mysqli_real_escape_string($_SESSION['userID']);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $subject = mysqli_real_connect($conn, $_POST['subject']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $desiredOutcome = mysqli_real_escape_string($conn, $_POST['desiredOutcome']);
    $status = "Pending";

    if(!empty($subject) && !empty($description) && !empty($desiredOutcome)){
        
        $query1 = "INSERT INTO complaint(subject, description, desiredOutcome, status, userID) VALUES ('$subject' , '$description' , '$desiredOutcome' , '$status' , '$userID')";
        $result1 = mysqli_query($conn, $query1);

        if($result1 == TRUE){
        }
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
</head>

<body>
    <div class="container">
        <div class="topBar">
            <div class="gymLogo"><img src="Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <img src="Images/Profile.png" alt="my profile" class="myProfile">
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
                <a href="Diet Plan/DietPlan/dietPlan.php"><i class="fa fa-heartbeat"></i>Diet Plans</a>
                <hr>
                <a href="chatBox.php"><i class="fa fa-comments"></i>Chat Box</a>
                <hr>
                <a href="profile.php"><i class="fa fa-cog"></i>My Profile</a>
                <hr>
                <a href="complaint.php" class="active">Complaints</a>
                <hr>
                <a href="../home/logout.php"><i class="fa fa-sign-out"></i>Log out</a>
                <hr>
            </div>
        </div>
        <div class="content">
            <div class=" subtopic">
                <p>Report a Complaint</p>
            </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <table class="reportingContent">
                    <tr>
                        <td><label for="subject">Complaints Subject</label></td>
                        <td><input type="text" name="subject" id="subject" class="textBox"></td>
                    </tr>
                    <tr>
                        <td><label for="description">Complaints Description</label></td>
                        <td>
                            <textarea name="description" id="description" cols="75" rows="6"
                                style="resize: none;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="desiredOutcome">Desired Outcome</label></td>
                        <td>
                            <textarea name="desiredOutcome" id="desiredOutcome" cols="75" rows="6"
                                style="resize: none;"></textarea>
                        </td>
                    </tr>
                </table>
                <button onclick="document.getElementById('popUp').style.display='block';"
                    class="saveBtn">Submit</button>
            </form>
            <div class="gridContainer">
                <table>
                    <tr>
                        <td colspan="4">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <th>Complaint ID</th>
                        <th>Date Reported</th>
                        <th>Subject</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <hr>
                        </td>
                    </tr>
                    <tbody>
                        <tr>
                            <td>501</td>
                            <td>20/05/2022</td>
                            <td>System Breakdown</td>
                            <td>Completed</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--

    <div id="popUp" class="popUpContent">
        <div class="popUpContainer">
            <span class="close">&times;</span>
            <img src="../../Images/Ok.png" alt="Done" style="width: 50px; height: 60px; top: 40px;">
            <p>Your Complaint has been Placed!</p>
            <button class="acceptBtn" onclick="window.location.href='../Complaint/complaint.html'">OK</button>
        </div>
    </div>

    <script>
    var popUpContent = document.getElementById('popUp');
    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        popUpContent.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == popUpContent) {
            popUpContent.style.display = "none";
        }
    }
    </script>
-->
</body>

</html>