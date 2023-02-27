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
    <link rel="stylesheet" href="style/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Hulkzone</title>
    <script src="js/main.js" defer></script>
</head>
<?php
if (!$_SESSION['username']) {
    header('location: http://localhost/hulkzone/');
}
?>

<body>

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
            <img src="img/profile-icon.png" alt="profile-icon">
        </div>

    </section>
    <section class="main-content-container" id="dashboard-page">

        <div class="top-container">
            <div class="top-box" id="left-top">
                <p>Today is <span id="today-day"></span></p>
                <h3 id="today-date">30 DEC 2020</h3>
            </div>
            <div class="top-box">
                <h3>Total Sessions</h3>
                <div>
                    <span class="material-symbols-outlined">
                        assignment
                    </span>
                    <p>85</p>
                </div>
            </div>
            <div class="top-box">
                <h3>Total Classes</h3>
                <div>
                    <span class="material-symbols-outlined">
                        assignment
                    </span>
                    <p>85</p>
                </div>
            </div>
        </div>

        <div class="middle-container">

            <h2>Hello <?php echo  $_SESSION['firstName']; ?> !</h2>
            <p>The only person you are destined to become is the person you decide to be.</p>
        </div>

        <div class="bottom-container">
            <h2>Upcoming Classes</h2>
            <div class="bottom-cards">
                <div class="bottom-card-row">
                    <div class="card-box">
                        <img src="img/james.webp" alt="">
                        <div>
                            <p>James - Class #1</p>
                            <p>10.30AM - 11.30 AM</p>
                            <p>By Daniel Dyon
                                <span>3.5</span>
                            </p>
                        </div>

                    </div>

                    <div class="card-box">
                        <img src="img/james.webp" alt="">
                        <div>
                            <p>James - Class #1</p>
                            <p>10.30AM - 11.30 AM</p>
                            <p>By Daniel Dyon
                                <span>3.5</span>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="bottom-card-row">
                <div class="card-box">
                    <img src="img/james.webp" alt="">
                    <div>
                        <p>James - Class #1</p>
                        <p>10.30AM - 11.30 AM</p>
                        <p>By Daniel Dyon
                            <span>3.5</span>
                        </p>
                    </div>

                </div>

                <div class="card-box">
                    <img src="img/james.webp" alt="">
                    <div>
                        <p>James - Class #1</p>
                        <p>10.30AM - 11.30 AM</p>
                        <p>By Daniel Dyon
                            <span>3.5</span>
                        </p>
                    </div>

                </div>
            </div>
            <div class="bottom-card-row">
                <div class="card-box">
                    <img src="img/james.webp" alt="">
                    <div>
                        <p>James - Class #1</p>
                        <p>10.30AM - 11.30 AM</p>
                        <p>By Daniel Dyon
                            <span>3.5</span>
                        </p>
                    </div>

                </div>

                <div class="card-box">
                    <img src="img/james.webp" alt="">
                    <div>
                        <p>James - Class #1</p>
                        <p>10.30AM - 11.30 AM</p>
                        <p>By Daniel Dyon
                            <span>3.5</span>
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </section>
</body>

</html>