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
    <title>DashBoard | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/changePw.css">
</head>
<body>
    <div class="container">
        <!--navigation bar-->
        <div class = "nav-bar">
            <?php
                include("navBar.php");
            ?>
        </div>
        <div class="body">
            <div class = "header">
                <div class="left"> 
                    MY PROFILE
                </div>
                <div class="right">
                    <div class="notification-bell">
                        <?php include("notifications.php"); ?>
                    </div>
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>

            <div class="content">

                <div class="content-base" style="width: 100%;">
                    <!--the headings bar-->
                    <div class="menu">
                        <ul>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="changePw.php">Change Password</a></li>
                            <li><a href="medicalForm.php">Medical Form</a></li>
                            <li><a href="emergencyContact.php">Emergency Contact</a></li>
                        </ul>
                        
                    </div>
                    <!--the profile details-->
                    <div class="profile">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            
                            <p style="font-weight:bolder; font-size: 30px; color: green; margin-top: -15px; margin-left: 30px;">Change Password</p>

                                <div class="form-row">
                                    
                                        <label>Enter Old Password </label>
                                        <input id="oldPw" type="password" name="oldPw" required>

                                </div>

                                <div class="form-row">
                                   
                                        <label>Enter New Password</label>
                                        <input id="newPw" name="newPw" type="password" required>
                                    
                                </div>

                                <div class="form-row">
                                    
                                        <label>Confirm Password</label>
                                        <input id="cPw" name="cPw" type="password">
                                  
                                </div>

                                <button type="submit" id="btnSubmit">Change Password</button>
                           </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $oldPw = $_POST["oldPw"];
            $newPw = $_POST["newPw"];
            $cPw = $_POST["cPw"];
            
            if (empty($oldPw) || empty($newPw) || empty($cPw)) {
                echo "<script>window.onload = function() { alert('All fields are required'); };</script>";
            } else {
                //hashed password from the db
                $dbPassword = $row['pw'];

                //checking if the old pw and db pw is same
                if (password_verify($oldPw, $dbPassword)) {
                    
                    if (preg_match('@[0-9]@', $newPw) && preg_match('@[^\w]@', $newPw) && strlen($newPw) >= 8) {
                        
                        if ($newPw == $cPw) {
                            
                            //hashing new pw
                            $hashedNewPw = password_hash($newPw, PASSWORD_DEFAULT);

                            $sql = "update user set pw = '$hashedNewPw' where userID = " . $_SESSION['userID'];

                            mysqli_query($conn, $sql);
                        
                            echo "<script>window.onload = function() { alert('Password changed successfully'); };</script>";
                        } else {
                            echo "<script>window.onload = function() { alert('New password and confirm password do not match'); };</script>";
                        }
                    } else {
                        echo "<script>window.onload = function() { alert('Password must contain at least one number and one special character and should be at least 8 characters long'); };</script>";
                    }
                } else {
                    echo "<script>window.onload = function() { alert('Incorrect old password'); };</script>";
                }
            }
        }
    ?>

</body>

</html>