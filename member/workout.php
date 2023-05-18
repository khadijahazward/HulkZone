<?php 
include 'authorization.php';
include '../connect.php';
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<?php
    include("setProfilePic.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout plan | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/plan.css">
    <link rel="icon" type="image/png" href="../asset/images/gymLogo.png"/>
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
                    WORKOUT PLAN
                </div>
                <div class="right">
                    <div class="notification-bell">
                        <?php include("notifications.php"); ?>
                    </div>
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">
                <div class="row" style="font-weight:bold;">
                    
                    <?php
                        $sql2 = "SELECT * FROM serviceCharge WHERE memberID = $row1[memberID] AND serviceID IN (1, 2, 4) AND endDate >= CURDATE() LIMIT 1";
                        $result2 = mysqli_query($conn, $sql2);

                        if (mysqli_num_rows($result2) > 0) {
                            // If a service charge record is found
                            $row2 = mysqli_fetch_assoc($result2);
                            $serviceID = $row2['serviceID'];

                            // Get the serviceName based on the serviceID
                            $sql3 = "SELECT serviceName FROM service WHERE serviceID = $serviceID";
                            $result3 = mysqli_query($conn, $sql3);
                            $row3 = mysqli_fetch_assoc($result3);
                            $serviceName = $row3['serviceName'];

                            echo "<p style='font-size:20px; margin:0;font-weight:bold; margin-bottom:0;'> Work Out Plan for $serviceName Training</p>";
                        }else{
                            echo "<p style='font-size:20px; margin:0;font-weight:bold; margin-bottom:0;'>No service found.</p>";
                        }
                    ?>

                </div>

                <div class="row" style="margin-bottom: 0; justify-content: space-between;">
                    <p style="font-size:20px; margin: 0; font-weight:bold;">PROGRESS BAR</p>
                </div>
                <div class="row" style="margin-top: 0;">
                    Visualize Your Progress with a Progress Indicator!
                </div>

                <!--for the progress bar-->
                <div class="row" style="margin-top: 0;">
                    <?php
                        $sql2 = "SELECT * FROM serviceCharge WHERE memberID = $row1[memberID] AND serviceID IN (1,2,4) AND endDate >= CURDATE() LIMIT 1";
                        $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_num_rows($result2) > 0) {
                            $row2 = mysqli_fetch_assoc($result2);
                            $serviceID = $row2['serviceID'];
                            $startDate = date('Y-m-d', strtotime($row2['startDate']));
                            $endDate = date('Y-m-d', strtotime($row2['endDate']));  
                            //echo $startDate . "  " . $endDate;
                            $empid = $row2["employeeID"];  
                            //echo $empid;                        

                            $sql3 = "SELECT DATEDIFF(endDate, startDate) AS numDays FROM serviceCharge WHERE  memberID = $row1[memberID] AND serviceID = $serviceID AND endDate >= CURDATE() LIMIT 1";
                            $result3 = mysqli_query($conn, $sql3);
                            $row3 = mysqli_fetch_assoc($result3);
                            $differenceBetweenStartAndEnd = $row3["numDays"];

                            //days completed
                            $sql4 = "SELECT COUNT(*) AS numCompletedDays FROM workout_plan_status WHERE memberID = $row1[memberID] AND startDate = '$row2[startDate]' AND CompletedDate BETWEEN '$startDate' AND '$endDate'";
                            $result4 = mysqli_query($conn, $sql4);
                            $row4 = mysqli_fetch_assoc($result4);

                            $numCompletedDays = $row4['numCompletedDays'];

                            //getting the number of days since the service began until today
                            $startDateTime = strtotime($row2['startDate']);
                            $currentDateTime = strtotime(date("Y-m-d H:i:s"));
                            $missedDays = 0;
                            for ($date = $startDateTime; $date < $currentDateTime; $date = strtotime('+1 day', $date)) {
                                $currentDate = date('Y-m-d', $date);
                                
                                // Check if the current date is marked as completed
                                $sql5 = "SELECT * FROM workout_plan_status WHERE memberID = $row1[memberID] AND startDate = '$row2[startDate]' AND CompletedDate = '$currentDate'";
                                $result5 = mysqli_query($conn, $sql5);
                                
                                
                                if (mysqli_num_rows($result5) === 0) {
                                    $missedDays++;
                                }
                            }
                            
                        }else{
                            echo "<p style='font-size:20px; margin:0;font-weight:bold; margin-bottom:0;'>No service found for memberID </p>{$row1['memberID']} and serviceID 3.";
                        }
                        
                    ?>
                    <div style="display:flex; justify-content:center; align-items: center;padding:2%; margin: auto; width:60%;">
                        <canvas id="myChart" style="max-width:350px"></canvas>
                    </div>



                    <script>
                        var progress = <?php echo $numCompletedDays; ?>;
                        var total = <?php echo $differenceBetweenStartAndEnd; ?>;
                        var missed = <?php echo $missedDays; ?>;
                        var xValues = ["Completed", "Missed", "Not Completed"];
                        new Chart("myChart", {
                            type: "doughnut",
                            data: {
                                labels: xValues,
                                datasets: [{
                                    data: [progress, missed,  total - (progress + missed)],
                                    backgroundColor: ['#006837', '#FF0000', '#FF9F29']
                                }]
                            },
                            options: {
                                tooltips: { //text when hover over the chart
                                    callbacks: {
                                        label: function(tooltipItem, data) { // to call each section of the chart that the mouse is hovering over
                                        var value = data.datasets[0].data[tooltipItem.index]; //the actual number of day
                                        return data.labels[tooltipItem.index] + ': ' + value + ' days';
                                        }
                                    }
                                }
                            }
                        });
                    </script>
                    
                </div>



                <div class="row2" style="justify-content:space-between; background-color:#006837; padding:10px; ">
                    <?php

                        $sql2 = "SELECT * FROM serviceCharge WHERE memberID = $row1[memberID] AND serviceID IN (1, 2, 4) AND endDate >= CURDATE() LIMIT 1";
                        $result2 = mysqli_query($conn, $sql2);

                        if (mysqli_num_rows($result2) > 0) {
                            // If a service charge record is found
                            $row2 = mysqli_fetch_assoc($result2);
                            $empid = $row2['employeeID'];
                            $startDate = $row2['startDate'];
                            
                            // Get the previous Monday's date
                            if (date('N') == 1) { // If today is Monday
                                $previousMonday = date('Y-m-d'); // Use today's date instead
                            } else {
                                $previousMonday = date('Y-m-d', strtotime('last Monday'));
                            }

                            // Loop through each day of the week (Monday to Sunday)
                            for ($i = 1; $i <= 7; $i++) {
                                $dayOfWeekDate = date('Y-m-d', strtotime($previousMonday . ' +' . ($i-1) . ' day'));
                                
                                $buttonAttributes = '';
                                if ($dayOfWeekDate > date('Y-m-d')) {
                                    $buttonAttributes = 'disabled';
                                }
                                
                                echo '<div class="activeBtn">
                                    <button data-index="' . $i . '" onclick="displayAvailableSlots(' . $i . ', \'' . $empid . '\', \'' . $startDate . '\' , \'' . $dayOfWeekDate . '\')" ' . $buttonAttributes . '>' . date('D, M j', strtotime($dayOfWeekDate)) . '</button>
                                </div>';
                            }
                        } else {
                            // If no service charge record is found
                            echo "<script>alert('You have not selected a service yet. Please select a service to continue.');</script>";
                            echo "<script>window.location = 'http://localhost/HulkZone/member/services.php';</script>";
                        }

                    ?>
                </div>
                <div class="row2">
                    <div id="availableSlots"></div>

                    <script>
                        //onload the page will show current date's slot
                        $(document).ready(function() {
                            var currentDayNumber = '<?php echo date('N'); ?>';
                            var currentDate = '<?php echo date('Y-m-d'); ?>';
                            var empid = '<?php echo $empid; ?>';
                            var startDate = '<?php echo $startDate; ?>';

                            $.ajax({
                                type: "POST",
                                url: "./getExercise.php",
                                data: { dayID: currentDayNumber, empid: empid, startDate: startDate, date: currentDate },
                                success: function(response) {
                                // Update the contents of the availableSlots div with the response from the server
                                $("#availableSlots").html(response);
                                }
                            });
                        });

                        // Get the available slots using the selected date and weekdayID 
                        function displayAvailableSlots(weekdayID, empid, startDate, selectedDate) {
                        $.ajax({
                            type: "POST",
                            url: "./getExercise.php",
                            data: { dayID: weekdayID, empid : empid, startDate: startDate, date: selectedDate},
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
