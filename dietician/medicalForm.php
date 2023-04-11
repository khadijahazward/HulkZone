<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

if(isset($_GET['view'])){
    $memberID = $_GET['view'];
}

$query1 = "SELECT * FROM member WHERE memberID = $memberID ";
$result1 = mysqli_query($conn, $query1);

if($result1){
    $row1 = mysqli_fetch_assoc($result1);
    $memberUserID = $row1['userID'];
}

$query3 = "SELECT * FROM user WHERE userID = $memberUserID "; 
$result3 = mysqli_query($conn, $query3);

if($result3){
    $row3 = mysqli_fetch_assoc($result3);
}

$query2 = "SELECT * FROM medicalForm WHERE memberID = $memberID ";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member's Medical Form</title>
    <link href="Style/medicalForm.css" rel="stylesheet">
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
                <img src="Images/Profile.png" alt="my profile" class="myProfile">
            </div>
        </div>

        <div class="main">
            <div class="profileCard">
                <img src="<?php echo $row3['profilePhoto'] ?>" alt="Member's Profile Picture" class="profileCardPic">
                <div class="intro">
                    <p style="font-weight: 700; font-size: 20px;">
                        <?php echo $row3['fName']." ".$row3['lName'] ?></p>
                    <p style="font-weight: 400; font-size: 15px;">Member</p>
                </div>
                <div class="details">
                    <p style="font-weight: 500; font-size: 17px;">Status -
                        <?php if($row3['statuses'] == 1){echo "Active";} else{echo "Inactive";}?></p>
                    <p style="font-weight: 500; font-size: 17px;">Joined Date - <?php echo $row3['created_at'] ?></p>
                    <p style="font-weight: 500; font-size: 17px;">Member ID - <?php echo $memberID ?></p>
                </div>
            </div>
            <div class="content">
                <div class="dateBar">
                    <div class="selector"></div>
                    <div class="dateRow">
                        <a href="memberProfile.php">Profile</a>
                        <a href="medicalForm.html" style="color: rgba(0, 104, 55, 1);">Medical
                            Form</a>
                    </div>
                </div>
                <div class="formArea">
                    <form method="POST"
                        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?new=<?php echo $memberID; ?>">
                        <table>
                            <tr>
                                <td class=" question">
                                    <label>Have you had OR do you presently have any of the following
                                        conditions?</label><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="checkboxs">
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="Recent_operation"
                                                    name="existing_conditions[]" value="Recent_operation"
                                                    <?php if (in_array('Recent_operation', $existing_conditions)) echo "checked"; ?>>
                                                <label for="existingConditions">Recent operation</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="Shortness_of_breath"
                                                    name="existing_conditions[]" value="Shortness_of_breath"
                                                    <?php if (in_array('Shortness_of_breath', $existing_conditions)) echo "checked"; ?>>
                                                <label for="existingConditions">Shortness of breath</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="Fainting_or_dizzines"
                                                    name="existing_conditions[]" value="Fainting_or_dizzines"
                                                    <?php if (in_array('Fainting_or_dizzines', $existing_conditions)) echo "checked"; ?>>
                                                <label for="existingConditions">Fainting or dizziness</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="Lunge_disease" name="existing_conditions[]"
                                                    value="Lunge_disease"
                                                    <?php if (in_array('Lunge_disease', $existing_conditions)) echo "checked"; ?>>
                                                <label for="existingConditions">Lunge disease</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="Diabets" name="existing_conditions[]"
                                                    value="Diabets"
                                                    <?php if (in_array('Diabets', $existing_conditions)) echo "checked"; ?>>
                                                <label for="existingConditions">Diabets</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="Heart_attack" name="existing_conditions[]"
                                                    value="Heart_attack"
                                                    <?php if (in_array('Heart_attack', $existing_conditions)) echo "checked"; ?>>
                                                <label for="existingConditions">Heart attack</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="Fits" name="existing_conditions[]"
                                                    value="Fits"
                                                    <?php if (in_array('Fits', $existing_conditions)) echo "checked"; ?>>
                                                <label for="existingConditions">Fits</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="High_cholesterol"
                                                    name="existing_conditions[]" value="High_cholesterol"
                                                    <?php if (in_array('High_cholesterol', $existing_conditions)) echo "checked"; ?>>
                                                <label for="existingConditions">High cholesterol</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="Orthopnea" name="existing_conditions[]"
                                                    value="Orthopnea"
                                                    <?php if (in_array('Orthopnea', $existing_conditions)) echo "checked"; ?>>
                                                <label for="existingConditions">Orthopnea</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="Seizures" name="existing_conditions[]"
                                                    value="Seizures"
                                                    <?php if (in_array('Seizures', $existing_conditions)) echo "checked"; ?>>
                                                <label for="existingConditions">Seizures</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="Chest_Pains" name="existing_conditions[]"
                                                    value="Chest_Pains"
                                                    <?php if (in_array('Chest_Pains', $existing_conditions)) echo "checked"; ?>>
                                                <label for="existingConditions">Chest Pains</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="Palpitation" name="existing_conditions[]"
                                                    value="Palpitation"
                                                    <?php if (in_array('Palpitation', $existing_conditions)) echo "checked"; ?>>
                                                <label for="existingConditions">Palpitation</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="Swelling_of_Ankles"
                                                    name="existing_conditions[]" value="Swelling_of_Ankles"
                                                    <?php if (in_array('Swelling_of_Ankles', $existing_conditions)) echo "checked"; ?>>
                                                <label for="existingConditions">Swelling of Ankles</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="Low_blood_pressure"
                                                    name="existing_conditions[]" value="Low_blood_pressure"
                                                    <?php if (in_array('Low_blood_pressure', $existing_conditions)) echo "checked"; ?>>
                                                <label for="existingConditions">Low blood pressure</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="High_blood_pressure"
                                                    name="existing_conditions[]" value="High_blood_pressure"
                                                    <?php if (in_array('High_blood_pressure', $existing_conditions)) echo "checked"; ?>>
                                                <label for="existingConditions">High blood pressure</label>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="question">
                                    <label for="isFatigue">Can you currently walk 4 miles briskly without
                                        fatigue?</label><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="radios">
                                    <input type="radio" id="isFatigue" name="isFatigue" value="Yes"
                                        <?php if ($isFatigue == 'Yes') echo 'checked'; ?>>
                                    <label for="isFatigue">Yes</label><br>
                                    <input type="radio" id="isFatigue" name="isFatigue" value="No"
                                        <?php if ($isFatigue == 'No') echo 'checked'; ?>>
                                    <label for="isFatigue">No</label><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="question">
                                    <label for="isInjury">Do you have injuries (bone or muscle disabilities) that may
                                        interfere with exercising?</label><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="radios">
                                    <input type="radio" id="isInjury" name="isInjury" value="Yes"
                                        <?php if ($isInjury == 'Yes') echo 'checked'; ?>>
                                    <label for="isInjury">Yes</label><br>
                                    <input type="radio" id="isInjury" name="isInjury" value="No"
                                        <?php if ($isInjury == 'No') echo 'checked'; ?>>
                                    <label for="isInjury">No</label><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="question">
                                    <label for="isSmoke">Do you Smoke?</label><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="radios">
                                    <input type="radio" id="isSmoke" name="isSmoke" value="Yes"
                                        <?php if ($isSmoke == 'Yes') echo 'checked'; ?>>
                                    <label for="isSmoke">Yes</label><br>
                                    <input type="radio" id="isSmoke" name="isSmoke" value="No"
                                        <?php if ($isSmoke == 'No') echo 'checked'; ?>>
                                    <label for="isSmoke">No</label><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="question">
                                    <label for="allergies">Do you Have any Allergies?</label><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="checkboxs">
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="Food" name="allergies[]" value="Food"
                                                    <?php if (in_array('food', $allergies)) echo "checked"; ?>>
                                                <label for="allergies">Food</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="Medications" name="allergies[]"
                                                    value="Medications"
                                                    <?php if (in_array('medi', $allergies)) echo "checked"; ?>>
                                                <label for="allergies">Medications</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="Environmental" name="allergies[]"
                                                    value="Environmental"
                                                    <?php if (in_array('env', $allergies)) echo "checked"; ?>>
                                                <label for="allergies">Environmental</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="allergies" name="Other" value="Other"
                                                    <?php if (in_array('other', $allergies)) echo "checked"; ?>>
                                                <label for="allergies">Other</label>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <button type="button" onclick="window.location.href='members.php';" class="backBtn"
                        style="width: 100px;">Back</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>