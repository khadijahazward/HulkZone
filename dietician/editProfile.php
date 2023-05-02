<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$fnameErr = $lnameErr = $nicErr = $DOBErr = $phoneErr = $genderErr = $streetNumErr = $addressLineOneErr = $addressLineTwoErr = $cityErr = $experiencedYearsErr = $qualificationErr = $languageErr = $bioErr = "";

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$query1 = "SELECT * FROM user JOIN employee ON user.userID = employee.userID WHERE user.userID = $userID";
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_assoc($result1);

if (isset($_POST['edite'])) {

    $fname = ucwords($_POST['fname']);
    $lname = ucwords($_POST['lname']);
    $nic = $_POST['nic'];
    $DOB = $_POST['DOB'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $streetNum = $_POST['streetNum'];
    $addressLineOne = $_POST['addressLineOne'];
    $addressLineTwo = $_POST['addressLineTwo'];
    $city = $_POST['city'];
    $experiencedYears = $_POST['experiencedYears'];
    $qualification = $_POST['qualification'];
    $language = $_POST['language'];
    $bio = $_POST['bio'];


    if (empty($fname)) {
        $fnameErr = "First Name is required";
    }

    if (empty($lname)) {
        $lnameErr = "Last Name is required";
    }

    $pattern1 = "/^([0-9]{9}[v|V])$/";
    $pattern2 = "/^[0-9]{12}$/";

    if (empty($nic)) {
        $nicErr = "NIC number is required";
    } elseif (!preg_match($pattern1, $nic) && !preg_match($pattern2, $nic)) {
        $nicErr = "Invalid NIC number";
    }

    if (empty($DOB)) {
        $DOBErr = "Date of Birth is required";
    }

    if (empty($phone)) {
        $phoneErr = "Phone number is required";
    }

    if (empty($gender)) {
        $genderErr = "Gender is required";
    }

    if (empty($fnameErr) && empty($lnameErr) && empty($nicErr) && empty($DOBErr) && empty($phoneErr) && empty($genderErr)) {

        $query2 = "UPDATE user 
        JOIN employee ON user.userID = employee.userID
        SET user.fName = '$fname',
            user.lName = '$lname', 
            user.NIC = '$nic',
            user.dateOfBirth = '$DOB',
            user.contactNumber = '$phone',
            user.gender = '$gender',
            user.streetNumber = '$streetNum',
            user.addressLine01 = '$addressLineOne',
            user.addressLine02 = '$addressLineTwo',
            user.city = '$city',
            employee.noOfYearsOfExperience = '$experiencedYears',
            employee.qualification = '$qualification',
            employee.language = '$language',
            employee.description = '$bio'
        WHERE user.userID = $userID";


        $result2 = mysqli_query($conn, $query2);

        if ($result2) {
            echo "<script> alert('Updated Successfully!'); window.location='profile.php'; </script>";
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    }
}

$query4 = "SELECT * FROM employee WHERE userID = $userID";
$result4 = mysqli_query($conn, $query4);
$row4 = mysqli_fetch_assoc($result4);
$employeeID = $row4['employeeID'];


$query5 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 1 AND employeeID = $employeeID";
$result5 = mysqli_query($conn, $query5);
$row5 = mysqli_fetch_assoc($result5);
$rate01 = $row5['count'];

$query6 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 2 AND employeeID = $employeeID";
$result6 = mysqli_query($conn, $query6);
$row6 = mysqli_fetch_assoc($result6);
$rate02 = $row6['count'];

$query7 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 3 AND employeeID = $employeeID";
$result7 = mysqli_query($conn, $query7);
$row7 = mysqli_fetch_assoc($result7);
$rate03 = $row7['count'];

$query8 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 4 AND employeeID = $employeeID";
$result8 = mysqli_query($conn, $query8);
$row8 = mysqli_fetch_assoc($result8);
$rate04 = $row8['count'];

$query9 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 5 AND employeeID = $employeeID";
$result9 = mysqli_query($conn, $query9);
$row9 = mysqli_fetch_assoc($result9);
$rate05 = $row9['count'];

$query10 = "SELECT COUNT(*) as count FROM servicecharge WHERE rate = 0 AND employeeID = $employeeID";
$result10 = mysqli_query($conn, $query10);
$row10 = mysqli_fetch_assoc($result10);
$rate00 = $row10['count'];

$totalOfRates = ($rate00 * 0) + ($rate01 * 1) + ($rate02 * 2) + ($rate03 * 3) + ($rate04 * 4) + ($rate05 * 5);
$totalCountOfRates = $rate00 + $rate01 + $rate02 + $rate03 + $rate04 + $rate05;
$avarageOfRates = $totalOfRates / $totalCountOfRates;
$formattedAvarageOfRates = number_format($avarageOfRates, 2);


?>




<!-- Change Profile Picture -->
<?php
if (isset($_FILES['image'])) {
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    $file_ext_array = explode('.', $file_name);
    if (count($file_ext_array) > 1) {
        $file_ext = strtolower(end($file_ext_array));
    } else {
        $errors[] = "File extension could not be determined.";
    }

    $expensions = array("jpeg", "jpg", "png");
    if (!in_array($file_ext, $expensions)) {
        $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
    }
    if ($file_size > 2097152) {
        $errors[] = 'File size must be exactly 2 MB';
    }

    if (empty($errors)) {
        // Get the user ID from the session
        $userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

        // Create a new file name using the user ID and the file extension
        $newFileName = $userID . '.' . $file_ext;

        // Set the folder where the uploaded file will be stored
        $folder = "../profileImages/";

        // Set the full path of the uploaded file
        $file_path = $folder . $newFileName;

        // Move the uploaded file to the target directory
        move_uploaded_file($file_tmp, $file_path);

        // Update the user's profile photo path in the database
        $query = "UPDATE user SET profilePhoto='$file_path' WHERE userID='$userID'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "Error: " . mysqli_error($conn);
        } else {
            // Redirect the user to their profile page
            echo "<script>window.location.href = 'profile.php'; location.reload();</script>";
            exit();
        }
    } else {
        // Display the error messages and redirect the user back to their profile page
        echo "<script>
            alert('" . implode("\\n", $errors) . "');
        </script>";
        echo "<script>window.location.href = 'profile.php';</script>";
        exit();
    }
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
                <!-- <div class="notification">
                    <?php
                        // include 'notifications.php'; 
                    ?>
                </div> -->
                <img src="<?php echo $profilePic ?>" alt="my profile" class="myProfile">
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
                <a href="dietPlan.html"><i class="fa fa-heartbeat"></i>Diet Plans</a>
                <hr>
                <a href="chatBox.php"><i class="fa fa-comments"></i>Chat Box</a>
                <hr>
                <a href="editProfile.php" class="active"><i class="fa fa-user"></i>My Profile</a>
                <hr>
                <a href="complaint.php"><i class="fa fa-cog"></i>Complaints</a>
                <hr>
                <a href="../home/logout.php"><i class="fa fa-sign-out"></i>Log out</a>
                <hr>
            </div>
        </div>
        <div class="main">
            <div class="profileCard">
                <img src="<?php echo $profilePic ?>" alt="Profile Picture" class="profileCardPic">
                <div class="intro">
                    <p style="font-weight: 700; font-size: 20px;">
                        <?php echo $row1['fName'] . " " . $row1['lName']; ?></p>
                    <p style="font-weight: 400; font-size: 15px;">Dietician</p>
                </div>
                <button onclick="document.getElementById('image').style.display='block'"><i
                        class="fa fa-pencil"></i>Change
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
                    <div class="editSelector"></div>
                    <div class="dateRow">
                        <a href="profile.php" style="color: rgba(0, 104, 55, 1);">Edit Profile</a>
                        <a href="changePassword.php">Change Password</a>
                    </div>
                </div>
                <div class="formArea">
                    <form method="POST" onsubmit="">
                        <table>
                            <tr>
                                <td>
                                    <label for="fname">First Name</label>&nbsp;&nbsp;&nbsp;
                                    <span class="error">
                                        <?php echo "*" . $fnameErr ?>
                                    </span><br>
                                    <input type="text" id="fname" name="fname" class="textBox"
                                        value="<?php echo $row1['fName'] ?>">
                                </td>
                                <td>
                                    <label for="lname">Last Name</label>&nbsp;&nbsp;&nbsp;
                                    <span class="error">
                                        <?php echo "*" . $lnameErr ?>
                                    </span><br>
                                    <input type="text" id="lname" name="lname" class="textBox"
                                        value="<?php echo $row1['lName'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="nic">NIC</label>&nbsp;&nbsp;&nbsp;
                                    <span class="error">
                                        <?php echo "*" . $nicErr ?>
                                    </span><br>
                                    <input type="text" id="nic" name="nic" class="textBox"
                                        value="<?php echo $row1['NIC'] ?>" readonly>
                                </td>
                                <td>
                                    <label for="DOB">Date of Birth</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <span class="error">
                                        <?php echo "*" . $DOBErr ?>
                                    </span><br>
                                    <input type="date" id="DOB" name="DOB" class="textBox"
                                        value="<?php echo $row1['dateOfBirth'] ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="phone">Phone</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <span class="error">
                                        <?php echo "*" . $phoneErr ?>
                                    </span><br>
                                    <input type="text" id="phone" name="phone" class="textBox"
                                        value="<?php echo $row1['contactNumber'] ?>">
                                </td>
                                <td>
                                    <label for="gender">Gender</label><br>
                                    <input type="text" id="gender" name="gender" class="textBox"
                                        value="<?php echo $row1['gender'] ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="streetNum">Street Number</label><br>
                                    <input type="text" id="streetNum" name="streetNum" class="textBox"
                                        value="<?php echo $row1['streetNumber'] ?>">
                                </td>
                                <td>
                                    <label for="addressLineOne">Address Line 1</label><br>
                                    <input type="text" id="addressLineOne" name="addressLineOne" class="textBox"
                                        value="<?php echo $row1['addressLine01'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="addressLineTwo">Address Line 2</label><br>
                                    <input type="text" id="addressLineTwo" name="addressLineTwo" class="textBox"
                                        value="<?php echo $row1['addressLine02'] ?>">
                                </td>
                                <td>
                                    <label for="city">City</label><br>
                                    <input type="text" id="city" name="city" class="textBox"
                                        value="<?php echo $row1['city'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="experiencedYears">Number of years of Experiance</label><br>
                                    <input type="number" id="experiencedYears" name="experiencedYears" class="textBox"
                                        value="<?php echo $row1['noOfYearsOfExperience'] ?>">
                                </td>
                                <td>
                                    <label for="qualification">Qualification</label><br>
                                    <input type="text" id="qualification" name="qualification" class="textBox"
                                        value="<?php echo $row1['qualification'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="language">Language</label><br>
                                    <input type="text" id="language" name="language" class="textBox" style="width: 93%;"
                                        value="<?php echo $row1['language'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan=" 2">
                                    <label for="bio">Bio</label><br>
                                    <textarea name="bio" id="bio" cols="75" rows="5"
                                        style="resize: none;"><?php echo $row1['description'] ?></textarea>
                                </td>
                            </tr>
                        </table>
                        <button class="updateBtn" name="edite">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Change Image-->
    <div id="image" class="popUpContent">
        <div class="popUpContainer">
            <form method="post" enctype="multipart/form-data">
                <span class="close">&times;</span>
                <br>
                <label for="image">Change Profile Photo</label>
                <br>
                <br>
                <input type="file" id="image" name="image">
                <br>
                <br>
                <button class="acceptBtn" type="submit">OK</button>
            </form>
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