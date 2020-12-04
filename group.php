<?php // 40058095
    include_once "templates/header.php";
?>

<div class="table-responsive sm-margin-top">
<table class="table table-striped table-sm">
    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/group_functions_inc.php";
        echo "<h2>Groups</h2><br>";
        print_from_group_table_from_id($conn, $_GET["gid"]);

    ?>
</table>
</div>


<?php
    include_once "templates/footer.php";
?>

