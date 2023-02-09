


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dietician | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/addtrainer.css">

  
    </style>
</head>
<body>

    <!--Header-->
    <div class="content">
        <div class="contentLeft"><p class="title">DIETICIAN NAME</p></div>
        <div class="contentMiddle"><p class="myProfile">My Profile</p></div>
        <div class="contentRight"><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
    </div>

    <!--Body|Form-->
   
    <form class = addTrainerForm method="POST" action="manageDietician.php">
    <h1>Personal Details</h1>
<div class="form-row">
    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label>First name <span class="error"> </span></label>
        <br>
        <input id="fname" type="text" name="fname"  >
    </div>

    <div class="form-group">
        <label>Last name<span class="error"> </span></label> 
        <br>
        <input id="lname" type="text" name="lname"   >
    </div>
</div>

<div class=" form-row">
    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label>Date of Birth </label>
        <br>
        <input id="dob" name="dob" type="date" min="1930-01-01" max="2004-12-31"  >
    </div>

    <div class="form-group">
        <label>Gender</label>
        <br>
        <select name="gender" id="gender" >
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label>Phone Number </label >
        <br>
        <input id="number" name="number" type="text"  >
    </div>

    <div class="form-group">
        <label>NIC Number <span class="error"></label>
        <br>
        <input id="nic" name="nic" type="text" >
    </div>
</div>
<h1 style="font-weight:bold;">Address</h1>
<div class="form-row">
    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label>Street Number</label>
        <br>
        <input id="sNumber" name="sNumber" type="text"  >
    </div>

    <div class="form-group">
        <label>Address Line 01</label>
        <br>
        <input id="aline1" name="aline1" type="text"   >
    </div>
</div>

<div class="form-row">
    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label>Address Line 02</label>
        <br>
        <input id="aline2" name="aline2" type="text" >
    </div>

    <div class="form-group">
        <label>City</label>
        <br>
        <input id="city" name="city" type="text"  >
    </div>
</div>
<h1 style="font-weight:bold;">Other details</h1>
<div class="form-row">
    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label> No. of years of Experience</label>
        <br>
        <input id="exp" type="text" name="exp"  >
    </div>

    <div class="form-group">
        <label>Qualification</label>
        <br> 
        <input id="qual" type="text" name="qual"  >
    </div>
</div>

<div class="form-row">
    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label> Description</label>
        <br>
        <input id="des" type="text" name="des"  >
    </div>

    <div class="form-group">
        <label>Languages</label> 
        <br>
       
        <div class="checkbox" >
        <input type="checkbox" id="Snglish" name="lang" value="English" >
        <label for="english" >English</label>
        </div>
        <br>
        <div class="checkbox" >
        <input type="checkbox" id="Sinhala" name="lang" value="Sinhala">
        <label for="spanish">Sinhala</label>
        </div>
        <br>
        <div class="checkbox" >
        <input type="checkbox" id="Tamil" name="lang" value="Tamil">
        <label for="french">Tamil</label>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label> Service offered</label>
        <br>
        <select name="#" id="gender" style="width:340px" >
            <option value="Male">Diet Service</option>
         
        </select>
    </div>
    <div class="form-group"  >
    <label>Account Status</label> 
    <br>
    <select name="#" id="gender" >
            <option value="Enabled">Enabled</option>
            <option value="Disabled">Disabled</option>
    </select>
</div>
</div>


<div class="form-group" style="margin-right:50px;margin-left: 220px;" >
    <label>Username </label> 
    <br>
    <input type="email" id="email"  size="30" style="width: 340px;" name="email" >
</div>

<div class="form-row">

    <div class="form-group" style="margin-right:50px;margin-left: 220px;">
        <label>Password</label> 
        <br>
        <input type="password" id="pass1" name="pass1" minlength="8" maxlength="15" >
    </div>


    <div class="form-group">
        <label>Confirm Password </label>
        <br>
        <input type="password" id="pass2" name="pass2"  >
    </div>

</div>

<!--<a href="editTrainerProfile.php"><button type="submit" class="submit">Edit</button></a>-->
<button type="submit" class="submit">Save</button>

</form>


</body>
</html>