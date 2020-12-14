<?php // 40024592
    include_once "templates/header.php";
?>

<div class="table-responsive sm-margin-top">
<table class="table table-striped table-sm">
    <?php
        require_once "includes/db_handler_inc.php";
                require_once "includes/functions_inc.php";
        require_once "includes/group_functions_inc.php";
        echo "<h2>Change/Request Group</h2><br>";
        print_group_owner_table($conn);

    ?>
</table>
</div>


<?php
    include_once "templates/footer.php";
?>

