<?php   // 40024592
    include_once "templates/header.php";
?>

<div class="col-md-12 align-items-start">

    <span class="align-baseline">
    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/functions_inc.php";
        require_once "includes/group_functions_inc.php";
        print_single_user_name($conn, $_GET["uid"]);  
    ?>
    <img src="uploads/head.png" alt="head" />
    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/functions_inc.php";
        require_once "includes/group_functions_inc.php";       
        print_single_user_profile($conn, $_GET["uid"]); 
        if ($_SESSION["privilege"] == "admin") {
            fetch_group_name_by_admin($conn, $_GET["uid"]);
            $gid = print_group_button_admin($conn, $_GET["uid"]);
            if($gid == false){
                $gid = print_group_button($conn, $_GET["uid"]);
                request_group_button($conn, $_GET["uid"]);
            }
        }
        else{
        fetch_group_name_by_user($conn, $_GET["uid"]);
                $gid = print_group_button($conn, $_GET["uid"]);
                request_group_button($conn, $_GET["uid"]);
        }
        if($gid != false){
        echo "<br><a href=\"group_chat.php?gid=$gid\"><button type=\"button\" class=\"btn btn-mid btn-outline-secondary\">Group Chat</button></a>";

        }
    ?>
    </span>
</div>

<div class="row justify-content-md-end"> <span class="align-text-top">
    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/post_functions_inc.php";     
        
        print_post_button($conn, $_GET["uid"]);

    ?>

</span> </div>

<div class="table-responsive sm-margin-top">
<table class="table table-striped table-sm">
    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/post_functions_inc.php";

        echo "User Posts";
        print_posts_table_id($conn,$_GET["uid"]);
    ?>
</table>
</div>
<div class="margin-top table-responsive sm-margin-top">
<table class="table table-striped table-sm">
    <?php
        require_once "includes/db_handler_inc.php";
        require_once "includes/financials_functions_inc.php";
	$uid = $_GET["uid"];
	if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] == $uid ) { 
        	echo "User transaction";
        	print_full_transactions_by_uid($conn, $_GET["uid"]);
	}
    ?>
</table>
</div>
<div class="margin-top"></div>
<?php
    include_once "templates/footer.php";
?>

