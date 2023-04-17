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
    <title>Diet plan | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/plan.css">
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
                    DIET PLAN
                </div>
                <div class="right">
                    <div class="notification-bell">
                        <?php include("notifications.php"); ?>
                    </div>
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">

                <div class="row">
                    <p style="font-size:20px; margin:0;font-weight:bold;">PROGRESS</p>
                </div>
                <!--for the progress bar-->
                <div class="row">
                    <div id="bar">
                        <div id="progress"></div>
                        <div id="percentage"></div>
                    </div>
                </div>
                <div class="row">
                    <p style="font-size:20px; margin:0;font-weight:bold; margin-bottom:0;">Diet Plan</p>
                </div>
                <div class="row">
                    <?php

                        $sql2 = "SELECT * FROM serviceCharge WHERE memberID = $row1[memberID] AND serviceID = 3 AND endDate >= CURDATE() LIMIT 1";
                    
                        $result2 = mysqli_query($conn, $sql2);

                        if (mysqli_num_rows($result2) > 0) {

                            // If a service charge record is found
                            $row2 = mysqli_fetch_assoc($result2);
                            $empid = $row2['employeeID'];
                            $startDate = $row2['startDate'];

                            //$sql3 = "SELECT * FROM dietplan WHERE memberID = " . $row1['memberID'] . " AND employeeID = $empid AND startDate = '$startDate'";
                            $sql3 = "SELECT * FROM dietplan WHERE memberID = " . $row1['memberID'] . " AND employeeID = $empid AND startDate = '$startDate' ORDER BY day ASC";

                            echo '<table> 
                            <tr> 
                                <th>Day</th>
                                <th>Breakfast Meal</th>
                                <th>Breakfast Quantity</th>
                                <th>Breakfast Calories</th>
                                <th>Lunch Meal</th>
                                <th>Lunch Quantity</th>
                                <th>Lunch Calories</th>
                                <th>Dinner Meal</th>
                                <th>Dinner Quantity</th>
                                <th>Dinner Calories</th>
                                <th>Action</th>
                            </tr>';

                            $result3 = mysqli_query($conn, $sql3);

                            // Check if there are any rows in the result set
                            if (mysqli_num_rows($result3) == 0) {
                                echo '<tr>
                                    <td colspan="11" style="border-radius: 10px 10px 10px 10px;"> The dietician has not made the diet plan yet. </td> 
                                </tr>'; 
                            } else {

                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                    $dayNumber = $row3['day'];
                                    $field2name = $row3["breakfastMeal"];
                                    $field3name = $row3["breakfastQty"];
                                    $field4name = $row3["breakfastCal"];
                                    $field5name = $row3["lunchMeal"];
                                    $field6name = $row3["lunchQty"];
                                    $field7name = $row3["lunchCal"];
                                    $field8name = $row3["dinnerMeal"];
                                    $field9name = $row3["dinnerQty"];
                                    $field10name = $row3["dinnerCal"]; 
                                    
                                    if (date('N') == 1) { // If today is Monday
                                        $previousMonday = date('Y-m-d'); // Use today's date instead
                                    } else {
                                        $previousMonday = date('Y-m-d', strtotime('last Monday'));
                                    }
                                    
                                    $dateDisplay = [];
                                    $buttonHtml = [];
                                    // Loop through each day of the week (Monday to Sunday)
                                    for ($i = 1; $i <= 7; $i++) {
                                        $dayOfWeekDate = date('Y-m-d', strtotime($previousMonday . ' +' . ($i-1) . ' day'));
                                        
                                        // Store the date as text in the buttonHtml array
                                        $dateDisplay[$i] = date('D, M j', strtotime($dayOfWeekDate));
    
                                        $sql4 = "SELECT * FROM diet_plan_status WHERE member_id = " . $row1['memberID'] . " AND CompletedDate = '" . $dayOfWeekDate . "'";
                                        $result4 = mysqli_query($conn, $sql4);
                                        
                                        if (!$result4) {
                                            // There was an error executing the query
                                            echo "Error: " . mysqli_error($conn);
                                        } elseif (mysqli_num_rows($result4) == 1) {
                                            // The plan for this member has already been completed for today
                                            $buttonHtml[$i] = "<button type='button' value='completed' disabled>Completed</button>";
                                        } else {
                                            // The plan for this member has not been completed yet today
                                            $buttonHtml[$i] = "<button type='button' value='completed' onclick='submitForm(" . $row3['diet_id'] . ", \"" . $dayOfWeekDate . "\")'>Completed</button>";
                                        }
                                    }

                                    echo '<tr> 
                                    <td>'.$dateDisplay[$dayNumber].'</td> 
                                    <td>'.$field2name.'</td> 
                                    <td>'.$field3name.'</td> 
                                    <td>'.$field4name.'</td> 
                                    <td>'.$field5name.'</td> 
                                    <td>'.$field6name.'</td> 
                                    <td>'.$field7name.'</td> 
                                    <td>'.$field8name.'</td> 
                                    <td>'.$field9name.'</td> 
                                    <td>'.$field10name.'</td>
                                    <td>'.$buttonHtml[$dayNumber].' </td>
                                    </tr>';
                                }
                                
                            }
                            echo '</table>';


                        } else {

                            // If no service charge record is found
                            echo "<script>alert('You have not selected a diet service yet. Please select a service to continue.');</script>";
                            echo "<script>window.location = 'http://localhost/HulkZone/member/services.php';</script>";
                        }

                    ?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>

<script>
function submitForm(dietID, completedDate) {

    // Submit a form to book the appointment
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", "submit_dietPlan.php");

    //creating variables
    var dateField = document.createElement("input");
    dateField.setAttribute("type", "hidden");
    dateField.setAttribute("name", "completedDate");
    dateField.setAttribute("value", completedDate);

    var dietidField = document.createElement("input");
    dietidField.setAttribute("type", "hidden");
    dietidField.setAttribute("name", "dietID");
    dietidField.setAttribute("value", dietID);

    form.appendChild(dateField);
    form.appendChild(dietidField);
    document.body.appendChild(form);
    form.submit();
    
}
</script>


<!--for progress bar-->
<script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const progress = document.querySelector('#progress');
    const percentage = document.querySelector('#percentage');

    let checkedCount = 0;

    checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        if (this.checked) {
        checkedCount++;
        } else {
        checkedCount--;
        }
        
        progress.style.width = `${(checkedCount / checkboxes.length) * 100}%`;
        percentage.innerHTML = `${(checkedCount / checkboxes.length) * 100}%`;
    });
    });

</script>