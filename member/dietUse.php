<?php 
include 'authorization.php';
include '../connect.php';
?>

<?php
$query = "SELECT * from user where userID = " . $_SESSION['userID'];
    $result = mysqli_query($conn, $query);
    $query1 = "SELECT * from member where userID = " . $_SESSION['userID'];
    $result1 = mysqli_query($conn, $query1);
    if (mysqli_num_rows($result) == 1 && mysqli_num_rows($result1) == 1) {
        $row = mysqli_fetch_assoc($result);
        $row1 = mysqli_fetch_assoc($result1);
    } else {
        echo '<script> window.alert("Error receiving data!");</script>';
    }

    if(isset($row['profilePhoto']) && $row['profilePhoto'] != NULL){
        //dp link from db
        $profilePictureLink = $row['profilePhoto'];
    }else{
        $profilePictureLink = '../member/profileImages/default.png';
    }
?>

<?php
    $sql = "SELECT COUNT(*) FROM serviceCharge WHERE memberID = $row1[memberID] AND serviceID = 3 AND endDate >= CURDATE()";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_fetch_row($result)[0];
    $employeeID = '';

    $description = '';
    $experience ='';
    $rating = '';
    $qualification = '';
    $lang = '';
    $fullName = '';
    $profilePicture = '../member/profileImages/default.png';
    $phone = '';


    if ($count > 0) {
        $sql2 = "SELECT * FROM employee WHERE employeeID = (SELECT employeeID FROM serviceCharge WHERE memberID = $row1[memberID] AND serviceID = 3 AND endDate >= CURDATE() LIMIT 1)";
        $result2 = mysqli_query($conn, $sql2);
        
        if(mysqli_num_rows($result2) > 0){
            $row2 = mysqli_fetch_assoc($result2);
            $employeeID = (isset($row2["employeeID"])) ? $row2["employeeID"] : '';

            $description = (isset($row2["description"])) ? $row2["description"] : '';
            $experience = (isset($row2["noOfYearsOfExperience"])) ? $row2["noOfYearsOfExperience"] : '';
            $rating = (isset($row2["avgRating"])) ? $row2["avgRating"] : '';
            $qualification = (isset($row2["qualification"])) ? $row2["qualification"] : '';
            $lang = (isset($row2["language"])) ? $row2["language"] : '';


            $sql3 = "SELECT * FROM user WHERE userID = " . $row2['userID'];
            $result3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($result3);


            $fullName = $row3["fName"] . " " . $row3["lName"];
            $phone = $row3['contactNumber'];
            if(isset($row3['profilePhoto']) && $row3['profilePhoto'] != NULL){
                //dp link from db
                $profilePicture= $row3['profilePhoto'];
            }else{
                $profilePicture = '../member/profileImages/default.png';
            }
        }else{
            echo "No data returned from the SQL query";
        }
    } else {
        echo "<script type='text/javascript'>alert('No dietician is selected.');</script>";
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diet Appointments | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/dietUse.css">
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
                    DIET APPOINTMENTS
                </div>
                <div class="right">
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">
                <div class="top-r">
                    <div style= "width:20%; text-align:center; margin:20px;"><img src = "<?php echo $profilePicture; ?>" height = '175px' weight = '175px' style="border-radius:10px;"></div>
                    <div class ="top-r-div">
                        <div style="font-size:30px;"><?php echo $fullName;?></div>
                        <div style="font-size:15px; margin-top:10px;">Number of Years of Experience: <?php echo $experience;?> </div>
                        <div style="font-size:15px; margin-top:10px;">Fluent Languages: <?php echo  $lang?> </div>
                        <div style="font-size:15px; margin-top:10px;">Phone Number: <?php echo $phone;?> </div>
                        <div style="font-size:15px; margin-top:10px;">Qualification: <?php echo $qualification;?> </div>
                    </div>
                </div>
                <div class="row">
                <?php
                    echo '<table> 
                        <tr> 
                            <th>Date</th> 
                            <th>Start Time</th> 
                            <th>End Time</th> 
                            <th> Status </th> 
                        </tr>';
                        //edit this query - wrong
                        if (!empty($employeeID)) {
                            $sql3 = "SELECT * FROM dieticianappointment WHERE employeeID = ". $employeeID . " AND date = CURDATE() AND startTime > CURTIME()";

                            $result3 = mysqli_query($conn, $sql3);

                            if (mysqli_num_rows($result3) > 0) {
                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                    
                                    $field1name = $row4["date"];
                                    $field2name = $row3["startTime"];
                                    $field3name = $row3["endTime"];
                                    $field4name = $row3["status"];

                                    echo '<tr> 
                                        <td>'.$field1name.'</td> 
                                        <td>'.$field2name.'</td> 
                                        <td>'.$field3name.'</td> 
                                        <td>';
                                        
                                        if ($field4name == 0) {
                                            echo '<button type="button" class="btn btn-primary" onclick="confirmBooking('.$appointmentID.', '.$row1['memberID'].')">Confirm Booking</button>';
                                        } else {
                                            echo '<input type="button" name="booked" value="Booked" disabled>';
                                        }
                                        echo '</td> 
                                    </tr>';
                                }
                            }else{
                                echo '<tr>
                                    <td colspan="4" style="border-radius: 10px 10px 10px 10px;"> You have not Selected a Service Yet. </td> 

                                </tr>'; 
                            }
                        } else {
                            echo '<tr>
                                    <td colspan="4" style="border-radius: 10px 10px 10px 10px;"> You have not Selected a Service Yet. </td> 

                                </tr>'; 
                        }
                        

                        
                        echo '</table>';
                    ?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>