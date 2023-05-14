<?php
include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);


$query = "SELECT * FROM user JOIN employee ON user.userID = employee.userID where user.userID = '$userID'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $employeeID = $row['employeeID'];
} else {
    echo '<script> window.alert("Error receiving data!");</script>';
}

if (isset($row['profilePhoto'])) {
    $profilePic = $row['profilePhoto'];
} else {
    $profilePic = "Images/Profile.png";
}

$query5 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 1 AND employeeID = $employeeID AND endDate <= NOW()";
$result5 = mysqli_query($conn, $query5);
$row5 = mysqli_fetch_assoc($result5);
$rate01 = $row5['count'];

$query6 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 2 AND employeeID = $employeeID AND endDate <= NOW()";
$result6 = mysqli_query($conn, $query6);
$row6 = mysqli_fetch_assoc($result6);
$rate02 = $row6['count'];

$query7 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 3 AND employeeID = $employeeID AND endDate <= NOW()";
$result7 = mysqli_query($conn, $query7);
$row7 = mysqli_fetch_assoc($result7);
$rate03 = $row7['count'];

$query8 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 4 AND employeeID = $employeeID AND endDate <= NOW()";
$result8 = mysqli_query($conn, $query8);
$row8 = mysqli_fetch_assoc($result8);
$rate04 = $row8['count'];

$query9 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 5 AND employeeID = $employeeID AND endDate <= NOW()";
$result9 = mysqli_query($conn, $query9);
$row9 = mysqli_fetch_assoc($result9);
$rate05 = $row9['count'];

$query10 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 0 AND employeeID = $employeeID AND endDate <= NOW()";
$result10 = mysqli_query($conn, $query10);
$row10 = mysqli_fetch_assoc($result10);
$rate00 = $row10['count'];

$totalOfRates = ($rate00 * 0) + ($rate01 * 1) + ($rate02 * 2) + ($rate03 * 3) + ($rate04 * 4) + ($rate05 * 5);
$totalCountOfRates = $rate00 + $rate01 + $rate02 + $rate03 + $rate04 + $rate05;
$avarageOfRates = $totalOfRates / $totalCountOfRates;
$formattedAvarageOfRates = number_format($avarageOfRates, 2);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link href="Style/profile.css" rel="stylesheet">
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
                <?php echo "<img src=" . $profilePic . " alt='my profile' class='myProfile'>"; ?>
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
                    <a href="schedule.php"><i class="fa fa-clock-o"></i>Schedule</a>
                    <hr>
                    <a href="dietPlan.php"><i class="fa fa-heartbeat"></i>Diet Plans</a>
                    <hr>
                    <a href="chatBox.php"><i class="fa fa-comments"></i>Chat Box</a>
                    <hr>
                    <a href="profile.php" class="active"><i class="fa fa-user"></i>My Profile</a>
                    <hr>
                    <a href="complaint.php"><i class="fa fa-cog"></i>Complaints</a>
                    <hr>
                    <a href="../home/logout.php"><i class="fa fa-sign-out"></i>Log out</a>
                    <hr>

                </div>
            </div>
        </div>

        <div class="main">
            <div class="profileCard">
                <img src="<?php echo $profilePic; ?>" alt="Profile Picture" class="profileCardPic">
                <div class="intro">
                    <p style="font-weight: 700; font-size: 20px;">
                        <?php echo $row['fName'] . " " . $row['lName']; ?>
                    </p>
                    <p style="font-weight: 400; font-size: 15px;">Dietician</p>
                </div>
                <button onclick="window.location.href ='editProfile.php';"><i class="fa fa-pencil"></i>Edit
                    Profile</button>
                <div class="rates">
                    <p style="font-weight: 700; font-size: 15px;">
                        <?php echo $formattedAvarageOfRates ?> Rates
                    </p>
                    <?php
                    

                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $formattedAvarageOfRates) {
                            echo '<i class="fa fa-star checked"></i>'; // Output a filled star icon
                        } else {
                            echo '<i class="fa fa-star notChecked"></i>'; // Output an empty star icon
                        }
                    }
                    ?>

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
                                    <input type="text" id="fname" name="fname" class="textBox"
                                        value="<?php echo $row['fName']; ?>" readonly>
                                </td>
                                <td>
                                    <label for="lname">Last Name</label><br>
                                    <input type="text" id="lname" name="lname" class="textBox"
                                        value="<?php echo $row['lName']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="nic">NIC</label><br>
                                    <input type="text" id="nic" name="nic" class="textBox"
                                        value="<?php echo $row['NIC']; ?>" readonly>
                                </td>
                                <td>
                                    <label for="DOB">Date of Birth</label><br>
                                    <input type="date" id="DOB" name="DOB" class="textBox"
                                        value="<?php echo $row['dateOfBirth']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="phone">Phone</label><br>
                                    <input type="text" id="phone" name="phone" class="textBox"
                                        value="<?php echo $row['contactNumber']; ?>" readonly>
                                </td>
                                <td>
                                    <label for="gender">Gender</label><br>
                                    <input type="text" id="gender" name="gender" class="textBox"
                                        value="<?php echo $row['gender'] ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="streetNum">Street Number</label><br>
                                    <input type="text" id="streetNum" name="streetNum" class="textBox"
                                        value="<?php echo $row['streetNumber']; ?>" readonly>
                                </td>
                                <td>
                                    <label for="addressLineOne">Address Line 1</label><br>
                                    <input type="text" id="addressLineOne" name="addressLineOne" class="textBox"
                                        value="<?php echo $row['addressLine01']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="addressLineTwo">Address Line 2</label><br>
                                    <input type="text" id="addressLineTwo" name="addressLineTwo" class="textBox"
                                        value="<?php echo $row['addressLine02']; ?>" readonly>
                                </td>
                                <td>
                                    <label for="city">City</label><br>
                                    <input type="text" id="city" name="city" class="textBox"
                                        value="<?php echo $row['city']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="experiancedYears">Number of years of Experiance</label><br>
                                    <input type="number" id="experiancedYears" name="experiancedYears" class="textBox"
                                        value="<?php echo $row['noOfYearsOfExperience']; ?>" readonly>
                                </td>
                                <td>
                                    <label for="qualification">Qualification</label><br>
                                    <input type="text" id="qualification" name="qualification" class="textBox"
                                        value="<?php echo $row['qualification']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="language">Language</label><br>
                                    <input type="text" id="language" name="language" class="textBox"
                                        value="<?php echo $row['language'] ?>" readonly>
                                </td>
                                <td>
                                    <label for="email">Email</label><br>
                                    <input type="email" id="email" name="email" class="textBox"
                                        value="<?php echo $row['email'] ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="bio">Bio</label><br>
                                    <textarea name="bio" id="bio" cols="75" rows="5" style="resize: none;"
                                        readonly><?php echo $row['description']; ?></textarea>
                                </td>
                            </tr>
                        </table>
                        <button type="button" onclick="window.location.href='editProfile.php';" class="updateBtn">Update
                            Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>