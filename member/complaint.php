<?php 
include 'authorization.php';
include "../connect.php";
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
    <title>Complaint | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/complaint.css">

</head>

<body>
    <div class="container">
        <div class="nav-bar">
            <?php
                include("navBar.php");
            ?>
        </div>
        <div class="body">
            <div class="header">
                <div class="left">
                    COMPLAINTS
                </div>
                <div class="right">
                    <div class="notification-bell">
                        <?php include("notifications.php"); ?>
                    </div>
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px"
                        style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">
                <div class="row"
                    style="display:flex; flex-direction:row; align-items:center;   justify-content: space-between;">
                    <div>Reported Complaints</div>
                    <div><button type="button"
                            onclick="window.location.href='http://localhost/Hulkzone/member/createComplaint.php'"
                            id="fileC">Report a Complaint</button></div>
                </div>
                <div class="row" style="margin-top:10px;  margin-right:10px;">
                    <?php
                        
                        $sql = "SELECT complaintID, subject, dateReported, status, actionTaken  FROM `complaint` where userID = " . $_SESSION['userID'];
                        $result = mysqli_query($conn, $sql);

                    echo '<table> 
                    <tr> 
                        <th> Complaint ID </th> 
                        <th> Date Reported </th> 
                        <th> Subject </th> 
                        <th> Status </th> 
                        <th> action Taken </th>
                    </tr>';

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $field1name = $row["complaintID"];
                            $field2name = $row["dateReported"];
                            $field3name = $row["subject"];
                            $field4name = $row["status"];
                            $field5name = $row["actionTaken"];

                            echo '<tr> 
                                <td>'.$field1name.'</td> 
                                <td>'.$field2name.'</td> 
                                <td>'.$field3name.'</td> 
                                <td>'.$field4name.'</td> 
                                <td>'.$field5name.'</td>
                            </tr>';
                        }
                    }
                    echo '</table>';
                    ?>

                </div>