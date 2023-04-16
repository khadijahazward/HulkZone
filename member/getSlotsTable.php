<?php


include 'authorization.php';
include '../connect.php';
include("setProfilePic.php");

// Get the date and weekday ID from AJAX 
$date = $_POST['date'];

//monday = 1, t = 2...
$weekdayID = $_POST['dayID'];

//checks if there is any ongoing service, to see if there is a trainer. 
$sql2 = "SELECT employeeID FROM serviceCharge WHERE memberID = $row1[memberID] AND serviceID IN (1, 2, 4) AND endDate >= CURDATE() LIMIT 1";

// Execute the first query to get the employeeID
$result2 = mysqli_query($conn, $sql2);


if (mysqli_num_rows($result2) > 0) {
    // There is an ongoing service with a trainer
    // Retrieve the employeeID 
    $row2 = mysqli_fetch_assoc($result2);
    $empid = $row2['employeeID'];

    // Retrieve the userID associated with the employeeID from the employees table
    $sql3 = "SELECT userID FROM employee WHERE employeeID = $empid";
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_assoc($result3);
    $userID = $row3['userID'];

    // Retrieve the employee's name from the users table using the userID
    $sql4 = "SELECT fName, lName FROM user WHERE userID = $userID";
    $result4 = mysqli_query($conn, $sql4);
    $row4 = mysqli_fetch_assoc($result4);
    $employeeName = $row4['fName'] . ' ' . $row4['lName'];

    // Execute the second query to check if the dietician is available
    $sql = "SELECT * FROM trainerappointment WHERE date = '$date' AND employeeID = '$empid'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    }

    echo '<table> 
    <tr> 
        <th> Trainer </th>
        <th> Start Time </th> 
        <th> End Time </th> 
        <th> Action </th> 
    </tr>';
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $field1name = date('H:i:s', strtotime($row["startTime"]));
            $field2name = date('H:i:s', strtotime($row["endTime"]));
            $field4name = $employeeName;
            //$field4name = $date;
    
            $st = $row["startTime"];

            //selecting available slots and slot id from  timeslot and slot table
            $sql5 = "SELECT ts.availableSlots, ts.slotID 
            FROM slots s 
            JOIN timeSlots ts ON s.slotID = ts.slotID 
            WHERE s.sTime = '$field1name' AND s.eTime = '$field2name' AND ts.weekDayID = $weekdayID";
            $result5 = mysqli_query($conn, $sql5);
            $row5 = mysqli_fetch_assoc($result5);

            $slotID = isset($row5["slotID"]) ? $row5["slotID"] : '';
            $availableSlots = isset($row5["availableSlots"]) ? $row5["availableSlots"] : '';

            // $sql5 = "SELECT slotID FROM slots WHERE sTime = '$field1name' AND eTime = '$field2name'";
            // $result5 = mysqli_query($conn, $sql5);
            // $row5 = mysqli_fetch_assoc($result5);
            // $slotID = isset($row5["slotID"]) ? $row5["slotID"] : '';

            // $sql6 = "Select availableSlots from timeSlots where slotID = $slotID and weekDayID = $weekdayID";
            // $result6 = mysqli_query($conn, $sql6);
            // $row6 = mysqli_fetch_assoc($result6);
            // $availableSlots = isset($row6["availableSlots"]) ? $row6["availableSlots"] : '';

            if ($row["status"] == 1 || $availableSlots == 0) {
                $field3name = "<button disabled>Not Available</button></td>";
            } else {
                $field3name = "<button onclick=\"bookTrainerAppointment('".$date."', '".$empid."', '".$st."', '".$slotID."', '".$weekdayID."')\">Book Now</button></td>";
            }
    
            echo '<tr> 
                <td>'.$field4name.'</td> 
                <td>'.$field1name.'</td> 
                <td>'.$field2name.'</td> 
                <td>'.$field3name.'</td> 
            </tr>';
        }
    }else{
        echo '<tr>
        <td colspan="4" style="border-radius: 10px 10px 10px 10px;"> Your Trainer is not available today. </td> 
        </tr>'; 
    }
    
    echo '</table>';


}else{
    $sql = "SELECT ts.slotID, sl.sTime, sl.eTime, ts.availableSlots FROM timeslots ts JOIN slots sl ON ts.slotID = sl.slotID WHERE ts.weekDayID = '$weekdayID'";

    $result = mysqli_query($conn, $sql);


    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    }

    echo '<table> 
    <tr> 
        <th> Start Time </th> 
        <th> End Time </th> 
        <th> Available Slots </th> 
        <th> Action </th> 
    </tr>';

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $field1name = $row["sTime"];
            $field2name = $row["eTime"];
            $field3name = $row["availableSlots"];

            if ($field3name == 0) {
                $field4name = "<button disabled>Not Available</button></td>";
            } else {
                $field4name = "<button onclick=\"bookAppointment(" . $row["slotID"] . ", '" . $date . "', " . $weekdayID . ")\">Book Now</button></td>";
            }

            echo '<tr> 
                <td>'.$field1name.'</td> 
                <td>'.$field2name.'</td> 
                <td>'.$field3name.'</td> 
                <td>'.$field4name.'</td>   
            </tr>';
        }
    }

    echo '</table>';  
}
?>

<script>
    function bookAppointment(slotID, bDate, weekdayID) {
    // Confirm the booking with the user
        if (confirm("Are you sure you want to book this slot?")) {
            
            // Submit a form to book the appointment
            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "book-appointment.php");

            //creating variables
            var slotIDField = document.createElement("input");
            slotIDField.setAttribute("type", "hidden");
            slotIDField.setAttribute("name", "slotID");
            slotIDField.setAttribute("value", slotID);

            //creating variables
            var dateField = document.createElement("input");
            dateField.setAttribute("type", "hidden");
            dateField.setAttribute("name", "bDate");
            dateField.setAttribute("value", bDate);

            var idField = document.createElement("input");
            idField.setAttribute("type", "hidden");
            idField.setAttribute("name", "weekdayID");
            idField.setAttribute("value", weekdayID);

            form.appendChild(slotIDField);
            form.appendChild(dateField);
            form.appendChild(idField);
            document.body.appendChild(form);
            form.submit();
        }
    }

    function bookTrainerAppointment(bDate, empid, startTime, slotID, weekdayID) {
    // Confirm the booking with the user
    if (confirm("Are you sure you want to book this appointment?")) {
        // Submit a form to book the appointment
        var form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("action", "book-Trainer-appointment.php");

        // Creating variables
        var slotIDField = document.createElement("input");
        slotIDField.setAttribute("type", "hidden");
        slotIDField.setAttribute("name", "slotID");
        slotIDField.setAttribute("value", slotID);

        var dateField = document.createElement("input");
        dateField.setAttribute("type", "hidden");
        dateField.setAttribute("name", "bDate");
        dateField.setAttribute("value", bDate);

        var idField = document.createElement("input");
        idField.setAttribute("type", "hidden");
        idField.setAttribute("name", "empid");
        idField.setAttribute("value", empid);

        var startTimeField = document.createElement("input");
        startTimeField.setAttribute("type", "hidden");
        startTimeField.setAttribute("name", "startTime");
        startTimeField.setAttribute("value", startTime);

        var weekdayIDField = document.createElement("input");
        weekdayIDField.setAttribute("type", "hidden");
        weekdayIDField.setAttribute("name", "weekdayID");
        weekdayIDField.setAttribute("value", weekdayID);

        form.appendChild(slotIDField);
        form.appendChild(dateField);
        form.appendChild(idField);
        form.appendChild(startTimeField);
        form.appendChild(weekdayIDField);

        document.body.appendChild(form);
        form.submit();
    }
}

</script>
