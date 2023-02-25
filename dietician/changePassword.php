<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="Style/changePassword.css" rel="stylesheet">
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
                <a href="chatBox.html"><i class="fa fa-comments"></i>Chat Box</a>
                <hr>
                <a href="changePassword.php" class="active"><i class="fa fa-cog"></i>My Profile</a>
                <hr>
                <a href="cmplaint.php">Complaints</a>
                <hr>
                <a href="../home/logout.php"><i class="fa fa-sign-out"></i>Log out</a>
                <hr>
            </div>
        </div>
        <div class="content">
            <div class="dateBar">
                <div class="selector"></div>
                <div class="dateRow">
                    <a href="profile.php">Profile</a>
                    <a href="changePassword.php" style="color: rgba(0, 104, 55, 1);">Change Password</a>
                </div>
            </div>
            <div class="topic">
                <p>Change Password</p>
            </div>
            <form>
                <table border="0px">
                    <tr>
                        <td><label for="oldPassword">Enter Old Password</label></td>
                        <td><input type="password" id="oldPassword" name="oldPassword"
                                placeholder="At least 8 characters" class="textBox"></td>
                    </tr>
                    <tr>
                        <td><label for="newPassword">Enter New Password</label></td>
                        <td><input type="password" id="newPassword" name="newPassword"
                                placeholder="At least 8 characters" class="textBox"></td>
                    </tr>
                    <tr>
                        <td><label for="confirmPassword">Confirm Password</label></td>
                        <td><input type="password" name="confirmPassword" id="confirmPassword" placeholder="********"
                                class="textBox">
                        </td>
                    </tr>
                </table>
            </form>
            <button onclick="document.getElementById('popUp').style.display='block'" class="saveButton">Save</button>
        </div>
    </div>

    <div id="popUp" class="popUpContent">
        <div class="popUpContainer">
            <span class="close">&times;</span>
            <img src="Images/Ok.png" alt="Done" style="width: 50px; height: 60px; top: 40px;">
            <p>Your Password has been Placed Successfully!</p>
            <button class="acceptBtn" onclick="document.getElementById('popUp').style.display='none';">OK</button>
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

</body>

</html>