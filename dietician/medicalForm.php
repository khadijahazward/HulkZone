<?php

    include 'connect.php';
    
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member's Medical Form</title>
    <link href="Style/medicalForm.css" rel="stylesheet">
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
                <img src="Images/Profile.png" alt="my profile" class="myProfile">
            </div>
        </div>

        <div class="main">
            <div class="profileCard">
                <img src="Images/Member.png" alt="Member's Profile Picture" class="profileCardPic">
                <div class="intro">
                    <p style="font-weight: 700; font-size: 20px;">Kaveesha Gunawardana</p>
                    <p style="font-weight: 400; font-size: 15px;">Member</p>
                </div>
                <div class="details">
                    <p style="font-weight: 500; font-size: 17px;">Status - Active</p>
                    <p style="font-weight: 500; font-size: 17px;">Joined Date - 02/12/2022</p>
                    <p style="font-weight: 500; font-size: 17px;">Member ID - 14</p>
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
                    <form>
                        <table>
                            <tr>
                                <td class="question">
                                    <label for="conditions">Have you had OR do you presently have any of the following
                                        conditions?</label><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table class="checkboxs">
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="conditions" name="conditions"
                                                    value="recentOperation">
                                                <label for="conditions">Recent operation</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="conditions" name="conditions"
                                                    value="shortnessOfBreath">
                                                <label for="conditions">Shortness of breath</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="conditions" name="conditions"
                                                    value="faintingOrDizziness">
                                                <label for="conditions">Fainting or dizziness</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="conditions" name="conditions"
                                                    value="lungeDisease">
                                                <label for="conditions">Lunge disease</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="conditions" name="conditions"
                                                    value="diabets">
                                                <label for="conditions">Diabets</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="conditions" name="conditions"
                                                    value="heartAttact">
                                                <label for="conditions">Heart attack</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="conditions" name="conditions" value="fits">
                                                <label for="conditions">Fits</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="conditions" name="conditions"
                                                    value="highCholesterol">
                                                <label for="conditions">High cholesterol</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="conditions" name="conditions"
                                                    value="orthopnea">
                                                <label for="conditions">Orthopnea</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="conditions" name="conditions"
                                                    value="seizures">
                                                <label for="conditions">Seizures</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="conditions" name="conditions"
                                                    value="chestPains">
                                                <label for="conditions">Chest Pains</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="conditions" name="conditions"
                                                    value="palpitation">
                                                <label for="conditions">Palpitation</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="conditions" name="conditions"
                                                    value="swellingOfAnkles">
                                                <label for="conditions">Swelling of Ankles</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="conditions" name="conditions"
                                                    value="lowBloodPressure">
                                                <label for="conditions">Low blood pressure</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="conditions" name="conditions"
                                                    value="highBloodPressure">
                                                <label for="conditions">High blood pressure</label>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="question">
                                    <label for="walkingDistance">Can you currently walk 4 miles briskly without
                                        fatigue?</label><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="radios">
                                    <input type="radio" id="walkingDistance" name="walkingDistance" value="yes">
                                    <label for="walkingDistance">Yes</label><br>
                                    <input type="radio" id="walkingDistance" name="walkingDistance" value="no">
                                    <label for="walkingDistance">No</label><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="question">
                                    <label for="injuries">Do you have injuries (bone or muscle disabilities) that may
                                        interfere with exercising?</label><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="radios">
                                    <input type="radio" id="injuries" name="injuries" value="yes">
                                    <label for="injuries">Yes</label><br>
                                    <input type="radio" id="injuries" name="injuries" value="no">
                                    <label for="injuries">No</label><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="question">
                                    <label for="smoke">Do you Smoke?</label><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="radios">
                                    <input type="radio" id="smoke" name="smoke" value="yes">
                                    <label for="smoke">Yes</label><br>
                                    <input type="radio" id="smoke" name="smoke" value="no">
                                    <label for="smoke">No</label><br>
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
                                                <input type="checkbox" id="allergies" name="allergies" value="food">
                                                <label for="allergies">Food</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="allergies" name="allergies"
                                                    value="medications">
                                                <label for="allergies">Medications</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="allergies" name="allergies"
                                                    value="environmental">
                                                <label for="allergies">Environmental</label>
                                            </td>
                                            <td>
                                                <input type="checkbox" id="allergies" name="allergies" value="other">
                                                <label for="allergies">other</label>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <button type="button" onclick="window.location.href='../Edit Profile/editProfile.php';"
                        class="backBtn">Update
                        Profile</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>