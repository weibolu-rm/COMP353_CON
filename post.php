<?php // 40058095
    include_once "templates/header.php";

    if (isset($_GET["error"])) {        
        $message_type = "danger";
        if ($_GET["error"] == "none" || strpos($_GET["error"], "success") !== false)
            $message_type = "success";

        echo "<div class=\"sm-margin-top alert alert-{$message_type}\" role=\"alert\">";
        switch ($_GET["error"]) {
            case "none":
                echo "Successfuly posted comment.";
            break;
            case "stmt":
                echo "There was a problem posting your comment.";
            break;
        }
        echo "</div>";
    }
?>
<div class="row justify-content-center">
<div class="col-lg-6 text-center">
    <?php 
            
        require_once "includes/db_handler_inc.php";
        require_once "includes/post_functions_inc.php";
        $pid = $_GET["pid"];
        $post = fetch_post_by_id($conn, $pid);
        
        // visibility
        if(!isset($_SESSION["privilege"])) {
            if($post["view_permission"] != "public") {
                header("location: {$login_url}?error=restricted");
                exit();
            }
        } 
        else {
            if($post["view_permission"] == "admin" && $_SESSION["privilege"] != "admin") {
                header("location: {$login_url}?error=restricted");
                exit();
            }
        }

        print_single_post($conn, $pid);
    ?>

    <div class="my-3 p-3 bg-dark rounded shadow-sm text-justify">
        <?php
            require_once "includes/db_handler_inc.php";
            require_once "includes/post_functions_inc.php";
            $pid = $_GET["pid"];
            print_comments($conn, $pid)
        ?>
        <div class="sm-margin-top">
        <form action="includes/post_inc.php?pid=<?php echo $_GET["pid"] ?>" method="post">
            <div class="form-group">
                <label for="content">Comment</label>
                <textarea name="content" class="form-control" rows="2" required></textarea>
            </div>    
            <div class="form-group">
                <label for="privilege">Visibility</label>
                <select class="form-control" name="visibility" required>
                    <option>public</option>
                    <option>original poster</option>
                </select>
            </div>
            <button type="submit" name="post_comment" class="btn btn-light">Post Comment</button>

        </form>
        </div>
    </div>

</div>
</div>

<?php
    include_once "templates/footer.php";
?>

