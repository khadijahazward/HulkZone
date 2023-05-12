<?php 
include 'authorization.php';
include '../connect.php';
?>



<?php

    include("setProfilePic.php");


    $query2 = "select * from emergencyContact where memberID = " . $row1['memberID'];
    
    $result2 = mysqli_query($conn, $query2);

if (mysqli_num_rows($result2) == 1) {
    $row2 = mysqli_fetch_assoc($result2);

    //if the data is already present in the database, the fields will be loaded by the information
    echo '<script>window.onload = function() {setUserData("' . $row2['contactName'] . '", "' . $row2['relationship'] . '", "' . $row2['telephone'] . '", "' . $row2['streetNumber'] . '", "' . $row2['addressLine1'] . '", "' . $row2['addressLine2'] . '", "' . $row2['city'] . '");}</script>';
}
?>

<script>
    function setUserData(name, relation, num, st, aline1, aline2, city) {
            document.getElementById("name").value = name;
            document.getElementById("num").value = num.toString().padStart(10, '0'); //adding 0 at the beginning
            document.getElementById("relation").value = relation;
            document.getElementById("st").value = st;
            document.getElementById("aline1").value = aline1;
            document.getElementById("aline2").value = aline2;
            document.getElementById("city").value = city;
    }


    function enableInput() {
        document.getElementById("name").removeAttribute("disabled");
        document.getElementById("num").removeAttribute("disabled");
        document.getElementById("relation").removeAttribute("disabled");
        document.getElementById("st").removeAttribute("disabled");
        document.getElementById("aline1").removeAttribute("disabled");
        document.getElementById("aline2").removeAttribute("disabled");
        document.getElementById("city").removeAttribute("disabled");

        document.getElementById("btnSubmit").style.display = "block";
        document.getElementById("btnEnable").style.display = "none";
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Contact | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/emergencyContact.css">
    <link rel="icon" type="image/png" href="../asset/images/gymLogo.png"/>
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
                    <div class="notification-bell">
                        <?php include("notifications.php"); ?>
                    </div>
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
                        <form method="post" action="updateEmergencyContact.php">

                        <p style="font-weight:bolder; font-size: 30px; color: green; margin-top: 15px; margin-left: 30px;">Emergency Contact</p>

                        <div class="form-row">
                            <div class="form-group" style="margin-right:50px;">
                                <label>Name of the Person </label>
                                <input id="name" type="text" name="name" required disabled>
                            </div>

                            <div class="form-group">
                                <label>Phone Number of the Person</label> 
                                <input id="num" type="text" name="num"required disabled>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label>How is He or She Related to you</label>
                                <input id="relation" type="text" name="relation" required disabled>
                            </div>
                        </div>

                            <div class="form-row" style="font-size: 20px; margin-left: 20px;">ADDRESS OF THE PERSON</div>

                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;">
                                    <label>Street Number </label>
                                    <input id="st" type="text" name="st"  disabled>
                                </div>

                                <div class="form-group">
                                    <label>Address Line 01</label> 
                                    <input id="aline1" type="text" name="aline1" disabled>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;">
                                    <label>Address Line 02 </label>
                                    <input id="aline2" type="text" name="aline2"  disabled>
                                </div>

                                <div class="form-group">
                                    <label>City</label> 
                                    <input id="city" type="text" name="city" disabled>
                                </div>
                            </div>

                            <button type="button" onclick="enableInput()" id="btnEnable">Edit Details</button>
                            <button type="submit" id="btnSubmit" style="display: none;">Update</button>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>


