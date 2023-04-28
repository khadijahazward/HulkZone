<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$query1 = "SELECT * FROM employee INNER JOIN user ON employee.userID = user.userID WHERE user.userID = '$userID'";
$result1 = mysqli_query($conn, $query1);
if(mysqli_num_rows($result1) == 1){
    $row = mysqli_fetch_assoc($result1);
    $employeeID = $row['employeeID'];
}else{
    echo '<script> window.alert("Error receiving employee ID!");</script>';
}

$memberID = "";
if(isset($_GET['new'])){
    $memberID = $_GET['new'];
}


$query2 = "SELECT * FROM supplement WHERE  memberID = $memberID";
$result2 = mysqli_query($conn, $query2);

if($result2){
    $row2 = mysqli_fetch_assoc($result2);
}else{
    echo "error";
}

$query3 = "SELECT * FROM member WHERE  memberID = $memberID";
$result3 = mysqli_query($conn, $query3);

if($result3){
    $row3 = mysqli_fetch_assoc($result3);
    $memberUserID = $row3 ['userID'];

    $query4 = "SELECT * FROM user WHERE userID = $memberUserID";
    $result4 = mysqli_query($conn, $query4);

    if($result4){
        $row4 = mysqli_fetch_assoc($result4);
    }
}

$query5 = "SELECT * FROM supplementlist JOIN supplement ON supplementlist.supplementID = supplement.supplementID WHERE memberID = $memberID AND employeeID = $employeeID";
$result5 = mysqli_query($conn, $query5);

if(mysqli_num_rows($result5) == 1){
    $row5 = mysqli_fetch_assoc($result5);

    $memberName = $row4['fName']." ".$row4['lName'];
    $supplementName = $row5['supplementName'];
    $supplementType = $row5['supplementType'];
    $supplementPhoto = $row5['supplementPhoto'];
    
}else{
    echo '<script> window.alert("Error receiving supplement details!");</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        View Supplement
    </title>
    <link href="Style/viewSupplement.css" rel="stylesheet">
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
            <form method="POST"
                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?new=<?php echo $memberID ?>">
                <div class="topic">
                    <p>Supplement</p>
                </div>
                <div class="gridContainer">
                    <table class="fullTable">
                        <!-- <tr class="detailTable">
                            <td>
                                <label for="memberName">Member Name</label>
                                <input type="text" name="memberName" value="<?php echo $memberName ?>">
                            </td>
                            <td>
                                <label for="supplementName">Supplement Name</label>
                                <input type="text" name="supplementName" value="<?php echo $supplementName ?>">
                            </td>
                            <td>
                                <label for="text">Supplement Type</label>
                                <input type="text" name="supplementType" value="<?php echo $supplementType ?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <img src="<?php echo $supplementPhoto ?>" alt="supplement Photo">
                            </td>
                        </tr> -->
                        <tr>
                            <td>
                                <table class="detailTable">
                                    <tr>
                                        <td>
                                            <label for="memberName">Member Name</label>
                                        </td>
                                        <td>
                                            <input type="text" name="memberName" value="<?php echo $memberName ?>"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="supplementName">Supplement Name</label>
                                        </td>
                                        <td>
                                            <input type="text" name="supplementName"
                                                value="<?php echo $supplementName ?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="text">Supplement Type</label>
                                        </td>
                                        <td>
                                            <input type="text" name="supplementType"
                                                value="<?php echo $supplementType ?>" readonly>
                                        </td>
                                    </tr>

                                </table>
                            </td>
                            <td>
                                <img src="<?php echo $supplementPhoto ?>" alt="supplement Photo">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
            <button class="backButton" onclick="window.location.href = 'dietplan.php'">Back</button>
        </div>
</body>

</html>