<?php 
    include 'authorization.php';
    include '../connect.php';
    include 'setProfilePic.php';
?>

<?php

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$query1 = "SELECT * FROM member WHERE userID = $userID";
$result1 = mysqli_query($conn, $query1);

if(!$result1){
    echo '<script> window.alert("Error receiving member details!");</script>';
}else{
    $row1 = mysqli_fetch_assoc($result1);
    $memberID = $row1['memberID'];
}

$query2 = "SELECT * FROM servicecharge WHERE memberID = $memberID AND serviceID = 3 AND endDate >= NOW()";
$result2 = mysqli_query($conn, $query2);

if(mysqli_num_rows($result2) == 0){
    echo "<script>alert('You have not selected a service yet. Please select a service to continue.');</script>";
    echo "<script>window.location = 'http://localhost/HulkZone/member/services.php';</script>";
}else{
    $row2 = mysqli_fetch_assoc($result2);
    $dieticianID = $row2['employeeID'];
}


$query3 = "SELECT * from user JOIN employee ON user.userID = employee.userID WHERE employee.employeeID = $dieticianID";
$result3 = mysqli_query($conn, $query3);

if(!$result3){
    echo '<script> window.alert("Error receiving dietician details!");</script>';
}else{
    $row3 = mysqli_fetch_assoc($result3);
    $dieticianUserID = $row3['userID'];
    $dieticianFName = $row3['fName'];
    $dieticianLName = $row3['lName'];
    $dieticianPhoto = $row3['profilePhoto'];
}

$query4 = "SELECT DISTINCT DATE(dateTime) AS chatDate FROM chat WHERE ((senderID = $userID AND receiverID = $dieticianUserID) OR (senderID = $dieticianUserID AND receiverID = $userID)) ORDER BY DATE(dateTime) ASC";
//$query4 = "SELECT DISTINCT DATE(dateTime) AS chatDate FROM chat WHERE ((senderID = $userID AND receiverID = $dieticianUserID) OR (senderID = $dieticianUserID AND receiverID = $userID)) ORDER BY dateTime ASC";
$result4 = mysqli_query($conn, $query4);

if(!$result4){
    echo '<script> window.alert("Error receiving msg!");</script>';
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $message = $_POST['sendingMessage'];
    $senderID = $userID;
    $receiverID = $dieticianUserID;
    $status = 1;

    if(isset($_POST['sendBtn']) && !empty($_POST['sendingMessage'])){
        
        $query6 = "INSERT INTO chat 
                    (senderID, receiverID, message, status) VALUES
                    ('$senderID', '$receiverID', '$message', '$status')";
        $result6 = mysqli_query($conn, $query6);

        if(!$result6){
            echo '<script> window.alert("Error of sending messages!");</script>';
        }else{
            header("Location: chat.php");
            exit;
        }
    }
}

$query7 = "UPDATE chat SET status = 0 WHERE senderId = $dieticianUserID AND receiverID = $userID AND status = 1";
$result7 = mysqli_query($conn, $query7);

if(!$result7){
    echo '<script> window.alert("Error update unread message!");</script>';
}

$query8 = "SELECT * FROM servicecharge WHERE memberID = $memberID AND employeeID = $dieticianID AND serviceID = 3 AND endDate >= NOW()";
$result8 = mysqli_query($conn, $query8);

if($result8){
    $row8 = mysqli_fetch_assoc($result8);
    
    $startDateTime = $row8['startDate'];
    $startDate = new DateTime($startDateTime);
    $startDateTime = $startDate -> format('Y-m-d');
    
    $endDateTime = $row8['endDate'];
    $endDate = new DateTime($endDateTime);
    $endDateTime = $endDate -> format('Y-m-d');

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/chat.css">
</head>

<body>
    <div class="container">
        <div class="nav-bar">
            <?php
                include("navBar.php");
            ?>
        </div>
        <div class="body">
            <div class="header">
                <div class="left">
                    CHAT
                </div>
                <div class="right">
                    <div class="notification-bell">
                        <?php include("notifications.php"); ?>
                    </div>
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px"
                        style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">
                <div class="chatContent">
                    <div class="topContactBar">
                        <div class="selectedMember">
                            <img src="<?php echo $dieticianPhoto?>" alt="selected member profile"
                                class="selectedMemberProfile">
                            <p class="selectedMemberName">
                                <?php echo $dieticianFName." ".$dieticianLName?>
                            </p>
                        </div>
                    </div>
                    <div class="chatHistory">
                        <div class="chatArea">
                            <ul class="chat">

                                <?php
                                
                                if(mysqli_num_rows($result4) > 0){
                                    while($row4 = mysqli_fetch_assoc($result4)){
                                        
                                        $dateTime = $row4['chatDate'];
                                        
                                            echo '
                                                <li class="day">
                                                    <p>'.$dateTime.'</p>
                                                </li>
                                            ';

                                            $query5 = "SELECT * FROM chat WHERE DATE(dateTime) = '$dateTime' AND ((senderID = $userID AND receiverID = $dieticianUserID) OR (senderID = $dieticianUserID AND receiverID = $userID)) ORDER BY dateTime ASC";
                                            $result5 = mysqli_query($conn, $query5);

                                            if(mysqli_num_rows($result5) > 0){
                                                while($row5 = mysqli_fetch_assoc($result5)){
                                                
                                                    $message = $row5['message'];
                                                    $messageSenderID = $row5['senderID'];
                                                    $messageReceiverID = $row5['receiverID']; 
                                                    $time = date('H:i ', strtotime($row5['dateTime']));

                                                    $class = ($messageSenderID == $userID) ? 'rightMessage' : 'leftMessage';

                                                    echo '
                                                        <li class="message '.$class.'">
                                                            <p>'.$message.'</p>
                                                            <span class="time">'.$time.'</span>
                                                        </li>
                                                    ';
                                                }
                                            }else{
                                                echo '
                                                <li class="day">
                                                    <p>Start a coversation</p>
                                                </li>  
                                                ';
                                            }
                                        
                                    }
                                }else{
                                    echo '
                                        <li class="day">
                                            <p>Start a coversation</p>
                                        </li>  
                                        ';
                                }
                                
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="replyBar">
                        <form method="post">
                            <input type="text" name="sendingMessage" id="sendingMessage" class="sendingMessage"
                                placeholder="Write your message...">
                            <button name="sendBtn" class="sendBtn" id="sendBtn">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>