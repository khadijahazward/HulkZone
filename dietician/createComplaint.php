<?php 
include 'authorization.php';
include "connect.php";
include("setProfilePic.php");
?>

<!--checking for empty fields-->
<?php
$check = "";
$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);
$subjectErr = $descriptionErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["subject"])) {
        $subjectErr = "Subject is required";
    }
    if (empty($_POST["description"])) {
        $descriptionErr = "Description is required";
    }
}
?>

<!--inserting into table-->
<?php

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $subject = $description =" ";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $check = 1;
        $subject = test_input($_POST["subject"]);
        $description = test_input($_POST['description']);
        $userID = mysqli_real_escape_string($conn, $_SESSION['userID']);
        $status = "Filed";


        //for file upload - if there is an image
        if (isset($_FILES["evidanceImage"]) && $_FILES["evidanceImage"]["error"] !== UPLOAD_ERR_NO_FILE && !empty($subject) && !empty($description)){
            $allowed_types = array("image/jpeg", "image/png");
            $allowed_size = 5242880; // 5MB - 5 * 1024 * 1024

            // Checking file types
            if (!in_array($_FILES["evidanceImage"]["type"], $allowed_types)) {
                $fileErr = "Invalid file type. Only JPEG and PNG files are allowed.";
                $check = 0;
            }

            // Checking size of the file uploaded
            if ($_FILES["evidanceImage"]["size"] > $allowed_size) {
                $fileErr = "File size is too large. Maximum size is 5MB.";
                $check = 0;
            }

            if ($check == 1) {
                // splitting the file name into an array, where each element of the array is a substring of the original file name separated by the "." character. 
                $temp = explode(".", $_FILES["evidanceImage"]["name"]);
                //returns last element of the array
                $extension = end($temp);
                

                $new_filename = $userID . "_" . time() .".$extension";
                //storing file in the Complaintevidence folder
                $upload_path = "C:/Xampp/htdocs/HulkZone/Complaintevidence/" . $new_filename;

                //moves an uploaded file to a new location. 
                if (move_uploaded_file($_FILES["evidanceImage"]["tmp_name"], $upload_path)) {
                    $sql = "INSERT INTO complaint (subject, description, status, dateReported, userID, evidence) VALUES ('$subject', '$description', '$status', current_timestamp(), '$userID', '$upload_path')";
                        
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Complaint filed successfully!'); window.location.href='http://localhost/Hulkzone/dietician/complaint.php';</script>";     
                    }
                }
            }else{
                echo "<script>alert('$fileErr'); window.location.href='http://localhost/Hulkzone/dietician/createComplaint.php';</script>";
            }
        } elseif (!empty($subject) && !empty($description)) {
            $sql = "INSERT INTO complaint (subject, description, status, dateReported, userID) VALUES ('$subject', '$description', '$status', current_timestamp(), '$userID')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Complaint filed successfully!'); window.location.href='http://localhost/Hulkzone/dietician/complaint.php';</script>";

            }else{
                echo "<script>alert('There was an error filing the complaint.'); window.location.href='http://localhost/Hulkzone/dietician/createComplaint.php';</script>";
            }
        }
    }      
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Complaint</title>
    <link href="Style/complaint.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <!-- <img src="Images/complaint.jpg" alt="complaint" class="backgroundImage"> -->
        <div class="topBar">
            <div class="gymLogo"><img src="Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <img src="<?php echo $profilePic; ?>" alt="my profile" class="myProfile">
            </div>
        </div>
        <div class="content">
            <div class=" subtopic">
                <p>Report a Complaint</p>
            </div>
            <form id="complaintForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <table class="reportingContent">
                    <tr>
                        <td><label for="subject">Complaints Subject</label></td>
                        <td>
                            <span class="error"><?php echo $subjectErr; ?></span><br>
                            <input type="text" name="subject" id="subject" class="textBox"
                                placeholder="Enter your complaint subject">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="description">Complaints Description</label></td>
                        <td>
                            <span class="error"><?php echo $descriptionErr; ?></span><br>
                            <textarea name="description" id="description" cols="82" rows="6" style="resize: none;"
                                placeholder="Enter your complaint briefly"></textarea>
                        </td>
                    </tr>
                    <tr class="evidenceContent">
                        <td><label for="evidanceImage">Evidance: (Upload any proofs)</label></td>
                        <td>
                            <input type="file" id="evidanceImage" name="evidanceImage">
                        </td>
                    </tr>
                </table>
                <button type="submit" class="saveBtn" onclick="return Alertfunction()">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>