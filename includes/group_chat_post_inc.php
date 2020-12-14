<?php //40058095
    require_once "config_inc.php";
    session_start();

if (isset($_POST["group_post"])) {
    $uid = $_SESSION["user_id"];
    $content = $_POST["content"];


    require_once "group_functions_inc.php";
    require_once "db_handler_inc.php";
    
    if(fetch_group_id_by_user($conn, $uid)){
    $gid = fetch_group_id_by_user($conn, $uid);
    }
    else{
    $gid = fetch_group_id_by_admin($conn, $uid);
    }

    if(create_group_post($conn, $uid, $gid, $content) === false) {
        header("location: ../{$group_chat_url }?error=stmterror");
        exit();
    }
    else {
        header("location: ../{$group_chat_url }?error=none");
        exit();
    }
    

}

// will send users back to login page if they accessed this include illegally
else {
    header("location: ../{$group_chat_url}");
    exit();
}