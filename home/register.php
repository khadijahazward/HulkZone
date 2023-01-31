
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | HulkZone</title>
    <link rel="stylesheet" href="../style/register.css">
    <link rel="stylesheet" href="../style/general.css">
    
</head>

<body>

    <?php
    include '../connect.php';
    $fnameErr = $lnameErr = $dobErr = $genErr = $numErr = $NICErr = "";
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

        //checking length = 10
        if (empty($_POST["number"])) {
            $numErr = "Phone number is required";
        }else if(!preg_match('/^[0-9]{10}+$/', $_POST["number"])){
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
        $specialCharsCheck = preg_match('@[^\w]@', $_POST['pass1']); //atleast one special character

        if (empty($_POST["pass1"])) {
            $pw1Err = "Password is required";
        } else if (strlen($_POST['pass1']) < 8) {
            $pw1Err = "Password must be at least 8 characters long.";
        } else if (!$numberCheck) {
            $pw1Err = "Password must contain at least one number.";
        } else if (!$specialCharsCheck) {
            $pw1Err = "Password must contain at least one special character.";
        }

        if (empty($_POST["pass2"])) {
            $pw2Err = "Confirm Password is required";
        }
    }
?>

    <!--navigation bar-->
    <div class="nav-bar">
        <div class="left">
            <img src="../asset/images/gymLogo.png" class="logo-photo" alt="logo">
        </div>

        <div class="middle">
            <div class="nav-text"><a href="index.html">Home</a></div>
            <div class="nav-text"><a href="service.html">Services</a></div>
            <div class="nav-text"><a href="team.html">Team</a></div>
            <div class="nav-text"><a href="aboutUs.html">About Us</a></div>
            <div class="nav-text"><a href="contactus.html">Contact Us</a></div>
        </div>

        <div class="right">
            <div><a href="login.php"><input type="button" value="LOGIN"></a></div>
            <div><a href="register.php"><input type="button" value="REGISTER" style="background-color: black;"></a></div>
        </div>
    </div>

    <!--content-->
    <div class="content">

        <!--Image-->
        <div class="content-left">
            <img src="../asset/images/registerbg.png" alt="register">
        </div>

        <div class="content-right">
            <div class="text">
                <h2 style="margin-bottom: 1px;">Register To Become A Member</h2>

                <p>We Need Your Details To Complete Your Registration </p>
            </div>

            <div class="content-right-sub">

                <form id="regForm" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST" onsubmit="">

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
                            <input id="dob" name="dob" type="date" min="1930-01-01" max="2004-12-31"  value="<?php echo $_POST['dob'] ?? ''; ?>">
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
                            <input id="number" name="number" type="text" value="<?php echo $_POST['number'] ?? ''; ?>">
                        </div>

                        <div class="form-group">
                            <label>NIC Number <span class="error"> * <?php echo $NICErr; ?></span></label>
                            <input id="nic" name="nic" type="text"  value="<?php echo $_POST['nic'] ?? ''; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" style="margin-right:50px;">
                            <label>Street Number</label>
                            <input id="sNumber" name="sNumber" type="text" value="<?php echo $_POST['sNumber'] ?? ''; ?>">
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

                        <div class="form-group" style="margin-right:50px;">
                            <label>Height (in Inches)</label>
                            <input id="height" name="height" type="text" value="<?php echo $_POST['height'] ?? ''; ?>">
                        </div>

                        <div class="form-group">
                            <label>Weight (in kilograms)</label>
                            <input id="weight" name="weight" type="text" value="<?php echo $_POST['weight'] ?? ''; ?>">
                        </div>
                        
                    </div>

                    <div class="form-row">
                        <label>Payment Plan<span class="error">*</span> </label>
                    </div>
                    <div class="form-row">
                        <div class="radio">
                            <input type="radio" name="plan" value="oneMonth" checked="checked"> &nbsp;&nbsp;&nbsp;
                            <label style="color: black;">Month Package - Rs. 1000</label>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="radio">
                            <input type="radio" name="plan" value="threeMonth"> &nbsp;&nbsp;&nbsp;
                            <label style="color: black;">Three Months Package - Rs. 2899</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="radio">
                            <input type="radio" name="plan" value="sixMonth"> &nbsp;&nbsp;&nbsp;
                            <label style="color: black;">Six Months Package - Rs. 5599</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="radio">
                            <input type="radio" name="plan" value="twelveMonth"> &nbsp;&nbsp;&nbsp;
                            <label style="color: black;">Twelve Months Package - Rs. 11000</label>
                        </div>
                    </div>

                    <div class="form-group" style="margin: 10px 10px 0px 10px;">
                        <label>Username (Enter Email Address)<span class="error">* <?php echo $emErr; ?></span></label> 
                        <input type="email" id="email"  size="30" style="width: 97%;" name="email">
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
        
        $num = $_POST["number"];
        
        $st = $_POST["sNumber"];
        
        $ad1 = $_POST["aline1"];
        
        $ad2 = $_POST["aline2"];
        
        $city = $_POST["city"];
        
        $height = floatval(str_replace(',', '.', $_POST["height"]));
        
        $weight = floatval(str_replace(',', '.', $_POST["weight"]));
        
        $username = $_POST["email"];
        
        $pw = $_POST["pass1"];

        $cpw = $_POST["pass2"];

        $plans = $_POST["plan"];

        $status = 1; //active

        $role = 1; //1 = member, 2 = trainer, 3 = dietician
        
        //checking if username already exists
        $sql = "select * from user where email = '$username'";

        $result = mysqli_query($conn, $sql);
    
        $Rownum = mysqli_num_rows($result);
        //var_dump($num);

        if($Rownum == 0){

            if ($pw == $cpw) {

                $password_hash = password_hash($pw, PASSWORD_DEFAULT);

                $sql = "insert into user(fName, lName, NIC, gender, dateOfBirth, roles, statuses, contactNumber, streetNumber, addressLine01, addressLine02, city, email, pw, created_at)
                values ('$fname', '$lname', '$nic', '$gender', '$dob', '$role', '$status', '$num', '$st', '$ad1', '$ad2', '$city',  '$username', '$password_hash', current_timestamp())";
                
                if(!empty($fname) && !empty($lname) && !empty($nic) && !empty($gender) && !empty($num) && !empty($dob) && !empty($username) && !empty($pw) && !empty($cpw)){
                    $result = mysqli_query($conn, $sql);
                }

                $sql1 = "select userID from user where email = '$username'";
                    
                $result1 = mysqli_query($conn, $sql1);
    
                $row = mysqli_fetch_array($result1);
                
                if($result1 && $row = mysqli_fetch_array($result1)){
                     //retrieving the userID from user table to use as foreign key in member table
                    $userid = ($row['userID']);
        
                    //inserting data into member table
                    $sql2 = "insert into member(userID, height, weight, planType) values( '$userid', '$height', '$weight', '$plans')";
        
                    $result2 = mysqli_query($conn, $sql2);
                }
               

                //checking if both are correct 
                if ($result == TRUE && isset($result2) && $result2 == true) {
                    echo "<script> alert('Registration Successful!'); </script>";
                    echo "<script>window.location.replace('index.html');</script>";
                }else{
                    echo "<script> alert('Please Fill all the required Data!'); </script>";
                }
            }else{
                echo "<script> alert('Passwords dont match'); </script>";
            }
                    
        }else if($num == ''){
              //prevents alert coming from every submit
        }
        
        else{
            echo "<script> alert('Username already Exists'); </script>";
        }
    
    }

    ?>



</body>


</html>