<?php
include 'config/config.php'
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
<?php
    if(!isset($_SESSION['loggedInUser'])) 
    {
        header('location: http://localhost/hulkzone/');
    }
    ?>
<body>

    <nav class="main-sidebar">
        <img src="img/gymLogo 3.png" alt="Logo">
        <div class="navbar-items">
            <ul>
                <li>
                    <a href="">
                        <span class="material-symbols-outlined">
                            home
                        </span> Home
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="material-symbols-outlined">
                            fitness_center
                        </span> Workout Plan
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="material-symbols-outlined">
                            groups
                        </span> Members
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="material-symbols-outlined">
                            alarm
                        </span> Timeslots
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="material-symbols-outlined">
                            patient_list
                        </span> Complaints
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="material-symbols-outlined">
                            settings
                        </span> Settings
                    </a>
                </li>
                <li id="nav-logout">
                    <a href="http://localhost/hulkzone/script/logout-user.php">
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
            <img src="img/profile-icon.png" alt="profile-icon">
        </div>

    </section>
    <section class="main-content-container">
        <div class="members-list-container">
            <div class="member-list-top">
            <h1>Workout Plans</h1>
            <a href="addMember.php">Add New Member</a>
            </div>

            <div class="member-list-table">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>PROFILE</th>
                            <th>NAME</th>
                            <th>GENDER</th>
                            <th>CONTACT NUMBER</th>
                            <th>PLAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * FROM members_table";
                        $res = mysqli_query($conn, $sql);

                        if ($res == TRUE) {
                            $count = mysqli_num_rows($res);

                            if ($count > 0) {


                                while ($rows = mysqli_fetch_assoc($res)) {
                                    $id = $rows['id'];
                                    $name = $rows['name'];
                                    $gender = $rows['gender'];
                                    $contact = $rows['contact'];
                                    $plan = $rows['plan'];
                                    $profile_link = $rows['profile_link'];

                        ?>
                                    <tr>
                                        <td><?php echo $id; ?> </td>
                                        <td>
                                            <img src="<?php echo $profile_link; ?>" alt="profile-icon">
                                        </td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $gender; ?></td>
                                        <td><?php echo $contact; ?></td>
                                        <td><?php echo $plan . " Months"; ?></td>
                                    </tr>
                        <?php

                                }
                            } else {
                            }
                        }
                        ?>
                    </tbody>


                </table>
            </div>

        </div>


    </section>
</body>

</html>