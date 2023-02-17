
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User Complaints | Admin</title>
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
            <p class="title">Complaints</p>
        </div>
        <div class="contentMiddle">
            <p class="myProfile">My Profile</p>
        </div>
        <div class="contentRight" ><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
    </div>

    <div class="down">
        <div class="topic">
        <h1 style="font-size: 19px;color:#006837;margin-left:30px">User Complaints</h1>
        </div>
        <hr style="width: 98%;">
        <div class="tableAnnouncements">
            <table class="announcements">
                <tr>
                   <th>ComplaintID</th>
                   <th>Name</th>
                   <th>Date</th>
                   <th>User type</th>
                   <th>Status</th>
                   <th>Action</th>
                </tr>

                <?php 
                    include('../../HulkZone/connect.php');
                    
                    //read all row from database table
                    $sql="SELECT complaint.complaintID, user.fName, complaint.dateReported,complaint.status,
                    CASE user.roles
                        WHEN 1 THEN 'Member'
                        WHEN 2 THEN 'Trainer'
                        WHEN 3 THEN 'Dietician'
                        ELSE 'Unknown'
                    END as userType
             FROM complaint
             INNER JOIN user ON complaint.userID = user.userID";
             
                    $result=$conn->query($sql);

                    if (!$result) {
                         die("invalid query: " .$conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo"
                    <tr>
                   <td>$row[complaintID]</td>
                   <td>$row[fName]</td>
                   <td>$row[dateReported]</td>
                   <td>$row[userType]</td>
                   <td>". (($row['status'] == 'Filed') ? '<span style="color:red;">Filed</span>' : $row['status']) . "</td>
                   <td><a href='deleteComplaint.php?complaintID=$row[complaintID]'onclick='return confirm(\"Are you sure you want to delete this compalint?\");'><button class='button1'>Remove</button></a>  
                   <a href='editComplaint.php?complaintID=$row[complaintID]' ><button class='button2' style='width: 120px;margin-top:1px'>Edit</button></a>
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
