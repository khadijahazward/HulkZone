<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$query1 = "SELECT * FROM employee INNER JOIN user ON employee.userID = user.userID WHERE user.userID = '$userID'";
$result1 = mysqli_query($conn, $query1);
if(mysqli_num_rows($result1) == 1){
    $row1 = mysqli_fetch_assoc($result1);
    $employeeID = $row1['employeeID'];
}else{
    echo '<script> window.alert("Error receiving employee ID!");</script>';
}

if(isset($_GET['new'])){
    $memberID = $_GET['new'];
}

$query2 = "SELECT * FROM supplementlist";
$result2 = mysqli_query($conn, $query2);

if(!$result2){
    echo '<script> window.alert("Error of receiving supplement List!");</script>';
}

if(isset($_POST['save']) && isset($_POST['supplementNo'])){

    $supplementNo = mysqli_real_escape_string($conn, $_POST['supplementNo']);
    
    $query3 = "INSERT INTO supplement 
                (supplementID, memberID, employeeID) VALUES 
                ('$supplementNo', '$memberID', '$employeeID')";

    $result3 = mysqli_query($conn, $query3);

    if($result3){
        echo '<script> window.alert("You have been select a supplement!");</script>';
        echo '<script> window.location.href="dietplan.php"</script>';
    }else{
        echo '<script> window.alert("Error of selecting a supplement!");</script>';
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplement</title>
    <link href="Style/supplements.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class="container">
        <!-- <img src="Images/supplements.png" alt="healthy food" class="backgroundImage"> -->
        <div class="topBar">
            <div class="gymLogo"><img src="Images/Gym Logo.png" alt="Gym Logo" class="gymLogo"></div>
            <div class="gymName">
                <p>HULK ZONE</p>
            </div>
            <div>
                <div class="notification">
                    <?php
                        include 'notifications.php'; 
                    ?>
                </div>
                <img src="<?php echo $profilePic ?>" alt="my profile" class="myProfile">
            </div>
        </div>
        <div class="content">
            <form method="POST">
                <div class="topic">
                    <p>Supplements List</p>
                </div>
                <div class="gridContainer">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>SUPPLEMENT NO</th>
                                <th>SUPPLEMENT</th>
                                <th>SUPPLEMENT NAME</th>
                                <th>SUPPLEMENT TYPE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if(mysqli_num_rows($result2) > 0){
                                while($row2 = mysqli_fetch_assoc($result2)){
                                    
                                    $supplementNo = $row2['supplementID'];
                                    $supplementName = $row2['supplementName'];
                                    $supplementType = $row2['supplementType'];
                                    $supplementPhoto = $row2['supplementPhoto'];
                                    
                                echo '

                                <tr>
                                    <td><input type="radio" name="supplementNo" value='.$supplementNo.'></td>
                                    <td>'.$supplementNo.'</td>
                                    <td><img src='.$supplementPhoto.' alt="Supplement Photo"></td>
                                    <td>'.$supplementName.'</td>
                                    <td>'.$supplementType.'</td>
                                </tr>
                            
                                ';

                                }
                            }else{
                                echo "
                                <tr>
                                    <td colspan='5'>Still you don't have any supplements</td>
                                </tr>
                                ";
                            }
                            
                            ?>
                        </tbody>
                    </table>
                </div>
                <button name="save" class="saveBtn">Save</button>
            </form>
            <button class="backButton" onclick="window.location.href = 'dietplan.php'">Back</button>
        </div>
</body>

</html>