<?php 
    include_once "header.php";
?>

<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Settings</h1>
</div>

<h2>Change password</h2>
<div class="container">
<form action="includes/settings_inc.php" method="post">
    <div class="form-group">
        <label for="password">Old password</label>
        <input type="password" name="password_1" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">New Password</label>
        <input type="password" name="password_2" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Confirm Password</label>
        <input type="password" name="password_3" class="form-control" required>
    </div>
    <button type="submit" name="change_user_password" class="btn btn-light">Change Password</button>

</form>


<?php
    if (isset($_GET["error"])) {
        $message_type = "danger";
        if ($_GET["error"] == "none")
            $message_type = "success";

        echo "<div class=\"margin-top alert alert-{$message_type}\" role=\"alert\">";

        switch ($_GET["error"]) {
            case "changeadmin":
                echo "Please change the default Administrator Password.";
            break;
            case "wrongpassword":
                echo "You've entered the wrong password. Please try again.";
            break;
            case "passworddontmatch":
                echo "Passwords don't match. Please try again.";
            break;
            case "invalidpasswordlength":
                echo "Password has to be at least 8 characters.";
            break;
            case "none":
                echo "Successfuly changed password.";
            break;
        }
        echo "</div>";
    }
?>
</div>

<?php 
    include_once "footer.php";
?>

