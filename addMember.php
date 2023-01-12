<?php
include 'config/config.php';
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
    if (!isset($_SESSION['loggedInUser'])) {
        header('location: http://localhost/hulkzone/');
    }
    ?>
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
        <div class="add-members-container">
            <h1>ADD MEMBERS</h1>
            <form action="http://localhost/hulkzone/script/add-member.php" method="POST">

                <ul>
                    <li><label for="name">MEMBER NAME</label>
                        <input type="text" name="name" id="name" required>
                    </li>
                    <li><label for="gender">GENDER</label>
                        <div class="member-gender">
                            <input type="radio" name="gender" id="male" value="Male"> Male
                            <input type="radio" name="gender" id="female" value="Female"> Female
                        </div>

                    </li>
                    <li><label for="id">CONTACT NUMBER</label>
                        <input type="text" name="contact" id="contact" required>
                    </li>
                    <li>
                        <label for="plan">PLAN PERIOD</label>
                        <div class="member-plan">
                            <input type="number" name="plan" id="plan" required>
                            Months
                        </div>

                    </li>
                    <li>
                        <button type="submit" name="submit">Submit</button>
                    </li>
                </ul>

            </form>

        </div>

    </section>
</body>

</html>