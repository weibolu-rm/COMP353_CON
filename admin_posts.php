<?php // 40058095
    include_once "templates/admin_header.php";
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
<?php
    if (isset($_GET["error"])) {        
        $message_type = "danger";
        if ($_GET["error"] == "none" || strpos($_GET["error"], "success") !== false)
            $message_type = "success";

        echo "<div class=\"sm-margin-top alert alert-{$message_type}\" role=\"alert\">";
        switch ($_GET["error"]) {
            case "none":
                echo "Successfuly removed post.";
            break;
            case "successcomment":
                echo "Successfuly removed comment.";
            break;
            case "stmt":
                echo "There was a problem executing your action.";
            break;
        }
        echo "</div>";
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
<h2>Comments</h2>
<div class="table-responsive sm-margin-top">
<table class="table table-striped table-sm">

    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/post_functions_inc.php";
        print_comments_table($conn);

    ?>          
</table>
</div>
<?php
    include_once "templates/admin_footer.php";
?>
