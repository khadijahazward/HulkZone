<?php
   include('../../HulkZone/connect.php');
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
        $specialCharsCheck = preg_match('@[^\w]@', $_POST['pass1']); //atleast one special char

       /* if (empty($_POST["pass1"])) {
            $pw1Err = "Password is required";
        }else if(strlen($_POST['pass1']) < 8 || !$numberCheck || !$specialCharsCheck){
            $pw1Err = "password should be minimum 8 characters";
        }*/

        
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
        
        $exp=$_POST["exp"];
      
        $qual=$_POST["qual"];

        $des=$_POST["des"];

        $username = $_POST["email"];
        
        $pw = $_POST["pass1"];

        $cpw = $_POST["pass2"];

        $lang=$_POST["lang"];

        $status = 1; //active

        $role = 2; //1 = member, 2 = trainer, 3 = dietician
        
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
                
                if(!empty($fname) && !empty($lname) && !empty($nic) && !empty($gender) && !empty($num) && !empty($dob) && !empty($username) && !empty($password_hash)){
                    $result = mysqli_query($conn, $sql);
                }
                
                //retrieving the userID from user table to use as foreign key in member table
              /*  $sql1 = "select userID from user where email = '$username'";
                
                $result1 = mysqli_query($conn, $sql1);
    
                $row = mysqli_fetch_array($result1);
    
                $userid = ($row['userID']);*/
                $sql1 = "select userID from user where email = '$username'";
                    
                $result1 = mysqli_query($conn, $sql1);
    
                //$row = mysqli_fetch_array($result1);
                
                if($result1 && $row = mysqli_fetch_array($result1)){
                     //retrieving the userID from user table to use as foreign key in member table
                    $userid = ($row['userID']);
    
                //inserting data into employee table
                $sql2 = "insert into employee(userID, noOfYearsOfExperience, qualification, description,language) values( '$userid', '$exp', '$qual', '$des','$lang')";
    
                $result2 = mysqli_query($conn, $sql2);
                }
                //checking if both are correct 
                if ($result == TRUE && isset($result2) && $result2 == true) {
                    echo "<script> alert('Registration Successful!'); </script>";
                    echo "<script>window.location.replace('manageTrainer.php');</script>";
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Trainer | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/addtrainer.css">

    <style>
        .error{
    color: red;
    font-size: 10px;
}
    </style>
</head>
<body>

    <!--Header-->
    <div class="content">
        <div class="contentLeft"><p class="title">ADD TRAINER</p></div>
        <div class="contentMiddle"><p class="myProfile">My Profile</p></div>
        <div class="contentRight"><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
    </div>

    <!--Body|Form-->
   
    <form class = addTrainerForm action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="POST">
    <h1>Personal Details</h1>
<div class="form-row">
    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label>First name <span class="error"> <?php echo $fnameErr; ?></span></label>
        <br>
        <input id="fname" type="text" name="fname" value="<?php echo $_POST['fname'] ?? ''; ?>"  >
    </div>

    <div class="form-group">
        <label>Last name<span class="error"> <?php echo $lnameErr; ?></span></label> 
        <br>
        <input id="lname" type="text" name="lname" value="<?php echo $_POST['lname'] ?? ''; ?>"  >
    </div>
</div>

<div class=" form-row">
    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label>Date of Birth <span class="error"><?php echo $dobErr; ?></span></label>
        <br>
        <input id="dob" name="dob" type="date" min="1930-01-01" max="2004-12-31" value="<?php echo $_POST['dob'] ?? ''; ?>" >
    </div>

    <div class="form-group">
        <label>Gender<span class="error">  <?php echo $genErr; ?></span></label>
        <br>
        <select name="gender" id="gender" value="<?php echo $_POST['gender'] ?? ''; ?>" >
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label>Phone Number <span class="error"> <?php echo $numErr; ?></span></label >
        <br>
        <input id="number" name="number" type="text" value="<?php echo $_POST['number'] ?? ''; ?>" >
    </div>

    <div class="form-group">
        <label>NIC Number <span class="error"> <?php echo $NICErr; ?></span></label>
        <br>
        <input id="nic" name="nic" type="text" value="<?php echo $_POST['nic'] ?? ''; ?>" >
    </div>
</div>
<h1 style="font-weight:normal;">Address</h1>
<div class="form-row">
    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label>Street Number</label>
        <br>
        <input id="sNumber" name="sNumber" type="text" value="<?php echo $_POST['sNumber'] ?? ''; ?>"  >
    </div>

    <div class="form-group">
        <label>Address Line 01</label>
        <br>
        <input id="aline1" name="aline1" type="text" value="<?php echo $_POST['aline1'] ?? ''; ?>"  >
    </div>
</div>

<div class="form-row">
    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label>Address Line 02</label>
        <br>
        <input id="aline2" name="aline2" type="text" value="<?php echo $_POST['aline2'] ?? ''; ?>" >
    </div>

    <div class="form-group">
        <label>City</label>
        <br>
        <input id="city" name="city" type="text" vvalue="<?php echo $_POST['city'] ?? ''; ?>" >
    </div>
</div>
<h1 style="font-weight:normal;">Other details</h1>
<div class="form-row">
    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label> No. of years of Experience</label>
        <br>
        <input id="exp" type="text" name="exp" value="<?php echo $_POST['exp'] ?? ''; ?>" >
    </div>

    <div class="form-group">
        <label>Qualification</label>
        <br> 
        <input id="qual" type="text" name="qual" value="<?php echo $_POST['qual'] ?? ''; ?>" >
    </div>
</div>

<div class="form-row">
    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label> Description</label>
        <br>
        <input id="des" type="text" name="des"  value="<?php echo $_POST['des'] ?? ''; ?>" >
    </div>

    <div class="form-group">
        <label>Languages</label> 
        <br>
        <select name="lang" id="lang" style="width:340px" >
            <option value="Male">English</option>
            <option value="Female">Sinhala</option>
            <option value="Female">Tamil</option>
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label> Service offered</label>
        <br>
        <select name="#" id="gender" style="width:340px" >
            <option value="Male">Cross Fit Training</option>
            <option value="Female">Cardio</option>
        </select>
    </div>
</div>


<div class="form-group" style="margin-right:50px;margin-left: 220px;" >
    <label>Username (Enter Email Address)<span class="error">* <?php echo $emErr; ?></span></label> 
    <br>
    <input type="email" id="email"  size="30" style="width: 340px;" name="email" >
</div>

<div class="form-row">

    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label>Password<span class="error">* <?php echo $pw1Err; ?></span></label> 
        <br>
        <input type="password" id="pass1" name="pass1" minlength="8" maxlength="15" >
    </div>


    <div class="form-group">
        <label>Confirm Password <span class="error"> <?php echo $pw2Err; ?></span></label>
        <br>
        <input type="password" id="pass2" name="pass2"  >
    </div>

</div>

<button type="submit" class="submit">Add</button>

</form>


</body>
</html>