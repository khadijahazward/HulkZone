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
   <style>
    .total{
         background-color: #DEF9D7;
         margin-left: 11px;
         border-radius: 11px;
         margin-right: 11px;
         height: 34px;
         padding-top: 0.7%;
         padding-left: 60px;
         font-weight: bold;
    }

    .totalamount{
      margin-left: 960px;
    }
   </style>

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
            FROM user u
            JOIN member m 
            ON u.userID=m.userID
           WHERE m.memberID=$memberID";
             
    $result = mysqli_query($conn, $sql);
    $details =mysqli_fetch_assoc($result);
  
?> 
            
                <p class="title" style="width: 400px;">PAYMENT HISTORY - <?php  echo $details['fName'];?> </p>
   

            </div>
            <div>
        <div class="notification" style="margin-left: 374px;top:0px;" >
          <?php
          include 'notifications.php';
          ?>
        </div>
      </div>
      <div class="notiCount" style="padding-top: 20px;margin-left:500px;" >
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
      
      </div>

     
       <div class="tableAnnouncements">
            <table class="announcements">
                <tr>
                   <th>PaymentID</th>
                   <th>Payment Date</th>
                   <th>Amount</th>
                   <th>Payment Type</th>
                </tr>

                <?php 
                   include('../../HulkZone/connect.php');
                    

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
                  
            
                    $total_amount = 0;

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo"
                        
                    <tr>
                   <td>$row[paymentID]</td>
                   <td>$row[paymentDate]</td>
                   <td>$row[amount]</td>
                   <td>$row[payment_type]</td>
                  
                </tr>";
                $total_amount += $row['amount']; 
                    }
                   
                 
    
                ?>
           

                
            </table>
            <p class="total">Total Amount<span class="totalamount"> <?php echo $total_amount ?></span></p>
        </div>
        </div>
    </div>



</body>

</html>