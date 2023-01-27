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
<div class="sidebar">
      <div class="gymLogo"><img src="../../HulkZone/asset/images/gymLogo.png" alt="">  </div>
            <div class="sidebarContent">
                <div class="tab"><a href="#dashboard"><i class="fa fa-dashboard" style="padding-right: 15px;"></i> Dashboard</a></div>
                <hr>
                <div class="tab"><a href="#MyProfile"><i class="fas fa-user-tie" style="padding-right: 15px;"></i> My Profile</a></div>
                <hr>
                <div class="tab"><a href="#ManageMembers"><i class="	fa fa-users" style="padding-right: 15px;"></i> Manage Members</a></div>
                <hr>
                <div class="tab"><a href="#Attendance"><i class="fa fa-calendar" style="padding-right: 15px;"></i> Member Attendance</a></div>
                <hr>
                <div class="tab"><a href="#Schedule"><i class="fa fa-clock-o" style="padding-right: 15px;"></i> Schedule</a></div>
                <hr>
                <div class="tab"><a href="#ManageTrainers"><i class="	fa fa-user" style="padding-right: 15px;"></i> Manage Trainers</a></div>
                <hr>
                <div class="tab"><a href="#ManageDieticians"><i class="fas fa-user-nurse" style="padding-right: 15px;"></i> Manage Dieticians</a></div>
                <hr>
                <div class="tab"><a href="#User Complaints"><i class='	fas fa-exclamation-circle' style="padding-right: 15px;"></i>User Complaints</a></div>
                <hr>
                <div class="tab"><a href="../../HulkZone/admin/viewAnnouncements.php"><i class='fas fa-bullhorn' style="padding-right: 15px;"></i>Announcements</a></div>
                <hr>
                <div class="tab"><a href="#Reports"><i class=' fas fa-file-alt ' style="padding-right: 15px;"></i>Reports</a></div>
                <hr>
                <div class="tab"><a href="#LogOut"><i class="fa fa-sign-out " style="padding-right: 15px;"></i>Log Out</a></div>
                <hr>
            </div>
      </div>
   
    
    <!--Right Part-->
    <div class="right" style="display: flex; flex-direction:column;margin-left:20%;">
    
    <div class="content" style="width: 100%;float:right;">
        <div class="contentLeft"><p class="title">ANNOUNCEMENTS</p></div>
        <div class="contentMiddle"><p class="myProfile">My Profile</p></div>
        <div class="contentRight"  style="padding-right:40px;"><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
    </div>

   
    <div class="down">
        <div class="topic">
            <h1>Add Announcement</h1>
        </div>
        <hr style="width: 98%;">
        <div class="addAnnouncementForm">
    <form action=""  method="POST">
    <label class="formContent">Message</label>
    <textarea name="message" id="" cols="30" rows="10" style="width: 80%;" ></textarea>
    <br>
    <label  class="formContent">Date</label>
    <input type="date"  name="date"  style=" width: 170px;margin-left: 160px;">
    <br>
    
    
    <input type="submit" value="submit">
    
    </div>
  </form>
    </div>
    </div>
    </div>

     
   
      
    </body>
</html>
