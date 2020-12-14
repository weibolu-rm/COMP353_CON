<?php // 40058095
    include_once "templates/admin_header.php";
?>


<h2>Modify User</h2>
<div class="table-responsive sm-margin-top">
<table class="table table-striped table-sm">

    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/functions_inc.php";
        print_single_user_table($conn, $_GET["uid"]);

    ?>          
</table>
</div>
<div class="container-fluid">
<?php
    if (isset($_GET["error"])) {
        $message_type = "danger";
        if ($_GET["error"] == "none" || strpos($_GET["error"], "success") !== false)
            $message_type = "success";

        echo "<div class=\"sm-margin-top alert alert-{$message_type}\" role=\"alert\">";

        switch ($_GET["error"]) {
            case "wrongpassword":
                echo "You've entered the wrong password. Please try again.";
            break;
            case "passworddontmatch":
                echo "Passwords don't match. Please try again.";
            break;            
            case "invalidname":
                echo "Name is invalid. Please try again.";
            break;            
            case "invalidemail":
                echo "Email is invalid. Please try again.";
            break;
            case "invalidpasswordlength":
                echo "Password has to be at least 8 characters.";
            break;
            case "postallength":
                echo "Invalid postal code length. (A2A 2A2 or A2A2A2) ";
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
            case "passwordsuccess":
                echo "Successfuly changed password.";
            break;
            case "privilegesuccess":
                echo "Successfuly changed privileges.";
            break;
            case "addresssuccess":
                echo "Successfuly changed address.";
            break;            
            case "postalsuccess":
                echo "Successfuly changed postal code.";
            break;
        }
        echo "</div>";
    }
?>

<h2>Change Name</h2>
<div class="row justify-content-start">
    <div class ="col-lg-6">
        <?php echo'<form action="'. $change_inc_url .'?uid=' . $_GET["uid"] . '" method="post">'; ?>
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
    <div class ="col-lg-6">
        <?php echo'<form action="'. $change_inc_url .'?uid=' . $_GET["uid"] . '" method="post">'; ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" required>
            </div>
            <button type="submit" name="change_user_email" class="btn btn-light">Change Email</button>

        </form>
    </div>
</div>
<h2 class="sm-margin-top">Change password</h2>
<div class="row justify-content-start">
    <div class ="col-lg-6">
        <?php echo'<form action="'. $change_inc_url .'?uid=' . $_GET["uid"] . '" method="post">'; ?>
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password_1" class="form-control" required>
            </div>            
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" name="password_2" class="form-control" required>
            </div>
            <button type="submit" name="change_user_password" class="btn btn-light">Change Password</button>

        </form>
    </div>
</div>
<h2 class="sm-margin-top">Change Address</h2>
<div class="row justify-content-start">
    <div class ="col-lg-6">
        <?php echo'<form action="'. $change_inc_url .'?uid=' . $_GET["uid"] . '" method="post">'; ?>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <button type="submit" name="change_user_address" class="btn btn-light">Change Address</button>

        </form>
    </div>
</div>
<h2 class="sm-margin-top">Change Postal Code</h2>
<div class="row justify-content-start">
    <div class ="col-lg-6">
        <?php echo'<form action="'. $change_inc_url .'?uid=' . $_GET["uid"] . '" method="post">'; ?>
            <div class="form-group">
                <label for="postal_code">Postal Code</label>
                <input type="text" name="postal_code" class="form-control" required>
            </div>
            <button type="submit" name="change_user_postal_code" class="btn btn-light">Change Postal Code</button>

        </form>
    </div>
</div>
<?php  // prevent default admin user to change privilege
if($_GET["uid"] != 1)
echo '
    <h2 class="sm-margin-top">Change privilege</h2>
    <div class="row justify-content-start">
        <div class ="col-lg-6">
            <form action="'. $change_inc_url .'?uid=' . $_GET["uid"] . '" method="post">
                <div class="form-group">
                    <label for="privilege">User privilege</label>
                    <select class="form-control" name="privilege" required>
                        <option>Standard user</option>
                        <option>Administrator</option>
                    </select>
                </div>
                <button type="submit" name="change_user_privilege" class="btn btn-light">Change Privilege</button>
            </form>
        </div>
    </div>';
?>
<!-- give some space to scroll -->
<div class="margin-top"></div> 
<?php
    include_once "templates/admin_footer.php";
?>