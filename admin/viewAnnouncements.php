<?php
include('authorization.php');
include('setAdminProfilePic.php');
include('notiCount.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Announcements | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sideBar.css">
    <link rel="stylesheet" href="css/table.css">
  
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
     
        <div>
        <div class="notification" style="margin-left: 572px;top:0px;" >
          <?php
          include 'notifications.php';
          ?>
        </div>
      </div>
      <div class="notiCount" style="padding-top: 20px;margin-left:700px;" >
        <p ><?php echo $count; ?></p>
      </div>


      <div class="contentMiddle" style="margin-left:30px;width: 120px;">
        <p class="myProfile" >My Profile</p>
      </div>
      <div class="contentRight" style="margin-left: 0px;"><img src="<?php echo $profilePictureLink ?>" alt="AdminLogo" class="adminLogo"></div>
    </div>
    <div class="down">
        <div class="topic">
        <a href="addAnnouncements.php"><button>Add Announcement</button></a> 
        </div>
        <hr style="width: 98%;">
        <div class="tableAnnouncements">
            <table class="announcements">
                <tr>
                   <th>NotificationID</th>
                   <th>Date and Time</th>
                   <th>Message</th>
                   <th>Action</th>
                </tr>

                <?php 
                    include('../../HulkZone/connect.php');
                    
                    //read all row from database table
                    $sql="SELECT * FROM notifications where type=0";
                   $result=mysqli_query($conn,$sql);

                    if (!$result) {
                         die("invalid query: " .mysqli_error($conn));
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo"
                    <tr>
                   <td>$row[notificationsID]</td>
                   <td>$row[created_at]</td>
                   <td>$row[message]</td>
                   
                   <td><a href='deleteAnnouncement.php?notificationsID=$row[notificationsID]'onclick='return confirm(\"Are you sure you want to delete this announcement?\");'><button class='button1'> Delete</button></a>  
                   <a href='editAnnouncement.php?notificationsID=$row[notificationsID]' ><button class='button2' style='width: 120px;margin-top:1px'>Edit</button></a>
                   </td>
                  
                </tr>";
                    }
                    
                ?>
           

                
            </table>
        </div>
    </div>
    </div>

     
   
      
    </body>

</html>