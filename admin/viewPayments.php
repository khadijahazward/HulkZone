<?php
// Connect to database
include('../connect.php');
include('authorization.php');

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
                <p class="title">MEMBER PAYMENTS</p>
            </div>
            <div class="contentMiddle">
                <p class="myProfile">My Profile</p>
            </div>
            <div class="contentRight"><img src="<?php echo $profilePictureLink?>" alt="AdminLogo" class="adminLogo"></div>
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
                    $sql="SELECT m.memberID,m.planType, u.fName, u.gender
                    FROM payment p
                    JOIN member m ON p.memberID = m.memberID
                    JOIN user u ON m.userID = u.userID
                    GROUP BY m.memberID
                    ";
                    $result=mysqli_query($conn, $sql);

                    if (!$result) {
                         die("invalid query: " .$conn->error);
                    }

                    while ($row = $result->fetch_assoc()) {
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