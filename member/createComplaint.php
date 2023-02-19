<?php 
include 'authorization.php';
include "../connect.php";
?>

<?php
    include("setProfilePic.php");
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
                $upload_path = "C:/xampp/htdocs/HulkZone/Complaintevidence/" . $new_filename;

                //moves an uploaded file to a new location. 
                if (move_uploaded_file($_FILES["Evi-image"]["tmp_name"], $upload_path)) {
                    $sql = "INSERT INTO complaint (subject, description, status, dateReported, userID, evidence) VALUES ('$subject', '$des', '$status', current_timestamp(), '$userid', '$upload_path')";
                        
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Complaint filed successfully!'); window.location.href='http://localhost/Hulkzone/member/complaint.php';</script>";     
                    }
                }
            }else{
                echo "<script>alert('$fileErr'); window.location.href='http://localhost/Hulkzone/member/createComplaint.php';</script>";
            }
        } elseif (!empty($subject) && !empty($des)) {
            $sql = "INSERT INTO complaint (subject, description, status, dateReported, userID) VALUES ('$subject', '$des', '$status', current_timestamp(), '$userid')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Complaint filed successfully!'); window.location.href='http://localhost/Hulkzone/member/complaint.php';</script>";

            }else{
                echo "<script>alert('There was an error filing the complaint.'); window.location.href='http://localhost/Hulkzone/member/createComplaint.php';</script>";
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
    <title>Complaint | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/complaint.css">
    
</head>
<body>
    <div class="container">
        <div class = "nav-bar">
            <?php
                include("navBar.php");
            ?>
        </div>
        <div class="body">
            <div class = "header">
                <div class="left"> 
                    COMPLAINTS
                </div>
                <div class="right">
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">
                <div class="row">Report a Complaint</div>

                <div class="row" style="background-color:#DEF9D7; margin-right:10px; border-radius:15px;">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="complaintForm" enctype="multipart/form-data">

                        <div class="form-row">
                            <label>Complaint Subject
                                <span class=" error">*<br> 
                                    <?php echo $subjectErr; ?>
                                </span>
                            </label>
                            <input type="text" id ="subject" name="subject" 
                            value="<?php if ($check == 1) {echo $_POST['subject'] ?? '';}else if($check == 0){$_POST['subject'] == ""; }?>">
                        </div>

                        <div class="form-row">
                            <label>Complaint Description
                                <span class=" error">*<br> 
                                    <?php echo $desErr; ?>
                                </span>
                            </label>
                            <textarea rows="4" id="des" name="des"><?php if ($check == 1) {echo $_POST['des'] ?? ''; }else if($check == 0){ $_POST['des'] == ""; }?></textarea>
                        </div>

                        <div class="form-row">
                            <label>Evidence: (Upload any proofs)</label>
                            <input type="file" name="Evi-image">
                        </div>

                        <div class="center">
                        <button type="submit" class="submit-Btn" onclick="return Alertfunction()">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</body>
</html>

