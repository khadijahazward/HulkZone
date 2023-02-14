<?php

/*include('../../HulkZone/connect.php');

if(isset($_POST['submit'])) {
  $complaintID = $_POST['complaintID'];
  $subject = $_POST['subject'];
  $description = $_POST['description'];
  $desiredOutcome = $_POST['desiredOutcome'];
  $status = $_POST['status'];
  $dateReported = $_POST['dateReported'];
  $userID = $_POST['userID'];
  $actionTaken = $_POST['actionTaken'];

  $query = "UPDATE complaint SET subject='$subject', description='$description', desiredOutcome='$desiredOutcome', status='$status', dateReported='$dateReported', userID='$userID', actionTaken='$actionTaken' WHERE complaintID='$complaintID'";
  $result = mysqli_query($conn, $query);

  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = "Complaint Updated Successfully";
  $_SESSION['message_type'] = "success";
  header("Location: manageComplaints.php");
}*/
include('../../HulkZone/connect.php');

// Get the announcementID from the URL
$complaintID = mysqli_real_escape_string($conn, $_GET['complaintID']);

// Check for the form submission
if (isset($_POST['submit'])) {
    // Get the form data
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $desiredOutcome = mysqli_real_escape_string($conn, $_POST['desiredOutcome']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $dateReported = mysqli_real_escape_string($conn, $_POST['dateReported']);
    $actionTaken = mysqli_real_escape_string($conn, $_POST['actionTaken']);
    // Prepare the update statement
    $stmt = $conn->prepare("UPDATE complaint SET  status= ?, actionTaken = ? WHERE complaintID = ?");
    $stmt->bind_param("ssi", $status, $actionTaken, $complaintID);

    // Execute the statement
    $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect the user to the view announcements page
    header("Location: manageComplaints.php");
    exit();
}

if(isset($_GET['complaintID'])) {
  $complaintID = $_GET['complaintID'];

  $query = "SELECT * FROM complaint WHERE complaintID='$complaintID'";
  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $subject = $row['subject'];
    $description = $row['description'];
    $desiredOutcome = $row['desiredOutcome'];
    $status = $row['status'];
    $dateReported = $row['dateReported'];
    $userID = $row['userID'];
    $actionTaken = $row['actionTaken'];
  }
}

$query = "SELECT * FROM user WHERE userID='$userID'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_array($result);
  $fName = $row['fName'];
  $roles = $row['roles'];

  if($roles == 1) {
    $userType = 'Member';
  } elseif($roles == 2) {
    $userType = 'Trainer';
  } else {
    $userType = 'Dietician';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Announcements | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sideBar.css">
    <link rel="stylesheet" href="css/complaintForm.css">

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
                <p class="title">USER COMOPLAINTS</p>
            </div>
            <div class="contentMiddle">
                <p class="myProfile">My Profile</p>
            </div>
            <div class="contentRight" style="padding-right:40px;"><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
        </div>


        <div class="down">
            <div class="topic">
                <h1>Complaint Details</h1>
            </div>
            <?php
            ?>
            <hr style="width: 98%;">
            <div class="complaintForm">
                <form action="" method="POST" onsubmit="return confirmSubmission()">
                    <label class="formContent">Name</label>
                    <input type="text" name="fName" value="<?php echo $fName; ?>" style="margin-top: 50px;" readonly>
                    <br>
                    <label class="formContent">User Type</label>
                    <input type="text" name="userType" value="<?php echo $userType; ?>"style="margin-left: 165px;" readonly >
                    <br>
                    <label class="formContent">Date reported</label>
                    <input type="date" name="dateReported" value="<?php echo $dateReported; ?>"style="margin-left: 131px;" readonly >
                    <br>
                    <label class="formContent">Subject</label>
                    <input type="text" name="subject" value="<?php echo $subject; ?>" style="margin-left: 186px;"  readonly>
                    <br>
                    <label class="formContent">Description</label>
                    <br>
                    <textarea name="description" id="" cols="60" rows="5" style="margin-left: 258px;"  readonly><?php echo $description; ?></textarea>
                    <br>
                    <label class="formContent">Desired Outcome</label>
                    <br>
                    <textarea name="desiredOutcome" id="" cols="60" rows="5" style="margin-left: 258px;" readonly><?php echo $desiredOutcome; ?></textarea>
                    <br>
                    <label class="formContent">Action Taken</label>
                    <br>
                    <textarea name="actionTaken" id="" cols="60" rows="5" style="margin-left: 258px;"><?php echo $actionTaken; ?></textarea>
                    <br>
                    <label class="formContent">Complaint Status</label>
                    <select name="status" id="gender" style="margin-left: 98px;" >
                        <option value="filed"  <?php echo $status=='filed'?'selected':''; ?>>Filed</option>
                        <option value="completed"  <?php echo $status=='completed'?'selected':''; ?>>Completed</option>
                      
                    </select>
                    <br>
                  
                    


                    <input type="submit" name="submit" value="Save">

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

