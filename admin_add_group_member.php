<?php // 40024592
    include_once "templates/admin_header.php";
?>

<h2>Group Owners</h2>
<?php
    if (isset($_GET["error"])) {
        switch($_GET["error"]) {
        case "groupdelete":
            echo "<div class=\"alert alert-success\" role=\"alert\">
            Successfully removed Group.
            </div>";
        break;
        case "memberremoved":
            echo "<div class=\"alert alert-success\" role=\"alert\">
            Successfully removed group member.
            </div>";
        break;
        case "groupaddsuccess":
            echo "<div class=\"alert alert-success\" role=\"alert\">
            Successfully added group member.
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
        require_once "includes/group_functions_inc.php";
        print_user_without_group($conn);
    ?>          
</table>

</div>

<?php
    include_once "templates/admin_footer.php";
?>