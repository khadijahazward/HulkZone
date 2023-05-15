<?php
// Connect to database
include('../connect.php');
include('authorization.php');
include('notiCount.php');



$query = "SELECT roles, gender, count(*) as count FROM user WHERE roles IN (1, 2, 3) GROUP BY roles, gender";
$result = mysqli_query($conn, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[$row['roles']][$row['gender']] = $row['count'];
}

// Retrieve data for complaints chart
$query2 = "SELECT status, COUNT(*) as count FROM complaint GROUP BY status";
$result2 = mysqli_query($conn, $query2);


$data2 = array();
while ($row2 = mysqli_fetch_assoc($result2)) {
    $data2[$row2['status']] = $row2['count'];
}

$query3 = "SELECT COUNT(*) AS count, MONTH(created_at) AS month FROM user GROUP BY MONTH(created_at)";
$result3 = mysqli_query($conn, $query3);

$data3 = array();
while ($row3 = mysqli_fetch_assoc($result3)) {
    $data3[$row3['month']] = $row3['count'];
}


mysqli_close($conn);

?>
<?php
include('setAdminProfilePic.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin</title>


    <link rel="stylesheet" href="css/addAnnouncements.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/header.css">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!--<style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>-->

</head>

<body>
    <?php
    include('../admin/sideBar.php');
    ?>
    <div class="right">

        <div class="content">
            <div class="contentLeft">
                <p class="title">REPORTS</p>
            </div>
            <div>
                <div class="notification" style="margin-left: 770px;">
                    <?php
                    include 'notifications.php';
                    ?>
                </div>
            </div>
            <div class="notiCount" style="padding-top: 7.5px;margin-left:808px;">
                <p><?php echo $count; ?></p>
            </div>


            <div class="contentMiddle" style="margin-left:35px;">
                <p class="myProfile">My Profile</p>
            </div>
            <div class="contentRight" style="margin-left: 0px;"><img src="<?php echo $profilePictureLink ?>" alt="AdminLogo" class="adminLogo"></div>
        </div>
        <!-- below the header -->
        <div class="down">
            <!-- Dashboard -->
            <div class="dashboard">

            </div>



            <div class="gender">
                <div class="title1">
                    <h1>Users by Gender:Overview</h1>
                </div>
                <div class="graph" style="background-color: #ffffff;">
                    <!--Bar Graph-->
                    <div style="width:60%;">
                        <canvas id="myChart"></canvas> <!--provides a drawing surface for rendering graphics and animations on a web page. -->
                    </div>

                </div>

                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Members', 'Trainers', 'Dieticians'],
                            datasets: [{
                                label: 'Male',
                                backgroundColor: 'rgba(255, 0, 0, 0.5)',
                                borderColor: 'rgba(0, 0, 255, 0.7)',
                                data: [
                                    <?php echo isset($data2[1]['Male']) ? $data[1]['Male'] : 0 ?>,
                                    <?php echo isset($data[2]['Male']) ? $data[2]['Male'] : 0 ?>,
                                    <?php echo isset($data[3]['Male']) ? $data[3]['Male'] : 0 ?>
                                ]
                            }, {
                                label: 'Female',
                                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                borderColor: 'rgba(54, 162, 235, 0.7)',
                                data: [
                                    <?php echo isset($data[1]['Female']) ? $data[1]['Female'] : 0 ?>,
                                    <?php echo isset($data[2]['Female']) ? $data[2]['Female'] : 0 ?>,
                                    <?php echo isset($data[3]['Female']) ? $data[3]['Female'] : 0 ?>
                                ]
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </div>
            <div class="complaint">
                <div class="title1">
                    <h1>Complaints status:Overview</h1>
                </div>
                <div class="graph">
                    <!--Bar Graph-->
                    <div style="width:75%;">
                        <canvas id="myChart2"></canvas> <!--//The canvas element is an HTML element that provides a drawing surface for rendering graphics and animations on a web page. The element is often used in combination with JavaScript to draw dynamic graphics and animations, and it is supported by most modern browsers.-->
                    </div>

                    <script>
                        var ctx = document.getElementById('myChart2').getContext('2d');
                        var chart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: ['Filed', 'Completed', 'Ignored'],
                                datasets: [{
                                    label: 'Complaints',
                                    backgroundColor: ['rgba(255, 0, 0, 0.5)', 'rgba(0, 255, 0, 0.5)', 'rgba(0, 0, 255, 0.5)'],
                                    borderColor: ['rgba(255, 0, 0, 0.7)', 'rgba(0, 255, 0, 0.7)'],
                                    data: [
                                        <?php echo isset($data2['Filed']) ? $data2['Filed'] : 0 ?>,
                                        <?php echo isset($data2['Completed']) ? $data2['Completed'] : 0 ?>,
                                        <?php echo isset($data2['Ignored']) ? $data2['Ignored'] : 0 ?>
                                    ]
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
        <!--<div class="tets" style="background-color: black;height:30px;width:100%;">Next elements can be added from here</div>-->

        <div class="line">
            <div class="title1">
                <h1>New users joined to the Gym:Monthly</h1>
            </div>
            <div class="graph" style="background-color: #ffffff;">
                <div class="graph" style="background-color: #ffffff;">
                    <!--Bar Graph-->
                    <div style="width:60%;">
                        <canvas id="myChart3"></canvas> <!--provides a drawing surface for rendering graphics and animations on a web page. -->
                    </div>

                </div>
                <script>
                    var ctx = document.getElementById('myChart3').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                            datasets: [{
                                label: 'Users Joined',
                                backgroundColor: 'rgba(255, 0, 0, 0.5)',
                                borderColor: 'rgba(255, 0, 0, 0.7)',
                                data: [<?php echo isset($data3[1]) ? $data3[1] : 0 ?>,
                                    <?php echo isset($data3[2]) ? $data3[2] : 0 ?>,
                                    <?php echo isset($data3[3]) ? $data3[3] : 0 ?>,
                                    <?php echo isset($data3[4]) ? $data3[4] : 0 ?>,
                                    <?php echo isset($data3[5]) ? $data3[5] : 0 ?>,
                                    <?php echo isset($data3[6]) ? $data3[6] : 0 ?>,
                                    <?php echo isset($data3[7]) ? $data3[7] : 0 ?>,
                                    <?php echo isset($data3[8]) ? $data3[8] : 0 ?>,
                                    <?php echo isset($data3[9]) ? $data3[9] : 0 ?>,
                                    <?php echo isset($data3[10]) ? $data3[10] : 0 ?>,
                                    <?php echo isset($data3[11]) ? $data3[11] : 0 ?>,
                                    <?php echo isset($data3[12]) ? $data3[12] : 0 ?>
                                ]

                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>
            </div>

        </div>



</body>

</html>