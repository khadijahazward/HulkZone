<?php
include '../connect.php';
include 'script/config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Hulkzone</title>
</head>

<body>
    <?php
    if (!$_SESSION['username']) {
        header('location: http://localhost/hulkzone/');
    }

    $userID = $_SESSION['userID'];
    $sql = "SELECT * FROM user JOIN employee ON user.userID = employee.userID where user.userID=" . $userID;
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    ?>

    <nav class="main-sidebar">
        <img src="img/gymLogo 3.png" alt="Logo">
        <div class="navbar-items">
            <ul>
                <li>
                    <a href="<?php echo HOME ?>">
                        <span class="material-symbols-outlined">
                            home
                        </span> Home
                    </a>
                </li>
                <li>
                    <a href="<?php echo WORKOUT_PLAN ?>">
                        <span class="material-symbols-outlined">
                            fitness_center
                        </span> Workout Plan
                    </a>
                </li>
                <li>
                    <a href="<?php echo MEMBERS ?>">
                        <span class="material-symbols-outlined">
                            groups
                        </span> Members
                    </a>
                </li>
                <li>
                    <a href="<?php echo TIMESLOTS ?>">
                        <span class="material-symbols-outlined">
                            alarm
                        </span> Timeslots
                    </a>
                </li>
                <li>
                    <a href="<?php echo COMPLAINTS ?>">
                        <span class="material-symbols-outlined">
                            patient_list
                        </span> Complaints
                    </a>
                </li>
                <li>
                    <a href="<?php echo SETTINGS ?>">
                        <span class="material-symbols-outlined">
                            settings
                        </span> Settings
                    </a>
                </li>
                <li id="nav-logout">
                    <a href="<?php echo LOGOUT ?>">
                        <span class="material-symbols-outlined">
                            logout
                        </span> Logout
                    </a>
                </li>

            </ul>
        </div>
    </nav>
    <section class="top-navbar">


        <div class="topbar-right">
            <div class="topbar-notification">
            <span class="material-symbols-outlined">
                    <?php include "notifications.php" ?>
                </span>
            </div>
            <img id="profile-photo-style" class="profilePic" src="<?php echo $_SESSION['profilePhoto']; ?>" alt="profile-icon">
        </div>

    </section>

    <section class="main-content-container">
        <a href="http://localhost/hulkzone/trainer/changePassword.php" id="settings-change-pwd">Change Password</a>
        <div class="settings-main-container">
            <div id="profileCard">
                <img src="<?php echo $_SESSION['profilePhoto']; ?>" alt="" id="settings-profile-image">
            </div>
            <div id="settings-content">
                <div class="dateBar">
                    <div class="selector">

                    </div>
                </div>
                <div class="formArea">
                    <form id="settings-main-form" action="http://localhost/hulkzone/trainer/script/update-settings.php" method="POST" enctype="multipart/form-data">
                        <label for="">Upload your profile picture:</label>
                        <input type="file" value="update-btn" name="Evi-image">
                        <table>
                            <tr>
                                <td>
                                    <label for="fName">First Name</label><br>
                                    <input type="text" id="fName" name="fName" class="textBox" value="<?php echo $row['fName']; ?>">
                                </td>
                                <td>
                                    <label for="lName">Last Name</label><br>
                                    <input type="text" id="lName" name="lName" class="textBox" value="<?php echo $row['lName']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="NIC">NIC</label><br>
                                    <input type="text" id="NIC" name="NIC" class="textBox" value="<?php echo $row['NIC']; ?>" readonly>
                                </td>
                                <td>
                                    <label for="dateOfBirth">Date of Birth</label><br>
                                    <input type="date" id="dateOfBirth" name="dateOfBirth" class="textBox" value="<?php echo $row['dateOfBirth']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="contactNumber">Phone</label><br>
                                    <input type="text" id="contactNumber" name="contactNumber" class="textBox" value="<?php echo $row['contactNumber']; ?>"readonly>
                                </td>
                                <td>
                                    <label for="gender">Gender</label><br>
                                    <input type="radio" id="gender" name="gender" class="textBox" value="Male" <?php echo ($row['gender'] == 'Male') ? 'checked' : ''; ?>> Male <br>
                                    <input type="radio" id="gender" name="gender" class="textBox" value="Female" <?php echo ($row['gender'] == 'Female') ? 'checked' : ''; ?>> Female
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="streetNumber">Street Number</label><br>
                                    <input type="text" id="streetNumber" name="streetNumber" class="textBox" value="<?php echo $row['streetNumber']; ?>">
                                </td>
                                <td>
                                    <label for="addressLineOne">Address Line 1</label><br>
                                    <input type="text" id="addressLineOne" name="addressLineOne" class="textBox" value="<?php echo $row['addressLine01']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="addressLineTwo">Address Line 2</label><br>
                                    <input type="text" id="addressLineTwo" name="addressLineTwo" class="textBox" value="<?php echo $row['addressLine02']; ?>">
                                </td>
                                <td>
                                    <label for="city">City</label><br>
                                    <input type="text" id="city" name="city" class="textBox" value="<?php echo $row['city']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="noOfYearsExperience">Number of years of Experiance</label><br>
                                    <input type="number" id="noOfYearsExperience" name="noOfYearsExperience" class="textBox" value="<?php echo $row['noOfYearsOfExperience']; ?>">
                                </td>
                                <td>
                                    <label for="qualification">Qualification</label><br>
                                    <input type="text" id="qualification" name="qualification" class="textBox" value="<?php echo $row['qualification']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="language">Language</label><br>
                                    <input type="text" id="language" name="language" class="textBox" style="width: 93%;" value="<?php echo $row['language']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="bio">Bio</label><br>
                                    <textarea name="description" id="description" cols="75" rows="10" style="resize: none;"><?php echo $row['description']; ?></textarea>
                                </td>
                            </tr>
                        </table>
                        <button type="submit" name="submit" id="settings-update-btn">Update
                            Profile</button>
                    </form>
                </div>
            </div>

        </div>


    </section>
</body>

</html>