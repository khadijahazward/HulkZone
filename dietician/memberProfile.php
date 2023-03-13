<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

if(isset($_GET['view'])){
    $memberID = $_GET['view'];
}

$sql = "SELECT * FROM member JOIN user ON member.userID = user.userID WHERE member.memberID = $memberID";
$sqlResult = mysqli_query($conn,$sql);
if(mysqli_num_rows($sqlResult) == 1){
    $member = mysqli_fetch_assoc($sqlResult);
    $memberUserID = $member['userID'];
}else{
    echo '<script> window.alert("Error of receiving member details");</script>';
}

$query = "SELECT * FROM user JOIN member ON user.userID = member.userID WHERE member.userID = $memberUserID";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
}else{
    echo '<script> window.alert("Error receiving data!");</script>';
}
    
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member's Profile</title>
    <link href="Style/memberProfile.css" rel="stylesheet">
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
        </div>

        <div class="main">
            <div class="profileCard">
                <img src="<?php echo $row['profilePhoto'] ?>" alt="Member's Profile Picture" class="profileCardPic">
                <div class="intro">
                    <p style="font-weight: 700; font-size: 20px;">
                        <?php echo $row['fName']." ". $row['lName'] ?></p>
                    <p style="font-weight: 400; font-size: 15px;">Member</p>
                </div>
                <div class="details">
                    <p style="font-weight: 500; font-size: 17px;">Status -
                        <?php if($row['statuses'] == 1){echo "Active";} else{echo "Inactive";}?>
                    </p>
                    <p style="font-weight: 500; font-size: 17px;">Joined Date -
                        <?php echo $row['created_at'] ?>
                    </p>
                    <p style="font-weight: 500; font-size: 17px;">Member ID -
                        <?php echo $row['memberID'] ?>
                    </p>
                </div>
            </div>
            <div class="content">
                <div class="dateBar">
                    <div class="selector"></div>
                    <div class="dateRow">
                        <a href="memberProfile.php" style="color: rgba(0, 104, 55, 1);">Profile</a>
                        <?php echo "<a href='medicalForm.php?view=".$row["memberID"]."'>Medical Form</a>";?>
                    </div>
                </div>
                <div class="formArea">
                    <form>
                        <table>
                            <tr>
                                <td>
                                    <label for="fname">First Name</label><br>
                                    <input type="text" id="fname" name="fname" class="textBox"
                                        value="<?php echo $row['fName'] ?>" readonly>
                                </td>
                                <td>
                                    <label for="lname">Last Name</label><br>
                                    <input type="text" id="lname" name="lname" class="textBox"
                                        value="<?php echo $row['lName'] ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="nic">NIC</label><br>
                                    <input type="text" id="nic" name="nic" class="textBox"
                                        value="<?php echo $row['NIC'] ?>" readonly>
                                </td>
                                <td>
                                    <label for="DOB">Date of Birth</label><br>
                                    <input type="date" id="DOB" name="DOB" class="textBox"
                                        value="<?php echo $row['dateOfBirth'] ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="phone">Phone</label><br>
                                    <input type="text" id="phone" name="phone" class="textBox"
                                        value="<?php echo $row['contactNumber'] ?>" readonly>
                                </td>
                                <td>
                                    <label for="gender">Gender</label><br>
                                    <input type="text" id="gender" name="gender" class="textBox"
                                        value="<?php echo $row['gender'] ?>" readonly>
                                    <!-- <select name="gender" id="gender">
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                        <option value="Other">Other</option>
                                    </select> -->
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="paymentPlan">Payment Plan</label><br>
                                    <input type="text" id="paymentPlan" name="paymentPlan" class="textBox"
                                        value="<?php echo $row['planType'] ?>" readonly>
                                    <!-- <select name="gender" id="gender" style="width: 86%;">
                                        <option value="One Month">Month Package</option>
                                        <option value="Three Month">Three Month Package</option>
                                        <option value="Six Month">Six Month Package</option>
                                        <option value="Twelve Month">Twelve Month Package</option>
                                    </select> -->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="height">Height (in Inches)</label><br>
                                    <input type="number" id="height" name="height" class="textBox" step="0.01"
                                        value="<?php echo $row['height'] ?>" readonly>
                                </td>
                                <td>
                                    <label for="weight">Weight (in Kilograms)</label><br>
                                    <input type="number" id="weight" name="weight" class="textBox" step="0.001"
                                        value="<?php echo $row['weight'] ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="streetNum">Street Number</label><br>
                                    <input type="text" id="streetNum" name="streetNum" class="textBox"
                                        value="<?php echo $row['streetNumber'] ?>" readonly>
                                </td>
                                <td>
                                    <label for="addressLineOne">Address Line 1</label><br>
                                    <input type="text" id="addressLineOne" name="addressLineOne" class="textBox"
                                        value="<?php echo $row['addressLine01'] ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="addressLineTwo">Address Line 2</label><br>
                                    <input type="text" id="addressLineTwo" name="addressLineTwo" class="textBox"
                                        value="<?php echo $row['addressLine02'] ?>" readonly>
                                </td>
                                <td>
                                    <label for="city">City</label><br>
                                    <input type="text" id="city" name="city" class="textBox"
                                        value="<?php echo $row['city'] ?>" readonly>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <button type="button" onclick="window.location.href='members.php';" class="backBtn">Back</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>