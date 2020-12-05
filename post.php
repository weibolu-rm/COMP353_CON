<?php // 40058095
    include_once "templates/header.php";
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



</div>
</div>

<?php
    include_once "templates/footer.php";
?>

