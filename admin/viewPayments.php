<?php
// Connect to database
include('../connect.php');
include('authorization.php');
include('notiCount.php');


?>
<?php
include('setAdminProfilePic.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin</title>


    <link rel="stylesheet" href="css/addAnnouncements.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/header.css">
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
                <p class="title" style="width:250px">MEMBER PAYMENTS</p>
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
        <!-- below the header -->
        <div class="down">
        <hr style="width: 98%;">
        <div class="tableAnnouncements">
            <table class="announcements">
                <tr>
                   <th>MemberID</th>
                   <th>Member Name</th>
                   <th>Gender</th>
                   <th>Payment Plan</th>
                   <th>Payment History</th>
                </tr>

                <?php 
                    include('../../HulkZone/connect.php');
                    
                    //read all row from database table
                   /* $sql="SELECT m.memberID,m.planType, u.fName, u.gender
                    FROM payment p
                    JOIN member m ON p.memberID = m.memberID
                    JOIN user u ON m.userID = u.userID
                    GROUP BY m.memberID
                    ";*/
                    $sql="SELECT * FROM user u
                    JOIN member m
                    ON u.userID=m.userID
                    GROUP BY m.memberID";
                    $result=mysqli_query($conn, $sql);

                    if (!$result) {
                         die("invalid query: " .$conn->error);
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo"
                    <tr>
                   <td>$row[memberID]</td>
                   <td>$row[fName]</td>
                   <td>$row[gender]</td>
                   <td>$row[planType]</td>

                  
                   
                   <td>
                   <a href='viewPaymentHistory.php?memberID=$row[memberID]' ><button class='button2' style='width: 120px;margin-top:1px'>View</button></a>
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