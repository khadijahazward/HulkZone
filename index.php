<?php include 'config/config.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login - Hulkzone</title>
    <link rel="stylesheet" type="text/css" href="style/main.css">
</head>

<body>
    <div class="login">
        <h2 class="active"> Sign in </h2>
        <form action='http://localhost/hulkzone/script/login-user.php' method="POST" class="loginform signupform">
            <label for="email">Email</label>
            <input type="text" class="text" name="email" required>
            <br>
            <br>
            <label for="password">Password</label>
            <input type="password" class="text" name="password" required>
            <br>
            <br>
            <input type="submit" id="btn" name="submit" value="Sign In" class="signin">
            <input type="reset" id="btn" value="Reset" class="signin">
            <hr>
            <a href="registration.php">Don't have an account? Sign-Up Here</a>
        </form>

    </div>
</body>

</html>