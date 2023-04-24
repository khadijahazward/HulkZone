<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$query1 = "SELECT * FROM employee WHERE userID = $userID";
$result1 = mysqli_query($conn, $query1);

if(!$result1){
    echo '<script> window.alert("Error receiving employee details!");</script>';
}else{
    $row1 = mysqli_fetch_assoc($result1);
    $employeeID = $row1['employeeID'];
}

if(isset($_GET['memberuserID'])){
    $memberUserID = $_GET['memberuserID'];
}

$query2 = "SELECT * FROM user WHERE userID = $memberUserID";
$result2 = mysqli_query($conn, $query2);

$row2 = mysqli_fetch_assoc($result2);


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $message = $_POST['sendingMessage'];
    $senderID = $userID;
    $receiverID = $memberUserID;
    $status = 1;

    if(isset($_POST['sendBtn']) && isset($_POST['message'])){
        
        $query3 = "INSERT INTO chat 
                    (senderID, receiverID, message, status) VALUES
                    ('$senderID', '$receiverID', '$message', '$status')";
        $result3 = mysqli_query($conn, $query3);

        if(!$result3){
            echo '<script> window.alert("Error!");</script>';
        }
    }
}

$query4 = "SELECT DISTINCT DATE(dateTime) AS chatDate FROM chat ORDER BY dateTime ASC";
$result4 = mysqli_query($conn, $query4);

if(!$result4){
    echo '<script> window.alert("Error receiving msg!");</script>';
}

$query6 = "UPDATE chat SET status = 0 WHERE senderId = $memberUserID AND receiverID = $userID AND status = 1";
$result6 = mysqli_query($conn, $query6);

if(!$result6){
    echo '<script> window.alert("Error update unread message!");</script>';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/messageHistory.css">
    <title>Chat | <?php echo $row2['fName']." ". $row2['lName']?></title>
    <meta http-equiv="refresh" content="5">
</head>

<body>
    <div class="container">
        <div class="topContactBar">
            <div class="selectedMember">
                <img src="<?php echo $row2['profilePhoto']?>" alt="selected member profile"
                    class="selectedMemberProfile">
                <p class="selectedMemberName">
                    <?php echo $row2['fName']." ". $row2['lName']?>
                </p>
            </div>
        </div>
        <div class="chatHistory">
            <div class="chatDisplay">
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

                            $query5 = "SELECT * FROM chat WHERE DATE(dateTime) = '$dateTime' AND ((senderID = $userID AND receiverID = $memberUserID) OR (senderID = $memberUserID AND receiverID = $userID)) ORDER BY dateTime ASC";
                            $result5 = mysqli_query($conn, $query5);

                            if(mysqli_num_rows($result5) > 0){
                                while($row5 = mysqli_fetch_assoc($result5)){
                                    
                                    $message = $row5['message'];
                                    $messageSenderID = $row5['senderID'];
                                    $messageReceiverID = $row5['receiverID']; 
                                    $time = date('H:i ', strtotime($row5['dateTime']));

                                    $class = ($messageSenderID == $userID) ? 'right' : 'left';

                                    echo '
                                    <li class="message '.$class.'">
                                        <p>'.$message.'</p>
                                        <span class="time">'.$time.'</span>
                                    </li>        
                                    ';
                                    
                                }
                            }
                        }
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
</body>

</html>