<?php


include 'authorization.php';
include '../connect.php';


// Get the date and weekday ID from AJAX 
$date = $_POST['date'];

//monday = 1, t = 2...
$weekdayID = $_POST['dayID'];


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
</script>
