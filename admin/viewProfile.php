<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sideBar.css">
    <link rel="stylesheet" href="css/profileBody.css">
    <link rel="stylesheet" href="css/adminForm.css">
  
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  
</head>
<body>
<div class="sidebar">
        <div class="gymLogo" ><img src="../../HulkZone/asset/images/gymLogo.png" alt="" width="80px" height="80px"> </div>
        <div class="sidebarContent">
            <div class="tab"><a href="dashboard.php"><i class="fa fa-dashboard" style="padding-right: 15px;"></i> Dashboard</a></div>
            <hr>
            <div class="tab"><a href="viewProfile.php"><i class="fas fa-user-tie" style="padding-right: 15px;"></i> My Profile</a></div>
            <hr>
            <div class="tab"><a href="manageMembers.php"><i class="	fa fa-users" style="padding-right: 15px;"></i> Manage Members</a></div>
            <hr>
            <div class="tab"><a href="manageAttendance.php"><i class="fa fa-calendar" style="padding-right: 15px;"></i> Member Attendance</a></div>
            <hr>
            <div class="tab"><a href="#Schedule"><i class="fa fa-clock-o" style="padding-right: 15px;"></i> Schedule</a></div>
            <hr>
            <div class="tab"><a href="manageTrainer.php"><i class="	fa fa-user" style="padding-right: 15px;"></i> Manage Trainers</a></div>
            <hr>
            <div class="tab"><a href="manageDietician.php"><i class="fas fa-user-nurse" style="padding-right: 15px;"></i> Manage Dieticians</a></div>
            <hr>
            <div class="tab"><a href="manageComplaints.php"><i class='	fas fa-exclamation-circle' style="padding-right: 15px;"></i>User Complaints</a></div>
            <hr>
            <div class="tab"><a href="viewAnnouncements.php"><i class='fas fa-bullhorn' style="padding-right: 15px;"></i>Announcements</a></div>
            <hr>
            <div class="tab"><a href="#Reports"><i class=' fas fa-file-alt ' style="padding-right: 15px;"></i>Reports</a></div>
            <hr>
            <div class="tab"><a href="#payments"><i class=' 	far fa-money-bill-alt ' style="padding-right: 15px;"></i>Member Payments</a></div>
            <hr>
            <div class="tab"><a href="login.php"><i class="fa fa-sign-out " style="padding-right: 15px;"></i>Log Out</a></div>
            <hr>
        </div>
    </div>
   
    
    <!--Right Part-->
    <div class="right" style="display: flex; flex-direction:column;margin-left:20%;">
    
        <div class="content" style="width: 100%;float:right;">
            <div class="contentLeft"><p class="title">Welcome Admin!</p></div>
            <div class="contentMiddle"><p class="myProfile">My Profile</p></div>
            <div class="contentRight"  style="padding-right:40px;"><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
        </div>
        <div  class="profileBody" >
          <div class="pLeft" >
            <div class="box">
                <div class="profile-image">
                     <img src="../../HulkZone/asset/images/adminProfile.png" alt="Profile Image" class="rounded-circle">
                </div>
                <div class="admin">Admin</div>
                <div class="edit"> <a href="editProfile.php"><button>Edit Profile</button></a></div>
               
            </div>
          </div>
          <div class="pRight" style="background-color: white;">

          <?php
          include('../../HulkZone/connect.php');
          
          $stmt = $conn->prepare("SELECT fName, lName,NIC,email,contactNumber, gender,dateOfBirth,streetNumber,addressLine01, addressLine02,city FROM user WHERE roles= ?");
          $roles=0;
          $stmt->bind_param("i", $roles);
          
          // Execute the statement
          $stmt->execute();
          
          // Bind the result
          $stmt->bind_result($fName, $lName,$NIC,$email,$cNum,$gender,$dOfBirth,$stNum,$addL1,$addL2,$city);
          
          // Fetch the result
          $stmt->fetch();
          
          // Close the statement and connection
          $stmt->close();
          $conn->close();
          ?>
          
          
            <div class="adminForm">
                <form>
                    <table>
                        <tr>
                            <td><label for="first-name">First Name:</label></td>
                            <td><input type="text" id="fName" name="fName" class="form-input" value="<?php echo $fName; ?>" readonly></td>
                            <td><label for="last-name">Last Name:</label></td>
                            <td><input type="text" id="lName" name="lName" class="form-input" value="<?php echo $lName; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td><label for="nic">NIC:</label></td>
                            <td><input type="text" id="nic" name="NIC" class="form-input" value="<?php echo $NIC; ?>" readonly></td>
                            <td><label for="email">Email Address:</label></td>
                            <td><input type="email" id="email" name="email" class="form-input" value="<?php echo $email; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td><label for="phone">Phone Number:</label></td>
                            <td><input type="tel" id="phone" name="phone" class="form-input" value="<?php echo $cNum; ?>" readonly></td>
                            <td><label for="gender">Gender:</label></td>
                            <td>
                            <input type="text" name="gender" id="gender" value="<?php echo $gender; ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dob">Date of Birth:</label></td>
                            <td><input type="date" id="dob" name="dob" class="form-input" style="width:160px"value="<?php echo $dOfBirth; ?>" readonly></td>
                            <td><label for="street-number">Street Number:</label></td>
                            <td><input type="number" id="street-number" name="street-number" class="form-input" value="<?php echo $stNum; ?>"  readonly></td>
                        </tr>
                        <tr>
                            <td><label for="address-line1">Address Line 1:</label></td>
                            <td><input type="text" id="address-line1" name="address-line1" class="form-input" value="<?php echo $addL1; ?>" readonly></td>
                            <td><label for="address-line2">Address Line 2:</label></td>
                            <td><input type="text" id="address-line2" name="address-line2" class="form-input" value="<?php echo $addL2; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td><label for="city">City:</label></td>
                            <td><input type="text" id="city" name="city" class="form-input" value="<?php echo $city; ?>" readonly></td>
                        </tr>

            </div>

        </div>
    </div>
    

     
   
      
    </body>
</html>