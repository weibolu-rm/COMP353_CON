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

    change_user_password($conn, $_SESSION["uid"], $password, $new_password, $new_password_confirm);

}

// will send users back to login page if they accessed this include illegally
else {
    header("location: ../{$login_url}");
    exit();
}