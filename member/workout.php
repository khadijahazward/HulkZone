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
    <title>Workout plan | HulkZone</title>
    <link rel="stylesheet" type="text/css" href="../member/style/gen.css">
    <link rel="stylesheet" type="text/css" href="../member/style/plan.css">
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
                    WORKOUT PLAN
                </div>
                <div class="right">
                    <div class="notification-bell">
                        <?php include("notifications.php"); ?>
                    </div>
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">
                <div class="row" style="font-weight:bold;">
                    Work Out Plan for 
                    <?php
                        $currentDate = date('Y-m-d');
                        echo $currentDate;
                    ?>
                </div>

                <div class="row">
                    <p style="font-size:20px; margin:0;">DAILY PROGRESS</p>
                </div>
                <!--for the progress bar-->
                <div class="row">
                    <div id="bar">
                        <div id="progress"></div>
                        <div id="percentage">0%</div>
                    </div>
                </div>
                <div class="row">
                    <?php
                        //edit this query - wrong
                        $sql3 = "select * from workoutplan where memberID = " . $row1['memberID'];

                        echo '<table> 
                        <tr> 
                            <th> Exercise </th> 
                            <th> Duration </th> 
                            <th> Rest Time </th> 
                            <th> Status </th> 
                        </tr>';
                        $result3 = mysqli_query($conn, $sql3);
                        if (mysqli_num_rows($result3) > 0) {
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                
                                //retrieving exercise name from the exercise table using exercise ID
                                $exerciseID = $row3["exerciseID"];

                                $sql4 = "select exerciseName from exercise where exerciseID =  " . $exerciseID;
                                $result4 = mysqli_query($conn, $sql4);
                                $row4 = mysqli_fetch_assoc($result4);
                                $field1name = $row4["exerciseName"];

                                $field2name = $row3["duration"];
                                $field3name = $row3["restTime"];
                                $field4name = $row3["status"];

                                echo '<tr> 
                                    <td>'.$field1name.'</td> 
                                    <td>'.$field2name.'</td> 
                                    <td>'.$field3name.'</td> 
                                    <td><input type="checkbox" name="status[]" value="'.$row3["status"].'" '.($field4name == 1 ? 'checked' : '').'></td> 
                                </tr>';
                            }
                        }else{
                            echo '<tr>
                                <td colspan="4" style="border-radius: 10px 10px 10px 10px;"> You have not Selected a Service Yet. </td> 

                            </tr>'; 
                        }
                        echo '</table>';
                    ?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>


<!--for progress bar-->
<script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const progress = document.querySelector('#progress');
    const percentage = document.querySelector('#percentage');

    let checkedCount = 0;

    checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        if (this.checked) {
        checkedCount++;
        } else {
        checkedCount--;
        }
        
        progress.style.width = `${(checkedCount / checkboxes.length) * 100}%`;
        percentage.innerHTML = `${(checkedCount / checkboxes.length) * 100}%`;
    });
    });

</script>