<?php // 40058095
    include_once "header.php";
?>

<div class="col-md-12 text-center">
    <h1 class="display-4">Condo-association Online Network System</h1>
    <?php 
        if (isset($_SESSION["name"]))
            echo "<h3 class=\"margin-top\">Welcome back, {$_SESSION["name"]}.";
        require_once "includes/db_handler_inc.php";
        require_once "includes/post_functions.php";
        print_posts($conn);
    ?>

</div>

<?php
    include_once "footer.php";
?>

