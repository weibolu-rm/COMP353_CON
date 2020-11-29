<?php // 40058095
    session_start();
    require_once "config_inc.php";

// prevents non admins to delete users by manually entering some url
if(!isset($_SESSION["user_id"]) || $_SESSION["privilege"] != "admin"){
    header("location: ../{$login_url}?error=restricted");
    exit();
}

if (isset($_GET["uid"])) {

    $uid = $_GET["uid"];

    // we won't let people delete the default admin user or themselves
    if($uid == 1 || $uid == $_SESSION["user_id"]) {
        header("location: ../{$admin_url}?error=forbiden");
        exit();
    }


    require_once "db_handler_inc.php";
    require_once "functions_inc.php";

    if(delete_user($conn, $uid) === false){
        header("location: ../{$admin_url}?error=stmterror");
        exit();
    }
    else {
        header("location: ../{$admin_url}?error=none");
        exit();
    }
}

if (isset($_GET["pid"])) {
    $pid = $_GET["pid"];

    require_once "db_handler_inc.php";
    require_once "post_functions_inc.php";

    if(delete_post($conn, $pid) === false) {
        header("location: ../{$admin_posts_url}?error=stmterror");
        exit();
    }

    else {
        header("location: ../{$admin_posts_url}?error=none");
        exit();
    }
}
// will send users back to login page if they accessed this include illegally
else {
    header("location: ../{$login_url}");
    exit();
}