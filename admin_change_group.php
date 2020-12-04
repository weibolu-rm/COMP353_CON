<?php // 40058095
    include_once "templates/admin_header.php";
?>


<h2>Modify Group</h2>
<div class="table-responsive sm-margin-top">
<table class="table table-striped table-sm">

    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/group_functions_inc.php";
        print_single_group_table($conn, $_GET["gid"]);

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
        }
        echo "</div>";
    }
?>

<h2>Change Group Name</h2>
<div class="row justify-content-start">
    <div class ="col-lg-6">
        <?php echo'<form action="'. $change_inc_url .'?gid=' . $_GET["gid"] . '" method="post">'; ?>
            <div class="form-group">
                <label for="group_name">Group Name</label>
                <input type="text" name="group_name" class="form-control" required>
            </div>
            <button type="submit" name="change_group_name" class="btn btn-light">Change Group Name</button>
        </form>
    </div>
</div>

<!-- give some space to scroll -->
<div class="margin-top"></div> 
<?php
    include_once "templates/admin_footer.php";
?>