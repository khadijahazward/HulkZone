<?php 
include 'authorization.php';
include '../connect.php';
?>


<?php
    $query = "SELECT * from user where userID = " . $_SESSION['userID'];
    $result = mysqli_query($conn, $query);

    $query1 = "SELECT * from member where userID = " . $_SESSION['userID'];
    $result1 = mysqli_query($conn, $query1);

    if (mysqli_num_rows($result) == 1 && mysqli_num_rows($result1) == 1) {
        $row = mysqli_fetch_assoc($result);
        $row1 = mysqli_fetch_assoc($result1);
    } else {
        echo '<script> window.alert("Error receiving data!");</script>';
    }

    if(isset($row['profilePhoto']) && $row['profilePhoto'] != NULL){
        //dp link from db
        $profilePictureLink = $row['profilePhoto'];
    }else{
        $profilePictureLink = '../member/profileImages/default.png';
    }

    $query2 = "select * from medicalForm where memberID = " . $row1['memberID'];
    
    $result2 = mysqli_query($conn, $query2);

    if (mysqli_num_rows($result2) == 1) {

        $row2 = mysqli_fetch_assoc($result2);

        //display data code
        $existing_conditions = explode(',', $row2['existing_conditions']);
        $isFatigue = $row2['isFatigue'];
        $isSmoke = $row2['isSmoke'];
        $isInjury = $row2['isInjury'];
        $allergies = explode(',', $row2['allergies']);
    }else{
        $existing_conditions = [];
        $allergies = [];
        $isFatigue = "";
        $isSmoke = "";
        $isInjury = "";
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/medicalForm.css">
    <script type="text/javascript" src="script/medicalForm.js"></script>
</head>
<body>
    <div class="container">
        <!--navigation bar-->
        <div class = "nav-bar">
            <?php
                include("navBar.php");
            ?>
        </div>
        <div class="body">
            <div class = "header">
                <div class="left"> 
                    MY PROFILE
                </div>
                <div class="right">
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>

            <div class="content">

                <div class="content-base" style="width: 100%;">
                    <!--the headings bar-->
                    <div class="menu">
                        <ul>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="changePw.php">Change Password</a></li>
                            <li><a href="medicalForm.php">Medical Form</a></li>
                            <li><a href="emergencyContact.php">Emergency Contact</a></li>
                        </ul>
                        
                    </div>
                    <!--the profile details-->
                    <div class="profile">
                    <form method="post" action="updateMedicalForm.php">

                        <p style="font-weight:bolder; font-size: 30px; color: green; margin-top: -15px; margin-left: 30px;">Medical Form</p>
                        
                        <p for="existing_conditions" class="heading">Have you had OR do you presently have any of the following conditions?</p>
                        
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-col-sub">
                                    <input type="checkbox" name="existing_conditions[]" value="Recent_operation" id="Recent_operation" disabled 
                                    <?php if (in_array('Recent_operation', $existing_conditions)) echo "checked"; ?>
                                    >
                                    <label>Recent operation</label>
                                </div>

                                <div class="form-col-sub">
                                    <input type="checkbox" name="existing_conditions[]" value="Lung_disease" id ="Lung_disease" disabled
                                    <?php if (in_array('Lung_disease', $existing_conditions)) echo "checked"; ?>> 
                                    <label>Lung disease</label>
                                </div>

                                <div class="form-col-sub">
                                    <input type="checkbox" name="existing_conditions[]" value="Fits" disabled id ="Fits"
                                    <?php if (in_array('Fits', $existing_conditions)) echo "checked"; ?>
                                    >
                                    <label>Fits</label>
                                </div>

                                <div class="form-col-sub">
                                    <input type="checkbox" name="existing_conditions[]" value="Seizures" disabled id = "Seizures"
                                    <?php if (in_array('Seizures', $existing_conditions)) echo "checked"; ?>
                                    > 
                                    <label>Seizures</label>
                                </div>

                                <div class="form-col-sub">
                                    <input type="checkbox" name="existing_conditions[]" value="Swelling_of_Ankles" disabled id = "Swelling_of_Ankles"
                                    <?php if (in_array('Swelling_of_Ankles', $existing_conditions)) echo "checked"; ?>> 
                                    <label>Swelling of Ankles</label>
                                </div>
                            </div>

                            <div class="form-col">
                                <div class="form-col-sub">
                                    <input type="checkbox" name="existing_conditions[]" value="Shortness_of_breath" disabled id = "Shortness_of_breath"
                                    <?php if (in_array('Shortness_of_breath', $existing_conditions)) echo "checked"; ?>
                                    > <label>Shortness of breath</label>
                                </div>

                                <div class="form-col-sub">
                                    <input type="checkbox" name="existing_conditions[]" value="Diabetes" disabled id = "Diabetes"
                                    <?php if (in_array('Diabetes', $existing_conditions)) echo "checked"; ?>
                                    > <label>Diabetes</label>
                                </div>

                                <div class="form-col-sub">
                                    <input type="checkbox" name="existing_conditions[]" value="High_cholesterol" disabled id = "High_cholesterol"
                                    <?php if (in_array('High_cholesterol', $existing_conditions)) echo "checked"; ?>
                                    > <label>High cholesterol</label>
                                </div>

                                <div class="form-col-sub">
                                    <input type="checkbox" name="existing_conditions[]" value="Chest_Pains" disabled id = "Chest_Pains"
                                    <?php if (in_array('Chest_Pains', $existing_conditions)) echo "checked"; ?>
                                    > <label>Chest Pains</label>
                                </div>

                                <div class="form-col-sub">
                                    <input type="checkbox" name="existing_conditions[]" value="Low_blood_pressure" disabled id="Low_blood_pressure"
                                    <?php if (in_array('Low_blood_pressure', $existing_conditions)) echo "checked"; ?>
                                    > <label>Low blood pressure</label>
                                </div>
                            </div>

                            <div class="form-col">
                                <div class="form-col-sub">
                                    <input type="checkbox" name="existing_conditions[]" value="Fainting_or_dizziness" disabled id="Fainting_or_dizziness"
                                    <?php if (in_array('Fainting_or_dizziness', $existing_conditions)) echo "checked"; ?>
                                    > <label>Fainting or dizziness </label>
                                </div>

                                <div class="form-col-sub">
                                    <input type="checkbox" name="existing_conditions[]" value="Heart_attack" disabled id="Heart_attack"
                                    <?php if (in_array('Heart_attack', $existing_conditions)) echo "checked"; ?>
                                    ><label>Heart attack</label>
                                </div>

                                <div class="form-col-sub">
                                    <input type="checkbox" name="existing_conditions[]" value="Orthopnea" disabled id = "Orthopnea"
                                    <?php if (in_array('Orthopnea', $existing_conditions)) echo "checked"; ?>
                                    > <label>Orthopnea</label>
                                </div>

                                <div class="form-col-sub">
                                    <input type="checkbox" name="existing_conditions[]" value="Palpitations" disabled id ="Palpitations"
                                    <?php if (in_array('Palpitations', $existing_conditions)) echo "checked"; ?>
                                    > <label>Palpitations </label>
                                </div>

                                <div class="form-col-sub">
                                    <input type="checkbox" name="existing_conditions[]" value="High_blood_pressure" disabled id ="High_blood_pressure"
                                    <?php if (in_array('High_blood_pressure', $existing_conditions)) echo "checked"; ?>
                                    > <label>High blood pressure</label>
                                </div>
                            </div>
                        </div>

                        <p for="isFatigue" class="heading">Can you currently walk 4 miles briskly without fatigue?</p>

                        <input type="radio" id="isFatigueY" name="isFatigue" value="Yes" <?php if ($isFatigue == 'Yes') echo 'checked'; ?> disabled>
                        <label for="yes">Yes</label><br>
                        
                        <input type="radio" id="isFatigueN" name="isFatigue" value="No" <?php if ($isFatigue == 'No') echo 'checked'; ?> disabled>
                        <label for="no">No</label>


                        <p for="isInjury" class="heading">Do you have injuries (bone or muscle disabilities) that may interfere with exercising??</p>

                        <input type="radio" id="isInjuryY" name="isInjury" value="Yes" <?php if ($isInjury == 'Yes') echo 'checked'; ?> disabled>
                        <label for="yes">Yes</label><br>
                        
                        <input type="radio" id="isInjuryN" name="isInjury" value="No"  <?php if ($isInjury == 'No') echo 'checked'; ?> disabled>
                        <label for="no">No</label>


                        <p for="isSmoke" class="heading">Do you Smoke?</p>

                        <input type="radio" id="isSmokeY" name="isSmoke" value="Yes" <?php if ($isSmoke == 'Yes') echo 'checked'; ?> disabled>
                        <label for="yes">Yes</label><br>
                        
                        <input type="radio" id="isSmokeN" name="isSmoke" value="No"  <?php if ($isSmoke == 'No') echo 'checked'; ?> disabled>
                        <label for="no">No</label>

                        <p for="allergies" class="heading">Do you Have any Allergies? </p>

                        <div class="form-row">
                                <div class="form-row-sub" style="width: 25%;">
                                <input type="checkbox" name="allergies[]" value="food" disabled id="food"
                                <?php if (in_array('food', $allergies)) echo "checked"; ?>>
                                <label>Food</label>
                                </div>

                                <div class="form-row-sub" style="width: 25%;">
                                <input type="checkbox" name="allergies[]" value="medi" disabled id="medi"
                                <?php if (in_array('medi', $allergies)) echo "checked"; ?>>
                                <label>Medications</label>
                                </div>

                                <div class="form-row-sub" style="width: 25%;">
                                <input type="checkbox" name="allergies[]" value="env" disabled id="env"
                                <?php if (in_array('env', $allergies)) echo "checked"; ?>>
                                <label>Environmental</label>
                                </div>

                                <div class="form-row-sub" style="width: 25%;">
                                <input type="checkbox" name="allergies[]" value="other" disabled id="other"
                                <?php if (in_array('other', $allergies)) echo "checked"; ?>>
                                <label>Other</label>
                                </div>
                        </div>

                        <button type="button" onclick="enableInput()" id="btnEnable" style="float: right; margin:13px;">Edit Response</button>
                        <button type="submit" id="btnSubmit" style="display: none;float: right; margin:13px;">Update</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>