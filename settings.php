<?php 
    include_once "header.php";
?>
<div class="justify-content-start">
<div class="pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Settings</h1>
</div>

<div class="container-fluid">
<?php
    if (isset($_GET["error"])) {
        $message_type = "danger";
        if ($_GET["error"] == "none" || strpos($_GET["error"], "success") !== false)
            $message_type = "success";

        echo "<div class=\"sm-margin-top alert alert-{$message_type}\" role=\"alert\">";

        switch ($_GET["error"]) {
            case "changeadmin":
                echo "Please change the default administrator credentials.";
            break;
            case "changecredentials":
                echo "Please change the default credentials.";
            break;
            case "invalidname":
                echo "Name is invalid. Please try again.";
            break;            
            case "invalidemail":
                echo "Email is invalid. Please try again.";
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
            case "emailalreadytaken":
                echo "Email is already taken.";
            break;           
            case "none":
                echo "Successfuly changed password.";
            break;
            case "namesuccess":
                echo "Successfuly changed name.";
            break;
            case "emailsuccess":
                echo "Successfuly changed email.";
            break;
        }
        echo "</div>";
    }
?>
<?php
    // This is for the first login, after that the admin can use the admin panel to change names/emails as he/she sees fit.
    if($_SESSION["user_id"] == 1)
        if($_SESSION["email"] == "admin" || $_SESSION["name"] == "admin")
            echo '
    <h2>Change Name</h2>
    <div class="row justify-content-start">
        <div class ="col-lg-6 col-md-6">
            <form action="'. $settings_inc_url .'" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <button type="submit" name="change_user_name" class="btn btn-light">Change Name</button>

            </form>
        </div>
    </div>
    <h2 class="sm-margin-top">Change Email</h2>
    <div class="row justify-content-start">
        <div class ="col-lg-6 col-md-6">
            <form action="' . $settings_inc_url . '" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <button type="submit" name="change_user_email" class="btn btn-light">Change Email</button>

            </form>
        </div>
    </div>';
?>
    <h2 class="sm-margin-top">Change password</h2>
    <div class="row justify-content-start">
        <div class ="col-lg-6 col-md-6">
            <?php echo '<form action="' . $settings_inc_url .'" method="post">'; ?>
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
        </div>
    </div>
</div>
<?php 
    include_once "footer.php";
?>

