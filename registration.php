<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Register</h2>
    </div>
    
    
    <form action="registration.php" method="post">

        <div>
            <label for="username">Username</label>
            <input type="test" name="username" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="test" name="password_1" required>
        </div>
        <div>
            <label for="password">Confirm Password</label>
            <input type="test" name="password_2" required>
        </div>

        <button type="submit" name="register_user">Register</button>

        <p>Already registered? <a href="login.php"><b>Log in</b></a></p>
    </form>
</div>
</body>
</html>