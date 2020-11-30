<?php //40058095
    require_once "config_inc.php";
    session_start();

if (isset($_POST["post_announcement"])) {
    $uid = $_SESSION["user_id"];
    $title = $_POST["title"];    
    $content = $_POST["content"];
    $visibility = $_POST["visibility"];


    require_once "post_functions_inc.php";
    require_once "db_handler_inc.php";

    if(create_post($conn, $uid, $title, $content, $visibility, false, true) === false) {
        header("location: ../{$admin_announcement_url}?error=stmterror");
        exit();
    }
    else {
        header("location: ../{$admin_announcement_url}?error=none");
        exit();
    }
}

// will send users back to login page if they accessed this include illegally
else {
    header("location: ../{$login_url}");
    exit();
}