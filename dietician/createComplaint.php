<?php 
include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';
?>

<!--checking for empty fields-->
<?php

$check = "";
$userid = $_SESSION["userID"];
$subjectErr = $desErr = "";
include "../connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["subject"])) {
        $subjectErr = "Subject is required";
    }
    if (empty($_POST["des"])) {
        $desErr = "Description is required";
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

    $subject = $des =" ";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $check = 1;
        $subject = test_input($_POST["subject"]);
        $des = test_input($_POST["des"]);
        $userid = $_SESSION["userID"];
        $status = "Filed";


        //for file upload - if there is an image
        if (isset($_FILES["Evi-image"]) && $_FILES["Evi-image"]["error"] !== UPLOAD_ERR_NO_FILE && !empty($subject) && !empty($des)){
            $allowed_types = array("image/jpeg", "image/png");
            $allowed_size = 5242880; // 5MB - 5 * 1024 * 1024

            // Checking file types
            if (!in_array($_FILES["Evi-image"]["type"], $allowed_types)) {
                $fileErr = "Invalid file type. Only JPEG and PNG files are allowed.";
                $check = 0;
            }

            // Checking size of the file uploaded
            if ($_FILES["Evi-image"]["size"] > $allowed_size) {
                $fileErr = "File size is too large. Maximum size is 5MB.";
                $check = 0;
            }

            if ($check == 1) {
                // splitting the file name into an array, where each element of the array is a substring of the original file name separated by the "." character. 
                $temp = explode(".", $_FILES["Evi-image"]["name"]);
                //returns last element of the array
                $extension = end($temp);
                

                $new_filename = $_SESSION['userID'] . "_" . time() .".$extension";
                //storing file in the Complaintevidence folder
                $upload_path = "../Complaintevidence/" . $new_filename;

                //moves an uploaded file to a new location. 
                if (move_uploaded_file($_FILES["Evi-image"]["tmp_name"], $upload_path)) {
                    $sql = "INSERT INTO complaint (subject, description, status, dateReported, userID, evidence) VALUES ('$subject', '$des', '$status', current_timestamp(), '$userid', '$upload_path')";
                        
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Complaint filed successfully!'); window.location.href='http://localhost/Hulkzone/dietician/complaint.php';</script>";     
                    }
                }
            }else{
                echo "<script>alert('$fileErr'); window.location.href='http://localhost/Hulkzone/dietician/createComplaint.php';</script>";
            }
        } elseif (!empty($subject) && !empty($des)) {
            $sql = "INSERT INTO complaint (subject, description, status, dateReported, userID) VALUES ('$subject', '$des', '$status', current_timestamp(), '$userid')";

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
    <link href="Style/newSupplement.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class="container">
        <!-- <div class="topBar">
            <div class="gymLogo"><img src="Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <div class="notification">
                    <?php
                    include 'notifications.php';
                    ?>
                </div>
                <img src="<?php echo $profilePic ?>" alt=" my profile" class="myProfile">
            </div>
        </div> -->
        <div class="content">
            <div class="topic">
                <p>Add a Supplement</p>
            </div>
            <form class="supplementForm" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="subject">Complaints Subject</label></td>
                        <td>
                            <span class="error"><?php echo $subjectErr; ?></span><br>
                            <input type="text" name="subject" id="subject" class="textBox"
                                placeholder="Enter your complaint subject"
                                value="<?php if ($check == 1) {echo $_POST['subject'] ?? '';}else if($check == 0){$_POST['subject'] == ""; }?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="description">Complaints Description</label></td>
                        <td>
                            <span class="error"><?php echo $desErr; ?></span><br>
                            <textarea name="des" id="des" cols="82" rows="6" style="resize: none;"
                                placeholder="Enter your complaint briefly">

                                <?php if ($check == 1) {echo $_POST['des'] ?? ''; }else if($check == 0){ $_POST['des'] == ""; }?>
                                
                            </textarea>
                        </td>
                    </tr>
                    <tr class="evidenceContent">
                        <td><label for="Evi-image">Evidance: (Upload any proofs)</label></td>
                        <td>
                            <input type="file" name="Evi-image" class="imageBox">
                        </td>
                    </tr>
                </table>
                <button type="submit" class="acceptBtn">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>