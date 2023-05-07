<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php 
include 'authorization.php';
include '../connect.php';
?>

<?php
    include("setProfilePic.php");
?>

<?php
    $sql = "SELECT COUNT(*) FROM serviceCharge WHERE memberID = $row1[memberID] AND serviceID = 3 AND endDate >= CURDATE()";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_fetch_row($result)[0];
    $employeeID = '';

    $description = '';
    $experience ='';
    $rating = '';
    $qualification = '';
    $lang = '';
    $fullName = '';
    $profilePicture = '../member/profileImages/default.png';
    $phone = '';


    if ($count > 0) {
        $sql2 = "SELECT * FROM employee WHERE employeeID = (SELECT employeeID FROM serviceCharge WHERE memberID = $row1[memberID] AND serviceID = 3 AND endDate >= CURDATE() LIMIT 1)";
        $result2 = mysqli_query($conn, $sql2);
        
        if(mysqli_num_rows($result2) > 0){
            $row2 = mysqli_fetch_assoc($result2);
            $employeeID = (isset($row2["employeeID"])) ? $row2["employeeID"] : '';

            $description = (isset($row2["description"])) ? $row2["description"] : '';
            $experience = (isset($row2["noOfYearsOfExperience"])) ? $row2["noOfYearsOfExperience"] : '';
            $rating = (isset($row2["avgRating"])) ? $row2["avgRating"] : '';
            $qualification = (isset($row2["qualification"])) ? $row2["qualification"] : '';
            $lang = (isset($row2["language"])) ? $row2["language"] : '';


            $sql3 = "SELECT * FROM user WHERE userID = " . $row2['userID'];
            $result3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($result3);


            $fullName = $row3["fName"] . " " . $row3["lName"];
            $phone = $row3['contactNumber'];
            if(isset($row3['profilePhoto']) && $row3['profilePhoto'] != NULL){
                //dp link from db
                $profilePicture= $row3['profilePhoto'];
            }else{
                $profilePicture = '../profileImages/default.png';
            }
        }else{
            echo "No data returned from the SQL query";
        }
    } else {
        // If no service charge record is found
        echo "<script>alert('You have not selected a diet service yet. Please select the service to continue.');</script>";
        echo "<script>window.location = 'http://localhost/HulkZone/member/services.php';</script>";
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diet Appointments | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/dietUse.css">
</head>
<body>
    <div class="container">
        <div class = "nav-bar">
            <?php
                include("navBar.php");
            ?>
        </div>
        <div class="body">
            <div class = "header">
                <div class="left"> 
                    DIET APPOINTMENTS
                </div>
                <div class="right">
                    <div class="notification-bell">
                        <?php include("notifications.php"); ?>
                    </div>
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">
                <div class="top-r">
                    <div style= "width:20%; text-align:center; margin:20px;"><img src = "<?php echo $profilePicture; ?>" height = '175px' weight = '175px' style="border-radius:10px;"></div>
                    <div class ="top-r-div">
                        <div style="font-size:30px;"><?php echo $fullName;?></div>
                        <div style="font-size:15px; margin-top:10px;">Number of Years of Experience: <?php echo $experience;?> </div>
                        <div style="font-size:15px; margin-top:10px;">Fluent Languages: <?php echo  $lang?> </div>
                        <div style="font-size:15px; margin-top:10px;">Phone Number: <?php echo $phone;?> </div>
                        <div style="font-size:15px; margin-top:10px;">Qualification: <?php echo $qualification;?> </div>
                    </div>
                </div>

                <div class="row2" style="justify-content:space-between; background-color:#006837; padding:10px; ">
                    <?php
                        // Get the previous Monday's date
                        if (date('N') == 1) { // If today is Monday
                            $previousMonday = date('Y-m-d'); // Use today's date instead
                        } else {
                            $previousMonday = date('Y-m-d', strtotime('last Monday'));
                        }

                        // Loop through each day of the week (Monday to Sunday)
                        for ($i = 1; $i <= 7; $i++) {
                            $dayOfWeekDate = date('Y-m-d', strtotime($previousMonday . ' +' . ($i-1) . ' day'));
                            
                            // Check if the button date is before today's date
                            if (strtotime($dayOfWeekDate) < strtotime(date('Y-m-d'))) {
                                // If so, disable the button
                                $buttonHtml = '<button disabled>' . date('D, M j', strtotime($dayOfWeekDate)). '</button>';
                                echo $buttonHtml;
                            } else {
                                // Otherwise, create a clickable button
                                $buttonHtml = '<button data-index="' . $i . '" onclick="displayAvailableSlots(\'' . $dayOfWeekDate . '\')">' . date('D, M j', strtotime($dayOfWeekDate)) . '</button>';
                                echo "<div class ='activeBtn'>";
                                echo $buttonHtml;
                                echo "</div>";
                            }
                        }
                    ?>
                </div>
                <div class="row2">
                    <div id="availableSlots"></div>

                    <script>
                        //onload the page will show current date's slot
                        $(document).ready(function() {
                            var currentDate = '<?php echo date('Y-m-d'); ?>';
                            $.ajax({
                                type: "POST",
                                url: "./getdietcianSlots.php",
                                data: { date: currentDate },
                                success: function(response) {
                                    // Update the contents of the availableSlots div with the response from the server
                                    $("#availableSlots").html(response);
                                }
                            });
                        });

                        // Get the available slots using the selected date and weekdayID 
                        function displayAvailableSlots(selectedDate) {
                        $.ajax({
                            type: "POST",
                            url: "./getdietcianSlots.php",
                            data: { date: selectedDate},
                            success: function(response) {
                            // Update the contents of the availableSlots div with the response from the server
                            $("#availableSlots").html(response);
                            }
                        });
                        }
                    </script>
                </div>
            </div>
        </div>

    </div>
</body>

</html>