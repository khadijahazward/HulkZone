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
    <title>Manage Trainers | Admin</title>
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
            <p class="title" style="width: 250px;">MANAGE TRAINERS</p>
        </div>
        <div>
        <div class="notification" style="margin-left: 555px;top:0px;" >
          <?php
          include 'notifications.php';
          ?>
        </div>
      </div>
      <div class="notiCount" style="padding-top: 20px;margin-left:685px;" >
        <p ><?php echo $count; ?></p>
      </div>


      <div class="contentMiddle" style="margin-left:30px;width: 120px;">
        <p class="myProfile" >My Profile</p>
      </div>
      <div class="contentRight" style="margin-left: 0px;"><img src="<?php echo $profilePictureLink ?>" alt="AdminLogo" class="adminLogo"></div>
    </div>
    <div class="down">
        <div class="topic">
        <a href="addTrainer.php"><button>Add Trainer</button></a> 
        </div>
        <hr style="width: 98%;">
        <div class="tableAnnouncements">
            <table class="announcements">
                <tr>
                   <th>Employee ID</th>
                   <th>Name</th>
                   <th>Gender</th>
                   <!--<th>Action</th>-->
                   <th>Account status</th>
                   <th>Action</th>
                </tr>

                <?php 
                    include('../../HulkZone/connect.php');
                    
                    

                     $sql="SELECT user.userID,user.fName, user.gender, employee.employeeID,
                                CASE
                                WHEN user.statuses = 1 THEN 'Enabled'
                                ELSE 'Disabled'
                                END AS accountStatus
                                FROM user
                                INNER JOIN employee ON user.userID = employee.userID
                                WHERE user.roles = 2";

                   $result = mysqli_query($conn, $sql);

                    if (!$result) {
                         die("invalid query: " .$conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        $statusText = ($row['accountStatus'] == 'Enabled') ? 'Disabled' : 'Enabled';
                        $statusValue = ($row['accountStatus'] == 'Enabled') ? '0' : '1';
                        $buttonStyle = ($row['accountStatus'] == 'Disabled') ? 'background-color: red;' : '';
                        echo"
                    <tr>
                   <td>$row[employeeID]</td>
                   <td>$row[fName]</td>
                   <td>$row[gender]</td>
                  
                  
                   
                   
                   
                   <td>
                   <form method='POST' action='accountStatusButton/changeStatusTrainer.php' onsubmit='return confirmSubmission()'>
                       <button type='submit' class='button2' name='status' value='$statusValue'style='$buttonStyle'>{$row['accountStatus']}</button>
                       <input type='hidden' name='userID' value='{$row['userID']}'>
                   </form>
               </td>
                   <td>
                   <a href='viewTrainerProfile.php?employeeID=$row[employeeID]'><button class='button2' style='width: 120px;margin-top:1px'>View more</button></a>

                  
                </tr>";
                    }
                    
                ?>
                 <script>
            function confirmSubmission() {
                if (confirm("Are you sure you want to save the changes?")) {
                    return true;
                } else {
                    return false;
                }
            }
            </script>
                
            </table>
        </div>
    </div>

     
   
      
    </body>

</html>