<?php
include('authorization.php');
// Connect to the database
include('../../HulkZone/connect.php');
include('notiCount.php');
// Get the announcementID from the URL
$notificationsID = mysqli_real_escape_string($conn, $_GET['notificationsID']);

// Prepare the select statement
$stmt = $conn->prepare("SELECT message FROM notifications WHERE notificationsID = ?");
$stmt->bind_param("i", $notificationsID);

// Execute the statement
$stmt->execute();

// Bind the result
$stmt->bind_result($message);

// Fetch the result
$stmt->fetch();

// Close the statement and connection
$stmt->close();
$conn->close();
?>
<?php
include('setAdminProfilePic.php');
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
    <?php
    include('../admin/sideBar.php');
    ?>
    <div class="right">

        <div class="content">
            <div class="contentLeft">
                <p class="title">Announcements</p>
            </div>
            <div>
        <div class="notification" style="margin-left: 716px;" >
          <?php
          include 'notifications.php';
          ?>
        </div>
      </div>
      <div class="notiCount" style="padding-top: 7.5px;margin-left:755px;" >
        <p ><?php echo $count; ?></p>
      </div>


      <div class="contentMiddle" style="margin-left:30px;">
        <p class="myProfile">My Profile</p>
      </div>
      <div class="contentRight" style="margin-left: 0px;"><img src="<?php echo $profilePictureLink ?>" alt="AdminLogo" class="adminLogo"></div>
    </div>
        <div class="down">
            <div class="topic">
                <h1>Add Announcement</h1>
            </div>
            <?php
            ?>
            <hr style="width: 98%;">
            <div class="addAnnouncementForm">
                <form method="POST" action="createAnnouncements.php" onsubmit="return confirmSubmission()">
                    <label class="formContent">Message</label>
                    <textarea name="m" id="" cols="30" rows="10" style="width: 80%;" required><?php echo $message; ?></textarea>
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