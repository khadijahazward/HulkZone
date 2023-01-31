<?php include 'authorization.php';?>

<!--checking for empty fields-->
<?php
$check = "";
$userid = $_SESSION["userID"];
$subjectErr = $desErr = $outcomeErr = "";
include "../connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["subject"])) {
        $subjectErr = "Subject is required";
    }
    if (empty($_POST["des"])) {
        $desErr = "Description is required";
    }
    if (empty($_POST["outcome"])) {
        $outcomeErr = "Outcome is required";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/complaint.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
    <div class = "nav-bar">
            <div class="line-heading">
                <div class="images"><img src="..\asset\images\gymLogo.png" alt="Gym Logo" class="gymLogo"></div>
                <div class="option">HULK ZONE</div>
            </div>
            
            <hr>

            <div class="line">
            <a href="../member/dashboard.php"><div class="nav-font">Dashboard</div></a>
            </div>

            <hr>

            <div class="line">
            <a href="../member/profile.php"><div class="nav-font">My Profile</div></a>
            </div>

            <hr>

            <div class="line">
                <a href=""><div class="nav-font">Services</div></a>
            </div>
            
            <hr>

            <div class="line">
                <a href=""><div class="nav-font">Team</div></a>
            </div>

            <hr>

            <div class="line">
                <a href=""><div class="nav-font">Work Out Plan</div></a>
            </div>

            <hr>

            <div class="line">
                <a href=""><div class="nav-font">Diet Plan</div></a>
            </div>

            <hr>

            <div class="line">
                <a href=""><div class="nav-font">Chat</div></a>
            </div>

            <hr>
            
            <div class="line">
                <a href=""><div class="nav-font">Payments</div></a>
            </div>

            <hr>

            <div class="line">
                <a href=""><div class="nav-font">Appointments</div></a>
            </div>

            <hr>

            <div class="line">
                <a href="../member/complaint.php"><div class="nav-font">Complaints</div></a>
            </div>
            
            <hr>
            
            <div class="line">
                <a href="../home/logout.php"><div class="nav-font">Log Out</div></a>
            </div>

            <hr>
        </div>
        <div class="body">
            <div class = "header">
                <div class="left"> 
                    COMPLAINTS
                </div>
                <div class="right">
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="..\asset\images\dp.png" alt="dp" width="50px" height="50px">
                </div>
            </div>
            <div class="content">
                <div class="row">Report a Complaint</div>

                <div class="row" style="background-color:#DEF9D7; margin-right:10px; border-radius:15px;">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="complaintForm">

                        <div class="form-row">
                            <label>Complaint Subject
                                <span class=" error">*<br> 
                                    <?php echo $subjectErr; ?>
                                </span>
                            </label>
                            <input type="text" id ="subject" name="subject" 
                            value="<?php if ($check == 1) {echo $_POST['subject'] ?? '';}else if($check == 0){$_POST['subject'] == ""; }?>">
                        </div>

                        <div class="form-row">
                            <label>Complaint Description
                                <span class=" error">*<br> 
                                    <?php echo $desErr; ?>
                                </span>
                            </label>
                            <textarea rows="4" id="des" name="des"><?php if ($check == 1) {echo $_POST['des'] ?? ''; }else if($check == 0){ $_POST['des'] == ""; }?></textarea>
                        </div>

                        <div class="form-row">
                            <label>Desired Outcome
                                <span class=" error">* 
                                    <br> <?php echo $outcomeErr; ?>
                                </span>
                            </label>
                            <textarea rows="4" name="outcome" id="outcome"><?php if ($check == 1) {echo $_POST['outcome'] ?? ''; }else if($check == 0){ $_POST['outcome'] == ""; }?></textarea> 
                        </div>

                        <div class="center">
                        <button type="submit" class="submit-Btn" onclick="return Alertfunction()">Submit</button>
                        </div>
                    </form>
                </div>

                <div class="row"style="margin-top:10px;  margin-right:10px;">
                    <?php
                        include "../connect.php";
                        $sql = "SELECT complaintID, subject, dateReported, status  FROM `complaint` where userID = '$userid'";
                        $result = mysqli_query($conn, $sql);
                    echo '<table> 
                    <tr> 
                        <th> Complaint ID </th> 
                        <th> Date Reported </th> 
                        <th> Subject </th> 
                        <th> Status </th> 
                    </tr>';
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $field1name = $row["complaintID"];
                            $field2name = $row["dateReported"];
                            $field3name = $row["subject"];
                            $field4name = $row["status"];

                            echo '<tr> 
                                <td>'.$field1name.'</td> 
                                <td>'.$field2name.'</td> 
                                <td style = "text-align:left;">'.$field3name.'</td> 
                                <td>'.$field4name.'</td> 
                            </tr>';
                        }
                    }
                    ?>
                    
                </div>
            </div>
        </div>

    </div>
</body>
</html>

<!--inserting into table-->
<?php
$check = 1;
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        $subject = $des = $outcome = " ";
        $subject = test_input($_POST["subject"]);
        $des = test_input($_POST["des"]);
        $outcome = test_input($_POST["outcome"]);
        $userid = $_SESSION["userID"];
        $status = "Filed";

        $sql = "insert into complaint (subject, description, desiredOutcome, status, dateReported, userID) values ('$subject', '$des', '$outcome', '$status', current_timestamp(), '$userid')";

        if (!empty($subject) && !empty($des) && !empty($outcome)) {
            $result = mysqli_query($conn, $sql);
            if($result == 1){
                $check = 0;
            }
        }
    }
?>



<!--alert message displayed when successful-->
<script>
    function Alertfunction() {
       var reportedDate =  document.forms["complaintForm"]["reportedDate"].value;
       var subject =  document.forms["complaintForm"]["subject"].value;
       var des =  document.forms["complaintForm"]["des"].value;
       var outcome =  document.forms["complaintForm"]["outcome"].value;
        if (reportedDate != "" && subject != "" && des != "" && outcome != "") {
            alert("Complaint Recorded Successfully");
        }
    }

</script>