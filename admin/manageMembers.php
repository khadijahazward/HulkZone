<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Members | Admin</title>
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
            <p class="title">MANAGE MEMBERS</p>
        </div>
        <div class="contentMiddle">
            <p class="myProfile">My Profile</p>
        </div>
        <div class="contentRight" ><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
    </div>
    <div class="down">
        <div class="topic">
        <h1 style="color: #006837;font-size:19px;margin-left:27px">Manage Members</h1> 
        </div>
        <hr style="width: 98%;">
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

$result = $conn->query($sql);

if (!$result) {
    die("Invalid query: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    $statusText = ($row['accountStatus'] == 'Enabled') ? 'Disabled' : 'Enabled';
    $statusValue = ($row['accountStatus'] == 'Enabled') ? '0' : '1';
    $buttonStyle = ($row['accountStatus'] == 'Disabled') ? 'background-color: red;' : '';

    echo "
        <tr>
            <td>{$row['memberID']}</td>
            <td>{$row['fName']}</td>
            <td>{$row['gender']}</td>
            <td>{$row['email']}</td>
            <td>{$row['dateOfBirth']}</td>
            <td>
                <form method='POST' action='accountStatusButton/changeStatusMember.php'>
                    <button type='submit' class='button2' name='status' value='$statusValue'style='$buttonStyle'>{$row['accountStatus']}</button>
                    <input type='hidden' name='userID' value='{$row['userID']}'>
                </form>
            </td>
            <td>
                <a href='viewMemberProfile.php?userID={$row['userID']}'><button class='button2' style='width: 120px;margin-top:1px'>View more</button></a>
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