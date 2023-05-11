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
    <title>View User Complaints | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sideBar.css">
    <link rel="stylesheet" href="css/table.css">
  
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>

        .topic{
            background-color: #FF9F29;
            margin-top: 5px;
            margin-right: 5px;
            margin-left: 5px;
            border-radius: 25px;
        }
        .topTopics{
            margin-left:30px;
            margin-right:80px;
            
            padding-left: 2px;
        }

        .topTopic{
            font-size: 17px;
            color:#006837;
        }
        
        .topTopic:hover{
            color: #ffffff;
            cursor: pointer;
        }

        .titlebelow{
            font-size: 18px;
            color: #006837;
            margin-left: 30px;
        }

        .linkToptopic{
            text-decoration: none;
        }
    </style>
  
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
        
        <div>
        <div class="notification" style="margin-left: 657px;top:0px;" >
          <?php
          include 'notifications.php';
          ?>
        </div>
      </div>
      <div class="notiCount" style="padding-top: 20px;margin-left:785px;" >
        <p ><?php echo $count; ?></p>
      </div>


      <div class="contentMiddle" style="margin-left:30px;width: 120px;">
        <p class="myProfile" >My Profile</p>
      </div>
      <div class="contentRight" style="margin-left: 0px;"><img src="<?php echo $profilePictureLink ?>" alt="AdminLogo" class="adminLogo"></div>
    </div>

    <div class="down">
        <div class="topic" style="display: flex;flex-direction:row;">
        <a href="manageComplaints.php" class="linkToptopic"><div class="topTopics"><h1  class="topTopic" >All User Complaints</h1></div></a>
        <a href="filedComplaints.php" class="linkToptopic"><div class="topTopics"><h1 class="topTopic">Filed Complaints</h1></div></a>
        <a href="completedComplaints.php" class="linkToptopic"><div class="topTopics"><h1 class="topTopic">Completed Complaints</h1></div></a>
        <a href="ignoredComplaints.php" class="linkToptopic"><div class="topTopics" ><h1 class="topTopic" >Removed Complaints</h1></div></a>
        </div>
        <div>
        <div ><h1 class="titlebelow" >All User Complaints</h1></div>
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
             
             $result = mysqli_query($conn, $sql);

                    if (!$result) {
                         die("invalid query: " .$conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        if ($row['status'] != 'Ignored') { // if status is not equla to "Removed" below code will work
                        echo"
                    <tr>
                   <td>$row[complaintID]</td>
                   <td>$row[fName]</td>
                   <td>$row[dateReported]</td>
                   <td>$row[userType]</td>
                   <td>". (($row['status'] == 'Filed') ? '<span style="color:red;">Filed</span>' : $row['status']) . "</td>
                   <td><a href='deleteComplaint.php?complaintID=$row[complaintID]'onclick='return confirm(\"Are you sure you want to remove this compalint?\");'><button class='button1'>Ignore</button></a>  
                   <a href='editComplaintCheck.php?complaintID=$row[complaintID]' ><button class='button2' style='width: 120px;margin-top:1px'>Respond</button></a>
                   </td>
                  
                </tr>";
                    }
                }
                    
                ?>
           

                
            </table>
        </div>
    </div>
    </div>

     
   
      
    </body>

</html>
