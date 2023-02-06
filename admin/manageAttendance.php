
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sideBar.css">
    <link rel="stylesheet" href="css/AnnouncementTable.css">
  
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  
</head>
<body>
<div class="sidebar">
      <div class="gymLogo"><img src="../../HulkZone/asset/images/gymLogo.png" alt="" width="80px" height="80px"></div>
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
                <div class="tab"><a href="manageTrainer.php"><i class="fa fa-user" style="padding-right: 15px;"></i> Manage Trainers</a></div>
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
        <div class="contentLeft"><p class="title">MEMBER ATTENDANCE</p></div>
        <div class="contentMiddle"><p class="myProfile">My Profile</p></div>
        <div class="contentRight"  style="padding-right:40px;"><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
    </div>
    <div class="down">
        <div class="topic">
        <a href="addAttendance.php"><button>Mark Attendance</button></a> 
        </div>
        <hr style="width: 98%;">
        <div class="tableAnnouncements">
            <table class="announcements">
                <tr>
                   <th>Member ID</th>
                   <th>Name</th>
                   <th>Gender</th>
                   <th>NIC</th>
                   <th>Date and Time</th>
                </tr>

                <?php 
                    include('../../HulkZone/connect.php');
                    
                    //read all row from database table
                    $sql="SELECT attendance.memberID,attendance.timestamp,user.fName,user.gender,user.NIC
                    FROM (( attendance 
                    INNER JOIN member ON member.memberID=attendance.memberID)
                    INNER JOIN user ON user.userID=member.userID)
                    ORDER BY timestamp
                  ";
                    $result=$conn->query($sql);

                    if (!$result) {
                         die("invalid query: " .$conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo"
                    <tr>
                   <td>$row[memberID]</td>
                   <td>$row[fName]</td>
                   <td>$row[gender]</td>
                   <td>$row[NIC]</td>
                   <td>$row[timestamp]</td>
                </tr>";
                    }
                    
                ?>
                
                
            </table>
        </div>
    </div>
    </div>

     
   
      
    </body>

</html>