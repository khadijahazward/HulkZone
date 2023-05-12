
<?php

include('authorization.php');
include('../connect.php');
include('notiCount.php');

// get the user ID from the session
$userID = $_SESSION['userID'];

// prepare the SQL query
$query = "SELECT fName, lName, NIC, gender, dateOfBirth, contactNumber, streetNumber, addressLine01, addressLine02, city,profilePhoto,email FROM user WHERE userID = ? AND roles = 0";

// prepare the statement
$stmt = mysqli_prepare($conn, $query);

// bind the parameter for the user ID
mysqli_stmt_bind_param($stmt, "i", $userID);

// execute the statement
mysqli_stmt_execute($stmt);

// bind the result variables
mysqli_stmt_bind_result($stmt, $fName, $lName, $NIC, $gender, $dateOfBirth, $contactNumber, $streetNumber, $addressLine01, $addressLine02, $city,$profilePictureLink,$email);

// fetch the results
if (mysqli_stmt_fetch($stmt));

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sideBar.css">
    
    <link rel="stylesheet" type="text/css" href="css/profile.css">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <?php
include('../admin/sideBar.php');
    ?>
    <div class="right">

        <div class="content">
            <div class="contentLeft">
                <p class="title" style="width: 200px;">Admin Profile</p>
            </div>
            <div>
        <div class="notification" style="margin-left: 690px;" >
          <?php
          include 'notifications.php';
          ?>
        </div>
      </div>
      <div class="notiCount" style="padding-top: 7.5px;margin-left:730px;" >
        <p ><?php echo $count; ?></p>
      </div>


      <div class="contentMiddle" style="margin-left:30px;width: 120px;">
        <p class="myProfile" >My Profile</p>
      </div>
      <div class="contentRight" style="margin-left: 0px;"><img src="<?php echo $profilePictureLink ?>" alt="AdminLogo" class="adminLogo"></div>
    </div>
        <div class="down" style="display:flex; flex-direction:row;">
            <div class="edit-profile" >
                    <div>
                        <!--dp-->
                        <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="200px" height="200px">
            </div>
            <div>
                <?php

                echo $fName;
                ?>
                <br>

                Admin<!--User Type-->
            </div>
            <div style="margin: 30px;">
                <!--changing profile pic-->
                <a href="editProfile.php"><button class="open-button" style="height: 35px;border-radius:5px;">Edit Profile</button></a>
            </div>

        </div>

        <div class="content-base">
            <!--the headings bar-->

            <!--the profile details-->
            <div class="profile">
                <form method="post">
                    <h1 style="font-size: 19px;font-weight:bold;color:#006837;">Personal Details</h1>
                    <div class="addresss" style="border:thick solid #006837;border-width:2px;border-radius:5px;padding-bottom:5px;margin-right:5px;">
                        <div class="form-row">
                            <div class="form-group" style="margin-right:50px;">
                                <label>First name </label>
                                <input type="text" name="fName" value="<?php echo "$fName"; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" name="lName" value="<?php echo "$lName"; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group" style="margin-right:50px;">
                                <label>NIC</label><span id="error-message" style="font-size: 10px; color: red;"></span>
                                <input id="nic" type="text" name="NIC" value="<?php echo "$NIC"; ?>" readonly>



                            </div>

                            <div class="form-group">
                                <label>Date of Birth </label>
                                <input id="dob" type="date" name="dateOfBirth" min="1930-01-01" max="2004-12-31" value="<?php echo "$dateOfBirth"; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group" style="margin-right:50px;">
                                <label>Phone Number</label><span id="error-msg" style="font-size: 10px; color: red;"></span>
                                <input id="number" type="text" name="gender" value="<?php echo "$contactNumber"; ?>" readonly>

                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <input id="gender" type="text" name="gender" value="<?php echo "$gender"; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <h1 style="font-size: 19px;font-weight:bold;color:#006837;">Address</h1>
                    <div class="addresss" style="border:thick solid #006837;border-width:2px;border-radius:5px;padding-bottom:5px;margin-right:5px;">

                        <div class="form-row">
                            <div class="form-group" style="margin-right:50px;">
                                <label>Street Number</label>
                                <input id="streetNumber" name="streetNumber" type="text" value="<?php echo "$streetNumber"; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Address Line 01</label>
                                <input id="aline1" name="addressLine01" type="text" value="<?php echo "$addressLine01"; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group" style="margin-right:50px;">
                                <label>Address Line 02</label>
                                <input id="aline2" name="addressLine02" type="text" value="<?php echo "$addressLine02"; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>City</label>
                                <input id="city" name="city" type="text" value="<?php echo "$city"; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group" style="margin-right:455px;">
                                <label>Username</label>
                                <input id="aline2" name="addressLine02" type="text" value="<?php echo "$email"; ?>" readonly>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>


    </div>




</body>

</html>