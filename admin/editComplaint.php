<?php

    include('authorization.php');
    include('../../HulkZone/connect.php');
    include('notiCount.php');
    
    //Getting the complaint ID from the URL
    $complaintID = $_GET['complaintID'];

    
    // Check for the form submission
    if (isset($_POST['submit'])) {
        // Get the form data
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $desiredOutcome = mysqli_real_escape_string($conn, $_POST['desiredOutcome']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $dateReported = mysqli_real_escape_string($conn, $_POST['dateReported']);
        $actionTaken = mysqli_real_escape_string($conn, $_POST['actionTaken']);
    
       $sql="UPDATE complaint SET status = ?, actionTaken = ? WHERE complaintID = ?";
       $stmt=mysqli_prepare($conn, $sql);
       mysqli_stmt_bind_param($stmt,"ssi", $status, $actionTaken, $complaintID);
      mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    
        if ($status == 'Completed') {
          
            $sql="SELECT userID FROM complaint WHERE complaintID=$complaintID";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $userID=$row['userID'];
            
            // Insert data into the notifications table
            $currentDateTime = new DateTime('now', new DateTimeZone('UTC'));
            $currentDateTime->setTimezone(new DateTimeZone('Asia/Colombo'));
            $date = $currentDateTime->format('Y-m-d H:i:s');
            $message = $actionTaken;

            $sql="INSERT INTO notifications (message, created_at, type) VALUES (?, ?, 1)";
            $stmt=mysqli_prepare($conn,$sql);
           mysqli_stmt_bind_param($stmt,"ss",$message, $date);
           mysqli_stmt_execute($stmt);
           mysqli_stmt_close($stmt);
      
            // Insert data into the usernotifications table
            $status = 0;
            $notificationsID = mysqli_insert_id($conn); // Get the auto-generated ID of the new row
            $sql = "INSERT INTO usernotifications (notificationsID, userID, status) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "iii", $notificationsID, $userID, $status);
            mysqli_stmt_execute($stmt);
            mysqli_insert_id($conn);
    
            mysqli_stmt_close($stmt);
            
        }
    
        // Close the database connection
        mysqli_close($conn);
        // Redirect the user to the manage complaints page
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
    //$desiredOutcome = $row['desiredOutcome'];
    $status = $row['status'];
    $dateReported = $row['dateReported'];
    $userID = $row['userID'];
    $actionTaken = $row['actionTaken'];
    $evidence = str_replace("C:/xampp/htdocs", "", $row['evidence']);
    // replace the local file system path with the website URL
    $evidence = str_replace("\\", "/", $evidence);
    $evidence = "http://localhost" . $evidence;
  }
}

$query = "SELECT * FROM user WHERE userID='$userID'";//userID is retreived already above
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 1) {//only one member's detail.
  $row = mysqli_fetch_array($result);
  $fName = $row['fName'];
  $roles = $row['roles'];
  $contactNumber=$row['contactNumber'];

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
 <style>
    .evidenceImage{
        width: 200px;
        height: 200px;
        margin-left: 260px;
    }
 </style>

</head>
<body>
  


<?php 
include('../admin/sideBar.php');
include('setAdminProfilePic.php');
?>
        <div class="right">

        <div class="content" >
            <div class="contentLeft">
                <p class="title" style="width: 250px;">User Complaints</p>
            </div>
            <div>
        <div class="notification" style="margin-left: 611px;" >
          <?php
          include 'notifications.php';
          ?>
        </div>
      </div>
      <div class="notiCount" style="padding-top: 7.5px;margin-left:650px;" >
        <p ><?php echo $count; ?></p>
      </div>


      <div class="contentMiddle" style="margin-left:35px;">
        <p class="myProfile">My Profile</p>
      </div>
      <div class="contentRight" style="margin-left: 0px;"><img src="<?php echo $profilePictureLink ?>" alt="AdminLogo" class="adminLogo"></div>
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
                    <label class="formContent">Contact Number</label>
                    <input type="text" name="userType" value="<?php echo $contactNumber; ?>"style="margin-left: 110px;" readonly >
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
                    <label class="formContent">Evidence</label>
                    <br>
                    <img class="evidenceImage" src="<?php echo $evidence; ?>" alt="No evience is provided by the user">
                    <br>
                    <label class="formContent">Action Taken</label>
                    <br>
                    <textarea name="actionTaken" id="" cols="60" rows="5" style="margin-left: 258px;" required><?php echo $actionTaken; ?></textarea>
                    <br>
                    <label class="formContent">Complaint Status</label>
                    <select name="status" id="gender" style="margin-left: 98px;" required>
                        <option value="Filed"  <?php echo $status=='filed'?'selected':''; ?>>Filed</option>
                        <option value="Completed"  <?php echo $status=='completed'?'selected':''; ?>>Completed</option>
                      
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

