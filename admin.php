<?php // 40058095
    include_once "admin_header.php";
?>

<h2>Registered Users</h2>
<?php
    if (isset($_GET["error"])) {
        switch($_GET["error"]) {
        case "none":
            echo "<div class=\"alert alert-success\" role=\"alert\">
            Successfully removed user.
            </div>";
        break;
        case "forbiden":
            echo "<div class=\"alert alert-danger\" role=\"alert\">
            This action is forbiden.
            </div>";
        break;

        }
    }
?>

<div class="table-responsive sm-margin-top">
<table class="table table-striped table-sm">

    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/functions_inc.php";
        print_user_table($conn);

    ?>          
</table>

</div>

<?php
    include_once "admin_footer.php";
?>