<?php //40058095
    require_once "config_inc.php";

if (isset($_POST["register_user"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password_1"];
    $password_confirm = $_POST["password_2"];
    $privilege = $_POST["privilege"];


    require_once "functions_inc.php";
    require_once "db_handler_inc.php";

    if (invalid_email($email)) {
        header("location: ../{$register_url}?error=invalidemail");
        exit();
    }
    if (invalid_name($name)) {
        header("location: ../{$register_url}?error=invalidname");
        exit();
    }
    if (email_already_taken($conn, $email)) {
        header("location: ../{$register_url}?error=emailalreadytaken");
        exit();
    }
    if (invalid_password($password, $password_confirm)) {
        header("location: ../{$register_url}?error=passworddontmatch");
        exit();
    }
    if (invalid_password_length($password)) {
        header("location: ../{$register_url}?error=invalidpasswordlength");
        exit();
    }
    create_user($conn, $name, $email, $password, $privilege);

}

// will send users back to login page if they accessed this include illegally
else {
    header("location: ../{$login_url}");
    exit();
}