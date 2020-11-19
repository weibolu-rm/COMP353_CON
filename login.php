<?php
    include_once "header.php";
?>

            
<div class="container-md">
    <div class="col-md-13">
            <h1>Login</h1>
    </div>

    <form action="includes/login_inc.php" method="post">

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password_1" class="form-control" required>
        </div>

        <button type="submit" name="login_user" class="btn btn-light">Log in</button>

        <p>Not registered? Contact your condo administration.</p>
    </form>

    <?php
        if (isset($_GET["error"])) {
            if($_GET["error"] == "wronglogin") 
                echo "<div class=\"alert alert-danger\" role=\"alert\">
                Wrong Email or Password. Please try again.
                </div>";
        }
    ?>
</div>

<?php
    include_once "footer.php";
?>