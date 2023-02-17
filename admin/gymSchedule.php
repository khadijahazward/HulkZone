
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule and  Attendance | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sideBar.css">
    <link rel="stylesheet" href="css/AnnouncementTable.css">
  
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
            <p class="title">Gym Schedule</p>
        </div>
        <div class="contentMiddle">
            <p class="myProfile">My Profile</p>
        </div>
        <div class="contentRight" ><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
    </div>
    <div class="down">
        
        <hr style="width: 98%;">
        <div class="tableAnnouncements">
            <table class="announcements">
                <tr>
                   <th>Member ID</th>
                   <th>Member Name</th>
                   <th>Trainer</th>
                   <th>Date</th>
                   <th>Start Time</th>
                   <th>End Time</th>
                   <th>Attendance</th>
                </tr>


                <?php 
                    include('../../HulkZone/connect.php');
                    
                    //read all row from database table
                    /*$sql="SELECT attendance.memberID,attendance.timestamp,user.fName,user.gender,user.NIC
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
                   <td> <input type='checkbox' ></td>

                </tr>";
                    }*/
                    
                ?>
                
                
            </table>
        </div>
    </div>
    </div>

     
   
      
    </body>

</html>