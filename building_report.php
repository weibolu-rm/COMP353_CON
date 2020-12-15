<?php //40025805
    include_once "templates/admin_header.php";
?>
<div class="table-responsive sm-margin-top">
<table class="table table-striped table-sm">
<?php 
    require_once "includes/building_functions_inc.php";
    require_once "includes/db_handler_inc.php";
    $building_id = $_GET["bid"];
    print_building_details($conn, $building_id);
?>
</table>

</div>
<?php
    include_once "templates/admin_header.php";
?>