<?php
// Connect to database
include('../connect.php');


// Total Members Query
$totalMembersQuery = "SELECT COUNT(*) AS total FROM user where roles=1";
$totalMembersResult = mysqli_query($conn, $totalMembersQuery);
$totalMembers = mysqli_fetch_assoc($totalMembersResult)['total'];

// Total Revenue Query
$totalAnnouncementsQuery = "SELECT COUNT(*) AS total FROM announcement";
$totalAnnouncementsResult = mysqli_query($conn, $totalAnnouncementsQuery);
$totalAnnouncements = mysqli_fetch_assoc($totalAnnouncementsResult)['total'];

$totalComplaintsQuery = "SELECT COUNT(*) AS total FROM complaint";
$totalComplaintsResult = mysqli_query($conn, $totalComplaintsQuery);
$totalComplaints = mysqli_fetch_assoc($totalComplaintsResult)['total'];

$sumQuery = "SELECT SUM(bill) AS totalRevenue FROM payment";
$sumResult = mysqli_query($conn, $sumQuery);
$totalRevenue = mysqli_fetch_assoc($sumResult)['totalRevenue'];

$query = "SELECT roles, gender, count(*) as count FROM user WHERE roles IN (1, 2, 3) GROUP BY roles, gender";
$result = mysqli_query($conn, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[$row['roles']][$row['gender']] = $row['count'];
}

mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sideBar.css">
    <link rel="stylesheet" href="css/addAnnouncements.css">
    <link rel="stylesheet" href="css/dashboard.css">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>

</head>

<body>
<div class="sidebar">
        <div class="gymLogo" ><img src="../../HulkZone/asset/images/gymLogo.png" alt="" width="80px" height="80px"> </div>
        <div class="sidebarContent">
            <div class="tab"><a href="dashboard.php"><i class="fa fa-dashboard" style="padding-right: 15px;"></i> Dashboard</a></div>
            <hr>
            <div class="tab"><a href="viewProfile.php"><i class="fas fa-user-tie" style="padding-right: 15px;"></i> My Profile</a></div>
            <hr>
            <div class="tab"><a href="manageMembers.php"><i class="	fa fa-users" style="padding-right: 15px;"></i> Manage Members</a></div>
            <hr>
            <div class="tab"><a href="manageAttendance.php"><i class="fa fa-calendar" style="padding-right: 15px;"></i> Member Attendance</a></div>
            <hr>
            <div class="tab"><a href="#Schedule"><i class="fa fa-clock-o" style="padding-right: 15px;"></i> Schedule</a></div>
            <hr>
            <div class="tab"><a href="manageTrainer.php"><i class="	fa fa-user" style="padding-right: 15px;"></i> Manage Trainers</a></div>
            <hr>
            <div class="tab"><a href="manageDietician.php"><i class="fas fa-user-nurse" style="padding-right: 15px;"></i> Manage Dieticians</a></div>
            <hr>
            <div class="tab"><a href="manageComplaints.php"><i class='	fas fa-exclamation-circle' style="padding-right: 15px;"></i>User Complaints</a></div>
            <hr>
            <div class="tab"><a href="viewAnnouncements.php"><i class='fas fa-bullhorn' style="padding-right: 15px;"></i>Announcements</a></div>
            <hr>
            <div class="tab"><a href="#Reports"><i class=' fas fa-file-alt ' style="padding-right: 15px;"></i>Reports</a></div>
            <hr>
            <div class="tab"><a href="#payments"><i class=' 	far fa-money-bill-alt ' style="padding-right: 15px;"></i>Member Payments</a></div>
            <hr>
            <div class="tab"><a href="login.php"><i class="fa fa-sign-out " style="padding-right: 15px;"></i>Log Out</a></div>
            <hr>
        </div>
    </div>


    <!--Right Part-->
    <div class="right" style="display: flex; flex-direction:column;margin-left:20%;">

        <div class="content" style="width: 100%;float:right;">
            <div class="contentLeft">
                <p class="title">Dashboard</p>
            </div>
            <div class="contentMiddle">
                <p class="myProfile">My Profile</p>
            </div>
            <div class="contentRight" style="padding-right:40px;"><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
        </div>
        <div class="down" >
            <!-- Dashboard -->
            <div class="dashboard">
                <div class="topBoxes" style="display:flex;width:100%;">
                    <!-- Box for Total Members -->
                    <div class="dashboard-box">
                      <div class="dashboard-title">Total Members</div>
                      <div class="dashboard-left">
                        <img class="topIcons"src="images/users.png" alt="Members" >
                      </div>
                      <div class="dashboard-right">
                        <?php echo $totalMembers; ?>
                      </div>
                    </div>
  
                    <!-- Box for Total Revenue -->
                    <div class="dashboard-box">
                      <div class="dashboard-title">Total Revenue</div>
                      <div class="dashboard-left">
                        <img class="topIcons" src="images/revenue.png" alt="Revenue">
                      </div>
                      <div class="dashboard-right">
                        <?php  echo $totalRevenue; ?>
                      </div>
                    </div>
  
                    <!-- Box for Total Announcements -->
                    <div class="dashboard-box">
                      <div class="dashboard-title">Total Announcements</div>
                      <div class="dashboard-left">
                        <img class="topIcons" src="images/announcement.png" alt="Announcements">
                      </div>
                      <div class="dashboard-right">
                        <?php echo $totalAnnouncements; ?>
                      </div>
                    </div>
  
                    <!-- Box for Total Complaints -->
                    <div class="dashboard-box">
                      <div class="dashboard-title">Total Complaints</div>
                      <div class="dashboard-left">
                        <img class="topIcons" src="images/complaints.png" alt="Complaints">
                      </div>
                      <div class="dashboard-right">
                        <?php echo $totalComplaints; ?>
                      </div>
                </div>
                
                
            </div>
              
        </div>
        <div class="graph" >
                <!--Bar Graph-->
                    <div style="width:70%;">
                      <canvas id="myChart"></canvas>
                    </div>
                    <script>
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Members', 'Trainers', 'Dieticians'],
                                        datasets: [{
                                            label: 'Male',
                                            backgroundColor: 'rgba(255, 0, 0, 0.2)',
                                            borderColor: 'rgba(0, 0, 255, 1)',
                                            data: [
                                                <?php echo isset($data[1]['Male']) ? $data[1]['Male'] : 0 ?>, 
                                                <?php echo isset($data[2]['Male']) ? $data[2]['Male'] : 0 ?>, 
                                                <?php echo isset($data[3]['Male']) ? $data[3]['Male'] : 0 ?>
                                            ]
                                        },{
                                            label: 'Female',
                                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                            borderColor: 'rgba(54, 162, 235, 1)',
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
                <!--<div class="tets" style="background-color: black;height:30px;width:100%;">Next elements can be added from here</div>-->

    </div>
    
        

</body>
</html>