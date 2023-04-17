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
            <?php 
    include('../../HulkZone/connect.php');
                    
    //read all row from database table
    $memberID = $_GET['memberID'];
    $sql = "SELECT u.fName
            FROM payment 
            JOIN member ON payment.memberID = member.memberID
            JOIN user AS u ON member.userID = u.userID
            WHERE payment.memberID = '$memberID'";
             
    $result = mysqli_query($conn, $sql);
    $details = $result->fetch_assoc();
  
?> 
            
                <p class="title">PAYMENT HISTORY - <?php  echo $details['fName'];?> </p>
   

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
                   <th>paymentID</th>
                   <th>paymentDate</th>
                   <th>amount</th>
                   <th>type</th>
                </tr>

                <?php 
                    include('../../HulkZone/connect.php');
                    
                    //read all row from database table
                    $memberID = $_GET['memberID'];
                    $sql = "SELECT *,
                    CASE payment.type
                      WHEN 0 THEN 'Payment plan'
                      WHEN 1 THEN 'Crossfit Training'
                      WHEN 2 THEN 'Bodybuilding training'
                      WHEN 3 THEN 'Diet Service'
                      WHEN 4 THEN 'Strength Training'
                      ELSE 'Unknown' 
                    END as payment_type
                  FROM payment 
                  WHERE memberID='$memberID'";
                 
          
                    $result=mysqli_query($conn, $sql);

                    if (!$result) {
                         die("invalid query: " .$conn->error);
                    }
                  
            
                    

                    while ($row = $result->fetch_assoc()) {
                        echo"
                        
                    <tr>
                   <td>$row[paymentID]</td>
                   <td>$row[paymentDate]</td>
                   <td>$row[amount]</td>
                   <td>$row[payment_type]</td>
                  
                </tr>";
                    }
                    
                ?>
           

                
            </table>
        </div>
        </div>
    </div>



</body>

</html>