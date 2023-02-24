<?php

    include 'authorization.php';
    include 'connect.php';
    
?>

<?php

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$query = "SELECT * FROM user JOIN employee ON user.userID = employee.userID where user.userID = '$userID'";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
}else{
    echo '<script> window.alert("Error receiving data!");</script>';
}

if(isset($row['profilePhoto'])){
    $profilePic = $row['profilePhoto'];
}else{
    $profilePic = "Images/Profile.png";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="Style/profile.css" rel="stylesheet">
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
                <img src="<?php echo $profilePic ?>" alt="my profile" class="myProfile">
            </div>
            <div class="leftBar">
                <div class="leftBarContent">
                    <hr>
                    <a href="home.html"><i class="fa fa-home"></i>Home</a>
                    <hr>
                    <a href="members.php"><i class="fa fa-group"></i>Members</a>
                    <hr>
                    <a href="appointments.php"><i class="fa fa-calendar"></i>Appointments</a>
                    <hr>
                    <a href="schedule.php"><i class=" fa fa-clock-o"></i>Schedule</a>
                    <hr>
                    <a href="Diet Plan/DietPlan/dietPlan.html"><i class="fa fa-heartbeat"></i>Diet Plans</a>
                    <hr>
                    <a href="chatBox.php"><i class="fa fa-comments"></i>Chat Box</a>
                    <hr>
                    <a href="profile.php" class="active"><i class="fa fa-cog"></i>My Profile</a>
                    <hr>
                    <a href="complaint.php">Complaints</a>
                    <hr>
                    <a href="../home/logout.php"><i class="fa fa-sign-out"></i>Log out</a>
                    <hr>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="profileCard">
                <img src="<?php echo $profilePic ?>" alt="Profile Picture" class="profileCardPic">
                <div class="intro">
                    <p style="font-weight: 700; font-size: 20px;">Dr Vindinu Gunawardana</p>
                    <p style="font-weight: 400; font-size: 15px;">Dietician</p>
                </div>
                <button onclick="document.getElementById('image').style.display='block'"><i
                        class="fa fa-pencil"></i>Change
                    Profile</button>
                <div class="rates">
                    <p style="font-weight: 700; font-size: 15px;">100 Rates</p>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
            </div>
            <div class="content">
                <div class="dateBar">
                    <div class="selector"></div>
                    <div class="dateRow">
                        <a href="profile.php" style="color: rgba(0, 104, 55, 1);">Profile</a>
                        <a href="changePassword.php">Change Password</a>
                    </div>
                </div>
                <div class="formArea">
                    <form>
                        <table>
                            <tr>
                                <td>
                                    <label for="fname">First Name</label><br>
                                    <input type="text" id="fname" name="fname" class="textBox">
                                </td>
                                <td>
                                    <label for="lname">Last Name</label><br>
                                    <input type="text" id="lname" name="lname" class="textBox">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="nic">NIC</label><br>
                                    <input type="text" id="nic" name="nic" class="textBox">
                                </td>
                                <td>
                                    <label for="DOB">Date of Birth</label><br>
                                    <input type="date" id="DOB" name="DOB" class="textBox">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="phone">Phone</label><br>
                                    <input type="text" id="phone" name="phone" class="textBox">
                                </td>
                                <td>
                                    <label for="gender">Gender</label><br>
                                    <select name="gender" id="gender">
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="streetNum">Street Number</label><br>
                                    <input type="text" id="streetNum" name="streetNum" class="textBox">
                                </td>
                                <td>
                                    <label for="addressLineOne">Address Line 1</label><br>
                                    <input type="text" id="addressLineOne" name="addressLineOne" class="textBox">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="addressLineTwo">Address Line 2</label><br>
                                    <input type="text" id="addressLineTwo" name="addressLineTwo" class="textBox">
                                </td>
                                <td>
                                    <label for="city">City</label><br>
                                    <input type="text" id="city" name="city" class="textBox">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="experiancedYears">Number of years of Experiance</label><br>
                                    <input type="number" id="experiancedYears" name="experiancedYears" class="textBox">
                                </td>
                                <td>
                                    <label for="qualification">Qualification</label><br>
                                    <input type="text" id="qualification" name="qualification" class="textBox">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="language">Language</label>
                                    <input type="checkbox" id="sinhala" name="language[]" value="sinhala">
                                    <lable for="sinhala">Sinhala</lable>
                                    <input type="checkbox" id="english" name="language[]" value="english">
                                    <lable for="english">English</lable>
                                    <input type="checkbox" id="tamil" name="language[]" value="tamil">
                                    <lable for="tamil">Tamil</lable>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=" 2">
                                    <label for="bio">Bio</label><br>
                                    <textarea name="bio" id="bio" cols="75" rows="5" style="resize: none;"></textarea>
                                </td>
                            </tr>
                        </table>
                        <button type="submit" class="updateBtn" name="update"
                            onclick="document.getElementById('popUp').style.display='block'">Update</button>
                    </form>
                </div>
            </div>
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


    <!--Change Image-->
    <div id="image" class="popUpContent">
        <div class="popUpContainer">
            <span class="close">&times;</span>
            <br>
            <label for="profilePic">Change Profile Photo</label>
            <br>
            <br>
            <input type="file" id="profilePic" name="profilePic">
            <br>
            <br>
            <button class="acceptBtn" onclick="document.getElementById('popUp').style.display='none';">OK</button>
        </div>
    </div>

    <script>
    var popUpContent = document.getElementById('image');
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