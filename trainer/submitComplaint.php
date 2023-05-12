<?php
include '../connect.php';
include 'script/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/dashboard.css">
    <link rel="stylesheet" href="../member/style/complaint.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Complaint | Hulkzone</title>
    <script src="js/main.js" defer></script>
</head>
<?php
if (!$_SESSION['username']) {
    header('location: http://localhost/hulkzone/');
}

$check = "";
$userid = $_SESSION["userID"];
$subjectErr = $desErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["subject"])) {
        $subjectErr = "Subject is required";
    }
    if (empty($_POST["des"])) {
        $desErr = "Description is required";
    }
}
?>

<body>

    <nav class="main-sidebar">
        <img src="img/gymLogo 3.png" alt="Logo">
        <div class="navbar-items">
            <ul>
                <li>
                    <a href="<?php echo HOME ?>">
                        <span class="material-symbols-outlined">
                            home
                        </span> Home
                    </a>
                </li>
                <li>
                    <a href="<?php echo WORKOUT_PLAN ?>">
                        <span class="material-symbols-outlined">
                            fitness_center
                        </span> Workout Plan
                    </a>
                </li>
                <li>
                    <a href="<?php echo MEMBERS ?>">
                        <span class="material-symbols-outlined">
                            groups
                        </span> Members
                    </a>
                </li>
                <li>
                    <a href="<?php echo TIMESLOTS ?>">
                        <span class="material-symbols-outlined">
                            alarm
                        </span> Timeslots
                    </a>
                </li>
                <li>
                    <a href="<?php echo COMPLAINTS ?>">
                        <span class="material-symbols-outlined">
                            patient_list
                        </span> Complaints
                    </a>
                </li>
                <li>
                    <a href="<?php echo SETTINGS ?>">
                        <span class="material-symbols-outlined">
                            settings
                        </span> Settings
                    </a>
                </li>
                <li id="nav-logout">
                    <a href="<?php echo LOGOUT ?>">
                        <span class="material-symbols-outlined">
                            logout
                        </span> Logout
                    </a>
                </li>

            </ul>
        </div>
    </nav>
    <section class="top-navbar">
        <div class="top-search-bar">
            <span class="material-symbols-outlined">
                search
            </span>
            <input type="text" name="search" placeholder="Search...">
        </div>

        <div class="topbar-right">
            <div class="topbar-notification">
                <span class="material-symbols-outlined">
                    notifications
                </span>
            </div>
            <img id="profile-photo-style" src="<?php echo $_SESSION['profilePhoto']; ?>" alt="profile-icon">
        </div>

    </section>
    <section class="main-content-container" id="dashboard-page">

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
                            value="">
                        </div>

                        <div class="form-row">
                            <label>Complaint Description
                                <span class=" error">*<br> 
                                    <?php echo $desErr; ?>
                                </span>
                            </label>
                            <textarea rows="4" id="des" name="des"></textarea>
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
    </section>
</body>

</html>



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
                $upload_path = "C:/xampp/htdocs/hulkZone/Complaintevidence/" . $new_filename;

                //moves an uploaded file to a new location. 
                if (move_uploaded_file($_FILES["Evi-image"]["tmp_name"], $upload_path)) {
                    $sql = "INSERT INTO complaint (subject, description, status, dateReported, userID, evidence) VALUES ('$subject', '$des', '$status', current_timestamp(), '$userid', '$upload_path')";
                        
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Complaint filed successfully!'); window.location.href='http://localhost/Hulkzone/trainer/complaint.php';</script>";     
                    }
                }
            }else{
                echo "<script>alert('$fileErr'); window.location.href='http://localhost/Hulkzone/trainer/submitComplaint.php';</script>";
            }
        } elseif (!empty($subject) && !empty($des)) {
            $sql = "INSERT INTO complaint (subject, description, status, dateReported, userID) VALUES ('$subject', '$des', '$status', current_timestamp(), '$userid')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Complaint filed successfully!'); window.location.href='http://localhost/Hulkzone/trainer/complaint.php';</script>";

            }else{
                echo "<script>alert('There was an error filing the complaint.'); window.location.href='http://localhost/Hulkzone/trainer/complaint.php';</script>";
            }
        }
    }      
?>