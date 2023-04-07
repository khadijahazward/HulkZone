<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Supplement</title>
    <link href="Style/complaint.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php

    $supName = $supType = "";
    $supNameErr = $supTypeErr = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['supName'])) {
            $supName = $_POST['supName'];
        } else {
            $supNameErr = "Supplement name is required";
        }

        if (isset($_POST['supType'])) {
            $supType = $_POST['supType'];
        } else {
            $supTypeErr = "Sypplement Type is required";
        }

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
                // Get the user ID from the session
                $userID = $_SESSION['userID'];

                // Create a new file name using the user ID and the file extension
                $newFileName = $userID . '.' . $file_ext;

                // Set the folder where the uploaded file will be stored
                $folder = "Images/supplements";

                // Set the full path of the uploaded file
                $file_path = $folder . $newFileName;

                // Move the uploaded file to the target directory
                move_uploaded_file($file_tmp, $file_path);

                // Update the user's profile photo path in the database
                $query = "INSERT INTO supplementlist(supplementName, supplemenetType, supplementPhoto) VALUES ('$supName', '$supType', '$file_path')";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    echo "Error: " . mysqli_error($conn);
                } else {
                    // Redirect the user to their profile page
                    header("Location: dietplan.php");
                    exit();
                }
            } else {
                $query1 = "INSERT INTO supplementlist(supplementName, supplemenetType) VALUES ('$supName', '$supType')";
                $result1 = mysqli_query($conn, $query1);

                if (!$result1) {
                    echo "Error: " . mysqli_error($conn);
                } else {
                    // Redirect the user to their profile page
                    header("Location: dietplan.php");
                    exit();
                }
            }
        }
    }

    ?>



    <div id="image" class="popUpContent">
        <div class="popUpContainer">
            <div class="content">
                <span class="close">&times;</span>
                <div class=" subtopic">
                    <p>Add a Supplement</p>
                </div>
                <form id="supplementForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <table class="reportingContent">
                        <tr>
                            <td><label for="supName">Supplement Name</label></td>
                            <td>
                                <!-- <span class="error"></span><br> -->
                                <input type="text" name="supName" id="supName" class="textBox"
                                    placeholder="Enter the supplement name">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="supType">Supplement Type</label></td>
                            <td>
                                <!-- <span class="error"></span><br> -->
                                <input type="text" name="supType" id="supType" class="textBox"
                                    placeholder="Enter the supplement type">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="image">Image of Supplement</label></td>
                            <td>
                                <input type="file" name="image">
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="acceptBtn" onclick="return Alertfunction()">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>