<?php
include('authorization.php');
//connect.php contains database connection details
include('../../HulkZone/connect.php');

// define form validation variables
$fNameErr = $lNameErr = $contactNumberErr = $pwErr = $confirmPasswordErr = "";
// check if the form has been submitted and update the details if necessary
if (isset($_POST['edit'])) {
    // get the user ID from the session
    $userID = $_SESSION['userID'];


    // retrieve the updated form data
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $contactNumber = $_POST['contactNumber'];
    $streetNumber = $_POST['streetNumber'];
    $addressLine01 = $_POST['addressLine01'];
    $addressLine02 = $_POST['addressLine02'];
    $city = $_POST['city'];
    $pw = $_POST['pw'];
    $confirmPassword = $_POST['confirmPassword'];
    // validate form data
    if (empty($fName)) {
        $fNameErr = "First name is required";
    }
    if (empty($lName)) {
        $lNameErr = "Last name is required";
    }
    if (empty($contactNumber)) {
        $contactNumberErr = "Phone number is required";
    }
    //password validation
    $numberCheck = preg_match('@[0-9]@', $pw); //atleast one number
    $specialCharsCheck = preg_match('@[^\w]@', $pw); //atleast one special character

    if (empty($pw)) {
        $pwErr = "Password is required";
    } else if (strlen($pw) < 8) {
        $pwErr = "Password must be at least 8 characters long.";
    } else if (!$numberCheck) {
        $pwErr = "Password must contain at least one number.";
    } else if (!$specialCharsCheck) {
        $pwErr = "Password must contain at least one special character.";
    }

    if (empty($confirmPassword)) {
        $confirmPasswordErr = "Confirm password is required";
    } elseif ($pw != $confirmPassword) {
        $confirmPasswordErr = "Passwords do not match";
    }

    // if all form fields are valid, update the database
    if (empty($fNameErr) && empty($lNameErr) && empty($contactNumberErr) && empty($pwErr) && empty($confirmPasswordErr)) {

        // hash the password
        $hashedPassword = password_hash($pw, PASSWORD_DEFAULT);

        //update query to update the details
        $query = "UPDATE user SET fName='$fName', lName='$lName',  
        contactNumber='$contactNumber', streetNumber='$streetNumber', 
        addressLine01='$addressLine01', addressLine02='$addressLine02', city='$city', pw='$hashedPassword' WHERE userID='$userID' AND roles=0";

        $result = mysqli_query($conn, $query);
        if ($result) {
            //echo "<script> alert('Updated Successfully!'); </script>";
            //header("Location: viewProfile.php");
            echo "<script> alert('Updated Successfully!'); window.location='viewProfile.php'; </script>";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
} else {
    // get the user ID from the session
    $userID = $_SESSION['userID'];

    // retrieve the details of the user from the user table
    $query = "SELECT * FROM user WHERE userID='$userID' AND roles=0";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // store the details in variables
    $fName = $user['fName'];
    $lName = $user['lName'];
    $NIC = $user['NIC'];
    $gender = $user['gender'];
    $dateOfBirth = $user['dateOfBirth'];
    $contactNumber = $user['contactNumber'];
    $streetNumber = $user['streetNumber'];
    $addressLine01 = $user['addressLine01'];
    $addressLine02 = $user['addressLine02'];
    $city = $user['city'];
    $pw = $user['pw'];
    $email = $user['email'];
}

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
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .error {
            color: red;
            font-size: 10px;
        }

        .back {
            margin-top: 50px;
            margin-left: 670px;
            margin-bottom: 30px;
            border: none;
            outline: none;
            height: 50px;
            width: 200px;
            background: #FF9F29;
            font-size: 18px;
            border-radius: 5px;
            font-weight: normal;
            text-align: center;
            height: 40px;
            margin-top: 8px;
            color:#ffffff;
            padding-top: 10px;
        }

        .link{
            text-decoration: none;
        }

        .buttonS{
            cursor: pointer;
            height: 50px;
            margin-top: 30px;
        }
        .back:hover{
            background-color: #006837;
        }
    </style>

</head>

<body>
    <?php
    include('../admin/sideBar.php');
    ?>
    <div class="right">

        <div class="content">
            <div class="contentLeft">
                <p class="title">Admin Profile</p>
            </div>
            <div class="contentMiddle">
                <p class="myProfile">My Profile</p>
            </div>
            <div class="contentRight"><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
        </div>
        <div class="down" style="display:flex; flex-direction:row;">
            <div class="edit-profile" ">
                    <div>
                        <!--dp-->
                        <img src=" ../../HulkZone/asset/images/adminProfile.png" alt="dp" width="1200px" height="1200px">
            </div>
            <div>
                <?php

                echo "$fName";
                ?>
                <br>

                Admin<!--User Type-->
            </div>
            <div style="margin: 30px;">
                <!--changing profile pic-->
                <a href="editProfile.php"><button class="open-button" style="height: 35px;border-radius:5px;">Choose Photo</button></a>
            </div>

        </div>

        <div class="content-base">
            <!--the headings bar-->

            <!--the profile details-->
            <div class="profile">
                <form method="post" id="form-id" onsubmit="">

                    <div class="style" style="display:flex;flex-direction:row;margin-top:20px;margin-left:140px;">
                        <label for="" style="margin-top: 12px;">First Name</label>
                        <input type="text" name="fName" value="<?php echo "$fName" ?>" style="width:320px;margin-left:140px;">
                        <span class="error">* <?php echo $fNameErr; ?></span>

                    </div>

                    <div class="style" style="display:flex;flex-direction:row;margin-top:20px;margin-left:140px;">
                        <label for="" style="margin-top: 12px;">Last Name</label>
                        <input type="text" name="lName" value="<?php echo "$lName" ?>" style="width:320px;margin-left:140px;">
                        <span class="error">* <?php echo $lNameErr; ?></span>
                    </div>

                    <div class="style" style="display:flex;flex-direction:row;margin-top:20px;margin-left:140px;">
                        <label for="" style="margin-top: 12px;">Phone Number</label>
                        <input type="text" name="contactNumber" value="<?php echo "$contactNumber"; ?>" style="width:320px;margin-left:108px;">
                        <span class="error">* <?php echo $contactNumberErr; ?></span>
                    </div>

                    <div class="style" style="display:flex;flex-direction:row;margin-top:20px;margin-left:140px;">
                        <label for="" style="margin-top: 12px;">Street Number</label>
                        <input type="text" name="streetNumber" value="<?php echo "$streetNumber"; ?>" style="width:320px;margin-left:110px;">
                    </div>

                    <div class="style" style="display:flex;flex-direction:row;margin-top:20px;margin-left:140px;">
                        <label for="" style="margin-top: 12px;">Address LIne 01</label>
                        <input type="text" name="addressLine01" value="<?php echo "$addressLine01"; ?>" style="width:320px;margin-left:100px;">
                    </div>
                    <div class="style" style="display:flex;flex-direction:row;margin-top:20px;margin-left:140px;">
                        <label for="" style="margin-top: 12px;">Address LIne 02</label>
                        <input type="text" name="addressLine02" value="<?php echo "$addressLine02"; ?>" style="width:320px;margin-left:100px;">
                    </div>

                    <div class="style" style="display:flex;flex-direction:row;margin-top:20px;margin-left:140px;">
                        <label for="" style="margin-top: 12px;">City</label>
                        <input type="text" name="city" value="<?php echo "$city"; ?>" style="width:320px;margin-left:192px;">
                    </div>

                    <div class="style" style="display:flex;flex-direction:row;margin-top:20px;margin-left:140px;">
                        <label for="" style="margin-top: 12px;">Password</label>
                        <input type="password" name="pw" style="width:320px;margin-left:149px;" maxlength="15">
                        <span class="error">* <?php echo $pwErr; ?></span>
                    </div>

                    <div class="style" style="display:flex;flex-direction:row;margin-top:20px;margin-left:140px;">
                        <label for="" style="margin-top: 12px;">Confirm Password </label>
                        <input type="password" name="confirmPassword" style="width:320px;margin-left:85px;">
                        <span class="error">* <?php echo  $confirmPasswordErr; ?></span>

                    </div>
                    <div><button class="buttonS" name="edit" style="margin-left:670px;">Save</button></div>
                    <a href="viewProfile.php"  class="link"><div class="back"><span> Back</span></div></a>
                    

                </form>
            </div>
            <script>
                //client side validation
                // get the password and confirm password fields
                var password = document.getElementById("pw");
                var confirmPassword = document.getElementById("confirmPassword");

                // add an event listener to check the passwords on form submit
                document.getElementById("form-id").addEventListener("submit", function(event) {
                    if (password.value != confirmPassword.value) {
                        alert("Passwords do not match. Please try again.");
                        event.preventDefault();
                    }
                });
            </script>
            <script>
                function confirmSubmission() {
                    if (confirm("Are you sure you want to save the changes?")) {
                        return true;
                    } else {
                        return false;
                    }
                }
            </script>
        </div>


    </div>




</body>

</html>