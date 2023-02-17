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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/services.css">

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
                    SERVICES
                </div>
                <div class="right">
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col" style="margin-right: 150px;">
                        <img src="../member/images/crossfit1.jpg" alt="crossfit training" height="70%" width="100%">
                        <div class="sub-content">
                            <div class="text-content">
                                CROSSFIT TRAINING
                                <div style="font-size: 10px;">High Intensity Work Out</div>
                            </div>
                            <div style="width: 30%;">
                                <button type="button" onclick="window.location.href = './crossfit.php';">View</button>
                            </div>
                            
                        </div>
                    </div>
        
                    <div class="col">
                        <img src="../member/images/strength1.jpg" alt="strength training" height="70%" width="100%">
                        <div class="sub-content">
                            <div class="text-content">
                                STRENGTH TRAINING                                
                                <div style="font-size: 10px;">Gain Muscles weight with us!</div>
                            </div>
                            <div style="width:30%;">
                                <button type="button" onclick="window.location.href = './strength.php';">View</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="margin-right: 150px;">
                        <img src="../member/images/bodybuilding.png" alt="bodybuilding training" height="70%" width="100%">
                        <div class="sub-content">
                            <div class="text-content">
                                BODYBUILDING TRAINING
                                <div style="font-size: 10px;">Gain Muscles weight with us!</div>
                            </div>
                            <div style="width:30%;">
                                <button type="button" onclick="window.location.href = './bodybuilding.php';">View</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <img src="../member/images/diet.png" alt="diet training" height="70%" width="100%">
                        <div class="sub-content">
                            <div class="text-content">
                                DIET SERVICE
                                <div style="font-size: 10px;">Stay Fit With Us!</div>
                            </div>
                            <div style="width:30%;">
                                <button type="button" onclick="window.location.href = './diet.php';">View</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>