<?php 
include 'authorization.php';
include '../connect.php';
?>

<?php
$query = "SELECT * from user where userID = " . $_SESSION['userID'];
    $result = mysqli_query($conn, $query);
    $query1 = "SELECT * from member where userID = " . $_SESSION['userID'];
    $result1 = mysqli_query($conn, $query1);
    if (mysqli_num_rows($result) == 1 && mysqli_num_rows($result1) == 1) {
        $row = mysqli_fetch_assoc($result);
        $row1 = mysqli_fetch_assoc($result1);
    } else {
        echo '<script> window.alert("Error receiving data!");</script>';
    }

    if(isset($row['profilePhoto']) && $row['profilePhoto'] != NULL){
        //dp link from db
        $profilePictureLink = $row['profilePhoto'];
    }else{
        $profilePictureLink = '../member/profileImages/default.png';
    }
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
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content" style = "background-image:none;" >
                <div class="row2" style="font-weight:bold;">
                    Make Appointments for 
                    <?php
                        $currentDate = date('Y-m-d');
                        echo $currentDate;
                    ?>
                </div>

                <div class="row2">
                <?php
                        
                        $sql = "SELECT * FROM slots";
                        $result = mysqli_query($conn, $sql);

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
                                $field4name = "<button onclick=\"bookAppointment(" . $row["slotID"] . ")\">Book Now</button></td>";
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
                </div>

            </div>
        </div>

    </div>
</body>

</html>

<script>
    function bookAppointment(slotID) {
    // Confirm the booking with the user
        if (confirm("Are you sure you want to book this slot?")) {
            // Submit a form to book the appointment
            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "book-appointment.php");

            var slotIDField = document.createElement("input");
            slotIDField.setAttribute("type", "hidden");
            slotIDField.setAttribute("name", "slotID");
            slotIDField.setAttribute("value", slotID);

            form.appendChild(slotIDField);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
