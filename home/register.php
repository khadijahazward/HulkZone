
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | HulkZone</title>
    <link rel="stylesheet" href="../style/register.css">
    <link rel="stylesheet" href="../style/general.css">
    <link rel="icon" type="image/png" href="../asset/images/gymLogo.png"/>
    
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
        
        if (!empty($_POST["height"])) {
            if (!is_numeric($_POST["height"])) {
                $hgErr = "Height should be a number.";
            }
        }else{
            $hgErr = "";
        }

        if (!empty($_POST["weight"])) {
            if (!is_numeric($_POST["weight"])) {
                $wiErr = "Weight should be a number.";
            }
        } else {
            $wiErr = "";
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

        if (empty($_POST["email"])) {
            $emErr = "Email is required";
        } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emErr = "Enter a valid email address";
        } else {
            $email_parts = explode("@", $_POST["email"]);
            $domain_parts = explode(".", $email_parts[1]);
            if (count($domain_parts) < 2) {
                $emErr = "Enter a valid email address";
            }
        }

        //password validation
        //In PHP, the "@" symbol can be used as an alternative delimiter to the forward slash ("/") in regular expression patterns. When using an alternative delimiter, the "@" symbol is placed at the beginning and end of the regular expression pattern to indicate the start and end of the pattern, just like the forward slash.
        $numberCheck = preg_match('@[0-9]@', $_POST['pass1']); //atleast one number
        $specialCharsCheck = preg_match('@[^\w]@', $_POST['pass1']); //atleast one special character
        //$letterCheck = preg_match('/[a-zA-Z]/', $_POST['pass1']); //atleast a letter

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
            <div class="nav-text"><a href="../index.html">Home</a></div>
            <div class="nav-text"><a href="service.html">Services</a></div>
            <div class="nav-text"><a href="team.php">Team</a></div>
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
                <!--The purpose of using htmlspecialchars with $_SERVER["PHP_SELF"] is to protect against cross-site scripting (XSS) attacks, 
                which can occur when user input is not properly sanitized.When the user submits the form, the form data is sent to the same page,
                 and the $_SERVER['PHP_SELF'] variable is used to process the form data. -->
             

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
                            <label>Height (in Inches) <span class="error"> <?php echo $hgErr ; ?></span></label>
                            <input id="height" name="height" type="text" value="<?php echo $_POST['height'] ?? ''; ?>">
                        </div>

                        <div class="form-group">
                            <label>Weight (in kilograms) <span class="error">  <?php echo $wiErr ; ?></span> </label>
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
        $height = $weight = 0;
        //captial letter first
        $fname = ucfirst(mysqli_real_escape_string($conn, trim($_POST["fname"])));
        $lname = ucfirst(mysqli_real_escape_string($conn, trim($_POST["lname"])));
        $nic = mysqli_real_escape_string($conn, trim($_POST["nic"]));
        $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
        $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
        $num = mysqli_real_escape_string($conn, trim($_POST["number"]));
        $st = mysqli_real_escape_string($conn, $_POST["sNumber"]);
        $ad1 = mysqli_real_escape_string($conn, $_POST["aline1"]);
        $ad2 = mysqli_real_escape_string($conn, $_POST["aline2"]);
        $city = mysqli_real_escape_string($conn, $_POST["city"]);
        $height = floatval(str_replace(',', '.', mysqli_real_escape_string($conn, $_POST["height"])));
        $weight = floatval(str_replace(',', '.', mysqli_real_escape_string($conn, $_POST["weight"])));
        $username = mysqli_real_escape_string($conn, trim($_POST["email"]));
        $pw = mysqli_real_escape_string($conn, $_POST["pass1"]);
        $cpw = mysqli_real_escape_string($conn, $_POST["pass2"]);
        $plans = mysqli_real_escape_string($conn, $_POST["plan"]);        
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

                //checking if there are no errors
                if (empty($fnameErr) && empty($lnameErr) && empty($dobErr) && empty($genErr) && empty($numErr) && empty($NICErr) && empty($hgErr) && empty($wiErr) && empty($emErr) && empty($pw1Err) && empty($pw2Err)) {
                    
                    $sql = "insert into user(fName, lName, NIC, gender, dateOfBirth, roles, statuses, contactNumber, streetNumber, addressLine01, addressLine02, city, email, pw, created_at)
                    values ('$fname', '$lname', '$nic', '$gender', '$dob', '$role', '$status', '$num', '$st', '$ad1', '$ad2', '$city',  '$username', '$password_hash', NOW())";
                        
                    if(!empty($fname) && !empty($lname) && !empty($nic) && !empty($gender) && !empty($num) && !empty($dob) && !empty($username) && !empty($pw) && !empty($cpw)){
                        $result = mysqli_query($conn, $sql);
                    }

                    $sql1 = "select * from user where email = '$username'";
                        
                    $result1 = mysqli_query($conn, $sql1);
                    
                    if($result1 && $row = mysqli_fetch_array($result1)){
                        //retrieving the userID from user table to use as foreign key in member table
                        $userid = ($row['userID']);

                        //inserting data into member table
                        $sql2 = "insert into member(userID, height, weight, planType) values( '$userid', '$height', '$weight', '$plans')";
            
                        $result2 = mysqli_query($conn, $sql2);

                        //for inserting payment expiry date
                        $sql3 = "SELECT memberID FROM member WHERE userID = '$userid'";
                        $result3 = mysqli_query($conn, $sql3);

                        if ($result3 && mysqli_num_rows($result3) > 0) {
                            $row3 = mysqli_fetch_assoc($result3);
                            $memberID = $row3['memberID'];
                            $createdDate = $row['created_at'];

                            // Calculate expiry date based on plan type
                            switch ($plans) {
                                case 'oneMonth':
                                $expiryDate = date('Y-m-d', strtotime($createdDate . ' +1 month'));
                                break;
                                case 'threeMonth':
                                $expiryDate = date('Y-m-d', strtotime($createdDate . ' +3 months'));
                                break;
                                case 'sixMonth':
                                $expiryDate = date('Y-m-d', strtotime($createdDate . ' +6 months'));
                                break;
                                case 'twelveMonth':
                                $expiryDate = date('Y-m-d', strtotime($createdDate . ' +1 year'));
                                break;
                                default:
                                $expiryDate = '';
                                break;
                            }


                            $sql4 = "INSERT INTO paymentplan(memberID, expiryDate) VALUES ('$memberID', '$expiryDate')";
                            $result4 = mysqli_query($conn, $sql4);

                            //for verifying the account
                            $verify_status = 0; 
                            $sql5 = "insert into verify_email(userID, verify_status, token) values($userid, $verify_status, 0)";
                            $result5 = mysqli_query($conn, $sql5);
                        }
                    }
                
                    //checking if both are correct 
                    if ($result == TRUE && isset($result2) && $result2 == true && $result4 == true && $result5 == true) {
                        echo "<script> alert('Registration Successful!'); </script>";
                        echo "<script>window.location.replace('../index.html');</script>";
                    }else{
                        echo "<script> alert('Please Fill all the required Data!'); </script>";
                    }
                    
                }else{
                    echo "<script> alert('Enter Valid Data'); </script>";
                }
                
            }else{
                echo "<script> alert('Passwords dont match'); </script>";
            }
                    
        }else{
            echo "<script> alert('Username already Exists'); </script>";
        }
    
    }

    ?>



</body>


</html>