<?php 
include 'authorization.php';
include '../connect.php';

?>

<?php
    include("setProfilePic.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEAM | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/team.css">  
    <link rel="icon" type="image/png" href="../asset/images/gymLogo.png"/> 
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
                    TEAM
                </div>
                <div class="right">
                    <div class="notification-bell">
                        <?php include("notifications.php"); ?>
                    </div>
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">
                <div class="row" style="margin-bottom:0;">
                    <form action="team.php" method="post">
                        <input type="text" placeholder="Search" name="search">
                        <button type="submit">Submit</button>
                    </form>
                </div>
                <div class = "link">
                    <a href="team.php">Clear Search</a>
                </div>


                <div class="row"><br>
                    Team Members
                </div>

                <div class ="row-two">
                    <form action="team.php" method="post">
                        <button name = "getDieticians" >Dieticians</button>
                    </form>

                    <form action="team.php" method="post">
                        <button name = "getTrainers">Trainers</button>
                    </form>  
                </div>


                <div class="row">
                    <?php 

                        if (isset($_POST['search'])) {
                            // sanitize and escape the search query
                            $search_query = mysqli_real_escape_string($conn, $_POST['search']);
                            
                            // when user had searched smt
                            $sql = "SELECT userID, fName, lName, roles, profilePhoto FROM `user` WHERE roles IN (2,3) AND (LOWER(fName) LIKE LOWER('$search_query%') OR LOWER(lName) LIKE LOWER('$search_query%'))";

                        }else if(isset($_POST['getDieticians'])){
                            $sql = "SELECT userID, fName, lName, roles, profilePhoto FROM `user` WHERE roles = 3";

                        }else if(isset($_POST['getTrainers'])){
                            $sql = "SELECT userID, fName, lName, roles, profilePhoto FROM `user` WHERE roles = 2";

                        } else {
                            // if search form has not been submitted, show everyone in team
                            $sql = "SELECT userID, fName, lName, roles, profilePhoto FROM `user` WHERE roles IN (2,3)";
                        }
                        
                        $result = mysqli_query($conn, $sql);
                        
                        $count = 0;

                        $total_results = mysqli_num_rows($result);
                        
                        echo '<table>';

                        if ($total_results > 0) {
                            echo "<tr>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                $count++;
                                if(isset($row['profilePhoto']) && $row['profilePhoto'] != NULL){
                                    //dp link from db
                                    $profilePictureLink = $row['profilePhoto'];
                                }else{
                                    $profilePictureLink = '../profileImages/default.png';
                                }

                                $fullName = $row["fName"] . " " . $row["lName"];
                                if($row["roles"] == 2){
                                    $role = "Trainer";
                                }else{
                                    $role = "Dietician";
                                }

                                

                                echo "
                                <td>
                                    <div class = test>
                                        <div><img src='$profilePictureLink'></div>
                                        <div>$fullName</div>
                                        <div>$role</div>
                                        <div><a href='employeeProfile.php?userID=$row[userID]'><button>View Profile</button></a></div>
                                    </div>
                                </td> 
                                ";


                                //3 cols per row
                                if ($count % 3 == 0) {
                                    echo "</tr><tr>";
                                }
                            }
                            
                            // if there are only 2 results, add an empty column to the row
                            if ($count == 2) {
                                echo "<td></td>";
                                echo "</tr>";
                            }

                                                        
                            // if there are only 1 results, add 2 empty column to the row
                            if ($count == 1) {
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "</tr>";
                            }

                            

                        }else{
                            //when there is no search results
                            echo '<script>alert("NO RESULTS MATCHED.");window.location.href = "team.php";</script>';
                        }
                        
                        echo '</table>';
                    
                        
                    ?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>