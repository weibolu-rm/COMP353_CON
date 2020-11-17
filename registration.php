<?php
    include_once "header.php";
?>

<div class="container-md">
    <div class="col-md-13">
        <h1>Register</h1>
    </div>
    
    <!-- _inc.php files are include files -->
    <form action="includes/registration_inc.php" method="post">

        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>      
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password_1" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Confirm Password</label>
            <input type="password" name="password_2" class="form-control" required>
        </div>

        <button type="submit" name="register_user" class="btn btn-light">Register</button>

        <p>Already registered? <a href="login.php"><b>Log in</b></a></p>
    </form>

    <?php
        if (isset($_GET["error"])) {
            $message_type = "danger";
            if ($_GET["error"] == "none")
                $message_type = "success";

            echo "<div class=\"alert alert-{$message_type}\" role=\"alert\">";

            switch ($_GET["error"]) {
                case "invalidemail":
                    echo "Please use a valid email address.";
                break;
                case "invalidname":
                    echo "Name is invalid. Please try again.";
                break;
                case "emailalreadytaken":
                    echo 'Email is already in use.';
                break;
                case "passworddontmatch":
                    echo "Passwords don't match. Please try again.";
                break;
                case "invalidpasswordlength":
                    echo "Password has to be at least 8 characters.";
                break;
                case "none":
                    echo "Successfuly registered.";
                break;
            }
            echo "</div>";
        }
    ?>

</div>
<?php
    include_once "footer.php";
?>

