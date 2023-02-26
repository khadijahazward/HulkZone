<?php 
include 'authorization.php';
include '../connect.php';
?>

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $rating = $_POST['rating'];
        $employeeID = $_POST['employeeID'];
        $serviceID = $_POST['serviceID'];
        $memberID = $_POST['memberID'];
        $paymentID = $_POST['paymentID'];
    
        $sql = "UPDATE servicecharge SET rate = " . $rating . " WHERE memberID = $memberID AND paymentID = $paymentID AND serviceID = $serviceID AND employeeID = $employeeID";
        $result = mysqli_query($conn, $sql); 
    
        if (!$result) {
            echo "Error: " . mysqli_error($conn);
        } else {
            //getting avg ratings for the services completed by the employee
            $sql1 = "SELECT AVG(rate) AS average_rating FROM servicecharge WHERE employeeID = $employeeID AND enddate < NOW()";
            $result1 = mysqli_query($conn, $sql1);
    
            if (!$result1) {
                echo "Error: " . mysqli_error($conn);
            } else {
                $row = mysqli_fetch_assoc($result1);
                $avgRating = $row['average_rating'];
    
                $sql2 = "UPDATE employee SET avgRating = " . $avgRating. " WHERE employeeID = $employeeID";
                $result2 = mysqli_query($conn, $sql2);
    
                if (!$result2) {
                    echo "Error: " . mysqli_error($conn);
                } else {
                    header("Location: services.php");
                    exit();
                }
            }
        }
    }    
?>