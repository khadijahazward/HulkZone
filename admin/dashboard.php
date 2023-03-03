<?php
// Connect to database
include('../connect.php');
include('authorization.php');

// Total Members Query
$totalMembersQuery = "SELECT COUNT(*) AS total FROM user where roles=1";
$totalMembersResult = mysqli_query($conn, $totalMembersQuery);
$totalMembers = mysqli_fetch_assoc($totalMembersResult)['total'];

// Total Revenue Query
$totalAnnouncementsQuery = "SELECT COUNT(*) AS total FROM notifications where type=0";
$totalAnnouncementsResult = mysqli_query($conn, $totalAnnouncementsQuery);
$totalAnnouncements = mysqli_fetch_assoc($totalAnnouncementsResult)['total'];

$totalComplaintsQuery = "SELECT COUNT(*) AS total FROM complaint";
$totalComplaintsResult = mysqli_query($conn, $totalComplaintsQuery);
$totalComplaints = mysqli_fetch_assoc($totalComplaintsResult)['total'];

$sumQuery = "SELECT SUM(amount) AS totalRevenue FROM payment";
$sumResult = mysqli_query($conn, $sumQuery);
$totalRevenue = mysqli_fetch_assoc($sumResult)['totalRevenue'];

$totalDieticiansQuery = "SELECT COUNT(*) AS totalD FROM user WHERE roles=3";
$totalDieticiansResult = mysqli_query($conn, $totalDieticiansQuery);
$totalDieticians = mysqli_fetch_assoc($totalDieticiansResult)['totalD'];

$totalTrainersQuery = "SELECT COUNT(*) AS totalT FROM user WHERE roles=2";
$totalTrainersResult = mysqli_query($conn, $totalTrainersQuery);
$totalTrainers = mysqli_fetch_assoc($totalTrainersResult)['totalT'];

$totalusersQuery = "SELECT COUNT(*) AS totalU FROM user";
$totalusersResult = mysqli_query($conn, $totalusersQuery);
$totalusers = mysqli_fetch_assoc($totalusersResult)['totalU'];

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

mysqli_close($conn);

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
        <p class="title">Dashboard</p>
      </div>
      <div class="contentMiddle">
        <p class="myProfile">My Profile</p>
      </div>
      <div class="contentRight"><img src="images/admin.png" alt="AdminLogo" class="adminLogo"></div>
    </div>
    <!-- below the header -->
    <div class="down">
      <!-- Dashboard -->
      <div class="dashboard">
        <div class="topBoxes">
          <!-- Box for Total Members -->

          <div class="dashboard-box">
            <a href="manageMembers.php" style="text-decoration: none;">
              <div class="dashboard-title">Total Members</div>
              <div class="dashboard-left">
                <img class="topIcons" src="images/users.png" alt="Members">
              </div>
              <div class="dashboard-right">
                <?php echo $totalMembers; ?>
              </div>
            </a>
          </div>


          <!-- Box for Total Revenue -->
          <div class="dashboard-box">
            <a href="memberPayments.php" style="text-decoration: none;">
              <div class="dashboard-title">Total Revenue</div>
              <div class="dashboard-left">
                <img class="topIcons" src="images/revenue.png" alt="Revenue">
              </div>
              <div class="dashboard-right">
                <?php echo $totalRevenue; ?>
              </div>
            </a>
          </div>

          <!-- Box for Total Announcements -->
          <div class="dashboard-box">
            <a href="viewAnnouncements.php" style="text-decoration: none;">
              <div class="dashboard-title">Total Announcements</div>
              <div class="dashboard-left">
                <img class="topIcons" src="images/announcement.png" alt="Announcements">
              </div>
              <div class="dashboard-right">
                <?php echo $totalAnnouncements; ?>
              </div>
            </a>
          </div>

          <!-- Box for Total Complaints -->
          <div class="dashboard-box">
            <a href="manageComplaints.php" style="text-decoration: none;">
              <div class="dashboard-title">Total Complaints</div>
              <div class="dashboard-left">
                <img class="topIcons" src="images/complaints.png" alt="Complaints">
              </div>
              <div class="dashboard-right">
                <?php echo $totalComplaints; ?>
              </div>
            </a>
          </div>
        </div>
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
          <div class="boxes2">
            <!--Upper 2 boxes-->
            <div class="box1">
              <div class="dashboard-box" style="height:140px; width:100%;">
                <div class="dashboard-title">Total Members</div>
                <br>
                <br>
                <div class="dashboard-right">
                  <?php echo $totalMembers; ?>
                </div>
              </div>

              <div class="dashboard-box" style="height:140px;width:100%;">
                <div class="dashboard-title">Total Dieticians</div>
                <br>
                <br>
                <div class="dashboard-right">
                  <?php echo $totalDieticians; ?>
                </div>
              </div>
            </div>
            <!--Lower 2 boxes-->
            <div class="box1">
              <div class="dashboard-box" style="height:140px;width:100%;">
                <div class="dashboard-title">Total Trainers</div>
                <br>
                <br>
                <div class="dashboard-right">
                  <?php echo $totalTrainers; ?>
                </div>
              </div>

              <div class="dashboard-box" style="height:140px;width:100%;">
                <div class="dashboard-title">Total Users</div>
                <br>
                <br>
                <div class="dashboard-right">
                  <?php echo $totalusers; ?>
                </div>
              </div>
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
                  labels: ['Filed', 'Completed'],
                  datasets: [{
                    label: 'Filed',
                    backgroundColor: ['rgba(255, 0, 0, 0.5)', 'rgba(0, 255, 0, 0.5)'],
                    borderColor: ['rgba(255, 0, 0, 0.7)', 'rgba(0, 255, 0, 0.7)'],
                    data: [
                      <?php echo isset($data2['Filed']) ? $data2['Filed'] : 0 ?>,
                      <?php echo isset($data2['Completed']) ? $data2['Completed'] : 0 ?>

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



</body>

</html>