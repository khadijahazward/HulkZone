<?php
// Connect to the database
include('../../HulkZone/connect.php');

// Get the announcementID from the URL
$announcementID = mysqli_real_escape_string($conn, $_GET['announcementID']);

// Check for the form submission
if (isset($_POST['submit'])) {
    // Get the form data
    $date = mysqli_real_escape_string($conn, $_POST['d']);
    $message = mysqli_real_escape_string($conn, $_POST['m']);

    // Prepare the update statement
    $stmt = $conn->prepare("UPDATE announcement SET date = ?, message = ? WHERE announcementID = ?");
    $stmt->bind_param("ssi", $date, $message, $announcementID);

    // Execute the statement
    $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect the user to the view announcements page
    header("Location: viewAnnouncements.php");
    exit();
}

// Prepare the select statement
$stmt = $conn->prepare("SELECT date, message FROM announcement WHERE announcementID = ?");
$stmt->bind_param("i", $announcementID);

// Execute the statement
$stmt->execute();

// Bind the result
$stmt->bind_result($date, $message);

// Fetch the result
$stmt->fetch();

// Close the statement and connection
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Announcements | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sideBar.css">
    <link rel="stylesheet" href="css/addAnnouncements.css">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
<div class="sidebar">
        <div class="gymLogo" ><img src="../../HulkZone/asset/images/gymLogo.png" alt="" width="80px" height="80px"> </div>
        <div class="sidebarContent">
            <div class="tab"><a href="dashboard.php"><i class="fa fa-dashboard" style="padding-right: 15px;"></i> Dashboard</a></div>
            <hr>
            <div class="tab"><a href="viewProfile.php"><i class="fas fa-user-tie" style="padding-right: 15px;"></i> My Profile</a></div>
            <hr>
            <div class="tab"><a href="manageMembers.php"><i class="	fa fa-users" style="padding-right: 15px;"></i> Manage Members</a></div>
            <hr>
            <div class="tab"><a href="manageAttendance.php"><i class="fa fa-calendar" style="padding-right: 15px;"></i> Member Attendance</a></div>
            <hr>
            <div class="tab"><a href="#Schedule"><i class="fa fa-clock-o" style="padding-right: 15px;"></i> Schedule</a></div>
            <hr>
            <div class="tab"><a href="manageTrainer.php"><i class="	fa fa-user" style="padding-right: 15px;"></i> Manage Trainers</a></div>
            <hr>
            <div class="tab"><a href="manageDietician.php"><i class="fas fa-user-nurse" style="padding-right: 15px;"></i> Manage Dieticians</a></div>
            <hr>
            <div class="tab"><a href="manageComplaints.php"><i class='	fas fa-exclamation-circle' style="padding-right: 15px;"></i>User Complaints</a></div>
            <hr>
            <div class="tab"><a href="viewAnnouncements.php"><i class='fas fa-bullhorn' style="padding-right: 15px;"></i>Announcements</a></div>
            <hr>
            <div class="tab"><a href="#Reports"><i class=' fas fa-file-alt ' style="padding-right: 15px;"></i>Reports</a></div>
            <hr>
            <div class="tab"><a href="#payments"><i class=' 	far fa-money-bill-alt ' style="padding-right: 15px;"></i>Member Payments</a></div>
            <hr>
            <div class="tab"><a href="login.php"><i class="fa fa-sign-out " style="padding-right: 15px;"></i>Log Out</a></div>
            <hr>
        </div>
    </div>


    <!--Right Part-->
    <div class="right" style="display: flex; flex-direction:column;margin-left:20%;">

        <div class="content" style="width: 100%;float:right;">
            <div class="contentLeft">
                <p class="title">ANNOUNCEMENTS</p>
            </div>
            <div class="contentMiddle">
                <p class="myProfile">My Profile</p>
            </div>
            <div class="contentRight" style="padding-right:40px;"><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
        </div>


        <div class="down">
            <div class="topic">
                <h1>Add Announcement</h1>
            </div>
            <?php
            ?>
            <hr style="width: 98%;">
            <div class="addAnnouncementForm">
                <form  method="POST" onsubmit="return confirmSubmission()">
                    <label class="formContent">Message</label>
                    <textarea name="m" id="" cols="30" rows="10" style="width: 80%;" required><?php echo $message; ?></textarea>
                    <br>
                    <label class="formContent">Date</label>
                    <input type="date" name="d" style=" width: 170px;margin-left: 160px;" value="<?php echo $date; ?>" required >
                    <br>


                    <input type="submit" name="submit" value="submit">

            </div>
            </form>
            <script>
                function confirmSubmission() {
                if (confirm("Are you sure you want to submit the form?")) {
                return true;
                } else {
                return false;
                }
            }
            </script>

        </div>
    </div>
    </div>

   

</body>

</html>


