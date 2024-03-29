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
    <title>View Members | Admin</title>
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
        <div class="contentLeft" style="width: 250px;">
            <p class="title" style="width: 250px;">MANAGE MEMBERS</p>
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
        <h1 style="color: #006837;font-size:19px;margin-left:27px">Manage Members</h1> 
        </div>
        <hr style="width: 98%;"></div>
        <div class="tableAnnouncements">
            <table class="announcements">
                <tr>
                   <th>Member ID</th>
                   <th>Name</th>
                   <th>Gender</th>
                   <th>E-mail</th>
                   <th>Date of Birth</th>
                
                   <th>Account status</th>
                   <th>Action</th>
                </tr>

                <?php 
include('../../HulkZone/connect.php');

$sql = "SELECT user.userID, user.fName, user.gender, user.email, user.dateOfBirth, member.memberID,
        CASE user.statuses
            WHEN 1 THEN 'Enabled'
            ELSE 'Disabled'
        END AS accountStatus
        FROM user
        INNER JOIN member ON user.userID=member.userID";

$result=mysqli_query($conn,$sql);

if (!$result) {
    die("Invalid query: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
    
    //If the value is "Enabled", we set $statusValue to 0, otherwise we set it to 1.
    $statusValue = ($row['accountStatus'] == 'Enabled') ? '0' : '1';
   // If the value is "Disabled",  background-color "red".If not no style
    $buttonStyle = ($row['accountStatus'] == 'Disabled') ? 'background-color: red;' : '';

    echo "
        <tr>
            <td>{$row['memberID']}</td>
            <td>{$row['fName']}</td>
            <td>{$row['gender']}</td>
            <td>{$row['email']}</td>
            <td>{$row['dateOfBirth']}</td>
            <td>
                <form method='POST' action='accountStatusButton/changeStatusMember.php' onsubmit='return confirmSubmission()'>
                    <button type='submit' class='button2' name='status' value='$statusValue'style='$buttonStyle'>{$row['accountStatus']}</button>
                    <input type='hidden' name='userID' value='{$row['userID']}'>
                </form>
            </td>
            <td>
            <a href='viewMemberProfile.php?memberID=$row[memberID]'><button class='button2' style='width: 120px;margin-top:1px'>View more</button></a>
            </td>
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
    </div>

    
   
      
    </body>
</html>