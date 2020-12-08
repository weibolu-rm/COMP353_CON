<?php // 40058095
    session_start();
    require_once "config_inc.php";
    require_once "db_handler_inc.php";
    require_once "post_functions_inc.php";
    require_once "email_functions_inc.php";
    require_once "functions_inc.php";



if(isset($_GET["pid"])) { // POST DELETION
    $pid = $_GET["pid"];
    // prevents non admins and non post authors to delete posts by manually entering some url
    if(!isset($_SESSION["user_id"])) {
        header("location: ../{$login_url}?error=restricted");
        exit();
    }

    if(isset($_GET["comment"]) && isset($_GET["date"]) && $_SESSION["privilege"] == "admin") { // DELETE COMMENT    
        $date = $_GET["date"];
        if(delete_comment($conn, $pid, $date) === false) {
            header("location: ../{$admin_posts_url}?error=stmt");
            exit();
        }

        else {
            header("location: ../{$admin_posts_url}?error=successcomment");
            exit();
        }
    }
    


    if ($_SESSION["privilege"] != "admin") {
        if($row = fetch_post_by_id($conn, $pid) === false) {
            header("location: ../{$admin_posts_url}?error=stmt");
            exit();
        }
        // will allow post author to delete post
        if($row["user_id"] != $_SESSION["user_id"]) {
            header("location: ../{$login_url}?error=restricted");
            exit();
        }
    }

    if(delete_post($conn, $pid) === false) {
        header("location: ../{$admin_posts_url}?error=stmt");
        exit();
    }

    else {
        header("location: ../{$admin_posts_url}?error=none");
        exit();
    }
}

// EMAIL DELETION
if(isset($_GET["fid"]) && isset($_GET["tid"]) && isset($_GET["inbox"]) && isset($_GET["date"])) {

    $from_id = $_GET["fid"];
    $to_id = $_GET["tid"];
    $inbox = $_GET["inbox"];
    $date = $_GET["date"];

    if($inbox == "no") { // if we come from the outbox
       if($_SESSION["user_id"] != $from_id) {
           header("location: ../{$email_url}?error=forbidden");
           exit();
       } 
       else {
           if(delete_email($conn, $from_id, $to_id, $date, true) === false) {
                header("location: ../{$email_sent_url}?error=stmt");
                exit();
           }
           else {
                header("location: ../{$email_sent_url}?error=none");
                exit();
           }
       }
    }
    else { // if we come from the inbox
        if($_SESSION["user_id"] != $to_id) {
           header("location: ../{$email_url}?error=forbidden");
           exit();
        }
        else {
           if(delete_email($conn, $from_id, $to_id, $date) === false) {
                header("location: ../{$email_url}?error=stmt");
                exit();
           }
           else {
                header("location: ../{$email_url}?error=none");
                exit();
           }
        }
    }
}




// prevents non admins to delete users by manually entering some url
if(!isset($_SESSION["user_id"]) || $_SESSION["privilege"] != "admin"){
    header("location: ../{$login_url}?error=restricted");
    exit();
}

if(isset($_GET["uid"])) { // MEMBER DELETION

    $uid = $_GET["uid"];

    // we won't let people delete the default admin user or themselves
    if($uid == 1 || $uid == $_SESSION["user_id"]) {
        header("location: ../{$admin_url}?error=forbiden");
        exit();
    }

    if(delete_user($conn, $uid) === false){
        header("location: ../{$admin_url}?error=stmterror");
        exit();
    }
    else {
        header("location: ../{$admin_url}?error=none");
        exit();
    }
}

// will send users back to login page if they accessed this include illegally

header("location: ../{$login_url}?error=restricted");
exit();
