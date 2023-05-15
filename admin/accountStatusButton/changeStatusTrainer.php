<?php
include('../../connect.php');

// Check if the form was submitted
if (isset($_POST['status']) && isset($_POST['userID'])) {
    $status = $_POST['status'];
    $userID = $_POST['userID'];

    // Update the user's status in the database
    $sql = "UPDATE user SET statuses='$status' WHERE userID='$userID'";

    if (mysqli_query($conn,$sql) === TRUE) {
        // Redirect to manageMembers.php
        header("Location: ../../admin/manageTrainer.php");
        exit;
    } else {
        // Handle the error
        echo "Error updating user status: " . mysqli_error($conn);
    }
} else {
    echo "Form data not submitted";
}
?>
