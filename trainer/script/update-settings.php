<?php
require 'config.php';
require '../../connect.php';


if (isset($_POST['submit'])) {
    $check = 1;
    $userid = $_SESSION["userID"];
    $status = "Filed";

    //MemberID
    $userID = $_SESSION['userID'];
    $sql = 'SELECT employee.employeeID FROM employee WHERE employee.userID= ' . $userID;
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $employeeID = $row['employeeID'];


    //Get values from form
    $fName = trim($_POST['fName']);
    $lName = trim($_POST['lName']);
    $NIC = trim($_POST['NIC']);
    $dateOfBirth = trim($_POST['dateOfBirth']);
    $contactNumber = trim($_POST['contactNumber']);
    $gender = trim($_POST['gender']);
    $streetNumber = trim($_POST['streetNumber']);
    $addressLineOne = trim($_POST['addressLineOne']);
    $addressLineTwo = trim($_POST['addressLineTwo']);
    $city = trim($_POST['city']);
    $noOfYearsExperience = trim($_POST['noOfYearsExperience']);
    $language = trim($_POST['language']);
    $description = trim($_POST['description']);
    $qualification = trim($_POST['qualification']);

    $_SESSION["firstName"] = $fName;

    //for file upload - if there is an image
    if (!empty($_FILES["Evi-image"]["name"])) {

        // splitting the file name into an array, where each element of the array is a substring of the original file name separated by the "." character. 
        $temp = explode(".", $_FILES["Evi-image"]["name"]);
        //returns last element of the array
        $extension = end($temp);

        $new_filename = $_SESSION['userID'] . "_" . time() . ".$extension";
        //storing file in the Complaintevidence folder
        $upload_path = "C:/xampp/htdocs/hulkzone/trainer/img/" . $new_filename;

        $save_path = "http://localhost/hulkzone/trainer/img/" . $new_filename;
        //moves an uploaded file to a new location. 
        if (move_uploaded_file($_FILES["Evi-image"]["tmp_name"], $upload_path)) {

            $sql = "UPDATE user, employee SET  user.fName = '$fName', user.lName = '$lName', user.NIC = '$NIC', user.dateOfBirth = '$dateOfBirth', 
                        user.contactNumber = '$contactNumber', user.gender = '$gender', user.streetNumber = '$streetNumber', user.addressLine01 = '$addressLineOne', user.addressLine02 = '$addressLineTwo', 
                        user.city = '$city', employee.noOfYearsOfExperience = '$noOfYearsExperience', employee.language = '$language', employee.description = '$description', employee.qualification = '$qualification',user.profilePhoto = '$save_path'  
                            WHERE employee.userID = '$userID' AND user.userID = '$userID' ";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Profile updated with new profile photo successfully!'); window.location.href='http://localhost/Hulkzone/trainer/settings.php';</script>";
            }
        }
    } else {

        $sql = "UPDATE user, employee SET  user.fName = '$fName', user.lName = '$lName', user.NIC = '$NIC', user.dateOfBirth = '$dateOfBirth', 
        user.contactNumber = '$contactNumber', user.gender = '$gender', user.streetNumber = '$streetNumber', user.addressLine01 = '$addressLineOne', user.addressLine02 = '$addressLineTwo', 
        user.city = '$city', employee.noOfYearsOfExperience = '$noOfYearsExperience', employee.language = '$language', employee.description = '$description', employee.qualification = '$qualification' 
        WHERE employee.userID = '$userID' AND user.userID = '$userID' ";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Profile updated successfully!'); window.location.href='http://localhost/Hulkzone/trainer/settings.php';</script>";
        } else {
            echo "<script>alert('There was an error updating the profile.'); window.location.href='http://localhost/Hulkzone/trainer/settings.php';</script>";
        }
    }
}
