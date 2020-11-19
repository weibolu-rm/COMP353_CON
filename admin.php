<?php
    include_once "admin_header.php";
?>

<h2>Registered Users</h2>
        

<div class="table-responsive">
<table class="table table-striped table-sm">

    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/functions_inc.php";
        echo $curPageName;
        print_user_table($conn);

    ?>          
</table>

<?php
    include_once "admin_footer.php";
?>