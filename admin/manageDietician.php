<?php
include('authorization.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Dieticians | Admin</title>
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

        <div class="content">
            <div class="contentLeft">
                <p class="title">MANAGE DIETICIANS</p>
            </div>
            <div class="contentMiddle">
                <p class="myProfile">My Profile</p>
            </div>
            <div class="contentRight"><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
        </div>
        <div class="down">
            <div class="topic">
                <a href="addDietician.php"><button>Add Dietician</button></a>
            </div>
            <hr style="width: 98%;">
            <div class="tableAnnouncements">
                <table class="announcements">
                    <tr>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Account status</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    include('../../HulkZone/connect.php');



                    $sql = "SELECT user.userID,user.fName, user.gender, employee.employeeID,
        IF(user.statuses = 1, 'Enabled', 'Disabled') AS accountStatus
        FROM user
        INNER JOIN employee ON user.userID = employee.userID
        WHERE user.roles = 3";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("invalid query: " . $conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        $statusText = ($row['accountStatus'] == 'Enabled') ? 'Disabled' : 'Enabled';
                        $statusValue = ($row['accountStatus'] == 'Enabled') ? '0' : '1';
                        $buttonStyle = ($row['accountStatus'] == 'Disabled') ? 'background-color: red;' : '';
                        echo "
                    <tr>
                   <td>$row[employeeID]</td>
                   <td>$row[fName]</td>
                   <td>$row[gender]</td>
                  
                  
                   
                   
                   <td>
                   <form method='POST' action='accountStatusButton/changeStatusDietician.php'>
                       <button type='submit' class='button2' name='status' value='$statusValue'style='$buttonStyle'>{$row['accountStatus']}</button>
                       <input type='hidden' name='userID' value='{$row['userID']}'>
                   </form>
               </td>
                  
                   <td>
                   <a href='viewDieticianProfile.php?employeeID=$row[employeeID]'><button class='button2' style='width: 120px;margin-top:1px'>View more</button></a>
               
                  
                </tr>";
                    }

                    ?>


                </table>
            </div>
        </div>




</body>

</html>