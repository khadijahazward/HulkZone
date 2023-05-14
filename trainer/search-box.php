<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>SearchBar</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Search Box</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['members'])){echo $_GET['members']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Contact Number</th>
                                    <th>Plan</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>

                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "hulkzone";

                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                        if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                        }   

                                    $sql = "SELECT * FROM user WHERE CONCAT(fname,lname)";
                                    $result = $conn->query($sql);
                                    
                                    // Display the data in a table
                                    if ($result->num_rows > 0) {
                                      echo "<table>";
                                      echo "<tr><th>Member ID</th><th>Payment ID</th><th>Service ID</th><th>Employee ID</th><th>Start Date</th><th>End Date</th></tr>";
                                      // output data of each row
                                      while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["memberID"]. "</td><td>" . $row["paymentID"]. "</td><td>" . $row["serviceID"]. "</td><td>" . $row["employeeID"]. "</td><td>" . $row["startDate"]. "</td><td>" . $row["endDate"]. "</td>";
                                        echo "</tr>";
                                      }
                                      echo "</table>";
                                    } else {
                                      echo "0 results";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
 