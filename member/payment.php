<?php 
include 'authorization.php';
include '../connect.php';
?>

<?php
    include("setProfilePic.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/payment.css">
</head>
<body>
    <div class="container">
        <div class = "nav-bar">
            <?php
                include("navBar.php");
            ?>
        </div>
        <div class="body">
            <div class = "header">
                <div class="left"> 
                    PAYMENTS
                </div>
                <div class="right">
                    <div class="notification-bell">
                        <?php include("notifications.php"); ?>
                    </div>
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">
                <div class = "row">
                    <div class="sub-content">
                        <p>Total Payable</p>
                        <!--retreive-->
                        <div>Rs. X</div>
                        <button onclick="window.location.href='../member/stripe/checkout.html'">Pay Bill</button>
                    </div>
                    <div class="sub-content">
                        <p>Last Payment</p>
                        <!--retreive-->
                        <div>X</div>
                    </div>
                </div>
                <div class="middle-r">
                    Payment History
                </div>
                <div class="bottom-r">
                <?php
                        
                    $sql3 = "SELECT DATE(paymentDate) as paymentDate, TIME(paymentDate) as paymentTime, type, amount, paymentID, memberID FROM payment WHERE memberID = " . $row1['memberID'];
                    $result3 = mysqli_query($conn, $sql3);

                    if(!$result3){
                        echo "Error: " . mysqli_error($conn) . "<br>";
                        die();
                    }
                    echo '<table> 
                    <tr> 
                        <th> Date </th> 
                        <th> Time </th> 
                        <th> Payment Type </th> 
                        <th> Amount </th> 
                    </tr>';

                    if (mysqli_num_rows($result3) > 0) {
                        while ($row3 = mysqli_fetch_assoc($result3)) {
                            $field1name = $row3["paymentDate"];
                            $field2name = $row3["paymentTime"];

                            //0 = payment Plan , 1,2,3,4 = service charge
                            $field3name = $row3["type"];
                            if($row3["type"] == 1 || $row3["type"] == 4 || $row3["type"] == 2 || $row3["type"] == 3){
                                $field3name = "Service Charge";
                            }else if($row3["type"] == 0){
                                $field3name = "Payment Plan Charge";
                            }else{
                                $field3name = "Type Unknown";
                            }
                        
                            $field4name = $row3["amount"];

                            echo '<tr> 
                                <td>'.$field1name.'</td> 
                                <td>'.$field2name.'</td> 
                                <td>'.$field3name.'</td> 
                                <td>'.$field4name.'</td> 
                            </tr>';
                        }
                    }else{
                        echo '<tr><td colspan = "4" style= "border-radius:10px;"> No Payment History</td></tr>';
                    }
                    echo '</table>';
                    ?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>