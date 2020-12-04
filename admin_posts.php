<?php // 40058095
    include_once "admin_header.php";
?>

<h2>Posts</h2>
<?php
    if (isset($_GET["error"])) {
        switch($_GET["error"]) {
        case "none":
            echo "<div class=\"alert alert-success\" role=\"alert\">
            Successfully removed post.
            </div>";
        break;
        }
    }
?>

<div class="table-responsive sm-margin-top">
<table class="table table-striped table-sm">

    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/post_functions_inc.php";
        print_posts_table($conn);

    ?>          
</table>

</div>

<?php
    include_once "templates/admin_footer.php";
?>
