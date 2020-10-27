<!DOCTYPE html>
<html>
    <head>
        <title>Log in</title>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h2>Register</h2>
            </div>
            
            <form action="login.php" method="post">

                <div>
                    <label for="username">Username</label>
                    <input type="test" name="username" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="test" name="password_1" required>
                </div>

                <button type="submit" name="login_user">Log in</button>

                <p>Not registered? <a href="registration.php"><b>Register Here<b></a></p>
            </form>
        </div>
    </body>
</html>