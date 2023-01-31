<?php include 'authorization.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class = "nav-bar">
            <div class="line-heading">
                <div class="images"><img src="..\asset\images\gymLogo.png" alt="Gym Logo" class="gymLogo"></div>
                <div class="option">HULK ZONE</div>
            </div>
            
            <hr>

            <div class="line">
            <a href="../member/dashboard.php"><div class="nav-font">Dashboard</div></a>
            </div>

            <hr>

            <div class="line">
            <a href="../member/profile.php"><div class="nav-font">My Profile</div></a>
            </div>

            <hr>

            <div class="line">
                <a href=""><div class="nav-font">Services</div></a>
            </div>
            
            <hr>

            <div class="line">
                <a href=""><div class="nav-font">Team</div></a>
            </div>

            <hr>

            <div class="line">
                <a href=""><div class="nav-font">Work Out Plan</div></a>
            </div>

            <hr>

            <div class="line">
                <a href=""><div class="nav-font">Diet Plan</div></a>
            </div>

            <hr>

            <div class="line">
                <a href=""><div class="nav-font">Chat</div></a>
            </div>

            <hr>
            
            <div class="line">
                <a href=""><div class="nav-font">Payments</div></a>
            </div>

            <hr>

            <div class="line">
                <a href=""><div class="nav-font">Appointments</div></a>
            </div>

            <hr>

            <div class="line">
                <a href="../member/complaint.php"><div class="nav-font">Complaints</div></a>
            </div>
            
            <hr>
            
            <div class="line">
                <a href="../home/logout.php"><div class="nav-font">Log Out</div></a>
            </div>

            <hr>
        </div>
        <div class="body">
            <div class = "header">
                <div class="left"> 
                    Hello, 
                    <?php
                        echo $_SESSION["firstName"];
                    ?>  
                    <br>
                    Welcome and Let's Do Some Workout Today!
                </div>
                <div class="right">
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="..\asset\images\dp.png" alt="dp" width="50px" height="50px">
                </div>
            </div>
            <div class="content"></div>
        </div>

    </div>
</body>

</html>