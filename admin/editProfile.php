<?php
  //connect.php contains database connection details
  include('../../HulkZone/connect.php');

  // check if the form has been submitted and update the details if necessary
  if(isset($_POST['edit'])){
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    //$NIC = $_POST['NIC'];
    //$gender = $_POST['gender'];
    //$dateOfBirth = $_POST['dateOfBirth'];
    $contactNumber = $_POST['contactNumber'];
    $streetNumber = $_POST['streetNumber'];
    $addressLine01 = $_POST['addressLine01'];
    $addressLine02 = $_POST['addressLine02'];
    $city = $_POST['city'];
    $pw = $_POST['pw'];
    //$email = $_POST['email'];

    //update query to update the details
    $query = "UPDATE user SET fName='$fName', lName='$lName',  
    contactNumber='$contactNumber', streetNumber='$streetNumber', 
    addressLine01='$addressLine01', addressLine02='$addressLine02', city='$city', pw='$pw' WHERE userID=119";

    $result = mysqli_query($conn, $query);
    if($result){
      header("Location: viewProfile.php");
    }else{
      echo "Error updating record: " . mysqli_error($conn);
    }
  }
  else{
    // retrieve the details of the admin from the user table
    $query = "SELECT * FROM user WHERE userID=119";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // store the details in variables
    $fName = $user['fName'];
    $lName = $user['lName'];
    $NIC = $user['NIC'];
    $gender = $user['gender'];
    $dateOfBirth = $user['dateOfBirth'];
    $contactNumber = $user['contactNumber'];
    $streetNumber = $user['streetNumber'];
    $addressLine01 = $user['addressLine01'];
    $addressLine02 = $user['addressLine02'];
    $city = $user['city'];
    $pw = $user['pw'];
    $email = $user['email'];
  }

?>



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
    
  <style>
    .buttonS:hover{
    background-color: #006837;
    color: #ffffff;
  }

  .buttonS{
    background-color: #FF9F29;
    border: none;
    margin-left: 650px;
    padding-top: 10px;
    padding-left: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    width: 120px;
    font-size: 17px;
    border-radius: 5px;
    color: white;
    margin-top: 40px;
  }


  </style>
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
                <div class="edit"> <a href="editProfile.php"><button>Choose photo</button></a></div>
               
            </div>
          </div>
          <div class="pRight" style="background-color: white;">

         
          
          
            <div class="adminForm">
                <form action="" method="post">
                    <table>
                        <tr>
                            <td><label for="first-name">First Name:</label></td>
                            <td><input type="text" id="fName" name="fName" class="form-input" value="<?php echo $fName; ?>" ></td>
                            <td><label for="last-name">Last Name:</label></td>
                            <td><input type="text" id="lName" name="lName" class="form-input" value="<?php echo $lName; ?>" ></td>
                        </tr>
                       
                        <tr>
                            <td><label for="phone">Phone Number:</label></td>
                            <td><input type="tel" id="phone" name="contactNumber" class="form-input" value="<?php echo $contactNumber; ?>"></td>
                           
                           
                        </tr>
                        
                        <tr>
                            
                            <td><label for="street-number">Street Number:</label></td>
                            <td><input type="number" id="street-number" name="streetNumber" class="form-input" value="<?php echo $streetNumber; ?>"  ></td>
                            <td><label for="address-line1">Address Line 1:</label></td>
                            <td><input type="text" id="addressLine01" name="addressLine01" class="form-input" value="<?php echo $addressLine01; ?>" ></td>
                        </tr>
                        <tr>
                       
                            <td><label for="address-line2">Address Line 2:</label></td>
                            <td><input type="text" id="addressLine02" name="addressLine02" class="form-input" value="<?php echo $addressLine02; ?>" ></td>
                            <td><label for="city">City:</label></td>
                            <td><input type="text" id="city" name="city" class="form-input" value="<?php echo $city; ?>" ></td>
                        </tr>
                        <tr>
                            
                           
                        </tr>
                        <tr>
                            <td><label for="city">Password:</label></td>
                            <td><input type="password" id="pw" name="pw" class="form-input"  ></td>
                            <td><label for="city">Confirm Password:</label></td>
                            <td><input type="password" id="city" name="confirmPassword" class="form-input" ></td>
                        </tr>
                        
                       
                    </table>
                    <div><button type="submit" class="buttonS" name="edit">Save</button></div>
            </div>

        </div>
    </div>
    

     
   
      
    </body>
</html>