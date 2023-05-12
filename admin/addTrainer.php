<?php
include('authorization.php');
include('setAdminProfilePic.php');
?>
<?php

include('../../HulkZone/connect.php');
$fnameErr = $lnameErr = $dobErr = $genErr = $numErr = $NICErr = $langErr = $serviceErr = "";
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
    if (empty($_POST['language'])) {
        $langErr = "At least one language is required";
    }
    if (empty($_POST['services'])) {
        $serviceErr = "At least one service is required";
    }

    //checking length = 10
    if (empty($_POST["number"])) {
        $numErr = "Phone number is required";
    } else if (!preg_match('/^[0-9]{10}+$/', $_POST["number"])) {
        $numErr = "Enter Valid Phone Number";
    }

    //checking for old and new format
    if (empty($_POST["nic"])) {
        $NICErr = "NIC is required";
    } else if (!(preg_match('/^[0-9]{9}[V]+$/', $_POST["nic"]) || preg_match('/^[0-9]{12}+$/', $_POST["nic"]))) {
        $NICErr = "Enter Valid NIC";
    }

    //email validation
    if (empty($_POST["email"])) {
        $emErr = "Email is required";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { // "username@domain.extension.The email address must contain only one "@" symbol and at least one "." symbol after "@" symbol. It should not contain any whitespace characters or special characters other than "." and "_".
        $emErr = "Enter Valid Email";
    }
    if (empty($_POST["email"])) {
        $emErr = "Email is required";
    } else if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $_POST["email"])) { //This regular expression ensures that the email address contains only letters, digits, and the characters "." (dot), "_" (underscore), "%" (percent), "+", and "-". It also ensures that the domain part of the email address contains only letters, digits, and the characters "." and "-". Additionally, it requires at least one "." character after the "@" symbol and ensures that the top-level domain is at least two characters long.
        $emErr = "Enter Valid Email";
    } else {
        // Sanitize email input to prevent SQL injection
        $email = mysqli_real_escape_string($conn, $_POST["email"]);

        // Check if email already exists in the database
        $query = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $emErr = "Username already exists";
        }
    }

    //password validation
    $numberCheck = preg_match('@[0-9]@', $_POST['pass1']); //atleast one number
    $specialCharsCheck = preg_match('@[^\w]@', $_POST['pass1']); //atleast one special char
    $letterCheck = preg_match('/[a-zA-Z]/', $_POST['pass1']);//atleast one lower case or upper case letter



    if (empty($_POST["pass1"])) {
        $pw1Err = "Password is required";
    } else if (strlen($_POST['pass1']) < 8) {
        $pw1Err = "Password must be at least 8 characters long.";
    } else if (!$numberCheck) {
        $pw1Err = "Password must contain at least one number.";
    } else if (!$specialCharsCheck) {
        $pw1Err = "Password must contain at least one special character.";
    } else if(!$letterCheck ){
        $pw1Err = "Password must contain at least one letter  .";
    }


    if (empty($_POST["pass2"])) {
        $pw2Err = "Confirm Password is required";
    } else if ($_POST["pass1"] !== $_POST["pass2"]) {
        $pw2Err = "Passwords do not match";
    }
}

?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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

    $exp = $_POST["exp"];

    $qual = $_POST["qual"];

    $des = $_POST["des"];

    $username = $_POST["email"];

    $pw = $_POST["pass1"];

    $cpw = $_POST["pass2"];

    $language = isset($_POST['language']) ? $_POST['language'] : array();
    // convert the array of selected languages to a comma-separated string
    $languages_str = implode(',', $language);
    $services = isset($_POST['services']) ? $_POST['services'] : array();
    

    $status = 1; //active

    $role = 2; //1 = member, 2 = trainer, 3 = dietician


    //checking if username already exists
    $sql = "select * from user where email = '$username'";

    $result = mysqli_query($conn, $sql);

    $Rownum = mysqli_num_rows($result);
    //var_dump($num);

    if ($Rownum == 0) {

        if ($pw == $cpw) {

            $password_hash = password_hash($pw, PASSWORD_DEFAULT);

            if (
                !empty($fname) && !empty($lname) && !empty($nic) && !empty($gender) && !empty($num) && !empty($dob) && !empty($username) && !empty($pw) && !empty($cpw) && !empty($language) && !empty($services)
                &&(preg_match('@[0-9]@', $_POST['pass1'])) && (preg_match('@[^\w]@', $_POST['pass1']))
                && (preg_match('/^[0-9]{9}[V]+$/', $_POST["nic"]) || preg_match('/^[0-9]{12}+$/', $_POST["nic"]))
                && preg_match('/^[0-9]{10}+$/', $_POST["number"]) && preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $_POST["email"])
                &&preg_match('/[a-zA-Z]/', $_POST['pass1'])
            ) {
                $sql = "insert into user(fName, lName, NIC, gender, dateOfBirth, roles, statuses, contactNumber, streetNumber, addressLine01, addressLine02, city, email, pw, created_at)
                values ('$fname', '$lname', '$nic', '$gender', '$dob', '$role', '$status', '$num', '$st', '$ad1', '$ad2', '$city',  '$username', '$password_hash', current_timestamp())";


                $result = mysqli_query($conn, $sql);
            }

            $sql1 = "select userID from user where email = '$username'";

            $result1 = mysqli_query($conn, $sql1);

            if ($result1 && $row = mysqli_fetch_array($result1)) {
                //retrieving the userID from user table to use as foreign key in member table
                $userid = ($row['userID']);

                //inserting data into employee table
                $sql2 = "insert into employee(userID, noOfYearsOfExperience, qualification, description, language) values( '$userid', '$exp', '$qual', '$des', '$languages_str')";
                $result2 = mysqli_query($conn, $sql2);

                if ($result2) {
                    // retrieve the employeeID based on the userID
                    $sql_employee = "SELECT employeeID FROM employee WHERE userID = $userid";
                    $result_employee = mysqli_query($conn, $sql_employee);
                    if ($result_employee && $row_employee = mysqli_fetch_array($result_employee)) {
                        $employeeID = $row_employee['employeeID'];
                        // insert data into employeeservice table
                        foreach ($services as $service) {
                            $sql3 = "INSERT INTO employeeservice(employeeID, serviceID) VALUES ('$employeeID', '$service')";
                            $result3 = mysqli_query($conn, $sql3);

                            // If any query fails, show an error message and exit the loop
                            if (!$result3) {
                                echo "<script> alert('Failed to add services. Please try again.'); </script>";
                                break;
                            }
                        }

                        // If all queries were successful, show a success message
                        if ($result3) {
                            echo "<script> alert('Registration Successful!'); </script>";
                            include('phpmailer.php');
                            echo "<script>window.location.replace('manageTrainer.php');</script>";
                        }
                    } else {
                        // If retrieving employeeID fails, then show an error message
                        echo "<script> alert('Failed to add employee. Please try again.'); </script>";
                    }
                }
            }
        }
    }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Trainer | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/employee.css">

    <style>
        .error {
            color: red;
            font-size: 10px;
        }
    </style>
</head>

<body>

    <!--Header-->
    <div class="content">
        <div class="contentLeft">
            <p class="title">ADD TRAINER</p>
        </div>
        <div class="contentMiddle">
            <p class="myProfile" style="margin-left: 1080px;">My Profile</p>
        </div>
        <div class="contentRight"><img src="<?php echo $profilePictureLink ?>" alt="AdminLogo" class="adminLogo"></div>
    </div>

    <!--Body|Form-->

    <form class=addTrainerForm action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">
        <h1>Personal Details</h1>
        <div class="form-row">
            <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                <label>First name <span class="error">* <?php echo $fnameErr; ?></span></label>
                <br>
                <input id="fname" type="text" name="fname" value="<?php echo $_POST['fname'] ?? ''; ?>">
            </div>

            <div class="form-group">
                <label>Last name<span class="error">* <?php echo $lnameErr; ?></span></label>
                <br>
                <input id="lname" type="text" name="lname" value="<?php echo $_POST['lname'] ?? ''; ?>">
            </div>
        </div>

        <div class=" form-row">
            <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                <label>Date of Birth <span class="error">*<?php echo $dobErr; ?></span></label>
                <br>
                <input id="dob" name="dob" type="date" min="1930-01-01" max="2004-12-31" value="<?php echo $_POST['dob'] ?? ''; ?>">
            </div>

            <div class="form-group">
                <label>Gender<span class="error"> <?php echo $genErr; ?></span></label>
                <br>
                <select name="gender" id="gender">
                    <option value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'Male') ? ' selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'Female') ? ' selected' : ''; ?>>Female</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                <label>Phone Number <span class="error">* <?php echo $numErr; ?></span></label>
                <br>
                <input id="number" name="number" type="text" value="<?php echo $_POST['number'] ?? ''; ?>">
            </div>

            <div class="form-group">
                <label>NIC Number <span class="error"> *<?php echo $NICErr; ?></span></label>
                <br>
                <input id="nic" name="nic" type="text" value="<?php echo $_POST['nic'] ?? ''; ?>">
            </div>
        </div>
        <h1 style="font-weight:bold;">Address</h1>
        <div class="form-row">
            <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                <label>Street Number</label>
                <br>
                <input id="sNumber" name="sNumber" type="text" value="<?php echo $_POST['sNumber'] ?? ''; ?>">
            </div>

            <div class="form-group">
                <label>Address Line 01</label>
                <br>
                <input id="aline1" name="aline1" type="text" value="<?php echo $_POST['aline1'] ?? ''; ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                <label>Address Line 02</label>
                <br>
                <input id="aline2" name="aline2" type="text" value="<?php echo $_POST['aline2'] ?? ''; ?>">
            </div>

            <div class="form-group">
                <label>City</label>
                <br>
                <input id="city" name="city" type="text" value="<?php echo $_POST['city'] ?? ''; ?>">
            </div>
        </div>
        <h1 style="font-weight:bold;">Other details</h1>
        <div class="form-row">
            <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                <label> No. of years of Experience</label>
                <br>


                <select name="exp" id="exp">
                    <option value="Less than 1 year" <?php if (isset($_POST['exp']) && $_POST['exp'] === 'Less than 1 year') {
                                                            echo ' selected';
                                                        } ?>>Less than 1 year</option>
                    <option value="1-3 years" <?php if (isset($_POST['exp']) && $_POST['exp'] === '1-3 years') {
                                                    echo ' selected';
                                                } ?>>1-3 years</option>
                    <option value="3-5 years" <?php if (isset($_POST['exp']) && $_POST['exp'] === '3-5 years') {
                                                    echo ' selected';
                                                } ?>>3-5 years</option>
                    <option value="5-10 years" <?php if (isset($_POST['exp']) && $_POST['exp'] === '5-10 years') {
                                                    echo ' selected';
                                                } ?>>5-10 years</option>
                    <option value="More than 10 years" <?php if (isset($_POST['exp']) && $_POST['exp'] === 'More than 10 years') {
                                                            echo ' selected';
                                                        } ?>>More than 10 years</option>
                </select>
            </div>

            <div class="form-group">
                <label>Qualification</label>
                <br>
                <input id="qual" type="text" name="qual" value="<?php echo $_POST['qual'] ?? ''; ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                <label> Description</label>
                <br>

                <textarea name="des" id="" cols="10" rows="8" value="<?php echo $_POST['des'] ?? ''; ?>"></textarea>
            </div>

            <div class="form-group">
                <label>Languages<span class="error">* <?php echo $langErr; ?></span></label>
                <br>

                <div class="checkbox">
                    <input type="checkbox" id="English" name="language[]" value="English" <?php if (isset($_POST['language']) && in_array('English', $_POST['language'])) {
                                                                                                echo 'checked';
                                                                                            } ?>>
                    <label for="english">English</label>
                </div>
                <br>
                <div class="checkbox">
                    <input type="checkbox" id="Sinhala" name="language[]" value="Sinhala" <?php if (isset($_POST['language']) && in_array('Sinhala', $_POST['language'])) {
                                                                                                echo 'checked';
                                                                                            } ?>>
                    <label for="spanish">Sinhala</label>
                </div>
                <br>
                <div class="checkbox">
                    <input type="checkbox" id="Tamil" name="language[]" value="Tamil" <?php if (isset($_POST['language']) && in_array('Tamil', $_POST['language'])) {
                                                                                            echo 'checked';
                                                                                        } ?>>
                    <label for="french">Tamil</label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                <label> Service offered<span class="error">* <?php echo $serviceErr; ?></span></label>
                <br>
                <div class="checkbox">
                    <input type="checkbox" name="services[]" value="1" <?php if (isset($_POST['services']) && in_array(1, $_POST['services'])) echo "checked"; ?>>
                    <label>CrossFit</label>
                </div>
                <br>
                <div class="checkbox">
                    <input type="checkbox" name="services[]" value="4" <?php if (isset($_POST['services']) && in_array(4, $_POST['services'])) echo "checked"; ?>>
                    <label>Strength</label>
                </div>
                <br>
                <div class="checkbox">
                    <input type="checkbox" name="services[]" value="2" <?php if (isset($_POST['services']) && in_array(2, $_POST['services'])) echo "checked"; ?>>
                    <label>BodyBuilding</label>
                </div>
            </div>
        </div>


        <div class="form-group" style="margin-right:50px;margin-left: 220px;">
            <label>Username (Enter Email Address)<span class="error">* <?php echo $emErr; ?></span></label>
            <br>
            <input type="text" id="email" size="30" style="width: 340px;" name="email" value="<?php echo $_POST['email'] ?? ''; ?>">
        </div>

        <div class="form-row">

            <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                <label>Password<span class="error">* <?php echo $pw1Err; ?></span></label>
                <br>
                <input type="password" id="pass1" name="pass1">
            </div>


            <div class="form-group">
                <label>Confirm Password <span class="error"> *<?php echo $pw2Err; ?></span></label>
                <br>
                <input type="password" id="pass2" name="pass2" maxlength="15">
            </div>

        </div>

        <button type="submit" class="submit">Add</button>

    </form>


</body>

</html>