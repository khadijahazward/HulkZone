<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php 
include 'authorization.php';
include '../connect.php';
?>

<?php
    include("setProfilePic.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Appointments | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/appointment.css">
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
                    GYM APPOINTMENTS
                </div>
                <div class="right">
                    <div class="notification-bell">
                        <?php include("notifications.php"); ?>
                    </div>
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content" style = "background-image:none;" >

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
                            } else {
                                // Otherwise, create a clickable button
                                $buttonHtml = '<button data-index="' . $i . '" onclick="displayAvailableSlots(' . $i . ', \'' . $dayOfWeekDate . '\')">' . date('D, M j', strtotime($dayOfWeekDate)) . '</button>';
                            }

                            echo "<div class ='activeBtn'>";
                            // Display the date as a button
                            echo $buttonHtml;
                            echo "</div>";
                        }
                    ?>
                </div>
                <div class="row2">
                    <div id="availableSlots"></div>

                    <script>
                        //onload the page will show current date's slot
                        $(document).ready(function() {
                            var currentDate = '<?php echo date('Y-m-d'); ?>';
                            var currentDayNumber = '<?php echo date('N'); ?>';
                            $.ajax({
                                type: "POST",
                                url: "./getSlotsTable.php",
                                data: { dayID: currentDayNumber, date: currentDate },
                                success: function(response) {
                                    // Update the contents of the availableSlots div with the response from the server
                                    $("#availableSlots").html(response);
                                }
                            });
                        });

                        // Get the available slots using the selected date and weekdayID 
                        function displayAvailableSlots(weekdayID, selectedDate) {
                        $.ajax({
                            type: "POST",
                            url: "./getSlotsTable.php",
                            data: { dayID: weekdayID, date: selectedDate},
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


