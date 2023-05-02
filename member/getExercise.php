<?php
    include 'authorization.php';
    include '../connect.php';
    include("setProfilePic.php");

    $dayID = $_POST["dayID"]; 
    $empid = $_POST["empid"];
    $startDate = $_POST["startDate"];
    $date = $_POST['date'];
    
    $sql = "SELECT * FROM workoutplan WHERE employeeID = '$empid' AND startDate = '$startDate' AND day = $dayID AND memberID = $row1[memberID]";
    $result = mysqli_query($conn, $sql);
    echo '<table> 
    <tr> 
        <th> Exercise Name </th>
        <th> Sets </th> 
        <th> Rest Time </th> 
    </tr>';
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $field2name = $row["exerciseName"];
            $field3name = $row["reps"];
            $field4name = $row["restTime"] . " Minutes";

            echo '<tr> 
                <td>'.$field2name.'</td> 
                <td>'.$field3name.'</td> 
                <td>'.$field4name.'</td> 
            </tr>';
        }
        echo '</table>';

        $sql4 = "SELECT * FROM workout_plan_status WHERE memberID = $row1[memberID] AND CompletedDate = '$date' AND startDate = '$startDate'";
        $result4 = mysqli_query($conn, $sql4);
        
        if (!$result4) {
            // There was an error executing the query
            echo "Error: " . mysqli_error($conn);
        } elseif (mysqli_num_rows($result4) == 1) {
            // The plan for this member has already been completed for today
            echo '<button type="button" value="completed" style="float:right; margin-right:1px;" disabled>Completed</button>';
        } else {
            // The plan for this member has not been completed yet today
            echo '<button type="button" value="completed" style="float:right; margin-right:1px;" onclick="submitForm(\''.$startDate.'\', \''.$date.'\')">Mark as Completed</button>';
        }
       

    } else {
        echo '<tr>
            <td colspan="03" style="border-radius: 10px 10px 10px 10px;"> No Exercises For the Day. </td> 
        </tr>'; 
        echo '</table>';
    }
    
?>

<script>
function submitForm(startDate, date) {

    // Submit a form to book the appointment
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", "submit_workOutPlan.php");

    //creating variables
    var dateField = document.createElement("input");
    dateField.setAttribute("type", "hidden");
    dateField.setAttribute("name", "date");
    dateField.setAttribute("value", date);

    var startDateField = document.createElement("input");
    startDateField.setAttribute("type", "hidden");
    startDateField.setAttribute("name", "startDate");
    startDateField.setAttribute("value", startDate);

    form.appendChild(dateField);
    form.appendChild(startDateField);
    document.body.appendChild(form);
    form.submit();
    
}
</script>