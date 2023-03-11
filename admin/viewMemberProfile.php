<?php
include('authorization.php');
include('setAdminProfilePic.php');
?>
<?php
    include('../connect.php');

    if (isset($_GET['memberID'])) {
        // Retrieve employee details using employeeID
        $memberID = $_GET['memberID'];
        $sql = "SELECT * FROM member WHERE memberID = '$memberID'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $memberDetails = $result->fetch_assoc();

            // Retrieve user details using memberID from member table
            $userID = $memberDetails['userID'];
            $sql = "SELECT * FROM user WHERE userID = '$userID'";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $userDetails = $result->fetch_assoc();
            } else {
                echo "No user details found.";
            }
        } else {
            echo "No member details found.";
        }
    } else {
        echo "Member ID not provided.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Members | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sideBar.css">
    
    <link rel="stylesheet" type="text/css" href="../member/style/profile.css">
  
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  
</head>
<body>
<?php 
include('../admin/sideBar.php');
?>
<div class="right">

<div class="content" >
    <div class="contentLeft">
        <p class="title">Member Name</p>
    </div>
    <div class="contentMiddle">
        <p class="myProfile">My Profile</p>
    </div>
    <div class="contentRight" ><img src="<?php echo $profilePictureLink?>" alt="AdminLogo" class="adminLogo"></div>
</div>
    <div class="down" style="display:flex; flex-direction:row;">
                <div class="edit-profile">
                    <div>
                        <!--dp-->
                       
                    <?php if (isset($userDetails['profilePhoto']) && $userDetails['profilePhoto'] != NULL) : ?>
                        <img src="<?php echo $userDetails['profilePhoto']; ?>" alt="dp" width="200px" height="200px">
                    <?php else : ?>
                        <img src="../profileImages/default.png" alt="default dp" width="200px" height="200px">
                    <?php endif; ?>
                    </div>
                    <div>
                        <?php 
                            echo $userDetails['fName'] . ' ' . $userDetails['lName']; 
                          
                           
                        ?>
                        <br>
                        Member<!--User Type-->
                    </div>
                  
                        
                    <div style="margin: 20px;">
                        <?php
                            echo "Status: ";

                            if($userDetails["statuses"] == 1){
                                echo "ACTIVE";
                            }else{
                                echo "INACTIVE";
                            }


                            echo "<br>";

                            echo "Joined Date: ";
                            echo $userDetails['created_at'];

                        ?>
                    </div>
                </div>
                <div class="content-base">
                    <!--the headings bar-->
                    
                    <!--the profile details-->
                    <div class="profile">
                           <form method="post" >
                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>First name </label>
                                        <input id="fname" type="text" name="fname" value="<?php echo $userDetails['fName']; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Last name</label> 
                                        <input id="lname" type="text" name="lname" value="<?php echo $userDetails['lName']; ?>"readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>NIC</label><span id = "error-message" style="font-size: 10px; color: red;"></span>
                                        <input id="nic" type="text" name="nic" value="<?php echo $userDetails['NIC']; ?>" readonly>
                                       

                                        
                                    </div>

                                    <div class="form-group">
                                        <label>Date of Birth </label>
                                        <input id="dob" type="date" name="dob" min="1930-01-01" max="2004-12-31" >
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>Phone Number</label><span id = "error-msg" style="font-size: 10px; color: red;"></span>
                                        <input id="number" type="text" name="number" value="<?php echo $userDetails['contactNumber']; ?>"readonly>  
                                        
                                    </div>

                                    <div class="form-group">
                                        <label>Gender</label> 
                                        <input id="number" type="text" name="number" value="<?php echo $userDetails['gender']; ?>"readonly>  
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group">
                                        <label>Payment Plan</label> 
                                        <input id="number" type="text" name="number" value="<?php echo $memberDetails['planType']; ?>"readonly> 
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>Height (in Inches)</label>
                                        <input id="height" name="height" type="text" value="<?php echo $memberDetails['height']; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Weight (in kilograms)</label>
                                        <input id="weight" name="weight" type="text" value="<?php echo $memberDetails['weight']; ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>Street Number</label>
                                        <input id="sNumber" name="sNumber" type="text" value="<?php echo $userDetails['streetNumber']; ?>"readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Address Line 01</label>
                                        <input id="aline1" name="aline1" type="text"  value="<?php echo $userDetails['addressLine01']; ?>"readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>Address Line 02</label>
                                        <input id="aline2" name="aline2" type="text" value="<?php echo $userDetails['addressLine02']; ?>"readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>City</label>
                                        <input id="city" name="city" type="text"  value="<?php echo $userDetails['city']; ?>"readonly>
                                    </div>
                                </div>
                      
                            
                           </form> 
                    </div>
                </div>
        
       
    </div>

     
   
      
    </body>

</html>