<?php
    session_start();
    require_once "config_inc.php";

if (isset($_POST["change_user_password"])) {
    $password = $_POST["password_1"];
    $new_password = $_POST["password_2"];
    $new_password_confirm = $_POST["password_3"];


    require_once "functions_inc.php";
    require_once "db_handler_inc.php";

    if (invalid_password($new_password, $new_password_confirm)) {
        header("location: ../{$settings_url}?error=passworddontmatch");
        exit();
    }
    if (invalid_password_length($new_password)) {
        header("location: ../{$settings_url}?error=invalidpasswordlength");
        exit();
    }

    change_user_password($conn, $_SESSION["user_id"], $password, $new_password);
}

if (isset($_POST["change_user_name"])) {
    $name = $_POST["name"];

    require_once "functions_inc.php";
    require_once "db_handler_inc.php";

    if(invalid_name($name)) {
        header("location: ../{$settings_url}?error=invalidname");
        exit();
    }

    if(admin_change_user_name($conn, $_SESSION["user_id"], $name)) {
        $_SESSION["name"] = $name;
        header("location: ../{$settings_url}?error=namesuccess");
        exit();
    }
    else {
        header("location: ../{$settings_url}?error=stmterror");
        exit();
    }
}

if (isset($_POST["change_user_email"])) {
    $email = $_POST["email"];

    require_once "functions_inc.php";
    require_once "db_handler_inc.php";

    if(invalid_email($email)) {
        header("location: ../{$settings_url}?error=invalidemail");
        exit();
    }    
    if(email_already_taken($conn, $email)) {
        header("location: ../{$settings_url}?error=emailalreadytaken");
        exit();
    }

    if(admin_change_user_email($conn, $_SESSION["user_id"], $email)) {
        $_SESSION["email"] = $email;
        header("location: ../{$settings_url}?error=emailsuccess");
        exit();
    } 
    else {        
        header("location: ../{$settings_url}?error=stmterror");
        exit();
    }
}
// will send users back to login page if they accessed this include illegally
else {
    header("location: ../{$login_url}");
    exit();
}