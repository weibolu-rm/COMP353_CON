<?php // 40058095
    include_once "header.php";
?>

<div class="row justify-content-center">
<div class="col-lg-6 text-center">
    <?php 
        // if (isset($_SESSION["name"]))
        //     echo "<h3 class=\"margin-top\">Welcome back, {$_SESSION["name"]}.";
            
        require_once "includes/db_handler_inc.php";
        require_once "includes/post_functions_inc.php";
        // print_posts($conn);
        $pid = $_GET["pid"];
        print_single_post($conn, $pid);
    ?>



</div>
</div>

<?php
    include_once "footer.php";
?>



