<?php 
include 'authorization.php';
include '../connect.php';
?>

<?php
  if (isset($_FILES['image'])) {
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    $file_ext_array = explode('.', $file_name);
    if (count($file_ext_array) > 1) {
      $file_ext = strtolower(end($file_ext_array));
    } else {
      $errors[] = "File extension could not be determined.";
    }

    $expensions = array("jpeg", "jpg", "png");
    if (!in_array($file_ext, $expensions)) {
      $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
    }
    if ($file_size > 2097152) {
      $errors[] = 'File size must be exactly 2 MB';
    }
    if (empty($errors)) {
      $userID = $_SESSION['userID'];
      $newFileName = $userID . '.' . $file_ext;
      $folder = "profileImages/";
      $file_path = $folder . $newFileName;
      move_uploaded_file($file_tmp, $file_path);

      $query = "UPDATE user SET profilePhoto='$file_path' WHERE userID='$userID'";
      $result = mysqli_query($conn, $query);
      
      if (!$result) {
        echo "Error: " . mysqli_error($conn);
      }else{
        echo "<script>window.location.href = 'profile.php';</script>";
      }

    } else {
      echo "<script>alert('" . implode("\\n", $errors) . "');</script>";
      echo "<script>window.location.href = 'profile.php';</script>";
    }
  }
?>