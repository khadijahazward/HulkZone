
<?php 
    include 'authorization.php';
    include '../connect.php';

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("location: dashboard.php");
    }
    $check = 0;
    $errors = array();

    if( !( preg_match('/^[0-9]{9}[V]+$/', $_POST["nic"]) || preg_match('/^[0-9]{12}+$/', $_POST["nic"]) ) ){
        $errors['NICErr'] = "1";
    }
     
    if (!preg_match('/^[0-9]{10}+$/', $_POST["number"])) {
        $errors['numErr'] = "1";
    }

    if(empty($errors)){
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
        $plans = $_POST["paymentPlan"];
    
        $sql = "update user set fName = '$fname', lName = '$lname', NIC = '$nic', gender = '$gender' , dateOfBirth = '$dob', contactNumber = '$num', streetNumber = '$st', addressLine01 ='$ad1' , addressLine02 = '$ad2', city = '$city' where userID = '$_SESSION[userID]'";
        $sql1 = "update member set height = '$height', weight = '$weight', planType = '$plans' where userID = '$_SESSION[userID]'";
    
        if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)) {
            echo "<script> alert('Profile successfully updated!');";
            echo "window.location.href = 'profile.php';</script>";
        } 
        else {
            echo "<script> alert('Database Error! Please try again.');";
            echo "window.location.href = 'profile.php';</script>";
        }
    }else{
        if (isset($errors['numErr']) || isset($errors['NICErr'])) { 
           // alert with blank screen?!
            $js = <<<JS
            <script>
                alert('Input Error! Please try again.');
                window.location = "profile.php?";   
            </script>
            JS;
            echo $js;
            
        } 
        
    }
    mysqli_close($conn);
?>

