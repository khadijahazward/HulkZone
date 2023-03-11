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
            <img src="img/profile-icon.png" alt="profile-icon">
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
    </section>
</body>

</html>