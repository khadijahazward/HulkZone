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
?>

<script>
function setUserData(fName, lName, nic, contactNumber, gender, dob, plan, height, weight, street, aline1, aline2,
city) {
    document.getElementById("fname").value = fName;
    document.getElementById("lname").value = lName;
    document.getElementById("nic").value = nic;
    document.getElementById("number").value = contactNumber;
    document.getElementById("gender").value = gender;
    document.getElementById("dob").value = dob;
    document.getElementById("paymentPlan").value = plan;
    document.getElementById("height").value = height;
    document.getElementById("weight").value = weight;
    document.getElementById("sNumber").value = street;
    document.getElementById("aline1").value = aline1;
    document.getElementById("aline2").value = aline2;
    document.getElementById("city").value = city;
}


function enableInput() {
    document.getElementById("fname").removeAttribute("disabled");
    document.getElementById("lname").removeAttribute("disabled");
    document.getElementById("nic").removeAttribute("disabled");
    document.getElementById("number").removeAttribute("disabled");
    document.getElementById("gender").removeAttribute("disabled");
    document.getElementById("dob").removeAttribute("disabled");
    document.getElementById("paymentPlan").removeAttribute("disabled");
    document.getElementById("height").removeAttribute("disabled");
    document.getElementById("weight").removeAttribute("disabled");
    document.getElementById("sNumber").removeAttribute("disabled");
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
    <title>Profile | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/profile.css">
</head>

<body>
    <div class="container">
        <!--navigation bar-->
        <div class="nav-bar">
            <div class="line-heading">
                <div class="images"><img src="..\asset\images\gymLogo.png" alt="Gym Logo" class="gymLogo"></div>
                <div class="option">HULK ZONE</div>
            </div>

            <hr>

            <div class="line">
                <a href="../member/dashboard.php">
                    <div class="nav-font">Dashboard</div>
                </a>
            </div>

            <hr>

            <div class="line">
                <a href="../member/profile.php">
                    <div class="nav-font">My Profile</div>
                </a>
            </div>

            <hr>

            <div class="line">
<<<<<<< HEAD
                <a href="../member/services.php">
                    <div class="nav-font">Services</div>
                </a>
=======
                <a href="../member/services.php"><div class="nav-font">Services</div></a>
            </div>
            
            <hr>

            <div class="line">
                <a href="../member/team.php"><div class="nav-font">Team</div></a>
>>>>>>> 3c08d8b920fadb34c438be6c5be2b0748a6e4b4a
            </div>

            <hr>

            <div class="line">
                <a href="">
                    <div class="nav-font">Team</div>
                </a>
            </div>

            <hr>

            <div class="line">
                <a href="">
                    <div class="nav-font">Work Out Plan</div>
                </a>
            </div>

            <hr>

            <div class="line">
                <a href="">
                    <div class="nav-font">Diet Plan</div>
                </a>
            </div>

            <hr>

            <div class="line">
                <a href="">
                    <div class="nav-font">Chat</div>
                </a>
            </div>

            <hr>

            <div class="line">
                <a href="">
                    <div class="nav-font">Payments</div>
                </a>
            </div>

            <hr>

            <div class="line">
                <a href="">
                    <div class="nav-font">Appointments</div>
                </a>
            </div>

            <hr>

            <div class="line">
                <a href="../member/complaint.php">
                    <div class="nav-font">Complaints</div>
                </a>
            </div>

            <hr>

            <div class="line">
                <a href="../home/logout.php">
                    <div class="nav-font">Log Out</div>
                </a>
            </div>

            <hr>
        </div>
        <div class="body">
            <div class="header">
                <div class="left">
                    MY PROFILE
                </div>
                <div class="right">
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px"
                        style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">

                <!--profile pic side-->
                <div class="edit-profile">
                    <div>
                        <!--dp-->
                        <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="200px" height="200px">
                    </div>
                    <div>
                        <?php 
                            echo $_SESSION["firstName"] ." " . $_SESSION["lastName"]; 
                        ?>
                        <br>
                        Member
                    </div>
                    <div style="margin: 30px;">
                        <!--changing profile pic-->
                        <button class="open-button" onclick="openForm()">Edit Profile</button>

                        <div id="myForm" class="form-popup">

                            <form action="../member/updatePic.php" class="form-container" method="post"
                                enctype="multipart/form-data">
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
                    <div style="margin: 20px;">
                        <?php
                            echo "Status: ";

                            if($row["statuses"] == 1){
                                echo "ACTIVE";
                            }else{
                                echo "INACTIVE";
                            }

                            echo "<br>";

                            echo "Joined Date: ";
                            echo $row["created_at"];

                        ?>
                    </div>
                </div>
                <div class="content-base">
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
                        <form method="post" action="updateProfile.php">
                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;">
                                    <label>First name </label>
                                    <input id="fname" type="text" name="fname" required disabled>
                                </div>

                                <div class="form-group">
                                    <label>Last name</label>
                                    <input id="lname" type="text" name="lname" required disabled>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;">
                                    <label>NIC</label><span id="error-message"
                                        style="font-size: 10px; color: red;"></span>
                                    <input id="nic" type="text" name="nic" required disabled onblur="validateNIC()">
                                    <script>
                                    function validateNIC() {
                                        var nic = document.getElementById("nic").value;
                                        var errorMessage = document.getElementById("error-message");
                                        const pattern2 = /^\d{9}V$/;
                                        const pattern1 = /^\d{12}$/;
                                        if (nic === "") {
                                            errorMessage.innerHTML = " NIC must be filled out";
                                        } else if (pattern2.test(nic) || pattern1.test(nic)) {
                                            errorMessage.innerHTML = " ";
                                        } else {
                                            errorMessage.innerHTML = " Invalid NIC";
                                        }
                                    }
                                    </script>


                                </div>

                                <div class="form-group">
                                    <label>Date of Birth </label>
                                    <input id="dob" type="date" name="dob" min="1930-01-01" max="2004-12-31" required
                                        disabled>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;">
                                    <label>Phone Number</label><span id="error-msg"
                                        style="font-size: 10px; color: red;"></span>
                                    <input id="number" type="text" name="number" required disabled
                                        onblur="validateNum()">
                                    <script>
                                    function validateNum() {
                                        var number = document.getElementById("number").value;
                                        var errorMessage = document.getElementById("error-msg");
                                        if (number === "") {
                                            errorMessage.innerHTML = " Number must be filled out";
                                        } else if (number.length !== 10 || isNaN(number)) {
                                            errorMessage.innerHTML = " Invalid Number";
                                        } else {
                                            errorMessage.innerHTML = "";
                                        }
                                    }
                                    </script>
                                </div>

                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" id="gender" required disabled>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Payment Plan</label>
                                    <select name="paymentPlan" id="paymentPlan" required disabled>
                                        <option value="oneMonth">Month Package - Rs. 1000</option>
                                        <option value="threeMonth">Three Months Package - Rs. 2899</option>
                                        <option value="sixMonth">Six Months Package - Rs. 5599</option>
                                        <option value="twelveMonth">Twelve Months Package - Rs. 11000</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;">
                                    <label>Height (in Inches)</label>
                                    <input id="height" name="height" type="text" required disabled>
                                </div>

                                <div class="form-group">
                                    <label>Weight (in kilograms)</label>
                                    <input id="weight" name="weight" type="text" required disabled>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;">
                                    <label>Street Number</label>
                                    <input id="sNumber" name="sNumber" type="text" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Address Line 01</label>
                                    <input id="aline1" name="aline1" type="text" disabled>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;">
                                    <label>Address Line 02</label>
                                    <input id="aline2" name="aline2" type="text" disabled>
                                </div>

                                <div class="form-group">
                                    <label>City</label>
                                    <input id="city" name="city" type="text" disabled>
                                </div>
                            </div>
                            <button type="button" onclick="enableInput()" id="btnEnable"
                                style="float: right; margin:13px;">Update Profile</button>
                            <button type="submit" id="btnSubmit"
                                style="display: none;float: right; margin:13px;">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    window.onload = function() {
        //calling function
        setUserData(
            <?php
                echo "' " . 
                $row["fName"] . "', '" . 
                $row["lName"] . "', '" . 
                $row["NIC"] . "', '" . 
                $row["contactNumber"] .  "', '" . 
                $row["gender"]  . "', '" . 
                $row["dateOfBirth"]  . "', '" . 
                $row1["planType"]  . "', '" . 
                $row1["height"] .  "', '" . 
                $row1["weight"]  . "', '" . 
                $row["streetNumber"]  . "', '" . 
                $row["addressLine01"]  . "', '" . 
                $row["addressLine02"]  . "', '" . 
                $row["city"] ."'";

                ?>
        );
    }
    </script>
</body>

</html>