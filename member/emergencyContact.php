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
            document.getElementById("num").value = num;
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
    <title>DashBoard | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/emergencyContact.css">
</head>
<body>
    <div class="container">
        <!--navigation bar-->
        <div class = "nav-bar">
            <div class="line-heading">
                <div class="images"><img src="..\asset\images\gymLogo.png" alt="Gym Logo" class="gymLogo"></div>
                <div class="option">HULK ZONE</div>
            </div>
            
            <hr>

            <div class="line">
            <a href="../member/dashboard.php"><div class="nav-font">Dashboard</div></a>
            </div>

            <hr>

            <div class="line">
            <a href="../member/profile.php"><div class="nav-font">My Profile</div></a>
            </div>

            <hr>

            <div class="line">
                <a href="../member/services.php"><div class="nav-font">Services</div></a>
            </div>
            
            <hr>

            <div class="line">
                <a href="../member/team.php"><div class="nav-font">Team</div></a>
            </div>

            <hr>

            <div class="line">
                <a href="../member/workout.php"><div class="nav-font">Work Out Plan</div></a>
            </div>

            <hr>

            <div class="line">
                <a href="../member/dietplan.php"><div class="nav-font">Diet Plan</div></a>
            </div>

            <hr>

            <div class="line">
                <a href="../member/chat.php"><div class="nav-font">Chat</div></a>
            </div>

            <hr>
            
            <div class="line">
                <a href="../member/payment.php"><div class="nav-font">Payments</div></a>
            </div>

            <hr>

            <div class="line">
                <a href="../member/appointment.php"><div class="nav-font">Appointments</div></a>
            </div>

            <hr>

            <div class="line">
                <a href="../member/complaint.php"><div class="nav-font">Complaints</div></a>
            </div>
            
            <hr>
            
            <div class="line">
                <a href="../home/logout.php"><div class="nav-font">Log Out</div></a>
            </div>

            <hr>
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


