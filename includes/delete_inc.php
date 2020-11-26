<?php // 40058095
    session_start();
    require_once "config_inc.php";

// prevents non admins to delete users by manually entering some url
if(!isset($_SESSION["uid"]) || $_SESSION["uprivilege"] != 1){
    header("location: ../{$login_url}?error=restricted");
    exit();
}

if (isset($_GET["uid"])) {

    $uid = $_GET["uid"];

    // we won't let people delete the default admin user or themselves
    if($uid == 1 || $uid == $_SESSION["uid"]) {
        header("location: ../{$admin_url}?error=forbiden");
        exit();
    }


    require_once "db_handler_inc.php";
    require_once "functions_inc.php";

    delete_user($conn, $uid);
    header("location: ../{$admin_url}");
}
// will send users back to login page if they accessed this include illegally
else {
    header("location: ../{$login_url}");
    exit();
}