<?php // 40058095
      // 40024592
    include_once "templates/header.php";
?>

<div class="col-md-12 text-center">
    <h2>&nbsp </h2>
    <br>
    <img src="uploads/logo.png" alt="Condo Association Online Network System" style="width:700px;height:141px;">
    <?php 
        if (isset($_SESSION["name"]))
            echo "<h3 class=\"margin-top\">Welcome back, {$_SESSION["name"]}.";
            
        require_once "includes/db_handler_inc.php";
        require_once "includes/post_functions_inc.php";
        if (isset($_SESSION["user_id"])){
            print_posts($conn,$_SESSION["user_id"]);
        }
        else{
        print_posts_no_id($conn);
        }
    ?>

</div>

<?php
    include_once "templates/footer.php";
?>

