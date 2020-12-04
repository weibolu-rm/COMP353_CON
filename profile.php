<?php // 40058095
    include_once "templates/header.php";
?>

<div class="col-md-12 align-items-start">

    <span class="align-baseline">
    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/group_functions_inc.php";
        print_single_user_name($conn, $_GET["uid"]);  
    ?>
    <img src="assets/images/head.png" alt="head" />
    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/group_functions_inc.php";       
        print_single_user_profile($conn, $_GET["uid"]); 
        if ($_SESSION["privilege"] == "admin") {
            fetch_group_name_by_admin($conn, $_GET["uid"]);
                    print_group_button_admin($conn, $_GET["uid"]);
        }
        else{
        fetch_group_name_by_user($conn, $_GET["uid"]);
                print_group_button($conn, $_GET["uid"]);
        }
       // echo"<br>";
      //  print_post_button($conn, $_GET["uid"]);
    ?>
    </span>
</div>

<div class="row justify-content-md-end"> <span class="align-text-top">
    <?php
            if ($_SESSION["privilege"] == "admin") {
        require_once "includes/db_handler_inc.php";
        require_once "includes/post_functions_inc.php";     
        
        print_post_button($conn, $_GET["uid"]);
            }
    ?>

</span> </div>

<div class="table-responsive sm-margin-top">
<table class="table table-striped table-sm">
    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/post_functions_inc.php";

        
        print_posts_table_id($conn,$_GET["uid"]);
    ?>
</table>
</div>


<?php
    include_once "templates/footer.php";
?>

