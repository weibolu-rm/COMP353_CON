<?php //40058095
    require_once "config_inc.php";
    require_once "functions_inc.php";
    require_once "email_functions_inc.php";
    require_once "db_handler_inc.php";
    session_start();


if (isset($_POST["send_email"])) {
    $recipient = $_POST["recipient"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];
    $from_id = $_SESSION["user_id"];
    $to_user = fetch_user($conn, $recipient);

    if($to_user !== false) {
        $to_id = $to_user["user_id"];
    
        if(send_email($conn, $from_id, $to_id, $subject, $content) === false) {
            header("location: ../{$send_email_url}?error=stmt");
            exit();
        }
        else {
            header("location: ../{$send_email_url}?error=none");
            exit();
        }
    }
    else {
        header("location: ../{$send_email_url}?error=usernotfound");
        exit();
    }
}
// will send users back to login page if they accessed this include illegally
else {
    header("location: ../{$login_url}");
    exit();
}