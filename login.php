<?php
    include_once "header.php";
?>

            
<div class="container-md">
    <div class="col-md-13">
            <h1>Login</h1>
    </div
    <form action="login.php" method="post">

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password_1" class="form-control" required>
        </div>

        <button type="submit" name="login_user" class="btn btn-light">Log in</button>

        <p>Not registered? <a href="registration.php"><b>Register Here<b></a></p>
    </form>
</div>

<?php
    include_once "footer.php";
?>