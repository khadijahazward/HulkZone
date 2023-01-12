<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style/main.css">
</head>

<body>
    <div class="login signup">
        <h2 class="active"> Sign up </h2>
        <form action='http://localhost/hulkzone/script/register-user.php' method="POST" class="loginform signupform">
            <label for="fullname">Full Name</label>
            <input type="text" class="text" name="fullname" required>

            <label for="email">Email</label>
            <input type="email" class="text" name="email" required>

            <label for="contact">Contact</label>
            <input type="number" class="text" name="contact" required>

            <label for="password">Password</label>
            <input type="password" class="text" name="password" required>
            <br>
            <input type="submit" id="btn" name="submit" value="Sign Up" class="signin">
            <input type="reset" id="btn" value="Reset" class="signin">
        </form>

    </div>
</body>

</html>