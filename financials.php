<?php // 40025805
    include_once "templates/admin_header.php";
?>

<h2>Building Financial Overview</h2>
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
<?php
	require_once "includes/db_handler_inc.php";
	require_once "includes/building_functions_inc.php";

	print_building_financial_overview($conn);
?>  
<div class="margin-top"></div>
<?php
    include_once "templates/admin_footer.php";
?>