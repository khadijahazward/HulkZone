<?php
include('../connect.php');

if (isset($_SESSION['userID'])) {
  // get the user ID from the session
  $userID = $_SESSION['userID'];

  // prepare the SQL query
  $query = "SELECT profilePhoto FROM user WHERE userID = ? AND roles = 0";

  // prepare the statement
  $stmt = mysqli_prepare($conn, $query);

  // bind the parameter for the user ID
  mysqli_stmt_bind_param($stmt, "i", $userID);

  // execute the statement
  mysqli_stmt_execute($stmt);

  // bind the result variable
  mysqli_stmt_bind_result($stmt, $profilePictureLink);

  // fetch the results
  if (mysqli_stmt_fetch($stmt)) {
    // do something with $profilePictureLink here
    $profilePicture = $profilePictureLink ? $profilePictureLink : '../profileImages/default.png'; // assign default image path if the user does not have a profile photo
  
}

}?>