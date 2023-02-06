
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
        <div class="contentLeft"><p class="title">MEMBER NAME</p></div>
        <div class="contentMiddle"><p class="myProfile">My Profile</p></div>
        <div class="contentRight"  style="padding-right:40px;"><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
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
                            echo "Member Name"; 
                        ?>
                        <br>
                        Member<!--User Type-->
                    </div>
                    <div style="margin: 30px;">
                        <!--changing profile pic-->
                        <button class="open-button" style="height: 35px;border-radius:5px;">Choose Photo</button>
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
                            //echo $row["created_at"];

                        ?>
                    </div>
                </div>
                <div class="content-base">
                    <!--the headings bar-->
                    
                    <!--the profile details-->
                    <div class="profile">
                           <form method="post" action="updateProfile.php">
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

                                <div class="form-row">
                                    <div class="form-group">
                                        <label>Payment Plan</label> 
                                        <select name="paymentPlan" id="paymentPlan" required disabled>
                                            <option value="oneMonth">Month Package - Rs. 1000</option>
                                            <option value="threeMonth">Three Months Package - Rs. 2899</option>
                                            <option value="sixMonth">Six Months Package - Rs. 5599</option>
                                            <option value="twelveMonth">Twelve Months Package - Rs. 11000</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group" style="margin-right:50px;">
                                        <label>Height (in Inches)</label>
                                        <input id="height" name="height" type="text" required disabled>
                                    </div>

                                    <div class="form-group">
                                        <label>Weight (in kilograms)</label>
                                        <input id="weight" name="weight" type="text" required disabled>
                                    </div>
                                </div>

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
                                <a href="manageMembers.php"><button type="button" style="float: right; margin:13px;height: 35px;border-radius:5px;width:120px;">Save </button></a>
                            
                           </form> 
                    </div>
                </div>
        
       
    </div>

     
   
      
    </body>

</html>