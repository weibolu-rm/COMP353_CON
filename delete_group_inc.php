<?php // 40058095
    session_start();
    require_once "config_inc.php";

// prevents non admins to delete users by manually entering some url
if(!isset($_SESSION["user_id"]) || $_SESSION["privilege"] != "admin"){
    header("location: ../{$login_url}?error=restricted");
    exit();
}

if (isset($_GET["gid"])) {

    $gid = $_GET["gid"];


    require_once "db_handler_inc.php";
    require_once "group_functions_inc.php";

    if(delete_group($conn, $gid) === false){
        header("location: ../{$admin_group_url}?error=stmterror");
        exit();
    }
    else {
        header("location: ../{$admin_group_url}?error=none");
        exit();
    }
}

if (isset($_GET["uid"])) {

    $uid = $_GET["uid"];


    require_once "db_handler_inc.php";
    require_once "group_functions_inc.php";

    if(delete_group_user($conn, $uid) === false){
        header("location: ../{$admin_group_url}?error=stmterror");
        exit();
    }
    else {
        header("location: ../{$admin_group_url}?error=none");
        exit();
    }
}

// will send users back to login page if they accessed this include illegally
else {
    header("location: ../{$login_url}");
    exit();
}