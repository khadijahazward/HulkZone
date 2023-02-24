<?php 
include('authorization.php');
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
    <link rel="stylesheet" href="css/addAnnouncements.css">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
<?php 
include('../admin/sideBar.php');
?>
    <div class="right">

        <div class="content" >
            <div class="contentLeft">
                <p class="title">Announcements</p>
            </div>
            <div class="contentMiddle">
                <p class="myProfile">My Profile</p>
            </div>
            <div class="contentRight" ><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
        </div>

        <div class="down">
            <div class="topic">
                <h1>Add Announcement</h1>
            </div>
            <?php
            ?>
            <hr style="width: 98%;">
            <div class="addAnnouncementForm">
                <form action="createAnnouncements.php" method="POST" onsubmit="return confirmSubmission()">
                    <label class="formContent">Message</label>
                    <textarea name="m" id="" cols="30" rows="10" style="width: 80%;" required></textarea>
                    <br>
                    <label class="formContent">Date</label>
                    <input type="date" name="d" style=" width: 170px;margin-left: 160px;" required >
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

