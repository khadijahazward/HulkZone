<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Trainer | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/addTrainer.css">
</head>
<body>

    <!--Header-->
    <div class="content">
        <div class="contentLeft"><p class="title">ADD TRAINER</p></div>
        <div class="contentMiddle"><p class="myProfile">My Profile</p></div>
        <div class="contentRight"><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
    </div>

    <!--Body|Form-->
   
    <form class = addTrainerForm action="">
    <h1>Personal Details</h1>
                        <div class="form-row" >
                                <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                                    <label >First name</label><br>
                                    <input id="" type="text" required>
                                </div>

                                <div class="form-group">
                                    <label>Last name</label><br>
                                    <input id="" type="text" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                                    <label>Date of birth</label><br>
                                    <input id="" type="date" required>
                                </div>

                                <div class="form-group">
                                    <label>Phone Number</label><br>
                                    <input id="" type="tel" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                                    <label>Street No.</label><br>
                                    <input id="" type="text" required>
                                </div>

                                <div class="form-group">
                                    <label>Address Line 01</label><br>
                                    <input id="" type="text" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                                    <label>Address Line 02</label><br>
                                    <input id="" type="text" required>
                                </div>

                                <div class="form-group">
                                    <label>City</label><br>
                                    <input id="" type="text" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                                    <label>Payment Plan</label><br>
                                    <input id="" type="text" required>
                                </div>

                                <div class="form-group">
                                    <label>NIC Number</label><br>
                                    <input id="" type="text" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                                    <label>Gender</label><br>
                                    <input id="" type="text" required>
                                </div>

                                <div class="form-group">
                                    <label>E-mail address</label><br>
                                    <input id="" type="email" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                                    <label>Username</label><br>
                                    <input id="" type="text" required>
                                </div>

                                <div class="form-group">
                                    <label>Password</label><br>
                                    <input id="" type="password" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                                    <label>Languages</label><br>
                                    <input id="" type="text" required>
                                </div>

                                <div class="form-group">
                                    <label>Services offered</label><br>
                                    <select name="dropdownmenu" id="" required>
                                        <option value="Diet1">Diet1</option>
                                        <option value="Diet2">Diet2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                                    <label>Qualifications</label><br>
                                    <input id="" type="text" required>
                                </div>

                                <div class="form-group">
                                    <label>Number of Years of Experience</label><br>
                                    <input id="" type="number" style="background-color: #DEF9D7;border-radius: 6px;border: none; box-sizing: border-box;width: 60%; padding: 0.5rem 0.75rem;">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group" style="margin-right:50px;margin-left: 220px;">
                                    <label>Bio</label><br>
                                    <textarea name="text" id="" cols="30" rows="10" style="width: 85%;"></textarea>
                                </div>
                            </div>
                            
                            <input type="submit" value="Add" class="submit">
    </form>


</body>
</html>