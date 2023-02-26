<?php 
include 'authorization.php';
include '../connect.php';
?>

<?php
    date_default_timezone_set('Asia/Colombo');
    include("setProfilePic.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BodyBuilding Training | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/servicepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                    BODYBUILDING TRAINING
                </div>
                <div class="right">
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>

            <div class="content">
                <div class="row">
                        <div class="topic">
                        Take your strength and physique to new heights with bodybuilding training. Whether you're a seasoned pro or a fitness beginner,<br> this powerful training style will help you build muscle, boost confidence, and reach your full potential.
                        </div>
                        <img src="../member/images/bodybuildingpage.png" width= "100%" height="100%">
                </div>
                <div class="row-two">
                    <div class="sub-topic">
                        <div class="row-two" style="margin-left:40px;">
                            <div class="col"><li>Customized Work out Plan</li></div>
                            <div class="col"><li>View Progress</li></div>
                            <div class="col"><li>Rs. 10, 000 For  06 Months</li></div>
                            <div class="col"><li>Personal Trainer</li></div>
                        </div>
                        
                    </div>
                </div>
                <hr class="hr-heading">
                    <div class="row-two" style="font-size:20px;">Bodybuilding Training - Service History</div>
                <hr class="hr-heading">

                <div class="row-two" style="margin-left: 10px; margin-right: 10px;">
                        <?php
                            //add the history in db
                            $serviceID = 2;
                            $memberID = $row1['memberID'];
                            $sql6 = "SELECT * FROM `servicecharge` where memberID = $memberID AND serviceID = $serviceID";
                            $result6 = mysqli_query($conn, $sql6);
                            
                            if ($result6 && mysqli_num_rows($result6) > 0) {
                                echo '<table>';
                                while ($row6 = mysqli_fetch_assoc($result6)) {
                                    $employeeID = $row6["employeeID"];
                                    $endDate = $row6["endDate"];
                                    
                                    //getting user id from employee
                                    $sql7 = "select * from employee where employeeID = $employeeID";
                                    $result7 = mysqli_query($conn, $sql7);
                                    $row7 = mysqli_fetch_assoc($result7);

                                    $userID = $row7["userID"];
                                    
                                    //displaying average rating from the employee table
                                    $avgRating = $row7['avgRating'];

                                    $stars = '';
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= round($avgRating)) {
                                            $stars .= '<span class="fas fa-star" style="color: gold; font-size: 20px; display: inline-block;"></span>';
                                        } else {
                                            $stars .= '<span class="far fa-star" style="color: gold; font-size: 20px;display: inline-block;"></span>';
                                        }
                                    }

                                    //getting user detail from user
                                    $sql8 = "select * from user where userID = $userID";
                                    $result8 = mysqli_query($conn, $sql8);
                                    $row8 = mysqli_fetch_assoc($result8);

                                    //member will be able to rate when the service is over and he has not rated yet
                                    if ($endDate <= date('Y-m-d H:i:s') && $row6['rate'] == 0) {
                                        $rate_button_enabled = true;
                                    }else{
                                        $rate_button_enabled = false;
                                    }

                                    //field names for table
                                    $field1name = $row8["fName"] . " " . $row8["lName"];
                                    $field2name = $stars;
                                    $field3name = '<button onclick="openForm()"' . ($rate_button_enabled ? '' : 'disabled') . '>Rate Now</button>';


                                    if($rate_button_enabled){
                                        echo '
                                            <div id="myForm" class="form-popup">
                                        
                                                <form action="../member/rate.php" class="form-container" method="post">

                                                    <h3>Rate This Service</h3>

                                                    <p>Select a rating:</p>

                                                    <div id="rating_stars">
                                                        <span class="far fa-star" data-rating="1"></span>
                                                        <span class="far fa-star" data-rating="2"></span>
                                                        <span class="far fa-star" data-rating="3"></span>
                                                        <span class="far fa-star" data-rating="4"></span>
                                                        <span class="far fa-star" data-rating="5"></span>
                                                        <input type="hidden" name="rating">
                                                    </div>

                                                    <br>
                                                    
                                                    <input type="hidden" name="employeeID" value="' . $employeeID . '">
                                                    <input type="hidden" name="serviceID" value="' . $serviceID . '">
                                                    <input type="hidden" name="memberID" value="' . $memberID . '">
                                                    <input type="hidden" name="paymentID" value="' . $row6['paymentID'] . '">
                                                    
                                                    <button type="submit">Rate</button>
                                                    <button type="button" class="cancel" onclick="closeForm()">Close</button>
                                                </form>
                                            </div>
                                            <script>
                                                function openForm() {
                                                document.getElementById("myForm").style.display = "block";
                                                }
                
                                                function closeForm() {
                                                document.getElementById("myForm").style.display = "none";
                                                }

                                                // Get all the star elements
                                                var stars = document.querySelectorAll("#rating_stars .fa-star");

                                                //storing last star
                                                var lastClickedStar = null;

                                                // Add a click event listener to each star
                                                stars.forEach(function(star) {
                                                    star.addEventListener("click", function() {
                                                        // Get the rating value
                                                        var rating = star.getAttribute("data-rating");
                                                        

                                                        // Remove the "checked" class from all stars
                                                        stars.forEach(function(s) {
                                                        s.classList.remove("checked");
                                                        });

                                                        // Add the "checked" class to the clicked star and all previous stars
                                                        for (var i = 1; i <= rating; i++) {
                                                            stars[i - 1].classList.add("checked");
                                                        }
                                                        
                                                        lastClickedStar = star;
                                                    });
                                                });

                                               // Get the submit button element
                                                var submitButton = document.querySelector("#myForm button[type=\"submit\"]");

                                                // Add a click event listener to the submit button
                                                submitButton.addEventListener("click", function() {
                                                
                                                    // Get the rating value
                                                    var rating = lastClickedStar.getAttribute("data-rating");

                                                    // Set the value of the hidden input field
                                                    document.querySelector("#myForm input[name=rating]").value = rating;
                                                });

                                            </script>
                                            
                                        ';
                                    }
                            
                                    echo '<tr> 
                                        <td style="text-align:left; padding-left: 50px;">'.$field1name.'</td> 
                                        <td>'.$field2name.'</td> 
                                        <td>'.$field3name.'</td> 
                                    </tr>';
                                }
                                echo '</table>';
                            } else {
                                echo '<table>
                                    <tr> 
                                        <td style="width:100%;"> No Service History </td> 
                                    </tr>
                                </table>';
                            }
                            
                        ?>
                </div>

                <hr class="hr-heading">
                    <div class="row-two" style="font-size:20px;">Select Your Trainer</div>
                <hr class="hr-heading">

                <div class="row-two" style="margin-left: 10px; margin-right: 10px;">
                        <?php
                            $sql2 = "SELECT employeeID FROM `employeeservice` where serviceID = 2";
                            $result2 = mysqli_query($conn, $sql2);
                            
                            if ($result2 && mysqli_num_rows($result2) > 0) {
                                echo '<table>';
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    $employeeID = $row2["employeeID"];
                                    
                                    //getting user id from employee
                                    $sql3 = "select userID from employee where employeeID = $employeeID";
                                    $result3 = mysqli_query($conn, $sql3);
                                    $row3 = mysqli_fetch_assoc($result3);

                                    $userID = $row3["userID"];

                                    //getting user detail from user
                                    $sql4 = "select * from user where userID = $userID";
                                    $result4 = mysqli_query($conn, $sql4);
                                    $row4 = mysqli_fetch_assoc($result4);

                                    //field names for table
                                    $field1name = $row4["fName"] . " " . $row4["lName"];
                                    $field2name ="<div><a href='employeeProfile.php?userID=$row3[userID]' class = 'button'>View Profile</a></div>";
                                    
                                    //checking if member has ongoing service
                                    $sql5 = "SELECT * FROM servicecharge WHERE serviceID IN (1, 2, 4) AND endDate >= NOW()";
                                    $result5 = mysqli_query($conn, $sql5);
                                    $ongoingService = mysqli_num_rows($result5) > 0; //true when has gym service ongoing

                                    if ($ongoingService) {                                                     
                                        $payNow = 'javascript:void(0);';
                                        $onclick = 'onclick="alert(\'You already have an ongoing service and cannot obtain another one until it ends.\'); return false;"';                                    
                                    } else {
                                        $payNow = 'pay_now.php?employeeID='.$employeeID.'&serviceID=1';
                                        $onclick = "";
                                    }

                                    $field3name = '<a href="'.$payNow.'" class = "button" '.$onclick.'>Pay Now</a>';
                            
                                    echo '<tr> 
                                        <td style="text-align:left; padding-left: 50px;">'.$field1name.'</td> 
                                        <td>'.$field2name.'</td> 
                                        <td>'.$field3name.'</td> 
                                    </tr>';
                                }
                                echo '</table>';
                            } else {
                                echo '<table>
                                    <tr> 
                                        <td style=:"width:100%;"> Trainers Unavailable at the Moment </td> 
                                    </tr>
                                </table>';
                            }
                            
                        ?>
                </div>
                
                
            </div>


        </div>

    </div>
</body>

</html>