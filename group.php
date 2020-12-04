<?php // 40058095
    include_once "header.php";
?>

<div class="table-responsive sm-margin-top">
<table class="table table-striped table-sm">
    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/group_functions_inc.php";

        print_from_group_table_from_id($conn, $_GET["gid"]);

    ?>
</table>
</div>


<?php
    include_once "footer.php";
?>

