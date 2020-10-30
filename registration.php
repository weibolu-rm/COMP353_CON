<?php
    include_once "header.php";
?>

<div class="container-md">
    <div class="col-md-13">
        <h1>Register</h1>
    </div>
    
    
    <form action="registration.php" method="post">

        <div class="form-group">
            <label for="username">Username</label>
            <input type="test" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="test" name="password_1" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Confirm Password</label>
            <input type="test" name="password_2" class="form-control" required>
        </div>

        <button type="submit" name="register_user" class="btn btn-light">Register</button>

        <p>Already registered? <a href="login.php"><b>Log in</b></a></p>
    </form>

</div>
<?php
    include_once "footer.php";
?>

