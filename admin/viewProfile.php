
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile | Admin</title>
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

        <div class="content">
            <div class="contentLeft">
                <p class="title">Admin Profile</p>
            </div>
            <div class="contentMiddle">
                <p class="myProfile">My Profile</p>
            </div>
            <div class="contentRight"><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
        </div>
        <div class="down" style="display:flex; flex-direction:row;">
            <div class="edit-profile" ">
                    <div>
                        <!--dp-->
                        <img src=" ../../HulkZone/asset/images/adminProfile.png" alt="dp" width="1200px" height="1200px">
            </div>
            <div>
                <?php

                echo "fName";
                ?>
                <br>

                Admin<!--User Type-->
            </div>
            <div style="margin: 30px;">
                <!--changing profile pic-->
                <a href="editProfile.php"><button class="open-button" style="height: 35px;border-radius:5px;">Edit Profile</button></a>
            </div>

        </div>

        <div class="content-base">
            <!--the headings bar-->

            <!--the profile details-->
            <div class="profile">
                <form method="post">
                    <div class="form-row">
                        <div class="form-group" style="margin-right:50px;">
                            <label>First name </label>
                            <input id="fname" type="text" name="fName"  readonly>
                        </div>

                        <div class="form-group">
                            <label>Last name</label>
                            <input id="lname" type="text" name="lName" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" style="margin-right:50px;">
                            <label>NIC</label><span id="error-message" style="font-size: 10px; color: red;"></span>
                            <input id="nic" type="text" name="NIC" readonly>



                        </div>

                        <div class="form-group">
                            <label>Date of Birth </label>
                            <input id="dob" type="date" name="dateOfBirth" min="1930-01-01" max="2004-12-31"  readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" style="margin-right:50px;">
                            <label>Phone Number</label><span id="error-msg" style="font-size: 10px; color: red;"></span>
                            <input id="number" type="text" name="gender"  readonly>

                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <input id="gender" type="text" name="gender" readonly>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group" style="margin-right:50px;">
                            <label>Street Number</label>
                            <input id="streetNumber" name="streetNumber" type="text" readonly>
                        </div>

                        <div class="form-group">
                            <label>Address Line 01</label>
                            <input id="aline1" name="addressLine01" type="text"  readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" style="margin-right:50px;">
                            <label>Address Line 02</label>
                            <input id="aline2" name="addressLine02" type="text" readonly>
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input id="city" name="city" type="text"  readonly>
                        </div>
                    </div>


                </form>
            </div>
        </div>


    </div>




</body>

</html>