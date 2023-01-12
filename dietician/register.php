<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | HulkZone</title>
    <link rel="stylesheet" href="../dietician/style/register.css">
    <link rel="stylesheet" href="../dietician/style/general.css">

</head>

<body>

    <?php
    include '../connect.php';
    $fnameErr = $lnameErr = $dobErr = $genErr = $numErr = $NICErr = $qualiErr = $expErr = "";
    $stErr = $ad1Err = $citErr = $hgErr = $wiErr = $emErr = $pw1Err = $pw2Err = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        if (empty($_POST["fname"])) {
            $fnameErr = "First Name is required";
        }
       
        if (empty($_POST["lname"])) {
            $lnameErr = "Last Name is required";
        }
       
        if (empty($_POST["dob"])) {
            $dobErr = "Date of Birth is required";
        }
       
        if (empty($_POST["gender"])) {
            $genErr = "Gender is required";
        }

        if (empty($_POST["qualification"])) {
            $qualiErr = "Qualification is required";
        }

        //checking length = 10
        if (empty($_POST["contactnumber"])) {
            $numErr = "Phone number is required";
        }else if(!preg_match('/^[0-9]{10}+$/', $_POST["contactnumber"])){
            $numErr = "Enter Valid Phone Number";
        }

        //checking for old and new format
        if (empty($_POST["nic"])) {
            $NICErr = "NIC is required";
        }else if( !( preg_match('/^[0-9]{9}[V]+$/', $_POST["nic"]) || preg_match('/^[0-9]{12}+$/', $_POST["nic"]) ) ){
            $NICErr = "Enter Valid NIC";
        }

        //email validation
        if (empty($_POST["email"])) {
            $emErr = "Email is required";
        }else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $emErr = "Enter Valid Email";
        }

        //password validation
        $numberCheck = preg_match('@[0-9]@', $_POST['pass1']); //atleast one number
        $specialCharsCheck = preg_match('@[^\w]@', $_POST['pass1']); //atleast one special char

        if (empty($_POST["pass1"])) {
            $pw1Err = "Password is required";
        }else if(strlen($_POST['pass1']) < 8 || !$numberCheck || !$specialCharsCheck){
            $pw1Err = "password should be minimum 8 characters";
        }

        if (empty($_POST["pass2"])) {
            $pw2Err = "Confirm Password is required";
        }
    }
?>

    <!--navigation bar-->
    <div class="nav-bar">
        <div class="left">
            <img src="../dietician/image/gymLogo.png" class="logo-photo" alt="logo">
        </div>
        <div class="right">
            <div><a href="login.php"><input type="button" value="LOGIN"></a></div>
            <div><a href="register.php"><input type="button" value="REGISTER" style="background-color: black;"></a>
            </div>
        </div>
    </div>

    <!--content-->
    <div class="content">

        <!--Image-->
        <div class="content-left">
            <img src="../dietician/image/bg.png" alt="register">
        </div>

        <div class="content-right">
            <div class="text">
                <h2 style="margin-bottom: 1px;">Register To Become A Dietician</h2>

                <p>We Need Your Details To Complete Your Registration </p>
            </div>

            <div class="content-right-sub">

                <form id="regForm" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">

                    <div class="form-row">
                        <div class="form-group" style="margin-right:50px;">
                            <label>First name <span class="error">* <?php echo $fnameErr; ?></span></label>
                            <input id="fname" type="text" name="fname" value="<?php echo $_POST['fname'] ?? ''; ?>">
                        </div>

                        <div class="form-group">
                            <label>Last name<span class="error">* <?php echo $lnameErr; ?></span></label>
                            <input id="lname" type="text" name="lname" value="<?php echo $_POST['lname'] ?? ''; ?>">
                        </div>
                    </div>

                    <div class=" form-row">
                        <div class="form-group" style="margin-right:50px;">
                            <label>Date of Birth <span class="error">* <?php echo $dobErr; ?></span></label>
                            <input id="dob" name="dob" type="date" min="1930-01-01" max="2021-12-31"
                                value="<?php echo $_POST['dob'] ?? ''; ?>">
                        </div>

                        <div class="form-group">
                            <label>Gender<span class="error"> * <?php echo $genErr; ?></span></label>
                            <select name="gender" id="gender" value="<?php echo $_POST['gender'] ?? ''; ?>">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" style="margin-right:50px;">
                            <label>Phone Number <span class="error">* <?php echo $numErr; ?></span></label>
                            <input id="contactnumber" name="contactnumber" type="text"
                                value="<?php echo $_POST['contactnumber'] ?? ''; ?>">
                        </div>

                        <div class="form-group">
                            <label>NIC Number <span class="error"> * <?php echo $NICErr; ?></span></label>
                            <input id="nic" name="nic" type="text" value="<?php echo $_POST['nic'] ?? ''; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" style="margin-right:50px;">
                            <label>Street Number</label>
                            <input id="sNumber" name="sNumber" type="text"
                                value="<?php echo $_POST['sNumber'] ?? ''; ?>">
                        </div>

                        <div class="form-group">
                            <label>Address Line 01</label>
                            <input id="aline1" name="aline1" type="text" value="<?php echo $_POST['aline1'] ?? ''; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" style="margin-right:50px;">
                            <label>Address Line 02</label>
                            <input id="aline2" name="aline2" type="text" value="<?php echo $_POST['aline2'] ?? ''; ?>">
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input id="city" name="city" type="text" value="<?php echo $_POST['city'] ?? ''; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Qualification<span class="error"> * <?php echo $qualiErr; ?></span></label>
                            <textarea id="qualification" name="qualification" row="10"></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="description" name="description" row="30"
                                value="<?php echo $_POST['description'] ?? ''; ?>">
                            </textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Experience<span class="error"> * <?php echo $expErr; ?></span></label>
                            <select name="experience" id="experience" value="<?php echo $_POST['experience'] ?? ''; ?>">
                                <option value="lessThanOneYr">Less than 1 year</option>
                                <option value="lessThanTwoYr">Less than 2 years</option>
                                <option value="lessThanFiveYr">Less than 5 years</option>
                                <option value="moreThanTenYr">More than 10 years</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <label>Languages<span class="error">*</span> </label>
                    </div>
                    <div class="form-row">
                        <div class="checkbox" class="radio">
                            <input type="checkbox" name="language[]" value="sinhala" checked="checked">
                            &nbsp;&nbsp;&nbsp;
                            <label style="color: black;">Sinhala</label>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="checkbox" class="radio">
                            <input type="checkbox" name="language[]" value="english"> &nbsp;&nbsp;&nbsp;
                            <label style="color: black;">English</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="checkbox" class="radio">
                            <input type="checkbox" name="language[]" value="tamil"> &nbsp;&nbsp;&nbsp;
                            <label style="color: black;">Tamil</label>
                        </div>
                    </div>

                    <div class="form-group" style="margin: 10px 10px 0px 10px;">
                        <label>Username (Enter Email Address)<span class="error">* <?php echo $emErr; ?></span></label>
                        <input type="email" id="email" size="30" style="width: 97%;" name="email">
                    </div>

                    <div class="form-row">

                        <div class="form-group" style="margin-right:50px;">
                            <label>Password<span class="error">* <?php echo $pw1Err; ?></span></label>
                            <input type="password" id="pass1" name="pass1" minlength="8" maxlength="15">
                        </div>


                        <div class="form-group">
                            <label>Confirm Password <span class="error">* <?php echo $pw2Err; ?></span></label>
                            <input type="password" id="pass2" name="pass2">
                        </div>

                    </div>

                    <button type="submit" class="submit-Btn">Submit</button>

                </form>
            </div>
        </div>
    </div>

    <!--Footer-->
    <div class=footer> © 2022 HulkZone. All rights reserved. </div>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
        $fname = $_POST["fname"];
       
        $lname = $_POST["lname"];
       
        $nic = $_POST["nic"];
       
        $gender = $_POST["gender"];
        
        $dob = $_POST["dob"];
        
        $contactNumber = $_POST["contactnumber"];
        
        $st = $_POST["sNumber"];
        
        $ad1 = $_POST["aline1"];
        
        $ad2 = $_POST["aline2"];
        
        $city = $_POST["city"];

        $qualification = $_POST["qualification"];

        $description = $_POST["description"];

        $experience = $_POST["experience"];

        $language = $_POST["language"];

        $chk=""; 

        foreach($language as $chk1){  
            $chk .= $chk1.",";  
        }
        
        $username = $_POST["email"];
        
        $pw = $_POST["pass1"];

        $cpw = $_POST["pass2"];

        $status = 1; //active

        $role = 3; //1 = member, 2 = trainer, 3 = dietician, 0 = admin
        
        //checking if username already exists
        $sql = "select * from user where email = '$username'";
        $result = mysqli_query($conn, $sql);
    
        $Rownum = mysqli_num_rows($result);
        //var_dump($num);

        if($Rownum == 0){

            if ($pw == $cpw) {

                $password_hash = password_hash($pw, PASSWORD_DEFAULT);

                
                $sql = "insert into user(fName, lName, dateOfBirth, gender, contactNumber, NIC, roles, statuses, streetNumber, addressLine01, addressLine02, city, email, pw, created_at)
                values ('$fname', '$lname', '$dob', '$gender', '$contactNumber', '$nic' , '$role', '$status', '$st', '$ad1', '$ad2', '$city', '$username', '$password_hash', current_timestamp())";
                
                if(!empty($fname) && !empty($lname) && !empty($nic) && !empty($gender) && !empty($contactNumber) && !empty($dob) && !empty($qualification) && !empty($experience) && !empty($language) && !empty($username) && !empty($password_hash)){
                    $result = mysqli_query($conn, $sql);
                }
                
                //retrieving the userID from user table to use as foreign key in member table
                $sql1 = "select userID from user where email = '$username'";
                
                $result1 = mysqli_query($conn, $sql1);
    
                $row = mysqli_fetch_array($result1);
    
                $userid = ($row['userID']);
    
                //inserting data into member table
                $sql2 = "insert into employee(userID, noOfYearsOfExperience, avgRating, qualification, description, language) values( '$userid', '$experience', 0.0 , '$qualification', '$description', '$chk' )";
    
                $result2 = mysqli_query($conn, $sql2);

                //checking if both are correct 
                if ($result == TRUE && $result2 == true) {
                    echo "<script>window.location.replace('../Login/login.php');</script>";
                }else{
                    echo ("error" .$sql.  mysqli_error($conn));
                }
            }else{
                echo "<script> alert('Passwords dont match'); </script>";
            }
                    
        }else if($contactNumber == ''){
              //prevents alert coming from every submit
        }
        
        else{
            echo "<script> alert('Username already Exists'); </script>";
        }
    
    }

    ?>



</body>

</html>