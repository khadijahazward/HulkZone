<?php
include('authorization.php');
?>
<?php
    include('../connect.php');
    
    // Retrieve employee details using employeeID
    $employeeID = $_GET['employeeID'];
    $sql = "SELECT * FROM employee WHERE employeeID = '$employeeID'";
    $result = $conn->query($sql);
    $employeeDetails = $result->fetch_assoc();
    
    // Retrieve user details using userID from employee table
    $userID = $employeeDetails['userID'];
    $sql = "SELECT * FROM user WHERE userID = '$userID'";
    $result = $conn->query($sql);
    $userDetails = $result->fetch_assoc();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Dieticians | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sideBar.css">
    
    <link rel="stylesheet" type="text/css" href="css/profile.css">
  
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
        <p class="title">Dietician Name</p>
    </div>
    <div class="contentMiddle">
        <p class="myProfile">My Profile</p>
    </div>
    <div class="contentRight" ><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
</div>
    <div class="down" style="display:flex; flex-direction:row;">
                <div class="edit-profile">
                    <div>
                        <!--dp-->
                        <img src="../../HulkZone/asset/images/adminProfile.png" alt="dp" width="200px" height="200px">
                    </div>
                    <div>
                        <?php 
                            
                            echo $userDetails['fName'] . ' ' . $userDetails['lName']; 
                        ?>
                        <br>
                        Dietician<!--User Type-->
                        <br>
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

                            echo "<br>";
                            echo "Average Rating: ";
                            echo $employeeDetails['avgRating'];
                           

                        ?>
                    </div>
                </div>
                <div class="content-base">
                    <!--the headings bar-->
                    
                    <!--the profile details-->
                    <div class="profile">
                           <form method="post" >
                           <h1 style="font-size: 19px;font-weight:bold;color:#006837;">Personal Details</h1>
                                <div class="addresss" style="border:thick solid #006837;border-width:2px;border-radius:5px;padding-bottom:5px;margin-right:5px;">
                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>First name </label>
                                        <input id="fname" type="text" name="fname" value="<?php echo $userDetails['fName']; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Last name</label> 
                                        <input id="lname" type="text" name="lname" value="<?php echo $userDetails['lName']; ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>NIC</label><span id = "error-message" style="font-size: 10px; color: red;"></span>
                                        <input id="nic" type="text" name="NIC" value="<?php echo $userDetails['NIC']; ?>" readonly>
                                        
                                        
                                    </div>

                                    <div class="form-group">
                                        <label>Date of Birth </label>
                                        <input id="dob" type="date" name="dob" min="1930-01-01" max="2004-12-31" value="<?php echo $userDetails['dateOfBirth']; ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>Phone Number</label><span id = "error-msg" style="font-size: 10px; color: red;"></span>
                                        <input id="number" type="text" name="number" value="<?php echo $userDetails['contactNumber']; ?>" readonly>  
                                       
                                    </div>

                                    <div class="form-group">
                                        <label>Gender</label> 
                                        <input id="gender" type="text" name="gender" value="<?php echo $userDetails['gender']; ?>"  readonly>
                                    </div>
                                </div>
                                </div>

                               

                                <br>
                                <br>
                                <h1 style="font-size: 19px;font-weight:bold;color:#006837;">Address</h1>
                                <div class="addresss" style="border:thick solid #006837;border-width:2px;border-radius:5px;padding-bottom:5px;margin-right:5px;">
                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>Street Number</label>
                                        <input id="sNumber" name="sNumber" type="text" value="<?php echo $userDetails['streetNumber']; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Address Line 01</label>
                                        <input id="aline1" name="aline1" type="text" value="<?php echo $userDetails['addressLine01']; ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>Address Line 02</label>
                                        <input id="aline2" name="aline2" type="text" value="<?php echo $userDetails['addressLine02']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>City</label>
                                        <input id="city" name="city" type="text" value="<?php echo $userDetails['city']; ?>">
                                    </div>
                                </div>
                                </div>

                                <br>
                                <br>

                                <h1 style="font-size: 19px;font-weight:bold;color:#006837;">Other Details</h1>
                                <div class="addresss" style="border:thick solid #006837;border-width:2px;border-radius:5px;padding-bottom:5px;margin-right:5px;margin-bottom:7px;">

                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>Qualification</label>
                                        <input  type="text" value="<?php echo $employeeDetails['qualification']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <br>
                                        <textarea name="des" id="" cols="40" rows="8" ><?php echo $employeeDetails['description']; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>Number of years of experience</label>
                                        <input id="aline2" name="aline2" type="text" value="<?php echo $employeeDetails['noOfYearsOfExperience']; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>languages</label>
                                        <input id="city" name="city" type="text" value="<?php echo $employeeDetails['language']; ?>">
                                    </div>
                                </div>
                                </div>
                                
                      
                            
                           </form> 
                    </div>
                </div>
        
       
    </div>

     
   
      
    </body>

</html>