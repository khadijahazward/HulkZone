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
    <title>Diet plan | HulkZone</title>
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
                    DIET PLAN
                </div>
                <div class="right">
                    <img src="..\asset\images\bell.png" alt="notification" width="35px" height="35px">
                    <img src="<?php echo $profilePictureLink; ?>" alt="dp" width="50px" height="50px" style="border-radius: 20px;">
                </div>
            </div>
            <div class="content">
                <div class="row" style="font-weight:bold;">
                    Diet Plan for 
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
                        $sql3 = "select * from dietplan where memberID = " . $row1['memberID'];

                        echo '<table> 
                        <tr> 
                            <th> Day</th>
                            <th> mealType </th> 
                            <th> Quantity </th> 
                            <th> meal </th> 
                            <th> Status </th> 
                        </tr>';
                        $result3 = mysqli_query($conn, $sql3);

                        
                        if (mysqli_num_rows($result3) > 0) {
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                
                                //retrieving exercise name from the exercise table using exercise ID
                                $field1name = $row3["day"];
                                $field2name = $row3["mealType"];
                                $field3name = $row3["Qty"];
                                $field4name = $row3["meal"];
                                $field5name = $row3["status"];

                                echo '<tr> 
                                    <td>'.$field1name.'</td> 
                                    <td>'.$field2name.'</td> 
                                    <td>'.$field3name.'</td> 
                                    <td>'.$field4name.'</td> 
                                    <td><input type="checkbox" name="status[]" value="'.$row3["status"].'" '.($field4name == 1 ? 'checked' : '').'></td> 
                                </tr>';
                            }
                        }else{
                            echo '<tr>
                                <td colspan="5" style="border-radius: 10px 10px 10px 10px;"> You have not Selected a Service Yet. </td> 

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