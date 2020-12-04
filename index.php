<?php // 40058095
    include_once "templates/header.php";
?>

<div class="col-md-12 text-center">
    <h2>&nbsp </h2>
    <br>
    <img src="assets/images/logo.png" alt="HTML tutorial" style="width:700px;height:141px;">
    <?php 
        if (isset($_SESSION["name"]))
            echo "<h3 class=\"margin-top\">Welcome back, {$_SESSION["name"]}.";
            
        require_once "includes/db_handler_inc.php";
        require_once "includes/post_functions_inc.php";
        print_posts($conn);
    ?>

</div>

<?php
    include_once "templates/footer.php";
?>

