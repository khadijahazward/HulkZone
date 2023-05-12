
<?php 
    include 'authorization.php';
    include '../connect.php';

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("location: dashboard.php");
    }
    
    $check = 0;
    $errors = array();
     
    if (!preg_match('/^[0-9]{10}+$/', $_POST["number"])) {
        $errors['numErr'] = "1";
    }

    if (!is_numeric($_POST["height"])) {
        $errors['heightErr'] = "1";
    }

    if (!is_numeric($_POST["weight"])) {
        $errors['weightErr'] = "1";
    }

    if(empty($errors)){

        //escape special characters in the input value
        //remove any leading or trailing whitespace from the escaped input value.
        $fname = trim(mysqli_real_escape_string($conn, $_POST["fname"]));
        $lname = trim(mysqli_real_escape_string($conn, $_POST["lname"]));

        $fname = ucfirst($fname);
        $lname = ucfirst($lname);

        $num = trim(mysqli_real_escape_string($conn, $_POST["number"]));
        $st = trim(mysqli_real_escape_string($conn, $_POST["sNumber"]));
        $ad1 = trim(mysqli_real_escape_string($conn, $_POST["aline1"]));
        $ad2 = trim(mysqli_real_escape_string($conn, $_POST["aline2"]));
        $city = trim(mysqli_real_escape_string($conn, $_POST["city"]));

        //converts into float values
        $height = floatval(str_replace(',', '.', trim(mysqli_real_escape_string($conn, $_POST["height"]))));
        $weight = floatval(str_replace(',', '.', trim(mysqli_real_escape_string($conn, $_POST["weight"]))));

    
        $sql = "update user set fName = '$fname', lName = '$lname', contactNumber = '$num', streetNumber = '$st', addressLine01 ='$ad1' , addressLine02 = '$ad2', city = '$city' where userID = '$_SESSION[userID]'";
        $sql1 = "update member set height = '$height', weight = '$weight' where userID = '$_SESSION[userID]'";
    
        if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)) {
            echo "<script> alert('Profile successfully updated!');";
            echo "window.location.href = 'profile.php';</script>";
        } 
        else {
            echo "<script> alert('Database Error! Please try again.');";
            echo "window.location.href = 'profile.php';</script>";
        }
    }else{
        if (isset($errors['numErr']) || isset($errors['heightErr']) ||  isset($errors['weightErr'])) { 

            echo '<script>
                alert("Input Error! Please try again.");
                window.location = "profile.php";
            </script>';
            
        } 
        
    }
    mysqli_close($conn);
?>

