<?php
include('authorization.php');
//connect.php contains database connection details
include('../../HulkZone/connect.php');
include('notiCount.php');



// define form validation variables
$fNameErr = $lNameErr = $contactNumberErr = $stnumErr = "";
// check if the form has been submitted and update the details if necessary
if (isset($_POST['edit'])) {
    // get the user ID from the session
    $userID = $_SESSION['userID'];


    // retrieve the updated form data
    // $fName = $_POST['fName'];
    $fName = isset($_POST['fName']) ? $_POST['fName'] : '';
    //$lName = $_POST['lName'];
    $lName = isset($_POST['lName']) ? $_POST['lName'] : '';
    $contactNumber = isset($_POST['contactNumber']) ? $_POST['contactNumber'] : '';
    $streetNumber = isset($_POST['streetNumber']) ? $_POST['streetNumber'] : '';
    //$addressLine01 = $_POST['addressLine01'];
    $addressLine01 = isset($_POST['addressLine01']) ? $_POST['addressLine01'] : '';
    //$addressLine02 = $_POST['addressLine02'];
    $addressLine02 = isset($_POST['addressLine02']) ? $_POST['addressLine02'] : '';
    //$city = $_POST['city'];
    $city = isset($_POST['city']) ? $_POST['city'] : '';

    // validate form data
    if (empty($fName)) {
        $fNameErr = "First name is required";
    }
    if (empty($lName)) {
        $lNameErr = "Last name is required";
    }
    if (empty($contactNumber)) {
        $contactNumberErr = "Phone number is required";
    } else if (!preg_match('/^[0-9]{10}+$/', $_POST["contactNumber"])) {
        $contactNumberErr = "Enter Valid Phone Number";
    }




    // if all form fields are valid, update the database
    if (empty($fNameErr) && empty($lNameErr) && empty($contactNumberErr)) {



        //update query to update the details
        $query = "UPDATE user SET fName='$fName', lName='$lName',  
        contactNumber='$contactNumber', streetNumber='$streetNumber', 
        addressLine01='$addressLine01', addressLine02='$addressLine02', city='$city'WHERE userID='$userID' AND roles=0";

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
            color: #ffffff;
            padding-top: 10px;
        }

        .link {
            text-decoration: none;
        }

        .buttonS {
            cursor: pointer;
            height: 50px;
            margin-top: 30px;
        }

        .back:hover {
            background-color: #006837;
        }
    </style>

</head>

<body>
    <?php
    include('../admin/sideBar.php');
    include('setAdminProfilePic.php');
    ?>
    <div class="right">

        <div class="content">
            <div class="contentLeft">
                <p class="title">Admin Profile</p>
            </div>

            <div>
                <div class="notification" style="margin-left: 690px;">
                    <?php
                    include 'notifications.php';
                    ?>
                </div>
            </div>
            <div class="notiCount" style="padding-top: 7.5px;margin-left:730px;">
                <p><?php echo $count; ?></p>
            </div>


            <div class="contentMiddle" style="margin-left:30px;width: 120px;">
                <p class="myProfile">My Profile</p>
            </div>
            <div class="contentRight" style="margin-left: 0px;"><img src="<?php echo $profilePictureLink ?>" alt="AdminLogo" class="adminLogo"></div>
        </div>
        <div class="down" style="display:flex; flex-direction:row;">
            <div class="edit-profile">
                <div>
                    <!--dp-->
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="200px" height="200px">

                </div>
                <div>
                    <?php

                    echo "$fName";
                    ?>
                    <br>

                    Admin
                    <!--User Type-->
                </div>
                <div style="margin: 30px;">
                    <!--changing profile pic-->
                    <button class="open-button" onclick="openForm()">Choose Photo</button>

                    <div id="myForm" class="form-popup">

                        <form action="../admin/updateProfilePic.php" class="form-container" method="post" enctype="multipart/form-data">
                            <input type="file" name="image">
                            <br>
                            <button type="submit">Upload Image</button>
                            <button type="button" class="cancel" onclick="closeForm()">Close</button>
                        </form>
                    </div>
                    <script>
                        function openForm() {
                            document.getElementById("myForm").style.display = "block";
                        }

                        function closeForm() {
                            document.getElementById("myForm").style.display = "none";
                        }
                    </script>
                </div>

            </div>

            <div class="content-base">
                <!--the headings bar-->

                <!--the profile details-->
                <div>
                    <div class="profile">
                        <form method="post" id="form-id" onsubmit="return confirmSubmission()">

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

                    </div>
                    <div><button class="buttonS" name="edit" style="margin-left:670px;background-color:#FF9F29;border:none;width: 200px;border-radius:5px;color:#ffffff;font-size:18px;">
                            Save</button></div>



                    </form>
                </div>
                <?php
//connect.php contains database connection details
include('../../HulkZone/connect.php');

// define form validation variables
$oldPwErr = $newPwErr = $cPwErr = "";

// check if the form has been submitted and update the details if necessary
if (isset($_POST['changepw'])) {
    // start the session
   
    // get the user ID from the session
    $userID = $_SESSION['userID'];

    // retrieve the submitted form data
    $oldPw = isset($_POST['oldPw']) ? $_POST['oldPw'] : '';
    $newPw = isset($_POST['newPw']) ? $_POST['newPw'] : '';
    $cPw = isset($_POST['cPw']) ? $_POST['cPw'] : '';

    // validate form data
    if (empty($oldPw)) {
        $oldPwErr = "Old Password is required";
    }

    if (empty($newPw)) {
        $newPwErr = "New Password is required";
    } else if (strlen($newPw) < 8) {
        $newPwErr = "Password must be at least 8 characters long.";
    } else {
        $numberCheck = preg_match('@[0-9]@', $newPw); //atleast one number
        $specialCharsCheck = preg_match('@[^\w]@', $newPw); //atleast one special character
        $letterCheck = preg_match('/[a-zA-Z]/', $_POST['newPw']);//atleast one lower case or upper case letter
        if (!$numberCheck) {
            $newPwErr = "Password must contain at least one number.";
        } else if (!$specialCharsCheck) {
            $newPwErr = "Password must contain at least one special character.";
        }else if(!$letterCheck ){
            $newPwErr = "Password must contain at least one letter  .";
        }
    }
    
    if (empty($cPw)) {
        $cPwErr = "Confirm Password is required";
    } else if($cPw != $newPw){
        $cPwErr="Passwords do not match";
    }

    $sql = "SELECT pw from USER where userID=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $dbPassword = $row['pw'];
        // check if old password matches
        if (empty($oldPwErr)&&empty($newPwErr)&&empty($cPwErr)) {
            if (password_verify($oldPw, $dbPassword)) {
                // hash new password
                $hashedNewPw = password_hash($newPw, PASSWORD_DEFAULT);
                // update new password in the database
                $sql = "UPDATE user SET pw = ? WHERE userID = ?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "si", $hashedNewPw, $userID);
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    echo "<script> alert('Updated Successfully!'); window.location='viewProfile.php'; </script>";
                } else {
                    echo "<script> alert('Error updating data!'); window.location='viewProfile.php'; </script>";
                }
            } else {
                $oldPwErr = "Old password is wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>



                <div class="profile">
                    <form method="post" id="form-id" onsubmit="return confirmSubmission()">

                        <div class="style" style="display:flex;flex-direction:row;margin-top:20px;margin-left:140px;">
                            <label for="" style="margin-top: 12px;">Old Password</label>
                            <input type="password" name="oldPw" style="width:320px;margin-left:120px;" maxlength="15">
                            <span class="error">* <?php echo $oldPwErr; ?></span>
                        </div>
                        <div class="style" style="display:flex;flex-direction:row;margin-top:20px;margin-left:140px;">
                            <label for="" style="margin-top: 12px;">New Password</label>
                            <input type="password" name="newPw" style="width:320px;margin-left:110px;" maxlength="15">
                            <span class="error">* <?php echo $newPwErr; ?></span>
                        </div>

                        <div class="style" style="display:flex;flex-direction:row;margin-top:20px;margin-left:140px;">
                            <label for="" style="margin-top: 12px;">Confirm Password </label>
                            <input type="password" name="cPw" style="width:320px;margin-left:85px;">
                            <span class="error">* <?php echo  $cPwErr; ?></span>

                        </div>
                        <div><button class="buttonS" name="changepw" style="margin-left:670px;background-color:#FF9F29;border:none;width: 200px;border-radius:5px;color:#ffffff;font-size:18px;">
                                Change Password</button></div>
                        <a href="viewProfile.php" class="link">
                            <div class="back"><span> Back</span></div>
                        </a>


                    </form>
                </div>
            </div>
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