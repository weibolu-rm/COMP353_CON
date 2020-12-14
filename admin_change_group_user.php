<?php // 40024592
    include_once "templates/admin_header.php";
?>


<h2>Modify Group</h2>
<div class="table-responsive sm-margin-top">
<table class="table table-striped table-sm">

    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/group_functions_inc.php";
        print_single_from_group_table($conn, $_GET["uid"]);

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
            case "addresssuccess":
                echo "Successfuly changed group.";
            break;
        }
        echo "</div>";
    }
?>

<h2>Change Group</h2>
<div class="row justify-content-start">
    <div class ="col-lg-6">
        <?php echo'<form action="'. $change_inc_url .'?uid=' . $_GET["uid"] . '" method="post">'; ?>
            <div class="form-group">
                <label for="group_id">Group</label>
                <input type="text" name="group_id" class="form-control" required>
            </div>
            <button type="submit" name="change_user_group" class="btn btn-light">Change Group</button>
        </form>
    </div>
</div>


<div class="margin-top"></div> 
<?php
    include_once "templates/admin_footer.php";
?>