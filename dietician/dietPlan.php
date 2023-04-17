<?php

include 'authorization.php';
include 'connect.php';
include 'setProfilePic.php';

$userID = mysqli_real_escape_string($conn, $_SESSION['userID']);

$query1 = "SELECT * FROM employee WHERE userID = $userID";
$result1 = mysqli_query($conn, $query1);

if (mysqli_num_rows($result1) == 1) {
    $row1 = mysqli_fetch_assoc($result1);
    $employeeID = $row1['employeeID'];
} else {
    echo '<script> window.alert("Error of receiving employee details!");</script>';
}



?>

<!DOCTYPE html>
<html>

<head>
    <title>Diet Plan</title>
    <meta charset="utf-8">
    <meta name="Viewport" content="width=device-width, initial-scale= 1.0">
    <link href="Style/dietPlan.css" rel="StyleSheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class="container">
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
        <div class="leftBar">
            <div class="leftBarContent">
                <hr>
                <a href="home.php"><i class="fa fa-home"></i>Home</a>
                <hr>
                <a href="members.php"><i class="fa fa-group"></i>Members</a>
                <hr>
                <a href="appointments.php"><i class="fa fa-calendar"></i>Appointments</a>
                <hr>
                <a href="schedule.php"><i class="fa fa-clock-o"></i>Schedule</a>
                <hr>
                <a href="dietPlan.php" class="active"><i class="fa fa-heartbeat"></i>Diet Plans</a>
                <hr>
                <a href="chatBox.php"><i class="fa fa-comments"></i>Chat Box</a>
                <hr>
                <a href="profile.php"><i class="fa fa-user"></i>My Profile</a>
                <hr>
                <a href="complaint.php"><i class="fa fa-cog"></i>Complaints</a>
                <hr>
                <a href="../home/logout.php"><i class="fa fa-sign-out"></i>Log out</a>
                <hr>
            </div>
        </div>
        <div class="main">
            <div class="topic">
                <p>Diet Plans</p>
            </div>
            <div class="gridContainer">
                <table>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>PROFILE</th>
                            <th>NAME</th>
                            <th>STATUS</th>
                            <th>DIET PLAN</th>
                            <th>
                                Supplement&nbsp;&nbsp;&nbsp;
                                <a href="newSupplement.php"><button class="addSupplementBtn"><i
                                            class="fa fa-plus-square"></i></button></a>
                            </th>
                        </tr>
                    </thead>
                    <?php

                    $query2 = "SELECT * FROM serviceCharge WHERE employeeID = $employeeID AND endDate >= SYSDATE()";
                    $result2 = mysqli_query($conn, $query2);

                    if (mysqli_num_rows($result2) > 0) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $memberID = $row2['memberID'];

                            $query3 = "SELECT * FROM member WHERE memberID = $memberID";
                            $result3 = mysqli_query($conn, $query3);

                            if ($result3) {
                                $row3 = mysqli_fetch_assoc($result3);
                                $memberUserID = $row3['userID'];

                                $query4 = "SELECT * FROM user JOIN member ON user.userID = member.userID WHERE user.userID = $memberUserID";
                                $result4 = mysqli_query($conn, $query4);

                                if (mysqli_num_rows($result4) > 0) {
                                    while ($row4 = mysqli_fetch_assoc($result4)) {

                                        $memberFName = $row4['fName'];
                                        $memberLName = $row4['lName'];
                                        $memberProfilePic = $row4['profilePhoto'];

                                        if ($row['statuses'] == '1') {
                                            $memberStatus = "Active";
                                        } else {
                                            $memberStatus = "Not Active";
                                        }

                                        echo "
                                        <tbody>
                                                <tr>
                                                <td>" . $memberID . "</td>
                                                <td><img src=" . $memberProfilePic . " alt='member DP'></td>
                                                <td>" . $memberFName . " " . $memberLName . "</td>
                                                <td>" . $memberStatus . "</td>";

                                                
                                        $query7 = "SELECT * FROM servicecharge WHERE memberID = $memberID AND employeeID = $employeeID AND serviceID = 3 AND endDate >= NOW()";
                                        $result7 = mysqli_query($conn, $query7);

                                        $row7 = mysqli_fetch_assoc($result7);

                                        $query5 = "SELECT * FROM dietplan WHERE day=1 AND memberID = $memberID AND employeeID = $employeeID";
                                        $result5 = mysqli_query($conn, $query5);

                                        if (mysqli_num_rows($result5) == 0) {
                                            echo "<td>
                                                    <a href='createDietPlanMonday.php?new=" . $memberID . "'><button>New</button></a>
                                                </td>";
                                        } else {
                                            if ($row7['endDate'] >= date('Y-m-d H:i:s')) {
                                                
                                                echo    "<td>
                                                        <a href='viewDietPlan.php?view=" . $memberID . "'><button>View</button></a>
                                                        <a href='updateDietPlan.php?update=" . $memberID . "'><button>Update</button></a>
                                                    </td>";
                                            } else {
                                                
                                                echo    "<td>
                                                            <a href='createDietPlanMonday.php?new=" . $memberID . "'><button>New</button></a>
                                                        </td>";
                                            }
                                        }

                                        $query6 = "SELECT * FROM supplement WHERE memberID = $memberID AND employeeID = employeeID";
                                        $result6 = mysqli_query($conn, $query6);

                                        if (mysqli_num_rows($result6) == 0) {
                                            echo "<td>
                                                <a href='addSupplements.php?new=" . $memberID . "'><button>New</button></a>
                                            </td>";
                                        } else {
                                            if ($row7['endDate'] >= date('Y-m-d H:i:s')) {
                                                echo    "<td>
                                                            <a href='viewSupplements.php?new=" . $memberID . "'><button>View</button></a>
                                                        </td>";
                                            } else {
                                                echo    "<td>
                                                                <a href='addSupplements.php?new=" . $memberID . "'><button>New</button></a>
                                                        </td>";
                                            }
                                        }
                                        echo "</tr>
                                        </tbody>";
                                    }
                                }
                            }
                        }
                    }else{
                        echo "
                        <tr>
                            <td colspan='6'>Still you don't have members</td>
                        </tr>
                    ";
                    }


                    ?>
                </table>
            </div>
        </div>
    </div>



    <?php

    $supName = $supType = "";
    $supNameErr = $supTypeErr = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        if(isset($_POST['supName'])){
            $supName = $_POST['supName'];
        }else{
            $supNameErr = "Supplement name is required";
        }

        if(isset($_POST['supType'])){
            $supType = $_POST['supType'];
        }else{
            $supTypeErr = "Sypplement Type is required";
        }
        echo $supName;

        if (isset($_FILES['image'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
        
            $file_ext_array = explode('.', $file_name);
            if (count($file_ext_array) > 1) {
                $file_ext = strtolower(end($file_ext_array));
            } else {
                $errors[] = "File extension could not be determined.";
            }
        
            $expensions = array("jpeg", "jpg", "png");
            if (!in_array($file_ext, $expensions)) {
                $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be exactly 2 MB';
            }
        
            if (empty($errors)) {
                // Get the user ID from the session
                $userID = $_SESSION['userID'];
        
                // Create a new file name using the user ID and the file extension
                $newFileName = $userID . '.' . $file_ext;
        
                // Set the folder where the uploaded file will be stored
                $folder = "Images/supplements";
        
                // Set the full path of the uploaded file
                $file_path = $folder . $newFileName;
        
                // Move the uploaded file to the target directory
                move_uploaded_file($file_tmp, $file_path);
        
                // Update the user's profile photo path in the database
                $query = "INSERT INTO supplementlist(supplementName, supplemenetType, supplementPhoto) VALUES ('$supName', '$supType', '$file_path')";
                $result = mysqli_query($conn, $query);
        
                if (!$result) {
                    echo "Error: " . mysqli_error($conn);
                } else {
                    // Redirect the user to their profile page
                    header("Location: dietplan.php");
                    exit();
                }
            } else {
                // Display the error messages and redirect the user back to their profile page
                echo "<script>
                    alert('" . implode("\\n", $errors) . "');
                </script>";
                echo "<script>window.location.href = 'dietplan.php';</script>";
                exit();
            }
        }
    }
    
    ?>



    <div id="image" class="popUpContent">
        <div class="popUpContainer">
            <div class="content">
                <span class="close">&times;</span>
                <div class=" subtopic">
                    <p>Add a Supplement</p>
                </div>
                <form id="supplementForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <table class="reportingContent">
                        <tr>
                            <td><label for="supName">Supplement Name</label></td>
                            <td>
                                <!-- <span class="error"></span><br> -->
                                <input type="text" name="supName" id="supName" class="textBox"
                                    placeholder="Enter the supplement name">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="supType">Supplement Type</label></td>
                            <td>
                                <!-- <span class="error"></span><br> -->
                                <input type="text" name="supType" id="supType" class="textBox"
                                    placeholder="Enter the supplement type">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="image">Image of Supplement</label></td>
                            <td>
                                <input type="file" name="image">
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="acceptBtn"> Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
    var popUpContent = document.getElementById('image');
    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        popUpContent.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == popUpContent) {
            popUpContent.style.display = "none";
        }
    }
    </script>
</body>

</html>