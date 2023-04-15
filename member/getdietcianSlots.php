<?php
include 'authorization.php';
include '../connect.php';
include("setProfilePic.php");


$date = $_POST['date'];
$sql2 = "SELECT employeeID FROM serviceCharge WHERE memberID = $row1[memberID] AND serviceID = 3 AND endDate >= CURDATE() LIMIT 1";

// Execute the first query to get the employeeID
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0) {
    // Get the employeeID from the first query result
    $row2 = mysqli_fetch_assoc($result2);
    $empid = $row2['employeeID'];

    // Execute the second query to check if the dietician is available
    $sql = "SELECT * FROM dieticianappointment WHERE date = '$date' AND employeeID = '$empid'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    }
    
    echo '<table> 
    <tr> 
        <th> Start Time </th> 
        <th> End Time </th> 
        <th> Action </th> 
    </tr>';
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $field1name = date('H:i:s', strtotime($row["startTime"]));
            $field2name = date('H:i:s', strtotime($row["endTime"]));
            //$field4name = $date;
    
            if ($row["status"] == 1) {
                $field3name = "<button disabled>Not Available</button></td>";
            } else {
                $field3name = "<button onclick=\"bookAppointment('".$date."', '".$empid."')\">Book Now</button></td>";
            }
    
            echo '<tr> 
                <td>'.$field1name.'</td> 
                <td>'.$field2name.'</td> 
                <td>'.$field3name.'</td> 
            </tr>';
        }
    }else{
        echo '<tr>
        <td colspan="3" style="border-radius: 10px 10px 10px 10px;"> Your dietician is not available today. </td> 
        </tr>'; 
    }
    
    echo '</table>';
} else {
    echo '<table>
    <tr>
        <td colspan="3" style="border-radius: 10px 10px 10px 10px;"> You have not Selected a Service Yet. </td> 
    </tr>'; 
    echo '</table>';
}
?>

<script>
function bookAppointment(bDate, empid) {
    // Confirm the booking with the user
    if (confirm("Are you sure you want to book this slot?")) {

        // Submit a form to book the appointment
        var form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("action", "book-dietician-appointment.php");

        //creating variables
        var dateField = document.createElement("input");
        dateField.setAttribute("type", "hidden");
        dateField.setAttribute("name", "bDate");
        dateField.setAttribute("value", bDate);

        var empidField = document.createElement("input");
        empidField.setAttribute("type", "hidden");
        empidField.setAttribute("name", "empid");
        empidField.setAttribute("value", empid);

        form.appendChild(dateField);
        form.appendChild(empidField);
        document.body.appendChild(form);
        form.submit();
    }
}
</script>

