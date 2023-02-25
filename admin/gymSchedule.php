<?php
include('authorization.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule and Attendance | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sideBar.css">
    <link rel="stylesheet" href="css/table.css">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .button-container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
    button {
        margin: 10px;
    }

    .no-appointments{
        background-color: #DEF9D7;
        text-align: center;
        height: 35px;
        padding-top: 12px;
        margin-left: 12px;
        border-radius: 15px;
        margin-top: 24px;
        color: red;
        font-weight: bold;
    }
    .current-date {
    background-color: red;
}

</style>

</head>

<body>
    <?php
    include('../admin/sideBar.php');
    ?>
    <div class="right">

        <div class="content">
            <div class="contentLeft">
                <p class="title">Gym Schedule</p>
            </div>
            <div class="contentMiddle">
                <p class="myProfile">My Profile</p>
            </div>
            <div class="contentRight"><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
        </div>
        <div class="down">
        <?php
require '../connect.php';

// get the current week's start and end dates
$startDate = date('Y-m-d', strtotime('monday this week'));
$endDate = date('Y-m-d', strtotime('sunday this week'));
// if date is not set, set it to the current date
if (!isset($_POST['date'])) {
    $date = date('Y-m-d');
} else {
    $date = $_POST['date'];
}
// query to get all distinct dates in the current week
$sql = "SELECT DISTINCT date FROM gymuseappointment WHERE date BETWEEN '$startDate' AND '$endDate'";
$result = mysqli_query($conn, $sql);

// create an array of all the dates in the current week
$weekDates = array();
for ($i = strtotime($startDate); $i <= strtotime($endDate); $i += 86400) {
    $weekDates[] = date('Y-m-d', $i);
}

// display the buttons for each date
$currentDate = date('Y-m-d');

echo '<div class="button-container">';
foreach ($weekDates as $date) {
    $buttonDate = date('D, M j', strtotime($date));
    echo '<form method="post">';
    echo '<input type="hidden" name="date" value="' . $date . '">';
    if ($date == $currentDate) {
        echo '<button type="submit" style="width:150px;" class="current-date">' . $buttonDate . '</button>';
    } else {
        echo '<button type="submit" style="width:150px;">' . $buttonDate . '</button>';
    }
    echo '</form>';
}

// display "reset" button if current week's end date is Sunday
if ($endDate == date('Y-m-d') && date('D', strtotime($endDate)) == 'Sun') {
    echo '<form method="post">';
    echo '<input type="hidden" name="date" value="' . date('Y-m-d') . '">';
    echo '<button type="submit" style="width:150px;">Reset</button>';
    echo '</form>';
}

echo '</div>';




// display the appointment details for the selected date
if (isset($_POST['date'])) {
    
    $date = $_POST['date'];
    $sql = "SELECT user.userID,user.fName, gymuseappointment.slotID,  slots.sTime, slots.eTime ,gymuseappointment.memberID,
     IF(gymuseappointment.attendance = 1, 'Attended', 'Mark') AS Attendance
            FROM gymuseappointment 
            INNER JOIN member ON gymuseappointment.memberID = member.memberID 
            INNER JOIN user ON member.userID = user.userID 
            INNER JOIN slots ON gymuseappointment.slotID = slots.slotID 
            WHERE gymuseappointment.date = '$date'
            ORDER BY slots.sTime ASC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr><th>Member ID</th><th>First Name</th><th>Start Time</th><th>End Time</th><th>Attendance</th></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            $statusText = ($row['Attendance'] == 'Attended') ? 'Attended' : 'Mark';
            $statusValue = ($row['Attendance'] == 'Attended') ? '0' : '1';
            $buttonStyle = ($row['Attendance'] == 'Mark') ? 'background-color: #FF2C10;' : '';
            echo "<tr>
            <td>$row[memberID] </td>
            <td>$row[fName] </td>
            <td>$row[sTime] </td>
            <td> $row[eTime]</td>
            <td>
            <form method='POST' action='attendanceUpdate.php?date=$date'>
            <button type='submit' class='button2' name='aStatus' value='$statusValue'style='$buttonStyle'>{$row['Attendance']}</button>
            <input type='hidden' name='memberID' value='{$row['memberID']}'>
            <input type='hidden' name='date' value='$date'>
          
            <input type='hidden' name='sTime' value='{$row['sTime']}'>
            <input type='hidden' name='eTime' value='{$row['eTime']}'>
        </form> </td>
        </tr>";
        }
        echo '</table>';
    } else {
        echo '<div class="no-appointments">No Appointments</div>';
    }
}

// close database connection
mysqli_close($conn);
?>

 </div>
    </div>




</body>

</html>