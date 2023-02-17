
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Trainers | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sideBar.css">
    <link rel="stylesheet" href="css/AnnouncementTable.css">
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
            <p class="title">Trainer Name</p>
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
                            //echo $_SESSION["firstName"] ." " . $_SESSION["lastName"];
                            echo "Trainer Name"; 
                        ?>
                        <br>
                        Trainer<!--User Type-->
                        <br>
                    </div>
                    <div style="margin: 30px;">
                        <!--changing profile pic-->
                        <a href="editTrainerProfile.php"><button class="open-button" style="height: 35px;border-radius:5px;">Edit Profile</button></a>
                    </div>
                        
                    <div style="margin: 20px;">
                        <?php
                            echo "Status: ";

                            /*if($row["statuses"] == 1){
                                echo "ACTIVE";
                            }else{
                                echo "INACTIVE";
                            }*/

                            echo "<br>";

                            echo "Joined Date: ";
                            echo "<br>";
                            echo "Average Rating: ";
                            //echo $row["created_at"];

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
                                        <input id="fname" type="text" name="fname" required disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Last name</label> 
                                        <input id="lname" type="text" name="lname"required disabled>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>NIC</label><span id = "error-message" style="font-size: 10px; color: red;"></span>
                                        <input id="nic" type="text" name="nic"required disabled onblur="validateNIC()">
                                        <script>
                                            function validateNIC() {
                                                var nic = document.getElementById("nic").value;
                                                var errorMessage = document.getElementById("error-message");
                                                const pattern2 = /^\d{9}V$/;
                                                const pattern1 = /^\d{12}$/; 
                                                if (nic === "") {
                                                    errorMessage.innerHTML = " NIC must be filled out";
                                                } else if (pattern2.test(nic) || pattern1.test(nic)){
                                                    errorMessage.innerHTML = " ";
                                                }else {
                                                    errorMessage.innerHTML = " Invalid NIC";
                                                }
                                            }
                                        </script>

                                        
                                    </div>

                                    <div class="form-group">
                                        <label>Date of Birth </label>
                                        <input id="dob" type="date" name="dob" min="1930-01-01" max="2004-12-31" required disabled>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>Phone Number</label><span id = "error-msg" style="font-size: 10px; color: red;"></span>
                                        <input id="number" type="text" name="number" required disabled onblur="validateNum()">  
                                        <script>
                                                function validateNum() {
                                                    var number = document.getElementById("number").value;
                                                    var errorMessage = document.getElementById("error-msg");
                                                    if (number === "") {
                                                        errorMessage.innerHTML = " Number must be filled out";
                                                    } else if (number.length !== 10 || isNaN(number)){
                                                        errorMessage.innerHTML = " Invalid Number";   
                                                    }
                                                    else {
                                                        errorMessage.innerHTML = "";
                                                    }
                                                }
                                        </script>
                                    </div>

                                    <div class="form-group">
                                        <label>Gender</label> 
                                        <select name="gender" id="gender" required disabled>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
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
                                        <input id="sNumber" name="sNumber" type="text" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Address Line 01</label>
                                        <input id="aline1" name="aline1" type="text"  disabled>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>Address Line 02</label>
                                        <input id="aline2" name="aline2" type="text" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>City</label>
                                        <input id="city" name="city" type="text"  disabled>
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
                                        <input id="aline2" name="aline2" type="text" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <input id="city" name="city" type="text"  disabled>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>Number of years of experience</label>
                                        <input id="aline2" name="aline2" type="text" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>languages</label>
                                        <input id="city" name="city" type="text"  disabled>
                                    </div>
                                </div>

                                
                                </div>
                                
                      
                            
                           </form> 
                    </div>
                </div>
        
       
    </div>

     
   
      
    </body>

</html>