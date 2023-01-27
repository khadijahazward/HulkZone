
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../dietician/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../dietician/style/dietplan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class = "nav-bar">
            <div class="line-heading">
                <div class="images"><img src="..\asset\images\gymLogo.png" alt="Gym Logo" class="gymLogo"></div>
                <div class="option">HULK ZONE</div>
            </div>
            
            <hr>

            <div class="line">
                <div class="nav-font"><a href="../dietician/dieticianDashboard.php">Home</a></div>
            </div>

            <hr>

            <div class="line">
                <div class="nav-font"><a href="">Members</a></div>
            </div>

            <hr>

            <div class="line">
                <div class="nav-font"><a href="">Appointments</a></div>
            </div>
            
            <hr>

            <div class="line">
                <div class="nav-font"><a href="">Diet Plans</a></div>
            </div>

            <hr>

            <div class="line">
                <div class="nav-font"><a href="">Chat Box</a></div>
            </div>

            <hr>

            <div class="line">
                <div class="nav-font"><a href="">Settings</a></div>
            </div>

            <hr>

            <div class="line">
                <div class="nav-font"><a href="../dietician/logout.php">Logout</a></div>
            </div>

            <hr>
        </div>
        
        <div class="body">
            <div class = "header">
                <div class="left"></div>
                <div class="right">
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="..\asset\images\dp.png" alt="dp" width="50px" height="50px">
                </div>
            </div>
            <div class="content">
                <p>Diet Plans</p>
                <div class="row"style="margin-top:10px;  margin-right:10px;">
                    <?php
                        include "../connect.php";
                        $sql = "SELECT userID, fName, lName, statuses  FROM `user` where roles = 1";
                        $result = mysqli_query($conn, $sql);
                    echo '<table> 
                    <tr> 
                        <th> User ID </th> 
                        <th> First Name </th> 
                        <th> Last Name </th> 
                        <th> Status </th> 
                        <th> Diet Plan</th>
                        <th> </th>
                    </tr>';
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $field1name = $row["userID"];
                            $field2name = $row["fName"];
                            $field3name = $row["lName"];
                            if ($row["statuses"] == 1) {
                                $field4name = "Active";
                            }else{
                                $field4name = "Inactive";
                            }

                            echo '<tr> 
                                <td>'.$field1name.'</td> 
                                <td>'.$field2name.'</td> 
                                <td>'.$field3name.'</td> 
                                <td>'.$field4name.'</td> 
                                <td></td>
                                <td> 
                                    <button><a href = "../dietician/createDietPlan.php">Update</a> 
                                    </button> 
                                    <button><a href = "createDietPlan.php">New</a></button> 
                                </td> 
                            </tr>';
                            
                        }
                    }
                    ?>
                    
                </div>
            </div>
        </div>

    </div>
</body>

</html>