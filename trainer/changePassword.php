<?php
include '../connect.php';
include 'script/config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Hulkzone</title>
</head>

<body>
    <?php
    if (!$_SESSION['username']) {
        header('location: http://localhost/hulkzone/');
    }

    $userID = $_SESSION['userID'];
    $sql = "SELECT * FROM user JOIN employee ON user.userID = employee.userID where user.userID=" . $userID;
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    ?>

    <nav class="main-sidebar">
        <img src="img/gymLogo 3.png" alt="Logo">
        <div class="navbar-items">
            <ul>
                <li>
                    <a href="<?php echo HOME ?>">
                        <span class="material-symbols-outlined">
                            home
                        </span> Home
                    </a>
                </li>
                <li>
                    <a href="<?php echo WORKOUT_PLAN ?>">
                        <span class="material-symbols-outlined">
                            fitness_center
                        </span> Workout Plan
                    </a>
                </li>
                <li>
                    <a href="<?php echo MEMBERS ?>">
                        <span class="material-symbols-outlined">
                            groups
                        </span> Members
                    </a>
                </li>
                <li>
                    <a href="<?php echo TIMESLOTS ?>">
                        <span class="material-symbols-outlined">
                            alarm
                        </span> Timeslots
                    </a>
                </li>
                <li>
                    <a href="<?php echo COMPLAINTS ?>">
                        <span class="material-symbols-outlined">
                            patient_list
                        </span> Complaints
                    </a>
                </li>
                <li>
                    <a href="<?php echo SETTINGS ?>">
                        <span class="material-symbols-outlined">
                            settings
                        </span> Settings
                    </a>
                </li>
                <li id="nav-logout">
                    <a href="<?php echo LOGOUT ?>">
                        <span class="material-symbols-outlined">
                            logout
                        </span> Logout
                    </a>
                </li>

            </ul>
        </div>
    </nav>
    <section class="top-navbar">
        <div class="top-search-bar">
            <span class="material-symbols-outlined">
                search
            </span>
            <input type="text" name="search" placeholder="Search...">
        </div>

        <div class="topbar-right">
            <div class="topbar-notification">
                <span class="material-symbols-outlined">
                    notifications
                </span>
            </div>
            <img id="profile-photo-style" src="<?php echo $_SESSION['profilePhoto']; ?>" alt="profile-icon">
        </div>

    </section>

    <section class="main-content-container">
        <div class="settings-main-container">
            <div id="settings-content">
                <div class="dateBar">
                    <div class="selector">

                    </div>
                </div>
                <div class="formArea">
                    <form id="settings-main-form" action="" method="POST">
                        <table>
                            <tr>
                                <td>
                                    <label for="oldPassword">Old Password</label><br>
                                    <input type="password" id="oldPassword" name="oldPassword" class="textBox">
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <label for="newPassword">New Password</label><br>
                                    <input type="password" id="newPassword" name="newPassword" class="textBox" >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="confirmPassword">Confirm Password</label><br>
                                    <input type="password" id="confirmPassword" name="confirmPassword" class="textBox">
                                </td>
                            </tr>
                        </table>
                        <button type="submit" name="submit" id="settings-update-btn" style="margin-top: 15px;">Update
                            Password</button>
                    </form>
                </div>
            </div>

        </div>


    </section>
</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    $userID = $_SESSION['userID'];

    $query = "SELECT * FROM user WHERE userID = $userID";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if (!empty($oldPassword) || !empty($newPassword) || !empty($confirmPassword)) {

            $databasePW = $row['pw'];

            if (password_verify($oldPassword, $databasePW)) {

                if (preg_match('@[0-9]@', $newPassword) && preg_match('@[^\w]@', $newPassword) && strlen($newPassword) >= 8) {

                    if ($newPassword == $confirmPassword) {
                        $hashedPW = password_hash($newPassword, PASSWORD_DEFAULT);

                        $sql = "UPDATE user set pw = '$hashedPW' WHERE userID = '$userID'";
                        $sqlResult = mysqli_query($conn, $sql);

                        if ($sqlResult) {
                            echo '<script> window.alert("You has been changed your password successfully!");</script>';
                        } else {
                            echo '<script> window.alert("Error!");</script>';
                        }
                    }
                } else {
                    echo '<script> window.alert("Password must contain at least one number and one special character and should be at least 8 characters long!");</script>';
                }
            } else {
                echo '<script> window.alert("Incorrect old password!");</script>';
            }
        } else {
            echo '<script> window.alert("Fill required fields!");</script>';
        }
    }
}
?>